<?php

Class home extends controller{
	
		public function index(){
			global $db;
			
			$produk = $db->query('SELECT * FROM `produk`');
			$data_produk = $produk->fetchAll(PDO::FETCH_ASSOC);
			
			$kategori = $db->query('SELECT * FROM `kategori`');
			$data_kategori = $kategori->fetchAll(PDO::FETCH_ASSOC);
			
			$data_halaman = array(
				'judul' => 'Produk Terbaru'
			);
		
			$this->view('components/header');
			$this->view('widget/category', $data_kategori);
			$this->view('index',$data_produk, $data_halaman);
			$this->view('components/footer');
		}
		
		public function kategori($id){
			global $db;
			
			$produk = $db->prepare('SELECT * FROM `produk` WHERE `kategori` = :id');
			$produk->execute(array('id' => $id));
			$data_produk = $produk->fetchAll(PDO::FETCH_ASSOC);
			
			$kategori = $db->query('SELECT * FROM `kategori`');
			$data_kategori = $kategori->fetchAll(PDO::FETCH_ASSOC);
			
			$q = $db->prepare('SELECT * FROM `kategori` WHERE `id` = :id');
			$q->execute(array('id' => $id));
			$judul = $q->fetch(PDO::FETCH_ASSOC);
			
			$data_halaman = array(
				'judul' => $judul['kategori']
			);
			
			$this->view('components/header');
			$this->view('widget/category', $data_kategori);
			$this->view('index',$data_produk, $data_halaman);
			$this->view('components/footer');
		}
		
		public function search(){
			global $db;
			
			if(!isset($_POST['search'])){
				header('location:http://localhost/vancomp/');
			}else{
			
			$query = $_POST['search'];
			
			$produk = $db->prepare('SELECT * FROM `produk` WHERE `nama` LIKE :id');
			$produk->execute(array('id' => '%' . $query . '%'));
			
			$data_produk = $produk->fetchAll(PDO::FETCH_ASSOC);
			
			$kategori = $db->query('SELECT * FROM `kategori`');
			$data_kategori = $kategori->fetchAll(PDO::FETCH_ASSOC);
			
			$data_halaman = array(
				'judul' => 'Hasil Pencarian Untuk Kata "' . $query . '"'
			);
		
			$this->view('components/header');
			$this->view('widget/category', $data_kategori);
			$this->view('search',$data_produk, $data_halaman);
			$this->view('components/footer');
			}
		}
	
}

?>