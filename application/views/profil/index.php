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
						Profil
					</h3>
				</div>
			</div>
		</div>
		<!--begin::Form-->
		<form class="m-form m-form--fit m-form--label-align-right" method="post" action="<?php echo base_url('profil/ubah'); ?>">
			<div class="m-portlet__body">
				<div>
					<input type="hidden" name="where[id]" value="<?php echo isset($data['user']) ? $data['user']->id : null; ?>">
				</div>

				<div class="form-group m-form__group">
					<label for="username">
						Username
					</label>
					<input required class="form-control m-input" type="text" value="<?php echo isset($data['user']) ? $data['user']->username : null; ?>" id="username" name="cdata[username]" disabled>
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
					<?php
					$level_raw = isset($data['user']) ? $data['user']->level : null;

					switch ($level_raw) {
						case 1:
							$level = "Admin";
							break;
						case 2:
							$level = "DPM";
							break;
						case 3:
							$level = "Operator";
							break;
						
						default:
							redirect(base_url('logout'));
							break;
					}
					?>
					<input required class="form-control m-input" type="text" value="<?php echo $level; ?>" id="level" name="cdata[level]" disabled>
				</div>
				<div class="form-group m-form__group">
					<label for="unit">
						Unit
					</label>
					<?php
					$unit_raw = isset($data['user']) ? $data['user']->unit_id : null;
					
					if ($unit_raw != null) {
						$unit = $this->db->get_where('unit', ['id' => $unit_raw])->row();

						if ($unit == 1) {
							$unit = "Universitas";
						} else {
							$unit = $this->db->get_where('prodi', ['id' => $unit->prodi_id])->row()->nama;
						}
					} else {
						$unit = null;
					}
					?>
					<input required class="form-control m-input" type="text" value="<?php echo isset($data['user']) ? $data['user']->unit_id : null; ?>" id="unit" name="cdata[unit]" disabled>
				</div>
			</div>
			<div class="m-portlet__foot m-portlet__foot--fit">
				<div class="m-form__actions">
					<input type="submit" class="btn btn-primary" value="Simpan">
					<a href="<?php echo base_url(''); ?>" class="btn btn-secondary">
						Kembali
					</a>
				</div>
			</div>
		</form>
		<!--end::Form-->
	</div>
	<!--end::Portlet-->
</div>

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
						Ganti Password
					</h3>
				</div>
			</div>
		</div>
		<!--begin::Form-->
		<form class="m-form m-form--fit m-form--label-align-right" id="form_ganti_password" method="post" action="<?php echo base_url('profil/ganti_password'); ?>">
			<div class="m-portlet__body">
				<div>
					<input type="hidden" name="where[id]" value="<?php echo isset($data['user']) ? $data['user']->id : null; ?>">
				</div>

				<div class="form-group m-form__group">
					<label for="password">
						Password
					</label>
					<input required class="form-control m-input" type="password" id="password" name="data[password]">
				</div>
				<div class="form-group m-form__group">
					<label for="password2">
						Ulangi Password
					</label>
					<input required class="form-control m-input" type="password" id="password2" name="cdata[password2]">
				</div>
			</div>
			<div class="m-portlet__foot m-portlet__foot--fit">
				<div class="m-form__actions">
					<input type="submit" class="btn btn-primary" value="Simpan">
					<a href="<?php echo base_url(''); ?>" class="btn btn-secondary">
						Kembali
					</a>
				</div>
			</div>
		</form>
		<!--end::Form-->
	</div>
	<!--end::Portlet-->
</div>

<?php
$flashdata = $this->session->flashdata('data');

if ($flashdata != null) {
	$this->pustaka->swal3($flashdata['header'], $flashdata['pesan'], $flashdata['status']);
}
?>

<script type="text/javascript">
$("#form_ganti_password").on("submit", function(){
	if ($("#password").val() != $("#password2").val()) {
		swal("ERROR !!!", "Password Tidak Sama !!!", "error");

		return false;
	}
})
</script>