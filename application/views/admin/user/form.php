<div class="col-md-12">
	<!--begin::Portlet-->
	<div class="m-portlet m-portlet--tab">
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<span class="m-portlet__head-icon m--hide">
						<i class="la la-gear"></i>
					</span>
					<h3 class="m-portlet__head-text">
						<?php echo ucwords($aksi); ?> User
					</h3>
				</div>
			</div>
		</div>
		<!--begin::Form-->
		<form class="m-form m-form--fit m-form--label-align-right" method="post" action="<?php echo base_url('admin/user/aksi_' . $aksi); ?>">
			<div class="m-portlet__body">
				<div>
					<input type="hidden" name="where[id]" value="<?php echo isset($data['user']) ? $data['user']->id : null; ?>">
				</div>

				<div class="form-group m-form__group">
					<label for="username">
						Username
					</label>
					<input required class="form-control m-input" type="text" value="<?php echo isset($data['user']) ? $data['user']->username : null; ?>" id="username" name="data[username]">
				</div>

				<div class="form-group m-form__group">
					<label for="password">
						Password
					</label>
					<input required class="form-control m-input" type="password" value="<?php echo isset($data['user']) ? $data['user']->password : null; ?>" id="password" name="data[password]">
				</div>

				<div class="form-group m-form__group">
					<label for="nama">
						Nama
					</label>
					<input required class="form-control m-input" type="text" value="<?php echo isset($data['user']) ? $data['user']->nama : null; ?>" id="nama" name="data[nama]">
				</div>

				<div class="form-group m-form__group">
					<label for="level">
						Level
					</label>
					<select class="form-control select2" id="level" name="data[level]">
						<option value="1">Admin</option>
						<option value="2">DPM</option>
						<option value="3">Prodi</option>
					</select>
				</div>

			</div>
			<div class="m-portlet__foot m-portlet__foot--fit">
				<div class="m-form__actions">
					<input type="submit" class="btn btn-primary" value="Simpan">
					<a href="<?php echo base_url('admin/user'); ?>" class="btn btn-secondary">
						Kembali
					</a>
				</div>
			</div>
		</form>
		<!--end::Form-->
	</div>
	<!--end::Portlet-->
</div>

<script type="text/javascript">
	$('.select2').select2();
</script>