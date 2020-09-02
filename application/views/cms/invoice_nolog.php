<!-- breadrumb section -->
<section class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-line">
            <ul>
                <li><a href="<?php echo base_url()?>">Home</a> </li>
                <li><a href="">Laman Pesanan</a> </li>
            </ul>
        </div>
    </div>

</section>

<!-- end breadcrumb -->

<section class="user-profile">
<div class="row">
      <div class="col-lg-8 offset-lg-2 col-sm-10 offset-sm-1 col-12">
        <div class="nolog-invoice-bd">
            <div class="nolog-inv-title">
                Laman Pemesanan Produk tanpa login
            </div>

            <div class="nolog-inv-body">
                <?php show_alert()?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.invoce</th>
                            <th>Resi</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">
                                <?php
                                $id=$this->session->userdata('kode_id');
                                $resi=$this->session->userdata('kode_resi');
                                $status=$this->session->userdata('kode_status');
                                ?>
                               <a href="<?php echo base_url().'index/invoice_nolog_detail/'.$id ?>" data-toggle="tooltip" data-placement="bottom" title="Klik untuk melihat detail pesanan">
                                   <?php echo $this->session->userdata('kode_order')?></a> 
                                <?php
                                    $phpdate = strtotime($this->session->userdata('kode_tgl'));
                                    $mysqldate = date( 'd M Y', $phpdate );
                                   ?>
                               <p class="tx-12" style="margin-top:5px;color:#999;"> <?php echo $mysqldate; ?></p>
                            </td>
                            <td>
                                <?php
                                if($resi == ""){
                                    echo "Resi belum di input";
                                }else{
                                    echo $resi;
                                }
                                ?>    
                            </td>
                            <td>
                                <?php
                                    if($status == 0){
                                        echo "<span class='labil labil-warning'>Menunggu pembayaran</span>";
                                    }else if($status == 1){
                                        echo "<span class='labil labil-default'>Menunggu konfirmasi</span>";
                                    }else if($status == 2){
                                        echo "<span class='labil labil-danger'>Di tolak</span>";
                                    }else if($status == 3){
                                        echo "<span class='labil labil-primary'>Di proses</span>";
                                    }else if($status == 4){
                                        echo "<span class='labil labil-success'>Di bayar</span>";
                                    }
                                    ?>
                            </td>
                        </tr>
                   
                    </tbody>
                </table>
            </div>

        </div>
      
    </div>
    </div>

</section>