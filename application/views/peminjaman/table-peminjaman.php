<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Tambah Buku &mdash; Siperga</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <?php $this->load->view('layout/ly-admin'); ?>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Dashboard</h1>
                    </div>
                    <a href="<?php echo base_url() ?>peminjaman/tambah" class="btn btn-success mb-3">Tambah Data</a>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="table-1">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nama Siswa</th>
                                                    <th>Nama Petugas</th>
                                                    <th>Judul</th>
                                                    <th>Tanggal Pinjam</th>
                                                    <th>Batas Pengembalian</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                 foreach ($data as $pinjam) { ?>
                                                    <tr>
                                                        <td>
                                                           <?php echo $no++ ?>
                                                        </td>
                                                        <td><?php echo $pinjam['nama_siswa'] ?></td>
                                                        <td><?php echo $pinjam['nama_lengkap'] ?></td>
                                                        <td><?php echo $pinjam['judul'] ?></td>
                                                        <td><?php echo $pinjam['tanggal_pinjam'] ?></td>
                                                        <td><?php echo $pinjam['batas_kembali'] ?></td>
                                                        <td><?php 
                                                        if($pinjam['status'] == 1){
                                                         if(date('d-m-Y') <= $pinjam['batas_kembali']){
                                                            echo "Meminjam";
                                                         }else{
                                                            echo "Terlambat";
                                                         }
                                                        }else{
                                                          echo "Sudah Dikembalikan";
                                                        }
                                                        ?></td>
                                                        <?php if($pinjam['status'] == 1){ ?>
                                                          <td><button class="btn btn-info" onclick="window.location.href='<?php echo base_url('peminjaman/kembalikan/'. $pinjam['id_peminjaman']) ?>'">Kembalikan</button></td>
                                                          <?php }else{ ?>
                                                        <td class="d-flex"><button class="btn btn-danger" onclick="window.location.href='<?php echo base_url('peminjaman/delete/'. $pinjam['id_peminjaman']) ?>'">Delete</button></td>

                                                          <?php } ?>
                                                        <!-- <td class="d-flex"><button class="btn btn-warning mr-2" onclick="window.location.href='<?php echo base_url('bukuinduk/edit/'. $pinjam['id_peminjaman']) ?>'">Edit</button><button class="btn btn-danger" onclick="window.location.href='<?php echo base_url('bukuinduk/delete/'. $pinjam['id_peminjaman']) ?>'">Delete</button></td> -->
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="importData">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Import Excel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form method="POST" action="<?php echo base_url('bukuinduk/read') ?>" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>File Excel (.Xlsx,Xls,Csv)</label>
                                        <input type="file" name="file" class="form-control">
                                    </div>
                                </div>
                               
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary">Save changes</button>
              </div>
              </form>

            </div>
          </div>
        </div>

        <div class="modal fade" tabindex="-1" role="dialog" id="exportData">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Import Excel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form method="POST" action="<?php echo base_url('bukuinduk/export') ?>" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>nama file</label>
                                        <input type="text" name="nama_file" class="form-control">
                                        <p>apabila tidak ingin menggunakan nama maka tidak perlu mengisi hanya mengisi format saja</p>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="format">
                                            <option selected disabled>Format File</option>
                                            <option>csv</option>
                                            <option>xls</option>
                                            <option>xslx</option>
                                        </select>
                                        <p>Format Untuk File yang akan digunakan</p>
                                    </div>
                                </div>
                               
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary">Save changes</button>
              </div>
              </form>

            </div>
          </div>
        </div>

    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="<?php echo base_url() ?>assets/modules/datatables/datatables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/page/modules-datatables.js"></script>
    <script src="<?php echo base_url() ?>assets/js/scripts.js"></script>
</body>

</html>