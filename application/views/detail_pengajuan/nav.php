<li class="m-nav__separator">
	-
</li>
<li class="m-nav__item">
	<?php
	$jumlah_total_dokumen = count($this->db->get_where('v_listdokumen', array('versi_id' => $data['pengajuan']->versi_id))->result());
    $jumlah_dokumen = count($this->db->get_where('berkas', array('pengajuan_id' => $data['pengajuan']->id))->result());
    $persentase = number_format((float)$jumlah_dokumen != 0 ? $jumlah_dokumen / $jumlah_total_dokumen * 100 : 0, 2, '.', '');

	$prodi = $this->db->get_where('prodi', ['id' => $data['pengajuan']->prodi_id])->row();
	$fakultas = $this->db->get_where('fakultas', ['id' => $prodi->fakultas_id])->row();
	$fakultas_prodi = $fakultas->nama . ' - ' . $prodi->nama;

	$versi = $this->db->get_where('versi', ['id' => $data['pengajuan']->versi_id])->row();
	?>
	<?php
	if ($this->session->level != 3) {
		?>
		<a href="<?php echo base_url('pengajuan'); ?>" class="m-nav__link" data-toggle="m-tooltip" title="<?php echo $this->pustaka->tanggal_indo($data['pengajuan']->tanggal_pengajuan) . ' - ' . $fakultas_prodi . ' - ' . $data['pengajuan']->tahun_usulan . ' - ' . $versi->nama . ' (' . $versi->tahun . ')' . ' - ' . $persentase . '%'; ?>">
			<span class="m-nav__link-text">
				Pengajuan
			</span>
		</a>
		<?php
	} else {
		?>
		<a href="<?php echo base_url('pengajuan'); ?>" class="m-nav__link" data-toggle="m-tooltip" title="<?php echo $this->pustaka->tanggal_indo($data['pengajuan']->tanggal_pengajuan) . ' - ' . $data['pengajuan']->tahun_usulan . ' - ' . $versi->nama . ' (' . $versi->tahun . ')' . ' - ' . $persentase . '%'; ?>">
			<span class="m-nav__link-text">
				Pengajuan
			</span>
		</a>
		<?php
	}
	?>
</li>

<li class="m-nav__separator">
	-
</li>
<li class="m-nav__item">
	<a href="<?php echo base_url('detail_pengajuan/index/' . $data['pengajuan']->id); ?>" class="m-nav__link" data-toggle="m-tooltip" title="">
		<span class="m-nav__link-text">
			Detail Pengajuan
		</span>
	</a>
</li>