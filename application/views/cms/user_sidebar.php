<div class="user-sidebar-profile">
	<div class="user-sb-img">
		<img src="<?php  echo base_url(); ?>dah_image/default/pembeli.jpg">	

		<div class="user-sb-nama">
		<?php echo $this->session->userdata('user_nama'); ?>
		</div>
	</div>	

	<div class="user-sb-prof">
		<ul>
			<li>
			<a href="<?php echo base_url().'user'; ?>"><i class="fa fa-user-alt green-text text-accent-4"></i> Profile saya</a>	
			</li>
			<li>
				<a href="<?php echo base_url().'user/invoice'; ?>"><i class="fa fa-credit-card blue-text text-accent-2"></i>Transaksi pembelian </a>
			</li>
			<li>
				<a href="<?php echo base_url().'user/user_logout'?>"><i class="fas fa-sign-out-alt red-text text-accent-2"></i> Log out </a>	
			</li>
		</ul>
	</div>

</div>