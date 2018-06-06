<div class="app-title">
  <div>
    <h1><i class="fa fa-users"></i> Tingkat</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item">Tingkat</li>
  </ul>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <h3 class="tile-title">Ubah Tingkat</h3>
      <div class="tile-body">
        <form method="post" action="<?php echo base_url('tingkat/aksi_ubah'); ?>">
          
          <input type="hidden" name="where[id]" value="<?php echo $data['tingkat']->id; ?>">

          <div class="form-group">
            <label class="control-label">Tingkat</label>
            <input class="form-control" type="text" required placeholder="Masukan Tingkat" name="data[tingkat]" value="<?php echo $data['tingkat']->tingkat; ?>">
          </div>
          
          </div>
          <div class="tile-footer">
            <button id="simpan" class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>
            &nbsp;&nbsp;&nbsp;
            <a class="btn btn-secondary" href="<?php echo base_url('tingkat'); ?>"><i class="fa fa-fw fa-lg fa-times-circle"></i>Batal</a> <input type="submit" style="visibility: hidden;">
          </div>
        </form>
    </div>
  </div>
</div>