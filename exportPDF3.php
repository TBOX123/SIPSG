<html>

<head>
    <!-- berisi css -->
    <style>
        .title {
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
        }

        .left {
            text-align: left;
        }

        .right {
            text-align: right;
        }

        .border-table {
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            font-size: 12px;
        }

        .border-table th {
            border: 1px solid #000;
            background-color: #e1e3e9;
            font-weight: bold;
        }

        .border-table td {
            border: 1px solid #000;
        }
    </style>
</head>

<body>
    <main>
        <div class="title">
            <h1>LAPORAN Pinjaman Barang</h1>
        </div>
        <div>
            <!-- isi laporan -->
            <table class="border-table">
                <thead>
                    <tr>
                    <th width="5%">No</th>
                        <th width="15%">Nota</th>
                        <th width="15%">Nama Barang</th>
                        <th width="20%">Tanggal Masuk</th>
                        <th width="20%">User</th>
                        <th width="15%">Total Pinjaman</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no = 1;
                    foreach ($result as $value) : ?>
                        <tr>
                            <td width="5%"><?= $no++ ?></td>
                            <td width="15%"><?= $value['sale_id'] ?></td>
                            <td width="15%"><?= $value['nama_ps'] ?></td>
                            <td width="20%">
                             <?= date("d/m/Y H:i:s", strtotime($value['tgl_transaksi'])) ?></td>
                            <td width="20%" class="left"><?= $value['firstname'] ?> <?= $value['lastname'] ?></td>   
                            <td width="15%" class="right">
                             <?= $value['amount'] ?>

                                
                            </td>
                        </tr>
                    <?php endforeach; ?>
              
                </tbody>
            </table>
            <!--  -->
        </div>
    </main>
</body>

</html>