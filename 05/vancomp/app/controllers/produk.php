<?php

Class produk extends controller{
	
		public function index(){
			
		}
		
		
		public function detail($id){
			
			global $db;
			
			$id = (int)$id;
			
			$produk = $db->prepare('SELECT * FROM `produk` WHERE `id` = :id');
			$produk->execute(array('id' => $id));
			$data_produk = $produk->fetch(PDO::FETCH_ASSOC);
			
			$kategori = $db->query('SELECT * FROM `kategori`');
			$data_kategori = $kategori->fetchAll(PDO::FETCH_ASSOC);
			
			$this->view('components/header');
			$this->view('widget/category', $data_kategori);
			$this->view('produk',$data_produk);
			$this->view('components/footer');
			
		}
}

?>