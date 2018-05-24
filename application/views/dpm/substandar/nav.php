<li class="m-nav__separator">
	-
</li>
<li class="m-nav__item">
	<a href="<?php echo base_url('dpm/borang'); ?>" class="m-nav__link" data-toggle="m-tooltip" title="<?php echo $data['borang']->nama . ' - ' . $data['borang']->tahun ?>">
		<span class="m-nav__link-text">
			Borang
		</span>
	</a>
</li>

<li class="m-nav__separator">
	-
</li>
<li class="m-nav__item">
	<a href="<?php echo base_url('dpm/tipeborang/index/' . $data['borang']->id); ?>" class="m-nav__link" data-toggle="m-tooltip" title="<?php echo $data['tipeborang']->tipe; ?>">
		<span class="m-nav__link-text">
			Tipe Borang
		</span>
	</a>
</li>

<li class="m-nav__separator">
	-
</li>
<li class="m-nav__item">
	<a href="<?php echo base_url('dpm/standar/index/' . $data['tipeborang']->id); ?>" class="m-nav__link" data-toggle="m-tooltip" title="<?php echo $data['standar']->nomor . ' ' . $data['standar']->nama; ?>">
		<span class="m-nav__link-text">
			Standar
		</span>
	</a>
</li>

<li class="m-nav__separator">
	-
</li>
<li class="m-nav__item">
	<a href="<?php echo base_url('dpm/substandar/index/' . $data['standar']->id); ?>" class="m-nav__link" data-toggle="m-tooltip">
		<span class="m-nav__link-text">
			Sub Standar
		</span>
	</a>
</li>