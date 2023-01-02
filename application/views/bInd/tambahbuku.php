<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Tambah Buku &mdash; Siperga</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />    <link rel="stylesheet" href="<?php echo base_url() ?>assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/select2/dist/css/select2.min.css">

</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <?php $this->load->view('layout/ly-admin'); ?>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Input Buku</h1>
                    </div>
                        <div class="col-12 col-lg-9 col-md-5 mx-auto">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Tambah Buku</h3>
                                </div>
                                <div class="card-body">
                                <div class="row">
                                        <div class="col-4">
                                <form action="<?php echo base_url('Bukuinduk/store') ?>" method="post">
                                    <div class="form-group">
                                         <?php
                                        // $row = $this->db->select("kd_buku")->limit(1)->order_by('kd_buku',"DESC")->get("buku_induk")->result_array();
                                       ?>
                                        <label>kd buku</label>
                                        <input type="text" name="kd_buku" class="form-control"   autofocus>
                                    </div>
                                    </div>
                                    <div class="col">
                                    <div class="form-group">
                                        <label>judul</label>
                                        <input type="text" name="judul" class="form-control"  >
                                    </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col">
                                    <div class="form-group">
                                        <label>pengarang</label>
                                        <input type="text" name="pengarang" class="form-control"  >
                                    </div>
                                    </div>
                                    
                                    <div class="col">  
                                    <div class="form-group">
                                        <label>penerbit</label>
                                        <input type="text" name="penerbit" class="form-control"  >
                                    </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-3">
                                   <div class="form-group">
                                   <label>Kota Terbit</label>
                      <select class="form-control select2" name="kota_terbit">
                        <option hidden>Pilih Kota</option>
                                    <?php
                                    $query = $this->db->get('kota')->result_array();  foreach ($query as $buku ) {
                                   ?>
                        <option value="<?php echo $buku['nama_kota'] ?>"><?php echo $buku['nama_kota']; ?></option>
                  <?php } ?>
                  </select>
                    </div>
                                    </div>
                                    <div class="col-2">
                                    <div class="form-group">
                                        <label>tahun_terbit</label>
                                        <input type="number" placeholder="YYYY" min="1999" max="2100" name="tahun_terbit" class="form-control"  >
                                    </div>
                                    </div>
                                    <div class="col-7">
                                    <div class="form-group">
                                    <label>ISBN</label>
                                        <input type="text" name="ISBN" class="form-control"  >
                                    </div>
                                    </div>
                                    </div>
                                    <div class="row"> 
                                    <div class="col">
                                    <div class="form-group">
                                        <label>asal</label>
                                        <input type="text" name="asal" class="form-control"  >
                                    </div>
                                    </div>
                                    <div class="col">
                                    <div class="form-group">
                                        <label>klasifikasi</label>
                                        <input type="text" name="klasifikasi" class="form-control"  >
                                    </div>
                                    </div>
                                    <div class="col-3">
                                    <div class="form-group">
                                        <label>tgl_diterima</label>
                                        <input type="date" name="tgl_diterima" class="form-control"  >
                                    </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col">
                                    <div class="form-group">
                                        <label>jenis</label>
                                        <input type="text" name="jenis" class="form-control"  >
                                    </div>
                                    </div>
                                    <div class="col">
                                    <div class="form-group">
                                        <label>rak</label>
                                        <input type="text" name="rak" class="form-control"  >
                                    </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label>stok</label>
                                            <input type="number" min="1" value="1"  name="stok" class="form-control"  >
                                        </div>
                                    </div>
                                    
                                    </div>
                                    
                                </div>
                                <div class="card-footer text-right">
                                    <input type="submit" class="btn btn-success" value="TAMBAH">                                
                                </div>
                            </form>
                            </div>
                        
                    </div>
                </section>
            </div>

        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="<?php echo base_url() ?>assets/modules/select2/dist/js/select2.full.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/scripts.js"></script>
</body>

</html>