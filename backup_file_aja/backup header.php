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
<div class="search-nav sticky-top teal darken-1">
        <div class="container">
     <div class="row">
       <div class="col-sm-2 col-md-3 col-lg-3 d-none d-sm-block">
       <a href="<?php echo base_url()?>">
     <p class="white-text tx-24 tx-bold-600"> <img src="<?php echo base_url()?>dah_image/default/logo_utu.png" style="width:48px;height:48px;">
     <span class="d-lg-inline-block d-md-none d-none d-sm-none" style="margin-top:5px; "> SerbaUMBI</span> </p>
      </a>
 
        </div>
       <div class="col-12 col-sm-4 col-md-4 col-lg-4 ">
         <form action="<?php echo base_url().'search'?>" method="post" class="search-area " enctype="multipart/form-data">
           <input type="text" class="search-in-area" placeholder="Cari umbi-umbian disini"  name="item">
          <i class="fa fa-search"></i>
          <input
                type="submit"
                name="submit"
                class="btn-bordered-icon btn-find "
                value="Cari"
             hidden />
         </form>
       </div>
       <div class="col-sm-6 col-md-5 col-lg-5 d-none d-sm-block ">
        
        <div class="float-right">
          <ul class="search-right">
                <li>
                  <!-- start cart aksi -->
                   <?php if(count($this->cart->contents())>0){ ?>
                    <div class="cart-view">
                        <p> 
                          <a ><i class="fa fa-cart-arrow-down"></i></a>
                          <span><?php echo count($this->cart->contents()); ?></span>
                        </p>

                        <div class="ket-cart">
                          <div class="identity-cart">
                            <i class="fa fa-caret-up" aria-hidden="true"></i>
                          </div>
                         
                          <div class="ket-cart-title">
                              Keranjang Belanja <b class="float-right tx-bold-500 tx-14">(<?php echo count($this->cart->contents()); ?>)</b>
                          </div>
                          <?php if(count($this->cart->contents())>0){ ?>
                              <div class="ket-cart-body">
                              
                            
                                 <?php foreach($this->cart->contents() as $item){ ?>
                                  <div class="ket-cb-img">
                                    <!-- start gambar produk -->
                                    <?php 
                                          if($item['options']['gambar']!=""){
                                            echo"<img src='".base_url().'dah_image/products/'.$item['options']['gambar']."' alt='product'>";
                                          }else{
                                              echo "<img src='".base_url()."dah_image/default/no_product.jpg' alt='product'>";
                                          }
                                     ?>
                                     <!-- akhir  dari gambar -->

                                    <div class="ket-cb-nama">
                                      <a href="<?php echo base_url().'produk/'.$item['id'].'-'.create_slug($item['name']) ?>" class="tx-12"><?php echo substr(strip_tags($item['name']),0,55) ?></a>
                                      <p class="tx-12 blue-text text-accent-3 tx-bold-600">Rp. <?php echo number_format($item['price']).' ,-' ?></p>
                                    </div>

                                    <div class="ket-cart-close">
                                       <a href="<?php echo base_url().'index/removefromnotifcart/'.$item['rowid']; ?>" class=" diki-tooltip" data-toggle="tooltip" data-placement="top" title="Hapus Belanja"> <i class="fa fa-times"></i></a>
                                   </div>        
                                  </div> 
                                 <?php }?>
                               
                                 <div class="ket-cart-total">
                                    <p class="float-right">Total :&nbsp;&nbsp; 
                                      <b class="blue-text text-accent-3"> <?php echo "Rp.". number_format($this->cart->total()).',-' ?></b>
                                    </p>
                                 </div>

                                 <div class="col-12" style="margin-bottom:-15px;">
                                        <a href="<?php echo base_url().'index/pembayaran' ?>" class="btn-beli-fullwidth" style="background:#00838f">Bayar Langsung</a>
                                          
                                 </div>
                               
                              </div>
                              <!-- end body cart -->

                               <!-- cart-footer -->
                                <div class="ket-cart-footer">
                                    <a href="<?php echo base_url().'index/keranjang'; ?>">Lihat Keranjang</a>
                                </div>            
                              <!-- end cart-footer -->
                          <?php }else{?>
                            <div class="ket-cart-body">
                              <img src="<?php echo base_url()?>dah_image/system/boxkosong.png" width="80px" style="position:relative;left:100px;right:0">
                               <p style="color:#000;font-size:13px;text-align:center;opacity:0.6">Keranjang masih kosong</p>  
                            
                            </div>

                            <div class="ket-cart-footer">
                             <a href="<?php echo base_url().'index/shop'; ?>"> Belanja dulu ya </a>
                            </div>
                          <?php }?> 
                          
                         
                        </div>

                        
                    </div>
                    <?php }else{ ?>
                      <div class="cart-view">
                        <p> 
                          <a><i class="fa fa-cart-arrow-down"></i></a>
                      
                        </p>

                        <div class="ket-cart">
                          <div class="identity-cart">
                            <i class="fa fa-caret-up" aria-hidden="true"></i>
                          </div>
                         
                          <div class="ket-cart-title">
                              Keranjang Belanja <b class="float-right tx-bold-500 tx-14">(<?php echo count($this->cart->contents()); ?>)</b>
                          </div>
                        
                            
                            <div class="ket-cart-body">
                                <img src="<?php echo base_url()?>dah_image/system/boxkosong.png" width="80px" style="position:relative;left:100px;right:0">
                              <p style="color:#000;font-size:13px;text-align:center;opacity:0.6">Keranjang masih kosong</p>  
                            </div>

                            <div class="ket-cart-footer">
                             <a href="<?php echo base_url().'index/shop'; ?>"> Belanja dulu ya </a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                   <!-- end cart aksi    -->
                </li>  

              

                <?php if($this->session->userdata('user_status') != "login"){?>
                <li class="d-sm-none d-md-none u-lg-block" style="margin-top:-5px;">
                    <a href="" data-toggle="modal" data-target="#login-pembeli" class="btn-bordered-sm tx-14" style="margin-right:-5px;border:none!important">Masuk</a>
                  <a href="<?php echo base_url().'index/user_daftar'?>" class="btn-bordered-sm tx-14">Daftar</a>
                </li>  
              
                <li class="d-lg-none u-md-block d-sm-inline-block">
                  <a href="" data-toggle="modal" data-target="#login-pembeli" title="login"><i class="fas fa-sign-in-alt"></i></a>
                </li>

              <?php }else{?>

                 <!-- notif start -->
              <li>
          
          <?php
          $id=$this->session->userdata('user_id');
          $notif_inv=$this->m_dah->get_susun_invoice($id,0)->num_rows();
          $notif_invoices=$this->m_dah->get_susun_invoice($id,0)->result();

          if($notif_inv > 0){ 
            ?>
           <div class="cart-view">
               <p> 
                 <a><i class="far fa-bell"></i></a>
                 <span><?php echo $notif_inv?></span>
               </p>

               <div class="ket-cart">
                 <div class="identity-cart">
                   <i class="fa fa-caret-up" aria-hidden="true"></i>
                 </div>
                
                 <div class="ket-cart-title">
                    Notifikasi Pembayaran
                 </div>
                 <?php if($notif_inv > 0){ ?>
                     <div class="ket-cart-body" style="padding:0">
                     
                   
                        <?php foreach($notif_invoices as $inc){ ?>
                          <a href="<?php echo base_url().'user/invoice_detail/'.$inc->id ?>" > 
                            <div class="notif-body">
                            <a href="<?php echo base_url().'user/invoice_detail/'.$inc->id ?>" class="blue-text text-accsent-3 tx-14 tx-bold-600"> <?php echo $inc->no?></a>
                            <p class=" tx-12">Rp <?php echo number_format($inc->pembayaran)?></p>
                            <label class="labil labil-danger tx-10">Harap dibayar</label>
                            </div>
                            </a>
                        <?php }?>
                      
                       
                     </div>
                     <!-- end body cart -->

                     
                 <?php }else{?>
                   <div class="ket-cart-body">
                   <i class="fa fa-bell-slash tx-40" style="text-align:center"></i>
                     <p style="color:#000;font-size:13px;text-align:center;opacity:0.6">Belum Ada Notifikasi terbaru</p>  
                   </div>

                   <div class="ket-cart-footer">
                    <a href="<?php echo base_url().'index/shop'; ?>"> Belanja dulu ya </a>
                   </div>
                 <?php }?> 
                 
                
               </div>

               
           </div>
           <?php }else{ ?>
             <div class="cart-view">
               <p> 
                 <a><i class="far fa-bell"></i></a>
             
               </p>

               <div class="ket-cart">
                 <div class="identity-cart">
                   <i class="fa fa-caret-up" aria-hidden="true"></i>
                 </div>
                
                 <div class="ket-cart-title">
                     Notifikasi <b class="float-right tx-bold-500 tx-14">()</b>
                 </div>
               
                   
                   <div class="ket-cart-body">
                   <i class="fa fa-bell-slash tx-40 d-flex justify-content-center" ></i>
                     <p style="color:#000;font-size:13px;text-align:center;opacity:0.6">Belum Ada Notifikasi terbaru</p>  
                   </div>

                   <div class="ket-cart-footer">
                    <a href="<?php echo base_url().'index/shop'; ?>"> Belanja dulu ya </a>
                   </div>
               </div>
           </div>
           <?php } ?>
     
        
       </li>  

                <!-- end notif --> 

              <li class="has_dropdown_side">
                    <a href="#" class="">
                    <i class="fa fa-user white-text" aria-hidden="true"></i></a>
                  <div class="dropdown_ct_side">
                    <div class="identity-cart">
                      <i class="fa fa-caret-up" aria-hidden="true"></i>
                    </div>
                      <div class="dropdown-ct-title">
                        Hai,<p style="margin-bottom:0;opacity:0.7;font-weight:700"> <?php echo $this->session->userdata('user_nama'); ?></p>
                      </div>
                     
                      <div class="dropdown-ct-body">
                        <ul>
                            <li><a href="<?php echo base_url().'user'?>"><i class="fa fa-user tx-16 green-text text-accent-4"></i>Profile</a></a></li>
                            <li><a href="<?php echo base_url().'user/invoice' ?>"><i class="fas fa-credit-card tx-16 blue-text text-accent-2"></i>Transaksi</a></a></li>
                            <li><a href="" data-toggle="modal" data-target="#modal-resi"> <i class="fa fa-eye tx-16 orange-text text-accent-2"></i> Lacak Pesanan</a></li>
                            <li><a href="<?php echo base_url().'user/user_logout'?>"><i class="fas fa-sign-out-alt tx-16 red-text text-accent-2"></i>Logout</a></a></li>
                          </ul>
                      </div>
                  </div>
                </li>
              <?php }?>
              
         
          </ul>

        </div>
      
      </div>
     </div>
    </div>
    </div>
    <!-- end searchnav -->

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg teal darken-3">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
     <i class="fa fa-bars white-text" aria-hidden="true"></i>
      </button>

      
      <div class="float-right">
        <ul class="nav-bawah-right d-md-none d-sm-none">
          <li>
             <!-- start cart aksi -->
             <?php if(count($this->cart->contents())>0){ ?>
                    <div class="cart-view">
                        <p> 
                          <a><i class="fa fa-cart-arrow-down white-text"></i></a>
                          <span><?php echo count($this->cart->contents()); ?></span>
                        </p>

                        <div class="ket-cart">
                         
                         
                          <div class="ket-cart-title">
                              Keranjang Belanja <b class="float-right tx-bold-500 tx-14">(<?php echo count($this->cart->contents()); ?>)</b>
                          </div>
                          <?php if(count($this->cart->contents())>0){ ?>
                              <div class="ket-cart-body">
                               
                                 <?php foreach($this->cart->contents() as $item){ ?>
                                  <div class="ket-cb-img">
                                    <!-- start gambar produk -->
                                    <?php 
                                          if($item['options']['gambar']!=""){
                                            echo"<img src='".base_url().'dah_image/products/'.$item['options']['gambar']."' alt='product'>";
                                          }else{
                                              echo "<img src='".base_url()."dah_image/default/no_product.jpg' alt='product'>";
                                          }
                                     ?>
                                     <!-- akhir  dari gambar -->

                                    <div class="ket-cb-nama">
                                      <a href="<?php echo base_url().'produk/'.$item['id'].'-'.create_slug($item['name']) ?>" class="tx-12"><?php echo substr(strip_tags($item['name']),0,55) ?></a>
                                      <p class="tx-12 blue-text text-accent-3 tx-bold-600">Rp. <?php echo number_format($item['price']).' ,-' ?></p>
                                    </div>

                                    <!-- inidia2 -->
                                        <div class="ket-cart-close">
                                          <a href="<?php echo base_url().'index/removefromnotifcart/'.$item['rowid']; ?>" class=" diki-tooltip" data-toggle="tooltip" data-placement="top" title="Hapus Belanja"> <i class="fa fa-times"></i></a>
                                      </div>  
                                  </div> 
                                 <?php }?>
                                  
                                 <div class="ket-cart-total">
                                    <p class="float-right">Total :&nbsp;&nbsp; 
                                      <b class="blue-text text-accent-3"> <?php echo "Rp.". number_format($this->cart->total()).',-' ?></b>
                                    </p>
                                 </div>

                                 <div class="col-12" style="margin-bottom:-15px;">
                                        <a href="<?php echo base_url().'index/pembayaran' ?>" class="btn-beli-fullwidth white-text" style="background:#00838f">Bayar Langsung</a>
                                          
                                 </div>
                               
                              </div>
                              <!-- end body cart -->

                               <!-- cart-footer -->
                                <div class="ket-cart-footer">
                                    <a href="<?php echo base_url().'index/keranjang'; ?>">Lihat Keranjang</a>
                                </div>            
                              <!-- end cart-footer -->
                          <?php }else{?>
                            
                          <?php }?> 
                          
                         
                        </div>

                        
                    </div>
                    <?php }else{ ?>
                      <!-- ini dia -->
                      <div class="cart-view">
                        <p> 
                          <a><i class="fa fa-cart-arrow-down white-text"></i></a>
                      
                        </p>

                        <div class="ket-cart">
                          <div class="identity-cart">
                            <i class="fa fa-caret-up" aria-hidden="true"></i>
                          </div>
                         
                          <div class="ket-cart-title">
                              Keranjang Belanja <b class="float-right tx-bold-500 tx-14">(<?php echo count($this->cart->contents()); ?>)</b>
                          </div>
                        
                            
                            <div class="ket-cart-body">
                                <img src="<?php echo base_url()?>dah_image/system/boxkosong.png" width="80px" style="position:relative;left:100px;right:0">
                              <p style="color:#000;font-size:13px;text-align:center;opacity:0.6">Keranjang masih kosong</p>  
                            </div>

                            <div class="ket-cart-footer">
                             <a href="<?php echo base_url().'index/shop'; ?>"> Belanja dulu ya </a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                   <!-- end cart aksi    -->   
          </li>
          <?php if($this->session->userdata('user_status') != "login"){?>
            <li>
              <a href="" class="white-text tx-16" data-toggle="modal" data-target="#login-pembeli" title="Masuk ke akun"> <i class="fas fa-sign-in-alt"></i></a>
            </li>
          <?php }else{ ?>
            <li class="has_dropdown_side">
                    <a href="#" class="">
                    <i class="fa fa-user white-text" aria-hidden="true"></i></a>
                  <div class="dropdown_ct_side">
                    <div class="identity-cart" style="right:15px!important">
                      <i class="fa fa-caret-up"></i>
                    </div>
                      <div class="dropdown-ct-title">
                        Hai,<p style="margin-bottom:0;opacity:0.7;font-weight:700"> <?php echo $this->session->userdata('user_nama'); ?></p>
                      </div>
                     
                      <div class="dropdown-ct-body">
                        <ul>
                            <li><a href="<?php echo base_url().'user'?>"><i class="fa fa-user tx-16 green-text text-accent-4"></i>Profile</a></a></li>
                            <li><a href="<?php echo base_url().'user/invoice'; ?>"><i class="fas fa-credit-card tx-16 blue-text text-accent-2"></i>Transaksi</a></a></li>
                            <li><a href="<?php echo base_url().'user/user_logout'?>"><i class="fas fa-sign-out-alt tx-16 red-text text-accent-2"></i>Logout</a></a></li>
                          </ul>
                      </div>
                  </div>
                </li>
          <?php }?>  

         
        </ul> 
    </div> 
  
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="container">
            <ul class="navbar-nav mr-auto tx-14">
              <li class="nav-item active">
                <a class="nav-link white-text" href="<?php echo base_url().'shop'?>">Semua Produk <span class="sr-only"></span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link white-text" href="<?php echo base_url().'index/tentang'?>">Tentang</a>
              </li>
              

            <li class="nav-item">
                <a class="nav-link white-text" href="">Metode Pembayaran</a>
              </li>

              <li class="nav-item">
                <a class="nav-link white-text" data-toggle="modal" data-target="#modal-lacak">Lacak Pesanan</a>
              </li>

              <li class="nav-item">
                <a class="nav-link white-text" data-toggle="modal" data-target="#modal-resi" style="cursor:pointer">Cek Resi</a>
              </li>
            </ul>
        </div>
        
      </div>
     
    </nav>
    <!-- end navbar -->
