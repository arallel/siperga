<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login &mdash; Stisla</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/modules/bootstrap-social/bootstrap-social.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/components.css">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <style>
        body{
            background-image: url(assets/img/triangles.png);
            background-attachment: fixed;
        }
    </style>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
           
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="card card-primary" style="margin-top: 120px;">
                            <div class="card-header">
                                <h4>Login</h4>
                            </div>
                    
                            
                            <div class="card-body">
                            <?php 
                                if($this->session->flashdata('gagal')){
                                    echo '
                                    <div class="alert alert-danger alert-dismissible show fade">
                                    <div class="alert-body">
                                      <button class="close" data-dismiss="alert">
                                        <span>&times;</span>
                                      </button> '.
                                      $this->session->flashdata('gagal')
                                    .'</div>
                                  </div>
                                    ';
                                }
                            ?>
                       

                                <form method="POST" action="<?php echo base_url('home/login') ?>" class="needs-validation" novalidate="">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="username" required autofocus>
                                        <!-- <div class="invalid-feedback">
                                            Please fill in your username
                                        </div> -->
                                    </div>

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label class="control-label">Password</label>
                                        </div>
                                        <input type="password" class="form-control" name="password" required>
                                        <!-- <div class="invalid-feedback">
                                            please fill in your password
                                        </div> -->
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" >
                                            Login
                                        </button>
                                    </div>
                                </form>



                            </div>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="<?php echo base_url() ?>assets/modules/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/modules/popper.js"></script>
    <script src="<?php echo base_url() ?>assets/modules/tooltip.js"></script>
    <script src="<?php echo base_url() ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="<?php echo base_url() ?>assets/modules/moment.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="<?php echo base_url() ?>assets/js/scripts.js"></script>
    <script src="<?php echo base_url() ?>assets/js/custom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/particlesjs/2.2.2/particles.min.js"></script>
</body>

</html>