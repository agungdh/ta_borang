<div class="col-md-12">
	<div class="m-portlet m-portlet--mobile">
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">
						Data Pengajuan
					</h3>
				</div>
			</div>
		</div>
		<div class="m-portlet__body">
			<!--begin: Search Form -->
			<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
				<div class="row align-items-center">
					<div class="col-xl-8 order-2 order-xl-1">
						<div class="form-group m-form__group row align-items-center">
							<div class="col-md-4">
								<div class="m-input-icon m-input-icon--left">
									<input type="text" class="form-control m-input m-input--solid" placeholder="Search..." id="generalSearch">
									<span class="m-input-icon__icon m-input-icon__icon--left">
										<span>
											<i class="la la-search"></i>
										</span>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--end: Search Form -->
<!--begin: Datatable -->
			<table class="m-datatable" id="html_table" width="100%">
				<thead>
					<tr>
						<th title="tanggalpengajuan">
							Tanggal Pengajuan
						</th>
						<th title="unit">
							Unit
						</th>
						<th title="tahunborang">
							Tahun Borang
						</th>
						<th title="borang">
							Borang
						</th>
						<th title="tipeborang">
							Tipe Borang
						</th>
						<th title="persentase">
							Persentase
						</th>
						<th title="Proses">
							Proses
						</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($data['pengajuan'] as $item) {
						$jumlah_total_dokumen = count($this->db->get_where('v_listdokumen', array('tipeversi_id' => $item->tipeversi_id))->result());
				        $jumlah_dokumen = count($this->db->get_where('berkas', array('pengajuan_id' => $item->id))->result());
				        $persentase = number_format((float)$jumlah_dokumen != 0 ? $jumlah_dokumen / $jumlah_total_dokumen * 100 : 0, 2, '.', '');
						?>
						<tr>
							<td><?php echo $this->pustaka->tanggal_indo($item->tanggal_pengajuan); ?></td>
							<?php
							$unit = $this->db->get_where('unit', ['id' => $item->unit_id])->row();
							$unit_level = $unit->unit;
							if ($unit_level == 1) {
								$unit_string = "Universitas";
							} else {
								$unit_prodi = $this->db->get_where('prodi', ['id' => $unit->prodi_id])->row();
								$unit_fakultas = $this->db->get_where('fakultas', ['id' => $unit_prodi->fakultas_id])->row();
								$unit_string = $unit_fakultas->nama . ' - ' . $unit_prodi->nama;
							}
							?>
							<td><?php echo $unit_string; ?></td>
							<td><?php echo $item->tahun_borang; ?></td>
							<td><?php echo $this->db->get_where('versi', ['id' => $this->db->get_where('tipeversi', ['id' => $item->tipeversi_id])->row()->versi_id])->row()->nama; ?></td>
							<td><?php echo $this->db->get_where('tipeversi', ['id' => $item->tipeversi_id])->row()->tipe; ?></td>
							<td>
								<div class="progress">
									<div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $persentase; ?>%" aria-valuenow="<?php echo $persentase; ?>" aria-valuemin="0" aria-valuemax="100">
										<?php echo $persentase; ?>%
									</div>
								</div>
							</td>
							<td>
								<a href="<?php echo base_url('admin/detail_pengajuan/index/' .  $item->id); ?>" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="m-tooltip" title="Detail Pengajuan">
									<i class="la la-external-link"></i>
								</a>
								<a href="<?php echo base_url('admin/detail_pengajuan/unduh_semua/' .  $item->id); ?>" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="m-tooltip" title="Unduh Semua Berkas">
									<i class="la la-download"></i>
								</a>
							</td>
						</tr>
						<?php
					}
					?>
				</tbody>
			</table>
			<!--end: Datatable -->
		</div>
	</div>
</div>

<!-- btnHapus -->
<script type="text/javascript">
function hapus(id) {
    swal({
        title: 'Apakah anda yakin?',
        text: "Data akan dihapus!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Hapus!'
    }).then(function(result) {
        if (result.value) {
            window.location = "<?php echo base_url('admin/pengajuan/aksi_hapus/'); ?>" + id;
        }
    });
};
</script>

<!-- datatable -->
<script type="text/javascript">
//== Class definition

var DatatableHtmlTableDemo = function() {
  //== Private functions

  // demo initializer
  var demo = function() {

    var datatable = $('.m-datatable').mDatatable({
      data: {
        saveState: false,
      },
      search: {
        input: $('#generalSearch'),
      },
    });
  };

  return {
    //== Public functions
    init: function() {
      // init dmeo
      demo();
      mApp.initTooltips();
    },
  };
}();

jQuery(document).ready(function() {
  DatatableHtmlTableDemo.init();
});
</script>