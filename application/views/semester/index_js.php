<script type="text/javascript">
function stringBulan($int) {
	var bulan = [
		null,
		'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	];

	return bulan[$int];
}

$(function() {
	geser();
});

$('.simpan').click(function(){
  $("input[type='submit']").click();
});

$("#formControlRange").on('input', function() {
	geser();
});

function geser() {
	var nilai = $("#formControlRange").val();

	nilai2 = nilai;

	for (var i = 1; i <= 5; i++) {
		if (nilai2 == 12) {
			nilai2 = 1;
		} else {
			nilai2++;
		}
	}

	$("valGanjil").text(stringBulan(nilai) + ' - ' + stringBulan(nilai2));
	$("#ganjil_awal").val(nilai);
	$("#ganjil_akhir").val(nilai2);


	if (nilai2 == 12) {
		nilai3 = 1;
	} else {
		nilai3 = nilai2 + 1;
	}

	nilai4 = nilai3;

	for (var i = 1; i <= 5; i++) {
		if (nilai4 == 12) {
			nilai4 = 1;
		} else {
			nilai4++;
		}
	}	

	$("valGenap").text(stringBulan(nilai3) + ' - ' + stringBulan(nilai4));
	$("#genap_awal").val(nilai3);
	$("#genap_akhir").val(nilai4);
}

$('form').submit(function(e) {
  e.preventDefault();
  
  $.ajax({
    url: "<?php echo base_url('semester/aksi_ubah'); ?>",
    type: 'post',
    data: $('form').serialize(),
    success: function(respone){ 
      respon = JSON.parse(respone);

      if (respon.success == true) {
        swal('Berhasil !!!', 'Berhasil Simpan !!!', 'success');
      } else {
        swal('ERROR !!!', 'Ada Kesalahan !!!', 'error');
      }
    },
    error: function(respone){
      swal('ERROR !!!', 'Ada Kesalahan !!!', 'error');
    }
  });
});
</script>