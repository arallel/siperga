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
                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addStok">
  Tambah Stok
</button>
                    <!-- <a href="<?php echo base_url() ?>bukuinduk/addStok" class="btn btn-success mb-3">Tambah Stok</a> -->
<?php 
                    $id = $this->uri->segment(3);
                    $judul = $this->uri->segment(4);
                    $penerbit = $this->uri->segment(5);
                    $stoknow = $this->db->get_where('buku_induk', ['kd_buku' => $id,'keadaan' => "baik"])->num_rows();
?>
                    <h5>Jumlah buku <?php echo $stoknow ?> </h5>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body ">
                                  <div class="table-responsive">
                                        <table class="table table-striped" id="table-1">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Judul Buku</th>
                                                    <th>Kode Buku</th>
                                                    <th>No Buku</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                 foreach ($data as $buku) {

                                                    ?>
                                                    <tr>
                                                        <td>
                                                           <?php echo $no++ ?>
                                                        </td>
                                                        <td><?php echo $buku['judul'] ?></td>
                                                        <td><?php echo $gen->getBarcode($buku['kd_buku'].$buku['no_buku'], $gen::TYPE_CODE_128,2, 50); ?></td>
                                                        <td><?php echo $buku['no_buku'] . ' / '. $stoknow ?></td>
                                                       <td><?php echo $buku['keadaan']?></td>
                                                        <td class="d-flex">
                                                            <a href="<?php echo base_url('bukuinduk/status/'. $buku['kd_buku'] . '?no='.$buku['no_buku']) ?>" class="btn btn-warning">Ubah Status</a>
                                                        </td>
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

       <div class="modal fade" tabindex="-1" role="dialog" id="updatestatus">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Ubah Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form method="POST" action="<?php echo base_url('bukuinduk/addStok/') ?>" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        
                                        <input type="text" name="judul" id="judul" class="form-control">
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
    

    <div class="modal fade" tabindex="-1" role="dialog" id="addStok">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Ubah Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <?php
                $kode = $this->uri->segment(3);
                ?>
              <form method="POST" action="<?php echo base_url('bukuinduk/addStok/'. $kode) ?>" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Stok Baru (Stok Saat ini <?php echo $stoknow ?>)</label>
                                        <input type="number" name="stok" value=1 min="1" class="form-control">
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