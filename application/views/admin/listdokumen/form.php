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
						<?php echo ucwords($aksi); ?> List Dokumen
					</h3>
				</div>
			</div>
		</div>
		<!--begin::Form-->
		<form class="m-form m-form--fit m-form--label-align-right" method="post" action="<?php echo base_url('admin/listdokumen/aksi_' . $aksi); ?>">
			<div class="m-portlet__body">
				<div>
					<input type="hidden" name="where[id]" value="<?php echo isset($data['listdokumen']) ? $data['listdokumen']->id : null; ?>">
					<input type="hidden" name="data[butir_id]" value="<?php echo isset($data['butir']) ? $data['butir']->id : null; ?>">
				</div>

				<div class="form-group m-form__group">
					<label for="listdokumen">
						Keterangan
					</label>
					<input required class="form-control m-input" type="text" value="<?php echo isset($data['listdokumen']) ? $data['listdokumen']->keterangan : null; ?>" id="listdokumen" name="data[keterangan]">
				</div>

				<div class="form-group m-form__group">
					<label for="tipelistdokumen">
						Tipe List Dokumen
					</label>
					<select class="form-control m_select2" id="tipelistdokumen" name="data[tipe_listdokumen_id]">
						<?php
						if (isset($data['listdokumen'])) {
							foreach ($data['tipe_listdokumen'] as $item) {
								if ($item->id == $data['listdokumen']->tipe_listdokumen_id) {
									?>
									<option selected value="<?php echo $item->id; ?>"><?php echo $item->tipe; ?></option>
									<?php									
								} else {
									?>
									<option value="<?php echo $item->id; ?>"><?php echo $item->tipe; ?></option>
									<?php									
								}
							}
						} else {
							foreach ($data['tipe_listdokumen'] as $item) {
								?>
								<option value="<?php echo $item->id; ?>"><?php echo $item->tipe; ?></option>
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
					<a href="<?php echo base_url('admin/listdokumen/index/' . $data['butir']->id); ?>" class="btn btn-secondary">
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
	$('.m_select2').select2();
</script>