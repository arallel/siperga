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
                        <div class="col-12 col-lg-6 col-md-5 mx-auto">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Tambah Buku</h3>
                                </div>
                                <div class="card-body">
                                <form action="<?php echo base_url('peminjaman/submit') ?>" method="post">

                                <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Nama Peminjam</label>
                                        <input type="text" name="siswa" class="form-control"  autofocus>
                                    </div>
                                    </div>
                                    <div class="col-6">
                                    <div class="form-group">
                                        <label>Peminjaman untuk?</label>
                                        <select class="form-control" name="role_peminjam">
                                            <option selected disabled>Pilih</option>
                                            <option>Siswa</option>
                                            <option>Guru</option>
                                        </select>
                                    </div>
                                    </div>
                                    <div class="col-6">
                                    <div class="form-group">
                                        <label>Tanggal Peminjaman</label>
                                        <input type="date" name="tanggal" onchange="batas()" id="pinjam" class="form-control" value="<?php echo date('Y-m-d') ?>" >
                                    </div>
                                    </div>
                                    <div class="col-6">
                                    <div class="form-group">
                                        <label>Tanggal Pengembalian</label>
                                        <input type="date" id="sampai" value="<?php echo date('Y-m-d', strtotime(' + 3 days')); ?>" name="tanggal_pengembalian" class="form-control" >
                                    </div>
                                    </div>
                                </div>
                                       
                                  <div class="row">
                                  <div class="col">
                                    <div class="form-group">
                                       <label>Pilih Buku</label>
                                       <select class="form-control select2" name="buku[]" multiple="">
                                          <?php foreach($data as $buku){
                                            if($buku['stok'] > 0){ ?>
                                             <option value="[<?php echo $buku['kd_buku']. "," . $buku['no_buku'] ?>"><?php echo $buku['judul']. " (No. ".$buku['no_buku'] .")" ?></option>

                                         <?php }} ?>
                                         
                                       </select>
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

    <script>
        function batas() {
            let skrg = document.getElementById("pinjam");
            let sampai = document.getElementById("sampai");

            let d = new Date(skrg.value),
                month = '' + (d.getMonth() + 1),
                day = '' + (d.getDate()  + 3),
                year = d.getFullYear();

            if (month.length < 2) 
                month = '0' + month;
            if (day.length < 2) 
                day = '0' + day;
            var next = [year, month, day].join('-');
            // console.log("ini inputan nya : " + skrg.value);
            // console.log("ini hasilnya : "+next);
            sampai.value = next;
        }
        
 

    </script>

    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="<?php echo base_url() ?>assets/modules/select2/dist/js/select2.full.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/scripts.js"></script>
</body>

</html>