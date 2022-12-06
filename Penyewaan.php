<?php

namespace App\Controllers;

use \App\Models\PlaystationModel;
use \App\Models\CustomerModel;
use \App\Models\SaleModel;
use \App\Models\SaleDetailModel;
use App\Models\PengembalianModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use TCPDF;

class Penyewaan extends BaseController
{
    private $playstation, $cart, $cust, $sale, $saleDetail, $getPengembalian;
    public function __construct()
    {
        $this->playstation = new PlaystationModel();
        $this->cust = new CustomerModel();
        $this->sale = new saleModel();
        $this->saleDetail = new SaleDetailModel();
        $this->getPengembalian = new PengembalianModel();
        $this->cart = \Config\Services::cart();
    }

    public function index()
    {
        $this->cart->destroy();
        $dataPlaystation = $this->playstation->getPlaystation();
        $dataCust = $this->cust->findAll();


        $data = [
            'title' => 'Penyewaan',
            'dataPlaystation' => $dataPlaystation,
            'dataCust' => $dataCust,


        ];
        return view('penyewaan/list', $data);
    }

    public function showCart()
    {
        // Fungsi untuk menampilkan cart
        $output = '';

        $no = 1;
        foreach ($this->cart->contents() as $items) {
            $diskon = ($items['options']['discount'] / 100) * $items['subtotal'];
            $total_hari = $items['options']['day'];
            // $color = $items['options']['color'];
            // $playstation = $this->playstation->where(['nama_ps' => $items['name']])->first();
            $output .= '
            <tr> 
            <td>' . $no++ . '</td>
            <td>' . $items['name']  . '</td>
            <td>' . $items['qty'] . '</td>
            <td>' . number_to_currency($items['price'], 'IDR', 'id_ID', 2) . '</td>
            <td>' . number_to_currency($diskon, 'IDR', 'id_ID', 2) . '</td>
            <td>' . number_to_currency((($items['subtotal'] * $items['options']['day']) - $diskon), 'IDR', 'id_ID', 2) . '</td>
            <td>' . $total_hari . ' hari' . '</td> 
            <td>
            <button id="' . $items['rowid'] . '" day="' . $total_hari . '" color="' . $items['options']['discount']  . '" type="' . $items['options']['type'] . '" price="' . $items['price'] . '"
            class="ubah_cart btn btn-warning btn-xs" title="Ubah Jumlah hari"><i class="fa
            fa-edit"></i></button>
            <button type="button" id="' . $items['rowid'] . '" class="hapus_cart btn btn-danger btn-xs"><i class="fa fa-trash" title="Hapus"></i></button>
            </td>
            </tr>
            ';
        }
        if (!$this->cart->contents()) {
            $output = '<tr><td colspan="7" align="center">Tidak ada transaksi!</td></tr>';
        }
        return $output;
    }

    public function loadCart()
    {
        // load data cart
        echo $this->showCart();
    }

    public function addCart()
    {

        if (!$this->cart->contents()) {
            $playstation = $this->playstation->where(['ps_id' => $this->request->getVar('id')])->first();
            if ($playstation['stock'] > 0) {
                $this->cart->insert(array(
                    'id'        => $this->request->getVar('id'),
                    'qty'       => $this->request->getVar('qty'),
                    'price'     => $this->request->getVar('harga_ps'),
                    'name'      => $this->request->getVar('nama_ps'),
                    'options'   => array('discount' => $this->request->getVar('discount'), 'day' => $this->request->getVar('day'), 'type' => $this->request->getVar('type'))
                ));



                echo $this->showCart();
            }
        } else {
            $no = 0;

            $playstation = $this->playstation->where(['ps_id' => $this->request->getVar('id')])->first();
            foreach ($this->cart->contents() as $items) {
                if ($items['qty'] < $playstation['stock']) {


                    $this->cart->insert(array(
                        'id'        => $this->request->getVar('id'),
                        'qty'       => $this->request->getVar('qty'),
                        'price'     => $this->request->getVar('harga_ps'),
                        'name'      => $this->request->getVar('nama_ps'),
                        'options'   => array('discount' => $this->request->getVar('discount'), 'day' => $this->request->getVar('day'), 'type' => $this->request->getVar('type'))
                    ));



                    echo $this->showCart();
                    $no++;
                }
            }
        }
    }





    public function getTotal()
    {


        $totalBayar = 0;
        foreach ($this->cart->contents() as $items) {
            $diskon = ($items['options']['discount'] / 100) * $items['subtotal'];
            $totalBayar += ($items['subtotal'] * $items['options']['day']) - $diskon;
        }
        echo number_to_currency($totalBayar, 'IDR', 'id_ID', 2);
        // return number_to_currency($totalBayar, 'IDR', 'id_ID', 2);
    }

    public function updateCart()
    {

        $data = array(
            'rowid' => $this->request->getVar('rowid'),
            'price' => $this->request->getVar('price'),
            'options' => array(
                'day' => $this->request->getVar('day'),
                'discount' => $this->request->getVar('color'),
                'type' => $this->request->getVar('type'),
            ),
        );



        $this->cart->update($data);
        echo $this->showCart();
    }

    public function deleteCart($rowid)
    {

        $this->cart->remove($rowid);
        echo $this->showCart();
    }

    public function pembayaran()
    {

        if (!$this->cart->contents()) {
            //  Transaksi kosong
            $response = [
                'status' => false,
                'msg' => "Tidak ada transaksi!",
            ];
            echo json_encode($response);
        } else {
            // Ada transaksi
            $totalBayar = 0;
            foreach ($this->cart->contents() as $items) {
                $diskon = ($items['options']['discount'] / 100) * $items['subtotal'];
                $totalBayar += ($items['subtotal'] * $items['options']['day']) - $diskon;
            }

            $nominal = $this->request->getVar('nominal');
            $id = "J" . time();

            // Pengecekan apakah nominal yang dimasukan cukup atau kurang
            if ($nominal < $totalBayar) {
                $response = [
                    'status' => false,
                    'msg' => "Nominal pembayaran kurang!",
                ];
                echo json_encode($response);
            } else {


                $this->getPengembalian->save([
                    'id_customer' => $this->request->getVar('id-cust'),
                    'status' => 'aktif',
                    'stock' => $items['qty'],
                    'ps_id' => $items['id'],
                    'sale_id' => $id,
                    'sisa_hari' => $items['options']['day'],

                ]);

                // Jika nominal memenuhi, akan menyimpan data di tabel sale dan sale_detail
                $this->sale->save([
                    'sale_id' => $id,
                    'user_id' => user()->id,
                    'customer_id' => $this->request->getVar('id-cust')
                ]);
                $nows = date("Y-m-d");
                // $nows = date('2023-05-13');
                foreach ($this->cart->contents() as $items) {
                    $this->saleDetail->save([
                        'sale_id' => $id,
                        'ps_id' => $items['id'],
                        'amount' => $items['qty'],
                        'price' => $items['price'],
                        'discount' => $diskon,
                        'total_price' => ($items['subtotal'] * $items['options']['day']) - $diskon,
                        'day' => $items['options']['day'],
                        'exam_date' => $nows,
                    ]);


                    // Mengurangi jumlah stock di tabel playstation
                    // kita get buku berdasarkan id buku

                    $playstation = $this->playstation->where(['ps_id' => $items['id']])->first();
                    $this->playstation->save([
                        'ps_id' => $items['id'],
                        'stock' => $playstation['stock'] - $items['qty'],
                    ]);
                }

                $this->cart->destroy();
                $kembalian = $nominal - $totalBayar;

                $response = [
                    'status' => true,
                    'msg' => "Pembayaran berhasil!!",
                    'data' => [
                        'kembalian' => number_to_currency($kembalian, 'IDR', 'id_ID', 2)
                    ]
                ];
                echo json_encode($response);
            }
        }
    }

    public function report()
    {
        $report = $this->sale->getReport();
        $data = [
            'title' => 'Laporan Penyewaan',
            'result' => $report,
        ];
        return view('penyewaan/report', $data);
    }


    public function reportPinjaman()
    {

        $filter = $this->request->getVar('filter');



        if (!isset($filter)) {
            $filter == "all";
            $tgl = "";
        }

        if ($filter == "harian") {
            $tgl = "Harian";
        }
        if ($filter == "mingguan") {
            $tgl = "Mingguan";
        } else if ($filter == "bulanan") {
            $tgl = "Bulanan";
        } else if ($filter == "tahunan") {
            $tgl = "Tahunan";
        } else if ($filter == "all") {
            $tgl = "";
        }

        $report = $this->sale->filterReportP($filter);
        $data = [
            'title' => 'Laporan Pinjaman',
            'result' => $report,
            'tgl' => $tgl,
        ];
        return view('penyewaan/laporanPinjaman', $data);
    }

    public function reportPendapatan()
    {

        $filter = $this->request->getVar('filter');



        if (!isset($filter)) {
            $filter == "all";
            $tgl = "";
        }

        if ($filter == "harian") {
            $tgl = "Harian";
        }
        if ($filter == "mingguan") {
            $tgl = "Mingguan";
        } else if ($filter == "bulanan") {
            $tgl = "Bulanan";
        } else if ($filter == "tahunan") {
            $tgl = "Tahunan";
        } else if ($filter == "all") {
            $tgl = "";
        }

        $report = $this->sale->filterReportP($filter);
        $data = [
            'title' => 'Laporan Pendapatan',
            'result' => $report,
            'tgl' => $tgl,
        ];
        return view('penyewaan/laporanPendapatan', $data);
    }

    public function exportPDF()
    {
        $report = $this->sale->getReport();
        $data = [
            'title' => 'Laporan Penyewaan',
            'result' => $report,
        ];
        $html = view('penyewaan/exportPDF', $data);

        $pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->AddPage();
        $pdf->writeHTML($html);
        $this->response->setContentType('application/pdf');
        $pdf->Output('laporan-penyewaan.pdf', 'I');
    }

    public function exportPDF2()
    {
        $report = $this->sale->getReport();
        $data = [
            'title' => 'Laporan Pendapatan',
            'result' => $report,
        ];
        $html = view('penyewaan/exportPDF2', $data);

        $pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->AddPage();
        $pdf->writeHTML($html);
        $this->response->setContentType('application/pdf');
        $pdf->Output('laporan-pendapatan.pdf', 'I');
    }

    public function exportPDF3()
    {
        $report = $this->sale->getReport();
        $data = [
            'title' => 'Laporan Peminjaman Barang',
            'result' => $report,
        ];
        $html = view('penyewaan/exportPDF3', $data);

        $pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->AddPage();
        $pdf->writeHTML($html);
        $this->response->setContentType('application/pdf');
        $pdf->Output('laporan-peminjaman.pdf', 'I');
    }

    public function exportExcel()
    {
        $report = $this->sale->getReport();

        $spreadsheet = new Spreadsheet();
        // tulis header/nama kolom
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Nota')
            ->setCellValue('C1', 'Tgl Transaksi')
            ->setCellValue('D1', 'User')
            ->setCellValue('E1', 'Customer')
            ->setCellValue('F1', 'Total');

        // tulis data movil ke cell

        $rows = 2;
        $no = 1;
        foreach ($report as $value) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $rows, $no++)
                ->setCellValue('B' . $rows, $value['sale_id'])
                ->setCellValue('C' . $rows, $value['tgl_transaksi'])
                ->setCellValue('D' . $rows, $value['firstname'] . ' ' . $value['lastname'])
                ->setCellValue('E' . $rows, $value['name_cust'])
                ->setCellValue('F' . $rows, $value['total']);
            $rows++;
        }
        // tulis dama format .xlsx
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Laporan-Penyewaan';

        // Redirect hasil generate xlsx ke web client
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
