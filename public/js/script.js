
$(function(){

	$('.tambahData').on('click', function(){
		$('#formModalLabel').html('Tambah Data Mahasiswa');
		$('.modal-footer button[type=submit]').html('Tambah Data');
	});

	$('.modalUbah').on('click', function(){
		
		$('#formModalLabel').html('Ubah Data Mahasiswa');
		$('.modal-footer button[type=submit]').html('Ubah Data');
		$('.modal-body form').attr('action', 'http://localhost/php/mvc/first/public/data/ubah');
		
		const id = $(this).data('id');

		$.ajax({
			url: 'http://localhost/php/mvc/first/public/data/getubah',
			data: {id : id},
			method: 'post',
			dataType: 'json',
			success: function(data){
				$('#nama').val(data.nama);
				$('#npm').val(data.npm);
				$('#email').val(data.email);
				$('#prodi').val(data.prodi);
				$('#id').val(data.id);
			}
		});

	});

});