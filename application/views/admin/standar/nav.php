<li class="m-nav__separator">
	-
</li>
<li class="m-nav__item">
	<a href="<?php echo base_url('admin/versi'); ?>" class="m-nav__link" data-toggle="m-tooltip" title="<?php echo $data['versi']->nama . ' - ' . $data['versi']->tahun ?>">
		<span class="m-nav__link-text">
			Standar Akreditasi
		</span>
	</a>
</li>

<li class="m-nav__separator">
	-
</li>
<li class="m-nav__item">
	<a href="<?php echo base_url('admin/standar/index/' . $data['versi']->id); ?>" class="m-nav__link" data-toggle="m-tooltip">
		<span class="m-nav__link-text">
			Standar
		</span>
	</a>
</li>