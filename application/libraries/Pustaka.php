<?php

class Pustaka {

	function tanggal_indo($tanggal) {
		return date("d-m-Y", strtotime($tanggal));
	}	

	function swal1($pesan) {
		?>
		<script type="text/javascript">
			swal("<?php echo $pesan; ?>");
		</script>
		<?php
	}

	function swal2($header, $pesan) {
		?>
		<script type="text/javascript">
			swal("<?php echo $header; ?>", "<?php echo $pesan; ?>");
		</script>
		<?php	
	}

	function swal3($header, $pesan, $status) {
		?>
		<script type="text/javascript">
			swal("<?php echo $header; ?>", "<?php echo $pesan; ?>", "<?php echo $status; ?>");
		</script>
		<?php		
	}
	 
}

?>