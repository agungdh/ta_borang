<?php $flashdata = $this->session->flashdata('data'); ?>

<!DOCTYPE html>
<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>
			<?php echo JUDUL_APLIKASI; ?>
		</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!--begin::Web font -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
		</script>
		<!--end::Web font -->
        <!--begin::Base Styles -->
		<link href="<?php echo base_url('assets/assets/vendors/base/vendors.bundle.css'); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url('assets/assets/demo/default/base/style.bundle.css'); ?>" rel="stylesheet" type="text/css" />
		<!--end::Base Styles -->
		<!--begin::Base Scripts -->
		<script src="<?php echo base_url('assets/assets/vendors/base/vendors.bundle.js') ?>" type="text/javascript"></script>
		<script src="<?php echo base_url('assets/assets/demo/default/base/scripts.bundle.js') ?>" type="text/javascript"></script>
		<!--end::Base Scripts -->
		<link rel="shortcut icon" href="<?php echo base_url('assets/gambar/Logo-BL.ico'); ?>" 
	</head>
	<!-- end::Head -->
    <!-- end::Body -->
	<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2" id="m_login" style="background-image: url(<?php echo base_url(); ?>assets/assets/app/media/img//bg/bg-3.jpg);">
				<div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
					<div class="m-login__container">
						<div class="m-login__logo">
							<a href="#">
								<img height="150" width="150" src="<?php echo base_url() ?>assets/gambar/Logo-BL.png">
							</a>
						</div>
						<div class="m-login__signin">
							<div class="m-login__head">
								<h3 class="m-login__title">
									<?php echo JUDUL_APLIKASI ?>
								</h3>
							</div>
							<form class="m-login__form m-form" action="<?php echo base_url('welcome/login'); ?>" method="post">
								<div class="form-group m-form__group">
									<input class="form-control m-input m-login__form-input--last" type="text" placeholder="Username" name="username" required value="<?php echo $flashdata['username']; ?>">
								</div>
								<div class="form-group m-form__group">
									<input class="form-control m-input m-login__form-input--last" type="password" placeholder="Password" name="password" required>
								</div>
								<div class="m-login__form-action">
									<button id="m_login_signin_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn m-login__btn--primary" style="background-color: #282a3c">
										Log In
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end:: Page -->
	</body>
	<!-- end::Body -->
</html>

<?php
if ($flashdata != null) {
	$this->pustaka->swal3($flashdata['header'], $flashdata['pesan'], $flashdata['status']);
}
?>