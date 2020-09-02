<!-- breadrumb section -->
<section class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-line">
            <ul>
                <li><a href="<?php echo base_url()?>">Home</a> </li>
                <li><a href="<?php echo base_url().'index/invoice_nolog'?>">Laman Pesanan</a> </li>
                <li><a href="">Detail invoice pembelian tanpa login</a> </li>
            </ul>
        </div>
    </div>

</section>

<!-- end breadcrumb -->

<section class="user-profile">

  <div class="row">
      <div class="col-lg-8 offset-lg-2 col-sm-10 offset-sm-1 col-12">
         
                  <div class="user-sb-main">
                      <div class="user-sb-main-title">
                        <p>
                         <h2>Detail invoice tanpa login</h2>
                        </p> 
                        </div>
						<?php foreach($invoice as $i){ ?>

						<?php if($i->status != "3" && $i->status != "4" ){ ?>	
                      <div class="user-sb-main-body" style="margin-top:10px">
						<form action="<?php echo base_url().'index/upload_slip_nolog' ?>" method="post">
						<p class="text-muted">Silahkan upload bukti pembayaran pada form di bawah ini. Selanjutnya pembayaran akan di periksa untuk di lanjutkan ke tahap selanjutnya.</p>
							<br/>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<label>Bukti pembayaran</label>
										<input type="hidden" name="id_inv" value="<?php echo $i->id; ?>">
										<input type="file" name="slip" accept="image/*">
										<?php echo "<span class='text-warning'>".form_error('slip')."</span>"; ?>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group">
										<input type="submit" value="Upload" class="btn btn-sm btn-primary">
									</div>
								</div>
							</div>		
						</form>
					  </div>
					  <?php } ?>
					
					  <!-- info invoice -->
					  <div class="user-sb-main-body" style="margin-top:10px">
					  
				
					  <button type="button" class="button-3d-bor float-right"><i class="icon-file-check position-left"></i><i class="fa fa-print"></i> Cetak / Unduh</button>
						<br>
						<br>
							
					
					

					<div class="panel-body no-padding-bottom">
						<div class="row">
							<div class="col-sm-6 content-group tx-14">
								<ul class="list-condensed list-unstyled">
									<li>SerbaUmbi.com</li>
									<li>Indonesia</li>
									<li>+62853-6008-0642</li>
								</ul>
							</div>

							<div class="col-sm-6 content-group">
								<div class="invoice-details">
									<h5 class="text-uppercase tx-bold-600 tx-14">Invoice <?php echo $i->no; ?></h5>
									<ul class="list-condensed list-unstyled">
										<li class="tx-14">Tanggal:
											<span class="text-semibold">
												<?php
												$phpdate = strtotime($i->tgl);
												$mysqldate = date( 'd-M-Y', $phpdate );
												echo $mysqldate;
												?>

											</span>
										</li>
										<li class="tx-14">Status:
											<span class="text-semibold">
												<?php
												if($i->status == 0){
													echo "<span class='tx-11 labil labil-warning'>Menunggu pembayaran</span>";
												}else if($i->status == 1){
													echo "<span class='tx-11 labil labil-default'>Menunggu konfirmasi</span>";
												}else if($i->status == 2){
													echo "<span class='tx-11 labil labil-danger'>Di tolak</span>";
												}else if($i->status == 3){
													echo "<span class='tx-11 labil labil-primary'>Di proses</span>";
												}else if($i->status == 4){
													echo "<span class='tx-11 labil labil-success'>Di bayar</span>";
												}
												?>
											</span>
										</li>
									</ul>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 col-lg-8 content-group">
								<span class="text-muted">Invoice Untuk:</span>
								<ul class="list-condensed list-unstyled tx-13">
									<li><h5 class="tx-15 tx-bold-600"><?php echo $i->nama; ?></h5></li>
									<li><span class="text-semibold"><?php echo $i->alamat; ?></span></li>
									<li>Provinsi : <?php echo tampil_provinsi($i->provinsi); ?></li>
									<li>Kota / Kab : <?php echo tampil_kota($i->kota); ?></li>
									<li>Kecamatan : <?php echo $i->kecamatan; ?></li>
									<li>Kode Pos : <?php echo $i->kodepos; ?></li>
									<li>Tlp/HP : <?php echo $i->telp; ?></li>
								</ul>
								<br/>
								<span class="text-muted">Kurir:</span>
								<ul class="list-condensed list-unstyled">
									<li><h4 class="tx-16 tx-bold-600"><?php echo $i->kurir; ?></h4></li>
								</ul>
							</div>

							<div class="col-md-6 col-lg-4 content-group">
								<p class="text-muted ">Lakukan Pembayaran Ke:</p>
								<ul class="list-condensed list-unstyled invoice-payment-details tx-12">
									<li>
										<?php if($i->rek_bank == "bm1"){?>
											<span class="text-semibold">Bank &nbsp;:  &nbsp; Bank Mandiri</span>
										<?php }elseif($i->rek_bank =="bm2"){?>
											<span class="text-semibold">Bank &nbsp;:  &nbsp; Bank BRI</span>
										<?php }elseif($i->rek_bank =="bm3"){?>
											<span class="text-semibold">Bank &nbsp;:  &nbsp; Bank BNI</span>
										<?php }?>	
									
									</li>
									<li>
										<?php if($i->rek_bank == "bm1"){?>
											<span>No.Rek  &nbsp;: &nbsp;9892019</span>
										<?php }elseif($i->rek_bank =="bm2"){?>
											<span>No.Rek  &nbsp;: &nbsp;6791-9900-9989</span>
										<?php }elseif($i->rek_bank =="bm3"){?>
											<span>No.Rek  &nbsp;: &nbsp;87900908</span>
										<?php }?>	
										
									
									</li>
									<li><span>A/N &nbsp;: &nbsp; Serba Umbi Sejahtera</span></li>
								</ul>
							</div>
						</div>
					</div>

					<div class="table-responsive">
						<table class="table table-lg">
							<thead>
								<tr>
									<th>Produk</th>
									<th class="col-sm-2 text-center">Harga</th>
									<th class="col-sm-1 text-center">Jumlah</th>
									<th class="col-sm-2 text-center">Total</th>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach($barang as $b){
									?>
									<tr>
										<td>
											<h6 class="no-margin tx-14"><?php echo $b->prod_name; ?></h6>
											<span class="text-muted"></span>
										</td>
										<td class="text-center tx-14"><?php echo "Rp. ". number_format($b->order_harga)." ,-"; ?></td>
										<td class="text-center tx-14"><?php echo $b->order_jumlah; ?></td>
										<td class="text-center tx-14"><span class="text-semibold"><?php echo "Rp. ".number_format($b->order_jumlah*$b->order_harga)." ,-"; ?></span></td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>

						<div class="panel-body">
							<div class="row invoice-payment">
								<div class="col-sm-7">

								</div>

								<div class="col-sm-5">
									<div class="content-group">
										<h6>Total bayar</h6>
										<div class="table-responsive no-border">
											<table class="table">
												<tbody>
													<tr class="tx-14">
														<th>Subtotal :</th>
														<td class="text-right"><?php if($subtotal>0){echo "Rp. ".number_format($subtotal)." ,-";} ?></td>
													</tr>
													<tr class="tx-14">
														<th>Ongkir :</th>
														<td class="text-right"><?php echo "Rp. ".number_format($i->ongkir)." ,-"; ?></td>
													</tr>
													<tr>
														<th class="tx-14">Total Pembayaran:<br/><span class="text-muted">(Subtotal + Ongkir)</span></th>
														<td class="text-right text-primary"><h5 class="tx-bold-700 tx-14"><?php echo "Rp. ".number_format($i->ongkir+$subtotal)." ,-"; ?></h5></td>
													</tr>
												</tbody>
											</table>
										</div>

									</div>
								</div>
							</div>

							<h6>Informasi penting</h6>
							<p class="text-muted tx-13">
								Terima kasih sudah berbelanja website kami ini adalah invoice atau faktur pesanan kamu. Kamu bisa melakukan pembayaran untuk tagihan invoice ini dengan cara mentransfer ke rekening yang tertera di atas sejumlah nominal total pembayaran yang tertera.
								Selanjutnya kamu tinggal mengupload slip bukti pembayaran untuk selanjutnya di periksa dan di konfirmasi oleh Tim kami.
								Jika ada yang kurang jelas, kamu bisa langsung berkonsultasi dengan CS kami melalui nomor hp yang tertera di atas.
								Pertanyaan kamu bisa kamu sampaikan melalui SMS, Telpon atau WA. Terima kasih.	</p>
							</div>
						</div>
					  
					
						</div>
					  <!-- end foreach -->
						<?php } ?>
                
            

          </div>

      </div>
  </div>

</section>