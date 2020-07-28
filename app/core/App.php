<?php
	
	class App{

		// set property default untuk controller, method, dan param
		protected $controller = 'Home';
		protected $method = 'index';
		protected $params = [];

		// constructor
		public function __construct(){

			// inisialisasi property 'url' dengan value yg dikirim oleh user melalui url
			$url = $this->parseURL();

			// periksa apakah urlnya kosong (tidak diinisialisasi oleh user)
			if ($url==null){
				$url = $this->controller;
			}

			// periksa apakah ada class(file) di dalam vendor 'app/controllers' yg sama dengan yg diketikkan user di url
			if (file_exists('../app/controllers/'.$url[0].'.php')){
					// tunjuk sebagai controller baru
					$this->controller = $url[0];
					unset($url[0]);
				}

			// panggil controller yg ditunjuk
			require_once '../app/controllers/'.$this->controller.'.php';
			// instansiasi class (controller) tersebut
			$this->controller = new $this->controller;

			// set method
			if (isset($url[1])){
				// periksa apakah method yg dimaksud ada dalam controller
				if(method_exists($this->controller, $url[1])){
					// tunjuk sebagai 'method' baru
					$this->method = $url[1];
					unset($url[1]);
				}
			}

			// // set parameter
			if (!empty($url)){
				// tunjuk sebagai parameter
				$this->params = array_values($url);
			}

			// jalankan controller, method, dan params (jika ada)
			call_user_func_array([$this->controller, $this->method], $this->params);
		}

		// parsing url
		public function parseURL(){

			// menangkap url yang diketikkan user
			if (isset($_GET['url'])){

				// menghapus karakter slash terakhir
				$url = rtrim($_GET['url'], '/');

				// membersihkan url dari karakter aneh
				$url = filter_var($url, FILTER_SANITIZE_URL);
				
				// memecah url berdasarkan delimiter slash
				$url = explode('/', $url);

				return $url;
			}
		}

	}