<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <h3 class="tile-title">Tambah Standar</h3>
      <div class="tile-body">
        <form method="post" action="<?php echo base_url('standar/aksi_tambah'); ?>">
          
          <input type="hidden" name="data[versi_id]" value="<?php echo $data['versi']->id; ?>">

          <div class="form-group">
            <label class="control-label">Nomor</label>
            <input class="form-control" type="number" min="1" max="100" required placeholder="Masukan Nomor" name="data[nomor]">
          </div>

          <div class="form-group">
            <label class="control-label">Nama</label>
            <input class="form-control" type="text" required placeholder="Masukan Nama" name="data[nama]">
          </div>
          
          </div>
          <div class="tile-footer">
            <button id="simpan" class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>
            &nbsp;&nbsp;&nbsp;
            <a class="btn btn-secondary" href="<?php echo base_url('standar/index/' . $data['versi']->id); ?>"><i class="fa fa-fw fa-lg fa-times-circle"></i>Batal</a> <input type="submit" style="visibility: hidden;">
          </div>
        </form>
    </div>
  </div>
</div>