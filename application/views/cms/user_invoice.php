<!-- breadrumb section -->
<section class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-line">
            <ul>
                <li><a href="<?php echo base_url()?>">Laman Depan</a> </li>
                <li><a href="">Invoice Pembelian</a> </li>
            </ul>
        </div>
    </div>

</section>

<!-- end breadcrumb -->

<section class="user-profile">

  <div class="row">
      <div class="col-lg-10 offset-lg-1 col-sm-10 offset-sm-1 col-12">
          <div class="row">
              <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                <?php include"user_sidebar.php";?>
              </div>
              <div class="col-lg-8 col-md-8 col-sm-12 col-12">
			  	<div class="user-sb-main">
                      <div class="user-sb-main-title">
                        <p>
                         <h2> Transaksi Pembelian</h2>
                        </p>       
                        </div>
			 		 <div class="user-sb-main-body">
					  <?php show_alert(); ?>
						<div class="table-responsive">
							<?php if($this->m_dah->edit_data(array('user_id' => $this->session->userdata('user_id')),'invoice')->num_rows()>0){ ?>
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>No. Invoice</th>
										<th>Resi</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($invoice as $p){ ?>
									<tr>
										<td>
											<a href="<?php echo base_url().'user/invoice_detail/'.$p->id ?>"><?php echo $p->no; ?></a><br/>
											<small class="text-muted">
												<?php
												$phpdate = strtotime($p->tgl);
												$mysqldate = date( 'd-M-Y', $phpdate );
												echo $mysqldate;
												?>
											</small>
										</td>
										<td>
											<?php
											if($p->resi == ""){
												echo "Resi belum di input";
											}else{
												echo $p->resi;
											}
											?>
										</td>
										<td>
											<?php
											if($p->status == 0){
												echo "<span class='labil labil-warning'>Menunggu pembayaran</span>";
											}else if($p->status == 1){
												echo "<span class='labil labil-default'>Menunggu konfirmasi</span>";
											}else if($p->status == 2){
												echo "<span class='labil labil-danger'>Di tolak</span>";
											}else if($p->status == 3){
												echo "<span class='labil labil-primary'>Di proses</span>";
											}else if($p->status == 4){
												echo "<span class='labil labil-success'>Di bayar</span>";
											}
											?>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
							<?php }else{ ?>
							<p class="text-muted text-center">Anda belum memiliki invoice apapun. segeralah belanja</p>
							<?php } ?>
						</div>
					</div>
				</div>	
              </div>

          </div>

      </div>
  </div>

</section>