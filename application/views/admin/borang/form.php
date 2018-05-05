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
						<?php echo ucwords($aksi); ?> Borang
					</h3>
				</div>
			</div>
		</div>
		<!--begin::Form-->
		<form class="m-form m-form--fit m-form--label-align-right" method="post" action="<?php echo base_url('admin/borang/aksi_' . $aksi); ?>">
			<div class="m-portlet__body">
				<div>
					<input type="hidden" name="where[id]" value="<?php echo isset($data['borang']) ? $data['borang']->id : null; ?>">
				</div>

				<div class="form-group m-form__group">
					<label for="borang">
						Borang
					</label>
					<input required class="form-control m-input" type="text" value="<?php echo isset($data['borang']) ? $data['borang']->nama : null; ?>" id="borang" name="data[nama]">
				</div>

				<div class="form-group m-form__group">
					<label for="tahun">
						Tahun
					</label>
					<input required class="form-control m-input" type="number" min="1900" max="2900" value="<?php echo isset($data['borang']) ? $data['borang']->tahun : null; ?>" id="tahun" name="data[tahun]">
				</div>
			</div>
			<div class="m-portlet__foot m-portlet__foot--fit">
				<div class="m-form__actions">
					<input type="submit" class="btn btn-primary" value="Simpan">
					<a href="<?php echo base_url('admin/borang'); ?>" class="btn btn-secondary">
						Kembali
					</a>
				</div>
			</div>
		</form>
		<!--end::Form-->
	</div>
	<!--end::Portlet-->
</div>