<?php

	Class Data_m{

		private $table = 'mahasiswa';
		private $db;

		public function __construct(){
			$this->db = new Database;
		}

		public function getDataMhs(){
			$this->db->query("SELECT * FROM {$this->table} GROUP BY nama ASC");
			return $this->db->resultSet();
		}

		public function getDataById($id){
			$this->db->query("SELECT * FROM {$this->table} WHERE id=:id");
			$this->db->bind('id', $id);
			return $this->db->singleSet();
		}

		public function tambahData($data){
			
			$query = "INSERT INTO {$this->table} VALUES 
							('', :nama, :npm, :email, :prodi)";
			$this->db->query($query);

			$this->db->bind('nama', $data['nama']);
			$this->db->bind('npm', $data['npm']);
			$this->db->bind('email', $data['email']);
			$this->db->bind('prodi', $data['prodi']);

			$this->db->execute();

			return $this->db->rowCount();
		}

		public function hapusData($id){
			$query = "DELETE FROM {$this->table} WHERE id=:id";
			$this->db->query($query);
			$this->db->bind('id', $id);

			$this->db->execute();

			return $this->db->rowCount();	
		}

		public function ubahData($data){
			
			$query = "UPDATE {$this->table} SET 
							nama=:nama, npm=:npm, email=:email, prodi=:prodi WHERE id=:id";

			$this->db->query($query);
			$this->db->bind('nama', $data['nama']);
			$this->db->bind('npm', $data['npm']);
			$this->db->bind('email', $data['email']);
			$this->db->bind('prodi', $data['prodi']);
			$this->db->bind('id', $data['id']);

			$this->db->execute();

			return $this->db->rowCount();
		}

	} 
