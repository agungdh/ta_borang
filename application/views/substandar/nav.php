<li class="m-nav__separator">
	-
</li>
<li class="m-nav__item">
	<a href="<?php echo base_url('versi'); ?>" class="m-nav__link" data-toggle="m-tooltip" title="<?php echo $data['versi']->nama . ' - ' . $data['versi']->tahun ?>">
		<span class="m-nav__link-text">
			Standar Akreditasi
		</span>
	</a>
</li>

<li class="m-nav__separator">
	-
</li>
<li class="m-nav__item">
	<a href="<?php echo base_url('standar/index/' . $data['versi']->id); ?>" class="m-nav__link" data-toggle="m-tooltip" title="<?php echo $data['standar']->nomor . ' ' . $data['standar']->nama; ?>">
		<span class="m-nav__link-text">
			Standar
		</span>
	</a>
</li>

<li class="m-nav__separator">
	-
</li>
<li class="m-nav__item">
	<a href="<?php echo base_url('substandar/index/' . $data['standar']->id); ?>" class="m-nav__link" data-toggle="m-tooltip">
		<span class="m-nav__link-text">
			Sub Standar
		</span>
	</a>
</li>