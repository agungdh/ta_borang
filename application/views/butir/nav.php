<div class="app-title">
  <div>
    <h1><i class="fa fa-users"></i> Butir</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item" data-toggle="tooltip" title="<?php echo $data['versi']->nama . ' (' . $data['versi']->tahun . ')'; ?>" style="cursor: pointer;" onclick="window.location = '<?php echo base_url(); ?>versi'">Standar Akreditasi</li>
    <li class="breadcrumb-item" data-toggle="tooltip" title="<?php echo $data['standar']->nomor . '. ' . $data['standar']->nama; ?>" style="cursor: pointer;" onclick="window.location = '<?php echo base_url(); ?>standar/index/<?php echo $data['versi']->id; ?>'">Standar</li>
    <li class="breadcrumb-item" data-toggle="tooltip" title="<?php echo $data['substandar']->nomor . '. ' . $data['substandar']->nama; ?>" style="cursor: pointer;" onclick="window.location = '<?php echo base_url(); ?>substandar/index/<?php echo $data['standar']->id; ?>'">Substandar</li>
    <li class="breadcrumb-item">Butir</li>
  </ul>
</div>
