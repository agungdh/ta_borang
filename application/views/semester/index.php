<div class="app-title">
  <div>
    <h1><i class="fa fa-gears"></i> Semester</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item">Semester</li>
  </ul>
</div>

<form method="post" action="<?php echo base_url('semester/aksi_ubah'); ?>" enctype="multipart/form-data">

<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body">
        
          <h3 class="tile-title">Semester</h3>
          
          <input type="hidden" name="ganjil_awal" id="ganjil_awal">
          <input type="hidden" name="ganjil_akhir" id="ganjil_akhir">

          <input type="hidden" name="genap_awal" id="genap_awal">
          <input type="hidden" name="genap_akhir" id="genap_akhir">

          <div class="form-group">
            <label for="formControlRange">Ganjil: <valGanjil></valGanjil></label>
            <input type="range" class="form-control-range" min="1" max="12" value="<?php echo $data['semester'] != null ? $data['semester']->bulan : '1' ?>" id="formControlRange">
            <label for="formControlRange">Genap: <valGenap></valGenap></label>
          </div>

          </div>
          <div class="tile-footer">
            <button class="btn btn-primary simpan" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>
            &nbsp;&nbsp;&nbsp;
            <a class="btn btn-secondary" href="<?php echo base_url(); ?>"><i class="fa fa-fw fa-lg fa-times-circle"></i>Batal</a> <input type="submit" style="visibility: hidden;">
          </div>
    </div>
  </div>
</div>

</form>