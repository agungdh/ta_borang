<div class="col-md-12">
	<div class="m-portlet m-portlet--mobile">
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">
						Detail Pengajuan
					</h3>
				</div>
			</div>
		</div>

		<form method="post" enctype="multipart/form-data" action="<?php echo base_url('prodi/detail_pengajuan/upload'); ?>">
			<input type="hidden" name="pengajuan_id" value="<?php echo $data['pengajuan']->id; ?>">
			<input type="hidden" name="last_tab" id="last_tab" value="1">
			<div class="m-portlet__body">
				<ul id="naver" class="nav nav-tabs" role="tablist">
					<?php
					$this->db->order_by('nomor');
					$this->db->where(['tipeversi_id' => $data['pengajuan']->tipeversi_id]);
					foreach ($this->db->get('standar')->result() as $item) {
						if ($item->nomor == 1) {
				        	$status = "active show";
						} else {
				        	$status = null;
				        }
						?>
						<li class="nav-item">
							<a class="nav-link <?php echo $status; ?>" data-toggle="tab" onclick="pilih_tab(<?php echo $item->nomor; ?>)" href="#standar_<?php echo $item->nomor; ?>">
								Standar <?php echo $item->nomor; ?>
							</a>
						</li>
						<?php
					}
					?>
				</ul>
				<div class="tab-content">
					<input class="btn btn-success" type="submit" name="submit" value="Submit">
      				<input class="btn btn-success pull-right" type="submit" name="submit" value="Submit">
					<?php
					foreach ($this->db->get_where('standar', ['tipeversi_id' => $data['pengajuan']->tipeversi_id])->result() as $item) {
						if ($item->nomor == 1) {
			            	$status = "active show";
			          	} else {
			            	$status = null;
			          	}
						?>
						<div class="tab-pane <?php echo $status; ?>" id="standar_<?php echo $item->nomor; ?>" role="tabpanel">
							<table class="table">
								<thead>
									<tr>
										<th>Standar</th>
										<th>Sub Standar</th>
										<th>Butir</th>
										<th>List Dokumen</th>
										<th>Tipe Dokumen</th>
										<th>Dokumen</th>
										<th>Upload</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$id_standar = 0; $id_substandar = 0; $id_butir = 0;
									foreach ($this->db->get_where('v_listdokumen', ['standar_id' => $item->id])->result() as $item2) {
								        $standar = $id_standar == $item2->standar_id ? null : $item2->nomor_standar . ' ' . $item2->nama_standar;

								        $substandar = $id_substandar == $item2->substandar_id ? null : $item2->nomor_substandar . ' ' . $item2->nama_substandar;

								        $butir = $id_butir == $item2->butir_id ? null : $item2->nomor_butir . ' ' . $item2->nama_butir;

								        $berkas = $this->db->get_where('berkas', ['pengajuan_id' => $data['pengajuan']->id, 'listdokumen_id' => $item2->id])->row();
								          ?>
										<tr>
											<td><?php echo $standar; ?></td>
											<td><?php echo $substandar; ?></td>
											<td><?php echo $butir; ?></td>
											<td><?php echo $item2->keterangan; ?></td>
											<td><?php echo $this->db->get_where('tipe_listdokumen', ['id' => $item2->tipe_listdokumen_id])->row()->tipe; ?></td>
											<td>
												<?php 
												if ($berkas != null) {
													?>
													<!-- <a class="btn btn-danger btn-xs" onclick="hapus('<?php echo $item->id; ?>')"><i class="la la-trash"></i> </a> -->
													<a onclick="hapus('<?php echo $item->id; ?>')" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="m-tooltip" title="Hapus" onclick="hapus('<?php echo $item->id; ?>')">
														<i class="la la-trash"></i>
													</a>
													<a href="<?php echo base_url('prodi/detail_pengajuan/unduh/' . $berkas->id); ?>"><?php echo $berkas->nama; ?></a>
													<?php
												} else {
													?>
													-
													<?php
												}
												?>
											</td>
											<td>
												<input type="file" name="dokumen[<?php echo $item2->id; ?>]">
											</td>
										</tr>
										<?php
					                  	$id_standar = $item2->standar_id; $id_substandar = $item2->substandar_id; $id_butir = $item2->butir_id;
									}
									?>
								</tbody>
							</table>
						</div>
						<?php
					}
					?>
					<input class="btn btn-success" type="submit" name="submit" value="Submit">
        			<input class="btn btn-success pull-right" type="submit" name="submit" value="Submit">
				</div>			
			</div>
		</form>

	</div>
</div>

<!-- btnHapus -->
<script type="text/javascript">
function hapus(id, standar) {
    swal({
        title: 'Apakah anda yakin?',
        text: "Data akan dihapus!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Hapus!'
    }).then(function(result) {
        if (result.value) {
            window.location = "<?php echo base_url('prodi/pengajuan/aksi_hapus/'); ?>" + id;
        }
    });
};
</script>

<script type="text/javascript" language="javascript" >
  $(document).ready(function() {
	var dTable;
 	var var_last_tab = <?php echo $this->input->get('tab') != null ? $this->input->get('tab') : 'null'; ?>;

    if (var_last_tab != null) {
      $("ul.nav.nav-tabs li a").eq(0).attr('class','nav-link');
      $("ul.nav.nav-tabs li a").eq(var_last_tab-1).attr('class','nav-link active show');
      $("#standar_1").attr('class','tab-pane');
      $("#standar_"+var_last_tab).attr('class','tab-pane active');
    }

  });

  function pilih_tab(id) {
    $('#last_tab').val(id);
  }
</script>