<li class="m-nav__separator">
	-
</li>
<li class="m-nav__item">
	<a href="<?php echo base_url('admin/standar_akreditasi'); ?>" class="m-nav__link" data-toggle="m-tooltip" title="<?php echo $data['standar_akreditasi']->nama . ' - ' . $data['standar_akreditasi']->tahun ?>">
		<span class="m-nav__link-text">
			Standar Akreditasi
		</span>
	</a>
</li>

<li class="m-nav__separator">
	-
</li>
<li class="m-nav__item">
	<a href="<?php echo base_url('admin/standar/index/' . $data['standar_akreditasi']->id); ?>" class="m-nav__link" data-toggle="m-tooltip">
		<span class="m-nav__link-text">
			Standar
		</span>
	</a>
</li>