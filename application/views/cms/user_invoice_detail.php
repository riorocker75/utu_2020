<!-- breadrumb section -->
<section class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-line">
            <ul>
                <li><a href="<?php echo base_url()?>">Home</a> </li>
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
							<h2>Invoice Bayar</h2>
							</p> 
						
						</div>
						<?php foreach($invoice as $i){ ?>

						<?php if($i->status != "3" && $i->status != "4" ){ ?>	
							<div class="user-sb-main-body" style="margin-top:-10px">
								<p>Terima Kasih. Pesanan anda telah kami terima </p>
							</div>
					  <?php } ?>
					
					  <!-- info invoice -->
					  <div class="user-sb-main-body" style="margin-top:-10px">
							<div class="row">
								<div class="col-lg-3 col-md-3 col-12">
									<b class="tx-14">Kode Pesanan</b>
									<p class="tx-14" style="color: rgb(66, 69, 97);"><?php echo $i->no?></p>
								</div>
								<div class="col-lg-3 col-md-3 col-12">
									<b class="tx-14">Tanggal</b>
									<p class="tx-14"  style="color: rgb(66, 69, 97);">	
										<?php
											$phpdate = strtotime($i->tgl);
											$mysqldate = date( 'd M Y', $phpdate );
											echo $mysqldate;
										?>
									</p>
								</div>
								<div class="col-lg-3 col-md-3 col-12">
								<?php
								foreach($barang as $b){
									$total_order += $b->order_jumlah;
								}
								?>
									<b class="tx-14">Total</b>
									<p class="tx-14"  style="color: rgb(66, 69, 97);"><?php echo "Rp. ".number_format($i->ongkir+$subtotal); ?></p>
								</div>
								<div class="col-lg-3 col-md-3 col-12">
									<b class="tx-14">Metode Bayar</b>
									<p class="tx-14"  style="color: rgb(66, 69, 97);">Transfer Bank</p>
								</div>
							</div>
					<div class="panel-body no-padding-bottom">
						<div style="margin:20px 0">
							<h2 class="tx-22">Detail Pesanan</h2>
						</div>	
					<table>
						<tbody>
							<tr>
								<td>
										Total Item 
								</td>
								<td>
									<?php echo $total_order?>
								</td>
							</tr>
							<tr>
								<td>Tanggal Pesan </td>
								<td><?php echo $mysqldate; ?></td>
							</tr>

							<tr>
								<td>Alamat Pengiriman </td>
								<td><?php echo $i->alamat; ?>,  <?php echo $i->kecamatan; ?>, <?php echo tampil_kota($i->kota); ?>, <?php echo tampil_provinsi($i->provinsi); ?></td>
							</tr>

							<tr>
								<td>Rekening Pembayaran&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td>
									<?php if($i->rek_bank == "bm1"){?>
											<span class="text-semibold">Bank &nbsp;:  &nbsp; Bank Mandiri</span>
										<?php }elseif($i->rek_bank =="bm2"){?>
											<span class="text-semibold">Bank &nbsp;:  &nbsp; Bank BRI</span>
										<?php }elseif($i->rek_bank =="bm3"){?>
											<span class="text-semibold">Bank &nbsp;:  &nbsp; Bank BNI</span>
										<?php }?>	
								</td>
							</tr>
						</tbody>
					</table>
						
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

      </div>
  </div>

</section>