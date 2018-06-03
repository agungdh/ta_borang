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
						<?php echo ucwords($aksi); ?> Pengajuan
					</h3>
				</div>
			</div>
		</div>
		<!--begin::Form-->
		<form class="m-form m-form--fit m-form--label-align-right" method="post" action="<?php echo base_url('prodi/pengajuan/aksi_' . $aksi); ?>">
			<div class="m-portlet__body">
				<div>
					<input type="hidden" name="where[id]" value="<?php echo isset($data['pengajuan']) ? $data['pengajuan']->id : null; ?>">
					<input type="hidden" name="data[tanggal_pengajuan]" value="<?php echo isset($data['pengajuan']) ? $data['pengajuan']->tanggal_pengajuan : date("Y-m-d"); ?>">
					<input type="hidden" name="data[unit_id]" value="<?php echo isset($data['pengajuan']) ? $data['pengajuan']->unit_id : $this->session->unit_id; ?>">
				</div>

				<div class="form-group m-form__group">
					<label for="tahunborang">
						Tahun Borang
					</label>
					<input required class="form-control m-input" type="number" min="1900" max="2900" value="<?php echo isset($data['pengajuan']) ? $data['pengajuan']->tahun_borang : null; ?>" id="tahunborang" name="data[tahun_borang]">
				</div>

				<div class="form-group m-form__group">
					<label for="borang">
						Borang
					</label>
					<select class="form-control m_select2" id="borang" name="data[tipeversi_id]">
						<?php
						foreach ($this->db->get('versi')->result() as $item) {
							?>
							<optgroup label="<?php echo $item->nama . ' - ' . $item->tahun; ?>">
								<?php
								foreach ($this->db->get_where('tipeversi', ['versi_id' => $item->id])->result() as $item2) {
									if ($item2->id == $data['pengajuan']->tipeversi_id) {
										?>
										<option selected value="<?php echo $item2->id; ?>"><?php echo '(' . $item->nama . ' - ' . $item->tahun . ') ' . $item2->tipe; ?></option>
										<?php
									} else {
										?>
										<option value="<?php echo $item2->id; ?>"><?php echo '(' . $item->nama . ' - ' . $item->tahun . ') ' . $item2->tipe; ?></option>
										<?php
									}
								}
								?>
							</optgroup>
							<?php
						}
						?>
					</select>
				</div>

			</div>
			<div class="m-portlet__foot m-portlet__foot--fit">
				<div class="m-form__actions">
					<input type="submit" class="btn btn-primary" value="Simpan">
					<a href="<?php echo base_url('prodi/pengajuan'); ?>" class="btn btn-secondary">
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