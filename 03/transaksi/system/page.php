<?php 
switch($_GET['p']){
case"beranda"	:	if(!file_exists("db/beranda.php")) die ("Halaman tidak ditemukan");
				include"db/beranda.php";
				break;
				break;
				
case"keluar"	:	if(!file_exists("db/keluar.php")) die ("Halaman tidak ditemukan");
				include"db/keluar.php";
				break;
				break;
				
case"categori"	:	if(!file_exists("categori.php")) die ("Halaman tidak ditemukan");
				include"categori.php";
				break;
				break;

case"input_kategori"	:	if(!file_exists("db/input_kategori.php")) die ("Halaman tidak ditemukan");
				include"db/input_kategori.php";
				break;
				break;
				
case"tampil_kategori"	:	if(!file_exists("db/tampil_kategori.php")) die ("Halaman tidak ditemukan");
				include"db/tampil_kategori.php";
				break;
				break;
				
case"edit_kategori"	:	if(!file_exists("db/edit_kategori.php")) die ("Halaman tidak ditemukan");
				include"db/edit_kategori.php";
				break;
				break;
				
case"hapus_kategori"	:	if(!file_exists("db/hapus_kategori.php")) die ("Halaman tidak ditemukan");
				include"db/hapus_kategori.php";
				break;
				break;
				
case"input_barang"	:	if(!file_exists("db/input_barang.php")) die ("Halaman tidak ditemukan");
				include"db/input_barang.php";
				break;
				break;
				
case"tampil_barang"	:	if(!file_exists("db/tampil_barang.php")) die ("Halaman tidak ditemukan");
				include"db/tampil_barang.php";
				break;
				break;
				
case"edit_barang"	:	if(!file_exists("db/edit_barang.php")) die ("Halaman tidak ditemukan");
				include"db/edit_barang.php";
				break;
				break;
				
case"hapus_barang"	:	if(!file_exists("db/hapus_barang.php")) die ("Halaman tidak ditemukan");
				include"db/hapus_barang.php";
				break;
				break;
				
case"tampil_anggota"	:	if(!file_exists("db/tampil_anggota.php")) die ("Halaman tidak ditemukan");
				include"db/tampil_anggota.php";
				break;
				break;
				
case"konfirmasi_anggota"	:	if(!file_exists("db/konfirmasi_anggota.php")) die ("Halaman tidak ditemukan");
				include"db/konfirmasi_anggota.php";
				break;
				break;
				
case"konfirmasi_pembelian"	:	if(!file_exists("db/konfirmasi_pembelian.php")) die ("Halaman tidak ditemukan");
				include"db/konfirmasi_pembelian.php";
				break;
				break;
				
case"tampil_transaksi"	:	if(!file_exists("db/tampil_transaksi.php")) die ("Halaman tidak ditemukan");
				include"db/tampil_transaksi.php";
				break;
				break;
				
case"terima_pembelian"	:	if(!file_exists("db/terima_pembelian.php")) die ("Halaman tidak ditemukan");
				include"db/terima_pembelian.php";
				break;
				break;
				
case"terima_anggota"	:	if(!file_exists("db/terima_anggota.php")) die ("Halaman tidak ditemukan");
				include"db/terima_anggota.php";
				break;
				break;
				
case"edit_anggota"	:	if(!file_exists("db/edit_anggota.php")) die ("Halaman tidak ditemukan");
				include"db/edit_anggota.php";
				break;
				break;
				
case"hapus_anggota"	:	if(!file_exists("db/hapus_anggota.php")) die ("Halaman tidak ditemukan");
				include"db/hapus_anggota.php";
				break;
				break;
				
case"home"	:	if(!file_exists("home.php")) die ("Halaman tidak ditemukan");
				include"home.php";
				break;
				break;
				
case"beli"	:	if(!file_exists("beli.php")) die ("Halaman tidak ditemukan");
				include"beli.php";
				break;
				break;
				
case"hasil"	:	if(!file_exists("hasil.php")) die ("Halaman tidak ditemukan");
				include"hasil.php";
				break;
				break;
				
case"daftar"	:	if(!file_exists("daftar.php")) die ("Halaman tidak ditemukan");
				include"daftar.php";
				break;
				break;
				
case"kategori"	:	if(!file_exists("kategori.php")) die ("Halaman tidak ditemukan");
				include"kategori.php";
				break;
				break;
				
case"produk_baru"	:	if(!file_exists("produk_baru.php")) die ("Halaman tidak ditemukan");
				include"produk_baru.php";
				break;
				break;
				
case"produk_ungulan"	:	if(!file_exists("produk_ungulan.php")) die ("Halaman tidak ditemukan");
				include"produk_ungulan.php";
				break;
				break;
				
case"keranjang_belanja"	:	if(!file_exists("keranjang_belanja.php")) die ("Halaman tidak ditemukan");
				include"keranjang_belanja.php";
				break;
				break;
				
case"histori_belanja"	:	if(!file_exists("histori_belanja.php")) die ("Halaman tidak ditemukan");
				include"histori_belanja.php";
				break;
				break;
				
case"hapus_pembelian"	:	if(!file_exists("hapus_pembelian.php")) die ("Halaman tidak ditemukan");
				include"hapus_pembelian.php";
				break;
				break;
				
case"tentang_kami"	:	if(!file_exists("tentang_kami.php")) die ("Halaman tidak ditemukan");
				include"tentang_kami.php";
				break;
				break;
				
case"tampil_author"	:	if(!file_exists("tampil_author.php")) die ("Halaman tidak ditemukan");
				include"tampil_author.php";
				break;
				break;
				
case"edit_author"	:	if(!file_exists("edit_author.php")) die ("Halaman tidak ditemukan");
				include"edit_author.php";
				break;
				break;
				
case"hapus_author"	:	if(!file_exists("hapus_author.php")) die ("Halaman tidak ditemukan");
				include"hapus_author.php";
				break;
				break;
}
?>