<?php

	Class Data extends Controller{
		
		public function index(){
			$data['judul'] = 'Data Mahasiswa';
			$data['mhs'] = $this->model('Data_m')->getDataMhs();
			$this->view('templates/header', $data);
			$this->view('data/index', $data);
			$this->view('templates/footer');
		}

		public function detail($id){
			$data['judul'] = 'Data Mahasiswa';
			$data['mhs'] = $this->model('Data_m')->getDataById($id);
			$this->view('templates/header', $data);
			$this->view('data/detail', $data);
			$this->view('templates/footer');
		}

		public function tambah(){
			if ($this->model('Data_m')->tambahData($_POST)>0){
				Flasher::setFlash('berhasil', 'ditambahkan', 'success');
				header('Location: '.BASEURL.'/data');
				exit;
			}else{
				Flasher::setFlash('gagal', 'ditambahkan', 'danger');
				header('Location: '.BASEURL.'/data');
				exit;
			}
		}

		public function hapus($id){
			if ($this->model('Data_m')->hapusData($id)>0){
				Flasher::setFlash('berhasil', 'dihapus', 'success');
				header('Location: '.BASEURL.'/data');
				exit;
			}else{
				Flasher::setFlash('gagal', 'dihapus', 'danger');
				header('Location: '.BASEURL.'/data');
				exit;
			}
		}

		public function getubah(){
			echo(json_encode($this->model('Data_m')->getDataById($_POST['id'])));
		}

		public function ubah(){
			if ($this->model('Data_m')->ubahData($_POST)>0){
				Flasher::setFlash('berhasil', 'diubah', 'success');
				header('Location: '.BASEURL.'/data');
				exit;
			}else{
				Flasher::setFlash('gagal', 'diubah', 'danger');
				header('Location: '.BASEURL.'/data');
				exit;
			}
		}

	}

