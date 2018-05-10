<li class="m-nav__separator">
	-
</li>
<li class="m-nav__item">
	<a href="<?php echo base_url('prodi/pengajuan'); ?>" class="m-nav__link" data-toggle="m-tooltip" title="<?php echo $data['pengajuan']->tahun_borang . ' - ' . $this->db->get_where('versi', ['id' => $this->db->get_where('tipeversi', ['id' => $data['pengajuan']->tipeversi_id])->row()->versi_id])->row()->nama . ' - ' . $this->db->get_where('tipeversi', ['id' => $data['pengajuan']->tipeversi_id])->row()->tipe; ?>">
		<span class="m-nav__link-text">
			Pengajuan
		</span>
	</a>
</li>

<li class="m-nav__separator">
	-
</li>
<li class="m-nav__item">
	<a href="<?php echo base_url('prodi/detail_pengajuan/index/' . $data['pengajuan']->id); ?>" class="m-nav__link" data-toggle="m-tooltip" title="">
		<span class="m-nav__link-text">
			Detail Pengajuan
		</span>
	</a>
</li>