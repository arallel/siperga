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
                        <h1>Laporan</h1>
                    </div>
                    <div class="section-body">
                    	<div class="card">
                    		<div class="card-body">
                               <button class="btn btn-info mb-3" data-toggle="modal" data-target="#exportData">export buku</button>
                            </div>
                    	</div>
                    </div>
                </section>
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
               <form method="POST" action="<?php echo base_url('laporan/exportbuku') ?>" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>nama file</label>
                                        <input type="text" name="nama_file" class="form-control">
                                        <p>apabila tidak ingin menggunakan nama maka tidak perlu mengisi hanya mengisi format saja</p>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="format" required>
                                            <option selected disabled>Format File</option>
                                            <option>csv</option>
                                            <option>xls</option>
                                            <option>xlsx</option>
                                        </select>
                                        <p>Format Untuk File yang akan digunakan</p>
                                    </div>
                                     <div class="form-group">
                                        <select class="form-control" name="asal">
                                            <option selected disabled>Pilih Asal Buku</option>
                                            <option>dropping</option>
                                            <option>Pembelian</option>
                                            <option>Hadiah</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>tgl diterima</label>
                                        <input type="date" name="tgl_diterima" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="rak" >
                                            <option selected >Nama Rak</option>
                                            <?php foreach ($rak as $b) { ?>
                                               <option><?php echo $b['nama_rak'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>stok</label>
                                        <input type="text" name="stok" class="form-control">
                                    </div>
                                    <p>Apabila ingin Export semua data buku maka tidak perlu di isi apapun hanya mengisi format file saja</p>
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