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
		<form class="m-form m-form--fit m-form--label-align-right" method="post" action="<?php echo base_url('user/aksi_' . $aksi); ?>">
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
						<option <?php echo $data['user']->level == '1' ? 'selected' : null; ?> value="1">Admin</option>
						<option <?php echo $data['user']->level == '2' ? 'selected' : null; ?> value="2">DPM</option>
						<option <?php echo $data['user']->level == '3' ? 'selected' : null; ?> value="3">Prodi</option>
					</select>
				</div>

				<div class="form-group m-form__group">
					<label for="prodi">
						Prodi
					</label>
					<select class="form-control select2" id="unit" name="data[prodi_id]">
						<?php
						if ($data['user']->level == 3) {
							foreach ($this->db->get('fakultas')->result() as $item) {
								?>
								<optgroup label="<?php echo $item->nama; ?>">
									<?php
									foreach ($this->db->get_where('prodi', ['fakultas_id' => $item->id])->result() as $item2) {
									 	if ($data['user']->prodi_id == $item2->id) {
										 	?>
										 	<option selected value="<?php echo $item2->id; ?>"><?php echo $item2->nama; ?></option>
										 	<?php
									 	} else {
									 		?>
										 	<option value="<?php echo $item2->id; ?>"><?php echo $item2->nama; ?></option>
										 	<?php
									 	}
									 }
									?>
								</optgroup>
								<?php
							}
						}
						?>
					</select>
				</div>

			</div>
			<div class="m-portlet__foot m-portlet__foot--fit">
				<div class="m-form__actions">
					<input type="submit" class="btn btn-primary" value="Simpan">
					<a href="<?php echo base_url('user'); ?>" class="btn btn-secondary">
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
		<form class="m-form m-form--fit m-form--label-align-right" id="form_ganti_password" method="post" action="<?php echo base_url('user/ganti_password'); ?>">
			<div class="m-portlet__body">
				<div>
					<input type="hidden" name="where[id]" value="<?php echo isset($data['user']) ? $data['user']->id : null; ?>">
				</div>

				<div class="form-group m-form__group">
					<label for="password">
						Password
					</label>
					<input required class="form-control m-input" type="password" id="gpassword" name="data[password]">
				</div>
				<div class="form-group m-form__group">
					<label for="password2">
						Ulangi Password
					</label>
					<input required class="form-control m-input" type="password" id="gpassword2" name="cdata[password2]">
				</div>
			</div>
			<div class="m-portlet__foot m-portlet__foot--fit">
				<div class="m-form__actions">
					<input type="submit" class="btn btn-primary" value="Simpan">
					<a href="<?php echo base_url('user'); ?>" class="btn btn-secondary">
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
	$("#level").change(function(){
		var terpilih = $("#level").val();

		if (terpilih == 3) {
			$.get("<?php echo base_url('user/ajax_unit'); ?>", function(data, status){
				$("#unit").prop('disabled', false);
				$("#unit").html(data);
				$('.select2').select2();
            });
		} else {
			clear_level();
		}
	});

	function clear_level() {
			$("#unit").html('');
			$("#unit").prop('disabled', true);
			$("#unit").prop('selectedIndex', -1);
	}

	$(function() {
		$('.select2').select2();
		<?php
		if ($data['user']->level != 3) {
			?>
			clear_level();
			<?php
		}
		?>
	});

	$("#form_ganti_password").on("submit", function(){
		if ($("#gpassword").val() != $("#gpassword2").val()) {
			swal("ERROR !!!", "Password Tidak Sama !!!", "error");

			return false;
		}
	})
</script>