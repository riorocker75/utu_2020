	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Advanced login -->
			<form action="<?php echo base_url().'index/user_daftar'; ?>" method="post">
				<div class="row">
		<div class="col-lg-4 offset-lg-5 col-sm-8 offset-sm-2 col-10 offset-1">
							<div class="main-login-form">

			<div class="mlg-title core-co tx-bold-600">
				<h2>Daftar</h2>

			</div>
		<div class="form-group">
		<input type="email" class="input-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
			<small class="form-text text-muted"><span class="text-danger"><?php echo form_error('email'); ?></span></small>
		</div>

		<div class="form-group">
		<input type="text" id="namalengkap" class="input-control" name="nama" placeholder="Nama">
		<small class="form-text text-muted"><span class="text-danger"><?php echo form_error('nama'); ?></span></small>

		</div>

		<div class="form-group">
		<input type="password" class="input-control" id="buatpass" name="password" placeholder="Password">
		<small class="form-text text-muted"><span class="text-danger"><?php echo form_error('password'); ?></span></small>

		</div>

		

		<div  style="margin-top:30px;">
			<button class="btn-login"> Daftar Sekarang</button>

		</div>

		<div class="col-lg-10 offset-lg-1 col-sm-12 col-12 tx-14" style="opacity:0.8;margin-top:10px;margin-bottom:-10px;text-align:center">
			Dengan mendaftar, saya setuju dengan syarat  dan  kebijakan berlaku
			
		
		</div>
</div>

						
						
					</div>
				</div>
			</form>
			<!-- /advanced login -->

		</div>
		<!-- /main content -->

	</div>
		<!-- /page content -->