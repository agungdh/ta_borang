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
						<th title="fakultas">
							Fakultas
						</th>
						<th title="prodi">
							Prodi
						</th>
						<th title="tahunusulan">
							Tahun Usulan
						</th>
						<th title="standarakreditasi">
							Standar Akreditasi
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
						$jumlah_total_dokumen = count($this->db->get_where('v_listdokumen', array('versi_id' => $item->versi_id))->result());
				        $jumlah_dokumen = count($this->db->get_where('berkas', array('pengajuan_id' => $item->id))->result());
				        $persentase = number_format((float)$jumlah_dokumen != 0 ? $jumlah_dokumen / $jumlah_total_dokumen * 100 : 0, 2, '.', '');
						?>
						<tr>
							<td><?php echo $this->pustaka->tanggal_indo($item->tanggal_pengajuan); ?></td>
							<?php
								$prodi = $this->db->get_where('prodi', ['id' => $item->prodi_id])->row();
								$fakultas = $this->db->get_where('fakultas', ['id' => $prodi->fakultas_id])->row();
								$fakultas_prodi = $fakultas->nama . ' - ' . $prodi->nama;
							?>
							<td><?php echo $fakultas->nama; ?></td>
							<td><?php echo $prodi->nama; ?></td>
							<td><?php echo $item->tahun_usulan; ?></td>
							<?php
							$versi = $this->db->get_where('versi', ['id' => $item->versi_id])->row();
							?>
							<td><?php echo $versi->nama . ' - ' . $versi->tahun; ?></td>
							<td>
								<div class="progress">
									<div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $persentase; ?>%" aria-valuenow="<?php echo $persentase; ?>" aria-valuemin="0" aria-valuemax="100">
										<?php echo $persentase; ?>%
									</div>
								</div>
							</td>
							<td>
								<a href="<?php echo base_url('prodi/detail_pengajuan/index/' .  $item->id); ?>" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="m-tooltip" title="Detail Pengajuan">
									<i class="la la-external-link"></i>
								</a>
								<a href="<?php echo base_url('prodi/detail_pengajuan/unduh_semua/' .  $item->id); ?>" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="m-tooltip" title="Unduh Semua Berkas">
									<i class="la la-download"></i>
								</a>
								<a href="<?php echo base_url('prodi/pengajuan/ubah/' . $item->id); ?>" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="m-tooltip" title="Ubah">
									<i class="la la-edit"></i>
								</a>
								<a onclick="hapus('<?php echo $item->id; ?>')" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="m-tooltip" title="Hapus">
									<i class="la la-trash"></i>
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