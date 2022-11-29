
<div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
          
        </div>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?php echo base_url() ?>assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, <?php echo $this->session->nama ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Logged in 5 min ago</div>
              <div class="dropdown-divider"></div>
              <a href="<?php echo base_url('home/logout') ?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?php echo base_url() ?>dist/index">Stisla</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?php echo base_url() ?>dist/index">St</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            
            
            <li class="<?php if($this->uri->uri_string() == 'home') { echo 'active'; } ?>"><a class="nav-link" href="<?php echo base_url('home') ?>"><i class="fas fa-globe"></i> <span>Dashboard</span></a></li>

            <li class="<?php if($this->uri->uri_string() == 'peminjaman') { echo 'active'; } ?>"><a class="nav-link" href="<?php echo base_url('peminjaman') ?>"><i class="fas fa-book"></i><span>Peminjaman Buku</span></a></li>

            <li class="<?php if($this->uri->uri_string() == 'bukuinduk') { echo 'active'; } ?><?php if($this->uri->uri_string() == 'bukuinduk/create') { echo 'active'; } ?>"><a class="nav-link" href="<?php echo base_url('bukuinduk') ?>"><i class="fas fa-book-open"></i><span>Daftar Buku</span></a></li>

            <li class="<?php if($this->uri->uri_string() == 'peminjaman/riwayat') { echo 'active'; } ?>"><a class="nav-link" href="<?php echo base_url('peminjaman/riwayat') ?>"><i class="fas fa-book-open"></i><span>Riwayat Peminjaman</span></a></li>

            <li class="<?php if($this->uri->uri_string() == 'kota') { echo 'active'; } ?>"><a class="nav-link" href="<?php echo base_url('kota') ?>"><i class="fas fa-book-open"></i><span>Daftar kota</span></a></li>

            <li class="<?php if($this->uri->uri_string() == 'user') { echo 'active'; } ?>"><a class="nav-link" href="<?php echo base_url('user')?>"><i class="fas fa-user"></i><span>User</span></a></li>

            <li class="<?php if($this->uri->uri_string() == 'rak') { echo 'active'; } ?>"><a class="nav-link" href="<?php echo base_url('rak')?>"><i class="fas fa-book"></i><span>rak</span></a></li>

            <li class="<?php if($this->uri->uri_string() == 'laporan') { echo 'active'; } ?>"><a class="nav-link" href="<?php echo base_url('laporan')?>"><i class="fas fa-user"></i><span>laporan</span></a></li>
            
          </ul>

         
        </aside>
      </div>