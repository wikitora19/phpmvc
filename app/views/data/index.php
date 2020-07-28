<div class="container mt-3">

	<div class="row">
		<div class="col-lg-6">
			<?php Flasher::flashMessage(); ?>
		</div>
	</div>

	<div class="row">
		<div class="col-6">
			<button type="button" class="btn btn-primary mb-3 tambahData"data-toggle="modal" data-target="#formModal">Tambah data</button>
			<h3>Daftar Mahasiswa</h3>
				<ul class="list-group">
					<?php foreach ($data['mhs'] as $d): ?>
			  	<li class="list-group-item">
			  		<?= $d['nama']; ?>
			  		<a href="<?= BASEURL; ?>/data/hapus/<?= $d['id']; ?>" class="badge badge-danger float-right ml-2" onclick="confirm('Yakin ingin menghapus data?');">hapus</a>
			  		<a href="<?= BASEURL; ?>/data/ubah/<?= $d['id']; ?>" class="badge badge-success float-right ml-2 modalUbah" data-toggle="modal" data-target="#formModal" data-id="<?= $d['id']; ?>">ubah</a>
			  		<a href="<?= BASEURL; ?>/data/detail/<?= $d['id']; ?>" class="badge badge-info float-right ml-2">detail</a>
			  	</li>
			  	<?php endforeach; ?>
				</ul>
		</div>
	</div>
</div>

<!-- modal form -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Tambah Data Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
     	</div>

		<div class="modal-body">
   	<form action="<?= BASEURL; ?>/data/tambah" method="post">
   		<input type="hidden" name="id" id="id">

        <div class="form-group">
			    <label for="nama">Nama</label>
			    <input type="text" class="form-control" id="nama" name="nama" autocomplete="off">
			  </div>

			  <div class="form-group">
			    <label for="npm">NPM</label>
			    <input type="number" class="form-control" id="npm" name="npm" autocomplete="off">
			  </div>

			  <div class="form-group">
			    <label for="email">Email</label>
			    <input type="email" class="form-control" id="email" name="email" autocomplete="off">
			  </div>
				
				<div class="form-group">
			    <label for="prodi">Prodi</label>
			    <select class="form-control" id="prodi" name="prodi">
			      <option value="Teknik Informatika">Teknik Informatika</option>
			      <option value="Teknik Sipil">Teknik Sipil</option>
			      <option value="Teknik Mesin">Teknik Mesin</option>
			      <option value="Teknik Pertambangan">Teknik Pertambangan</option>
			      <option value="Teknik Perikanan">Teknik Perikanan</option>
			    </select>
			  </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success mx-auto">Tambah data</button>
    </form>
    </div>

    </div>
  </div>
</div>