<?php

Class user extends controller{
	
		public function index(){
			header('location:home/index');
		}
		
		public function logout(){
			session_destroy();
			header('location:http://localhost/vancomp/home/index');
		}
		
		public function register(){
			global $db;
			
			$kategori = $db->query('SELECT * FROM `kategori`');
			$data_kategori = $kategori->fetchAll(PDO::FETCH_ASSOC);
			
		
			$this->view('components/header');
			$this->view('widget/category', $data_kategori);
			$this->view('index',$data_produk, $data_halaman);
			$this->view('components/footer');
		}
		
		public function keranjang(){
			session_destroy();
			header('location:http://localhost/vancomp/home/index');
		}
		
}

?>