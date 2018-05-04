<li class="m-nav__separator">
	-
</li>
<li class="m-nav__item">
	<a href="<?php echo base_url('admin/fakultas'); ?>" class="m-nav__link" data-toggle="m-tooltip" title="<?php echo $data['fakultas']->nama; ?>">
		<span class="m-nav__link-text">
			Fakultas
		</span>
	</a>
</li>

<li class="m-nav__separator">
	-
</li>
<li class="m-nav__item">
	<a href="<?php echo base_url('admin/prodi/index/' . $data['fakultas']->id); ?>" class="m-nav__link" data-toggle="m-tooltip" title="">
		<span class="m-nav__link-text">
			Prodi
		</span>
	</a>
</li>