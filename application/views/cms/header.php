<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title><?php echo $this->m_dah->get_option('blog_name'); ?> | <?php echo strip_tags($this->m_dah->get_option('blog_description')); ?></title>
	<!--<link rel="icon" type="image/png" href="<?php echo base_url().'dah_image/default/logo_utu.png' ?>">-->
	<!-- Global stylesheets -->
  <!-- core CSS -->

  	<link rel="stylesheet" href="<?php echo base_url() ?>assets_front/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_front/css/bootgrid-15col.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets_front/dist/css/core_utu.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets_front/dist/css/custom_utu.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets_front/dist/css/custom.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets_front/dist/css/slick.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets_front/dist/css/slick-theme.css">

    <!-- font -->
    
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css"> -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets_front/font-aw/css/all.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets_front/material-icon/material-icon.css">


	<!-- Core JS files -->
  <script src="<?php echo base_url()?>assets_front/js/jquery.min.js" ></script>

	<!-- Theme JS files -->


	 <!-- Histats.com  START  (aync)-->

<!-- Histats.com  END  -->
</head>

  <body>

<!-- nsearchnav -->
<!-- ini buat ditampilkan di ukuran desktop -->
<div class="search-nav d-none d-md-none d-lg-block" id="search-nav">
  <div class="container-custom">
    <div class="row">
    <div class="bag-header">
      <div class="col-lg-3">
          <div class="float-left">
              <h3>Coming Soon</h3>
        </div>
      </div>

      <div class="col-lg-5" id="cari-header" style="display:none">
            <form action="<?php echo base_url().'search'?>" method="post" class="cari-header">
            <i class="fa fa-search" style="margin-left:10px"></i>
                <input type="text"  class="input-banner" placeholder="Cari disini " name="item">
                <input
                type="submit"
                name="submit"
                class="btn-bordered-icon btn-find "
                value="Cari"
             hidden />
            </form>
      </div>

      <div class="col-lg-5">
          <div class="float-right">
            <ul class="search-right">
            <?php if($this->session->userdata('user_status') != "login"){?>
              <li><a href="" style="font-weight:600">Pesanan</a></li>
            <?php }else{}?> 
              <li><a href="<?php echo base_url()?>/index/tentang" style="font-weight:600">Tentang</a></li>

              <!-- disini buat logika jika dia masuk ke akun -->
              <?php if($this->session->userdata('user_status') != "login"){?>
                <li><a data-toggle="modal" data-target="#login-pembeli">Masuk</a></li>
                <li><a class="btn btn-core white-text" href="">Daftar</a></li>

              <?php }else{?> 
                <?php
                      $id=$this->session->userdata('user_id');
                      $notif_inv=$this->m_dah->get_susun_invoice($id,0)->num_rows();
                      $notif_invoices=$this->m_dah->get_susun_invoice($id,0)->result();  
                ?>
                 <!-- notifikasi -->
                 <li class="dropdown">
                   <a data-toggle="dropdown">
                       <i class="fa fa-bell tx-18" aria-hidden="true"></i>
                       <?php if($notif_inv > 0){ ?>
                       <span class="notif-ang"><?php echo $notif_inv?></span>
                       <?php }else{}?>
                   </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-custom">
                      <div class="dropdown-title">
                        Notifikasi Pesanan
                      </div>
                      <?php 
 
                        if($notif_inv > 0){ 
                      ?>
                        <?php foreach($notif_invoices as $inc){ ?>
                            <a href="<?php echo base_url().'user/invoice_detail/'.$inc->id ?>" > 
                              <div class="notif-body">
                              <a href="<?php echo base_url().'user/invoice_detail/'.$inc->id ?>" class="blue-text text-accsent-3 tx-14 tx-bold-600"> <?php echo $inc->no?></a>
                              <p class=" tx-12">Rp <?php echo number_format($inc->pembayaran)?></p>
                               <label class="labil labil-notif tx-10">Harap dibayar</label>
                              </div>
                              </a>
                          <?php }?>
                      <?php }else{?>
                        <div class="center-img" style="margin-top:20px">
                             <img src="<?php echo base_url()?>/dah_image/default/bag-kosong.png">
                        </div>
                          Oops Belum ada belanja
                      <?php } ?>  
                    </div>
                </li>
                <!-- end notifikasi -->

                <li class="dropdown">
                   <a data-toggle="dropdown">
                       <i class="fa fa-user tx-18" aria-hidden="true"></i>
                   </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-custom">
                      <ul>
                          <li><a href="<?php echo base_url().'user/invoice' ?>">Pesanan</a> </li>
                          <li><a href="<?php echo base_url().'user'?>">Profil</a></li>
                          <li><a href="" data-toggle="modal" data-target="#modal-resi">Lacak Pesanan</a></li>
                          <li><a href="<?php echo base_url().'user/bantuan'; ?>">Bantuan</a></li>
                          <li><a href="<?php echo base_url().'user/user_logout'?>">Keluar</a></li>
                      </ul>
                    </div>
                </li>

               
              <?php } ?>
              <!-- end logika login -->

          </ul>
        </div>
      </div>
    </div>
<!-- end row  -->
  </div>
  </div>

</div>
<!-- end ukuran desktop -->

<!-- ukuran mobile -->
<div class="search-nav d-block d-md-block d-lg-none">
  <div class="container-custom">
     <div class="float-left">
       <div class="bag-header">
         <!-- <h3>Coming Soon</h3> -->
       </div>
     </div>

     <div class="float-right">
      <ul class="search-right" style="margin-top:12px">
           <!-- disini buat logika jika dia masuk ke akun -->
           <?php if($this->session->userdata('user_status') != "login"){?>
            <li><a href="<?php echo base_url().'index/user_daftar'?>" title="daftar">Daftar</a></li>
            <li><a data-toggle="modal" data-target="#login-pembeli" title="masuk"><i class="fas fa-sign-in-alt"></i></a></li>

              <?php }else{?> 

                 <!-- notifikasi -->
                 <li class="dropdown">
                   <a data-toggle="dropdown">
                       <i class="fa fa-bell tx-18" aria-hidden="true"></i>
                   </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-custom">
                      <div class="dropdown-title">
                        Notifikasi Pesanan
                      </div>
                      <?php if($notif_inv > 0){ ?>
                        <?php foreach($notif_invoices as $inc){ ?>
                            <a href="<?php echo base_url().'user/invoice_detail/'.$inc->id ?>" > 
                              <div class="notif-body">
                              <a href="<?php echo base_url().'user/invoice_detail/'.$inc->id ?>" class="blue-text text-accsent-3 tx-14 tx-bold-600"> <?php echo $inc->no?></a>
                              <p class=" tx-12">Rp <?php echo number_format($inc->pembayaran)?></p>
                               <label class="labil labil-notif tx-10">Harap dibayar</label>
                              </div>
                              </a>
                          <?php }?>
                      <?php }else{?>
                        <div class="center-img" style="margin-top:20px">
                             <img src="<?php echo base_url()?>/dah_image/default/bag-kosong.png">
                        </div>
                          Oops Belum ada belanja
                      <?php } ?>  
                    </div>
                </li>
                <!-- end notifikasi -->

                <li class="dropdown">
                   <a data-toggle="dropdown">
                       <i class="fa fa-user tx-18" aria-hidden="true"></i>
                   </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-custom">
                      <ul>
                          <li><a href="<?php echo base_url().'user/invoice' ?>">Pesanan</a> </li>
                          <li><a href="<?php echo base_url().'user'?>">Profil</a></li>
                          <li><a href="" data-toggle="modal" data-target="#modal-resi">Lacak Pesanan</a></li>
                          <li><a href="<?php echo base_url().'user/bantuan'; ?>">Bantuan</a></li>
                          <li><a href="<?php echo base_url().'user/user_logout'?>">Keluar</a></li>
                      </ul>
                    </div>
                </li>

               
              <?php } ?>
              <!-- end logika login -->
      <ul>
     </div>
  </div>
</div>
<!-- end mobile -->

 <!-- end searchnav -->


<!-- start navbar -->
<!-- end navbar -->
