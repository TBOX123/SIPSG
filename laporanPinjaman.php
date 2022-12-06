<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">LAPORAN Pinjaman PS SIPSG</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Laporan Pinjaman</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                <?= $title . " " . $tgl ?>
            </div>
            <div class="card-body">


                <!-- isi Report -->
                <a target="_blank" class="btn btn-primary mb-3" type="button" href="/jual/exportpdf3">Download</a>
                <form action="<?= base_url('jual/pinjaman') ?>" method="post">
                    <div class="form-group col-lg-3 mb-2">
                        <select class="form-control mr-sm-2" onchange="this.form.submit()" name="filter">
                            <option>
                                Tanggal Filter
                            </option>
                            <option value="all">
                                Standart
                            </option>
                            <option value="harian">
                                Harian
                            </option>
                            <option value="mingguan">
                                Mingguan
                            </option>
                            <option value="bulanan">
                                Bulanan
                            </option>
                            <option value="tahunan">
                                Tahunan
                            </option>
                        </select>
                    </div>
                </form>

                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nota</th>
                            <th>Nama Barang</th>
                            <th>Tanggal Masuk</th>
                            <th>User</th>
                            <th>Customer</th>
                            <th>Total Barang</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        $total = 0;
                        foreach ($result as $value) : ?>
                            <?php
                            $total += $value['total'];
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value['sale_id'] ?></td>
                                <td><?= $value['nama_ps'] ?></td>
                                <td>
                                    <?php
                                    if ($tgl == "Bulanan") {
                                        echo date("m/Y", strtotime($value['exam_date']));
                                    } else if ($tgl == "Tahunan") {
                                        echo date("Y", strtotime($value['exam_date']));
                                    } else if ($tgl == "Harian") {
                                        echo date("d/m/Y", strtotime($value['exam_date']));
                                    } else if ($tgl == "Mingguan") {
                                        echo date("d/m/Y", strtotime($value['exam_date']));
                                    } else {
                                        echo date("d/m/Y", strtotime($value['exam_date']));
                                    }
                                    ?>
                                </td>
                                <td><?= $value['firstname'] ?> <?= $value['lastname'] ?></td>
                                <td><?= $value['name_cust'] ?></td>
                                <td><?= $value['amount'] ?></td>


                            </tr>
                        <?php endforeach; ?>
                        <tr>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>


</main>
<?= $this->endSection() ?>