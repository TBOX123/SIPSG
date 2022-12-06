

               <?= $this->extend('layout/template') ?>
               <?= $this->section('content') ?>

               <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">DATA BARANG PS SEMBIRING </h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Pengolaan Data Barang</li>
                        </ol>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                <?= $title ?>
                            </div>
                            <div class="card-body">
                           <!-- Isi Detail -->
                           <div class="card mb-3">
                           <div class="row g-0">
                           <div class="col-md-4">
                               <img src ="<?= base_url('img/'.$result['cover'])?>"alt="" width="50%">
                           
                                </div>  
                                <div class="col-md-8">
                                <div class="card-body">
                                <h5 class="card-title"> <?= $result ['title']?></h5>
                                <p  class="card-text">Nama Barang:<br><?= $result ['nama_barang']?></p>
                                <p  class="card-text">Stock Barang: <?= $result ['stock']?></p>
                                <p  class="card-text">Kategori Barang: <?= $result ['nama_category']?></p>
                                <div class ="d-grid gap-2 d-md-block">
                                <a class ="btn btn-dark" type="button" href ="/barang">Kembali</a>

                           <!--  -->



                        </div>
                    </div>
                </main>
                <?= $this->endSection() ?>

            

               