<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>General Dashboard &mdash; Stisla</title>

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
                    
                    <div class="row">
                        <div class="col-12 col-lg-9 col-md-5 mx-auto">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Edit Buku</h3>
                                </div>
                                <div class="card-body">
                                    <form action="<?php echo base_url('Bukuinduk/changeStatus/'.$data['kd_buku']. "/". $data['no_buku']) ?>" method="post">
                                        <div class="row">
                                    <div class="col">
                                    <div class="form-group">
                                        <label>judul</label>
                                        <input type="text" value="<?php echo $data['judul'] ?>" disabled class="form-control" required>
                                    </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-3">
                                    <div class="form-group">
                                        <label>Kode Buku</label>
                                        <input type="text" value="<?php echo $data['kd_buku'] ?>" disabled class="form-control" required>
                                    </div>
                                    </div>
                                    <div class="col-3">
                                    <div class="form-group">
                                        <label>No Buku</label>
                                        <input type="text" name="no_buku" value="<?php echo $data['no_buku'] ?>" disabled class="form-control" required>
                                    </div>
                                    </div>
                                    
                                    <div class="col">  
                                    <div class="form-group">
                                        <label>penerbit</label>
                                        <select class="form-control select" name="keadaan">
                                            <option value="" hidden>Pilih Status</option>
                                            <option <?php if($data['keadaan'] == 'baik'){ echo 'selected'; } ?> value="baik">Masih Baik</option>
                                            <option <?php if($data['keadaan'] == 'rusak'){ echo 'selected'; } ?> value="rusak">Rusak</option>
                                            <option <?php if($data['keadaan'] == 'hilang'){ echo 'selected'; } ?> value="hilang">Hilang</option>
                                        </select>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <input type="submit" class="btn btn-success" value="Ubah">                                
                                </div>
                            </form>
                            </div>
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
    <script src="<?php echo base_url() ?>assets/modules/datatables/datatables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/page/modules-datatables.js"></script>
    <script src="<?php echo base_url() ?>assets/js/scripts.js"></script>
</body>

</html>