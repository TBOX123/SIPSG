<?php

namespace App\Controllers;

use App\Models\PengembalianModel;
use App\Models\PlaystationModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use TCPDF;


date_default_timezone_set('Asia/Jakarta');
class Pengembalian extends BaseController
{
    private $getPengembalian, $playstation;
    public function __construct()
    {
        $this->playstation = new PlaystationModel();
        $this->getPengembalian = new PengembalianModel();
    }


    public function index()
    {

        $dataPengembalian = $this->getPengembalian->getPengembalian();

        $data = array(
            'dataPengembalian' => $dataPengembalian,
            'title' => 'Pengembalian'
        );

        return view('pengembalian/list', $data);
    }
    public function refund()
    {


        $this->playstation->updatePlaystation($this->request->getVar('ps_id'), $this->request->getVar('stock'));
        $this->getPengembalian->updatePengembalian($this->request->getVar('id_pengembalian'), $this->request->getVar('status'), $this->request->getVar('denda'));
    }



    public function report()
    {
        $report = $this->$this->getPengembalian->getPengembalian();
        $data = [
            'title' => 'Laporan Pengembalian',
            'result' => $report,

        ];
        return view('pengembalian/report', $data);
    }

    public function exportPDF()
    {
        $report = $this->getPengembalian->getPengembalian();
        $data = [
            'title' => 'Laporan Pengembalian',
            'result' => $report,
        ];
        $html = view('pengembalian/exportPDF', $data);

        $pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->AddPage();
        $pdf->writeHTML($html);
        $this->response->setContentType('application/pdf');
        $pdf->Output('laporan-pengembalian.pdf', 'I');
    }

    public function exportExcel()
    {
        $report = $this->getPengembalian->getPengembalian();

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
                ->setCellValue('B' . $rows, $value['id_pengembalian'])
                ->setCellValue('C' . $rows, $value['tgl_transaksi'])
                ->setCellValue('D' . $rows, $value['firstname'] . ' ' . $value['lastname'])
                ->setCellValue('E' . $rows, $value['name_cust'])
                ->setCellValue('F' . $rows, $value['denda']);
            $rows++;
        }
        // tulis dama format .xlsx
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Laporan-Pengembalian';

        // Redirect hasil generate xlsx ke web client
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
