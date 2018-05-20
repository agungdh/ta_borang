<div class="col-md-12">
	<div class="m-portlet m-portlet--mobile">
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">
						Data User
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
					<div class="col-xl-4 order-1 order-xl-2 m--align-right">
						<a href="<?php echo base_url('admin/user/tambah'); ?>" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
							<span>
								<i class="la la-plus"></i>
								<span>
									User
								</span>
							</span>
						</a>
						<div class="m-separator m-separator--dashed d-xl-none"></div>
					</div>
				</div>
			</div>
			<!--end: Search Form -->
<!--begin: Datatable -->
			<table class="m-datatable" id="html_table" width="100%">
				<thead>
					<tr>
						<th title="Username">
							Username
						</th>
						<th title="Nama">
							Nama
						</th>
						<th title="Level">
							Level
						</th>
						<th title="Unit">
							Unit
						</th>
						<th title="Proses">
							Proses
						</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($data['user'] as $item) {
						?>
						<tr>
							<td><?php echo $item->username; ?></td>
							<td><?php echo $item->nama; ?></td>
							<td>
								<?php
								switch ($item->level) {
									case 1:
										$level = "Administrator";
										break;
									case 2:
										$level = "DPM";
										break;
									case 3:
										$level = "Prodi";
										break;
									default:
										redirect(base_url("logout"));
										break;
								}
								echo $level;
								?>
							</td>
							<td>
								<?php
								if ($item->level == 3) {
									if ($item->unit_id != 1) {
										$data_unit = $this->db->get_where('unit', ['id' => $item->unit_id])->row();
										$unit = $this->db->get_where('prodi', ['id' => $data_unit->prodi_id])->row()->nama;
									} else {
										$unit = "Universitas";
									}									
								} else {
									$unit = null;
								}
								echo $unit;
								?>
							</td>
							<td>
								<a href="<?php echo base_url('admin/user/ubah/' . $item->id); ?>" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="m-tooltip" title="Ubah">
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
            window.location = "<?php echo base_url('admin/user/aksi_hapus/'); ?>" + id;
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
