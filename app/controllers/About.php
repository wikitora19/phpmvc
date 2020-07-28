<?php
	
	Class About extends Controller{

		public function index($param1='p1', $param2='p2'){
			$data['data1'] = $param1;
			$data['data2'] = $param2;
			$data['judul'] = 'About';
			$data['nama'] = $this->model('User_m')->getUser();
			$this->view('templates/header', $data);
			$this->view('about/index', $data);
			$this->view('templates/footer');
		}

		public function page(){
			$data['judul'] = 'Pages';
			$this->view('templates/header', $data);
			$this->view('about/page', $data);
			$this->view('templates/footer');
		}

	}