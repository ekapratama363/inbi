	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" action="<?= base_url('auth') ;?>">
					<span class="login100-form-title p-b-43">
						 <img src="<?= base_url('assets/') ;?>images/judul3.jpg" style="width: 60px;margin-top: -50px;"> 
					</span>
					<span class="login100-form-title p-b-43">
						Login to continue
					</span>
					
					<?= $this->session->flashdata('message') ;?>

					<div class="wrap-input100" data-validate = "Username is required">
						<input class="input100" type="text" name="username" id="username" value="<?= set_value('username') ;?>">
						<span class="focus-input100"></span>
						<?= form_error('username','<small class="text-danger pl-3">','</small>') ;?>
						<span class="label-input100">Username</span>
					</div>
					
					
					<div class="wrap-input100" data-validate="Password is required">
						<input class="input100" type="password" name="password" id="password">
						<span class="focus-input100"></span>
						<?= form_error('username','<small class="text-danger pl-3">','</small>') ;?>
						<span class="label-input100">Password</span>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">

					</div>
			

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Login
						</button>
					</div>
					
				</form>

				<div class="login100-more" style="background-image: url('<?= base_url('assets/');?>images/bgbg.JPG');">
				</div>
			</div>
		</div>
	</div>
	
