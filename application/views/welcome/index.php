<?php
if (isset($form)) {
	$id = $form->id;
	$npm = $form->npm;
	$nama = $form->nama;

	$url = "ubah";
} else {
	$id = null;
	$npm = null;
	$nama = null;

	$url = "tambah";
}
?>

<html>
	<head>
		<title>Mahasiswa API</title>
		
		<!-- jQuery -->
		<script
		  src="https://code.jquery.com/jquery-3.3.1.min.js"
		  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
		  crossorigin="anonymous"></script>

		<!-- SweetAlert -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
		
		<!-- bootstrap -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<!-- datatable -->
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" />
		<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>		

		<!-- font awesome -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
	</head>
	<body>
		<div class="container box">
			<h1 align="center">Mahasiswa API</h1>
			
			<form method="post" action="<?php echo base_url('welcome/' . $url); ?>">
				<div>
					<input type="hidden" name="id" value="<?php echo $id; ?>">
				</div>

				<div class="form-group">
				    <label for="npm">NPM</label>
				    <input type="number" name="npm" required class="form-control" id="npm" value="<?php echo $npm; ?>">
			    </div>
				<div class="form-group">
				    <label for="nama">NAMA</label>
				    <input type="text" name="nama" required class="form-control" id="nama" value="<?php echo $nama; ?>">
			    </div>
			    <input type="submit" class="btn btn-success" value="Simpan"></input>
			    <a href="<?php echo base_url(); ?>" class="btn btn-primary">Batal</a>
			</form>

			<br />

			<div class="table-responsive">
				<table id="mahasiswa" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>NPM</th>
							<th>Nama</th>
							<th>Proses</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($mahasiswa as $item) {
							?>
							<tr>
								<td><?php echo $item->npm; ?></td>
								<td><?php echo $item->nama; ?></td>
								<td>
									<a class="btn btn-info" href="<?php echo base_url('?id=' . $item->id); ?>">
										<i class="fa fa-pencil"></i>
									</a>
									<a class="btn btn-danger" onclick="hapus('<?php echo $item->id; ?>')">
										<i class="fa fa-trash"></i>
									</a>
								</td>
							</tr>
							<?php
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</body>
</html>

<script type="text/javascript">
$(document).ready(function() {
    $('table').DataTable();
} );

function hapus(id) {
	swal({
	  title: "Hapus",
	  text: "Apakah anda yakin ?",
	  icon: "warning",
	  buttons: true,
	  dangerMode: true,
	})
	.then((iya) => {
	  if (iya) {
	  	window.location = "<?php echo base_url('welcome/hapus/'); ?>" + id;
	  }
	});
}
</script>

<?php
if ($this->input->get('error') == "1") {
	?>
	<script type="text/javascript">
		swal("Error!", "NPM Sudah ada !!!", "error");
	</script>
	<?php
}
?>