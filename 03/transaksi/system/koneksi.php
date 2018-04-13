<?php error_reporting(0); ?>
<?php 
class koneksi{
	function konek(){
		$conn=mysql_connect("localhost","root","");
		$db=mysql_select_db("transaksi");
	}
	
	function input_author(){
		@$nama=$_POST['nama'];
		@$email=$_POST['email'];
		@$pass=$_POST['pass'];
		@$foto="img/".$_FILES['foto']['name'];
		if($nama==""){
			echo"<script>alert('Masukan Nama');</script>";
		}else if($email==""){
			echo"<script>alert('Masukan Email');</script>";
		}else if($pass==""){
			echo"<script>alert('Masukan Password');</script>";
		}else if($foto=="img/"){
			echo"<script>alert('Masukan Foto');</script>";
		}else{
			$query=mysql_query("insert into author (nama,email,pass,foto,ket,konfirmasi) values ('$nama','$email','$pass','$foto','Tidak Aktif','No')");
			$cek=move_uploaded_file($_FILES['foto']['tmp_name'],$foto);
			echo"<script>alert('Tunggu Konfirmasi dari Admin');document.location='?p=home';</script>";
		}
	}
	
	function login(){
		@$email=$_POST['email'];
		@$pass=$_POST['pass'];
		$query=mysql_query("select * from author where email='$email' and pass='$pass' ");
		$array=mysql_fetch_array($query);
		if($email==""){
			echo"<script>alert('Masukan Email');</script>";
		}else if($pass==""){
			echo"<script>alert('Masukan Password');</script>";
		}else if($email=$array['email'] and $pass==$array['pass'] and $array['konfirmasi']=="No"){
			echo"<script>alert('Tunggu Konfirmasi dari admin');</script>";
		}else if($email=$array['email'] and $pass==$array['pass'] and $array['konfirmasi']=="Yes"){
			session_start();
			$_SESSION['nama']=$array['nama'];
			$_SESSION['id_author']=$array['id_author'];
			$query=mysql_query("update author set ket='Aktif' where id_author='$_SESSION[id_author]' ");
			echo"<script>alert('Selamat datang $_SESSION[nama]');document.location='index.php';</script>";
		}else{
			echo"<script>alert('Email / Password anda salah');</script>";
		}
	}
	
	function input_kategori(){
	@$kategori=$_POST['kategori'];
	@$sampul="img/".$_FILES['sampul']['name'];
	if($kategori==""){
		echo"<script>alert('Masukan Kategori');</script>";
	}else if($sampul=="img/"){
		echo"<script>alert('Masukan Sampul');</script>";
	}else{
		$query=mysql_query("insert into kategori (categori,sampul) values ('$kategori','$sampul')");
		$cek=move_uploaded_file($_FILES['sampul']['tmp_name'], $sampul);
		echo"<script>document.location='?p=tampil_kategori';</script>";
	}
	}
	
	function tampil_kategori(){
		error_reporting(0);
		$query=mysql_query("select * from kategori");
		while($array=mysql_fetch_array($query))
		$data[]=$array;
		return $data;
	}
	
	function select_kategori(){
		$id=$_REQUEST['id'];
		$query=mysql_query("select * from kategori where id_kategori='$id' ");
		$array=mysql_fetch_array($query);
		$data[]=$array;
		return $data;
	}
	
	function edit_kategori(){
		@$id=$_REQUEST['id'];
		@$kategori=$_POST['kategori'];
		@$sampul="img/".$_FILES['sampul']['name'];
		if($kategori==""){
			echo"<script>alert('Masukan Kategori');</script>";
		}else if($sampul=="img/"){
			echo"<script>alert('Masukan Sampul');</script>";
		}else{
			$query=mysql_query("update kategori set categori='$kategori', sampul='$sampul' where id_kategori='$id' ");
			$cek=move_uploaded_file($_FILES['sampul']['tmp_name'], $sampul);
			echo"<script>document.location='?p=tampil_kategori';</script>";
		}
	}
	
	function hapus_kategori(){
		@$id=$_REQUEST['id'];
		$query=mysql_query("delete from kategori where id_kategori='$id' ");
		echo"<script>document.location='?p=tampil_kategori';</script>";
	}
	
	function input_barang(){
		@$nama=$_POST['nama'];
		@$kategori=$_POST['kategori'];
		@$harga=$_POST['harga'];
		@$gambar="img/".$_FILES['gambar']['name'];
		@$spesifikasi=$_POST['spesifikasi'];
		if($kategori==0){
			echo"<script>alert('Masukan Kategori');</script>";
		}else if($nama==""){
			echo"<script>alert('Masukan Nama Barang');</script>";
		}else if($harga==""){
			echo"<script>alert('Masukan Harga');</script>";
		}else if($gambar=="img/"){
			echo"<script>alert('Masukan Gambar');</script>";
		}else if($spesifikasi==""){
			echo"<script>alert('Masukan Spesifikasi Barang');</script>";
		}else{
			$query=mysql_query("insert into barang (id_kategori,nama_barang,harga,gambar,spesifikasi) values ('$kategori','$nama','$harga','$gambar','$spesifikasi') ");
			$cek=move_uploaded_file($_FILES['gambar']['tmp_name'], $gambar);
			echo"<script>document.location='?p=tampil_barang';</script>";
		}
	}
	
	function tampil_barang(){
		error_reporting(0);
		$query=mysql_query("select * from barang,kategori where barang.id_kategori=kategori.id_kategori");
		while($array=mysql_fetch_array($query))
		$data[]=$array;
		return $data;
	}
	
	function select_barang(){
		@$id=$_REQUEST['id'];
		$query=mysql_query("select * from barang,kategori where barang.id_kategori=kategori.id_kategori and barang.id_barang=$id");
		$array=mysql_fetch_array($query);
		$data[]=$array;
		return $data;
	}
	
	function  edit_barang(){
		@$id=$_REQUEST['id'];
		@$nama=$_POST['nama'];
		@$kategori=$_POST['kategori'];
		@$harga=$_POST['harga'];
		@$gambar="img/".$_FILES['gambar']['name'];
		@$spesifikasi=$_POST['spesifikasi'];
		if($kategori==0){
			echo"<script>alert('Masukan Kategori');</script>";
		}else if($nama==""){
			echo"<script>alert('Masukan Nama Barang');</script>";
		}else if($harga==""){
			echo"<script>alert('Masukan Harga');</script>";
		}else if($gambar=="img/"){
			echo"<script>alert('Masukan Gambar');</script>";
		}else if($spesifikasi==""){
			echo"<script>alert('Masukan Spesifikasi Barang');</script>";
		}else{
			$query=mysql_query("update barang set id_kategori='$kategori', nama_barang='$nama', harga='$harga', gambar='$gambar', spesifikasi='$spesifikasi' where id_barang='$id'");
			$cek=move_uploaded_file($_FILES['gambar']['tmp_name'], $gambar);
			echo"<script>document.location='?p=tampil_barang';</script>";
		}
	}
	
	function hapus_barang(){
		@$id=$_REQUEST['id'];
		$query=mysql_query("delete from barang where id_barang='$id' ");
		echo"<script>document.location='?p=tampil_barang';</script>";
	}
	
	function tampil_anggota(){
		error_reporting(0);
		$query=mysql_query("select * from author where konfirmasi='Yes' ");
		while($array=mysql_fetch_array($query))
		$data[]=$array;
		return $data;
	}
	
	function select_anggota(){
		$query=mysql_query("select * from author where id_author='$_SESSION[id_author]' ");
		$array=mysql_fetch_array($query);
		$data[]=$array;
		return $data;
	}
	
	function edit_anggota(){
		@$id=$_REQUEST['id'];
		@$nama=$_POST['nama'];
		@$email=$_POST['email'];
		@$pass=$_POST['pass'];
		@$foto="img/".$_FILES['foto']['name'];
		$select=mysql_query("select * from konfimasi");
		$array=mysql_fetch_array($select);
		$jumlah=$array['jumlah'] + 1;
		if($nama==""){
			echo"<script>alert('Masukan Nama');</script>";
		}else if($email==""){
			echo"<script>alert('Masukan Email');</script>";
		}else if($pass==""){
			echo"<script>alert('Masukan Password');</script>";
		}else if($foto=="img/"){
			echo"<script>alert('Masukan Foto');</script>";
		}else{
			$query=mysql_query("update author set nama='$nama', email='$email', pass='$pass', foto='$foto' where id_author='$id' ");
			$cek=move_uploaded_file($_FILES['foto']['tmp_name'],$foto);
			echo"<script>document.location='?p=tampil_anggota';</script>";
		}
	}
	
	function hapus_anggota(){
		@$id=$_REQUEST['id'];
		$query=mysql_query("delete from author where id_author='$id' ");
		session_unset('id_author');
		echo"<script>document.location='index.php';</script>";
	}
	
	function keluar(){
		$query=mysql_query("update author set ket='Tidak Aktif' where id_author='$_SESSION[id_author]' ");
		session_unset('id_author');
		echo"<script>document.location='index.php';</script>";
	}
	
	function home(){
		error_reporting(0);
		$query=mysql_query("select * from barang,kategori where barang.id_kategori=kategori.id_kategori order by id_barang desc limit 0,3");
		while($array=mysql_fetch_array($query))
		$data[]=$array;
		return $data;
	}
	
	function produk_baru(){
		error_reporting(0);
		$query=mysql_query("select * from barang,kategori where barang.id_kategori=kategori.id_kategori order by id_barang asc limit 0,99999");
		while($array=mysql_fetch_array($query))
		$data[]=$array;
		return $data;
	}
	
	function produk_ungulan(){
		error_reporting(0);
		$query=mysql_query("select * from barang,kategori where barang.id_kategori=kategori.id_kategori and barang.suka>=1 ");
		while($array=mysql_fetch_array($query))
		$data[]=$array;
		return $data;
	}
	
	function select_categori(){
		@$id=$_REQUEST['id'];
		$query=mysql_query("select * from barang,kategori where barang.id_kategori=kategori.id_kategori and barang.id_kategori=$id");
		while($array=mysql_fetch_array($query))
		$data[]=$array;
		return $data;
	}
	
	function input_pembelian(){
		@$id=$_REQUEST['id'];
		@$tanggal=date("d-m-Y");
		$select=mysql_query("select * from barang where id_barang='$id' ");
		$array=mysql_fetch_array($select);
		$jumlah=$array['suka'] + 1;
		if(!isset($_SESSION['id_author'])){
			echo"<script>alert('Anda harus login terlebih dahulu');document.location='?p=home';</script>";
		}else{
			$query=mysql_query("insert into pembelian (id_barang,id_author,id_status,tanggal) values ('$id','$_SESSION[id_author]','0','$tanggal') ");
			$query1=mysql_query("update barang set suka='$jumlah' where id_barang='$id' ");
			echo"<script>alert('Terima kasih');document.location='?p=keranjang_belanja';</script>";
		}
	}
	
	function hapus_pembelian(){
		@$id=$_REQUEST['id'];
		$query=mysql_query("delete from pembelian where id_pembelian='$id' ");
		echo"<script>document.location='?p=keranjang_belanja';</script>";
	}
	
	function konfirmasi_anggota(){
		error_reporting(0);
		$query=mysql_query("select * from author where konfirmasi='No' ");
		while($array=mysql_fetch_array($query))
		$data[]=$array;
		return $data;
	}
	
	function terima_anggota(){
		@$id=$_REQUEST['id'];
		$query=mysql_query("update author set konfirmasi='Yes' where id_author='$id' ");
		echo"<script>document.location='?p=tampil_anggota';</script>";
	}
	
	function keranjang_belanja(){
		error_reporting(0);
		$query=mysql_query("select * from pembelian,author,barang,kategori where pembelian.id_author=author.id_author and pembelian.id_barang=barang.id_barang and barang.id_kategori=kategori.id_kategori and pembelian.id_author=$_SESSION[id_author] and pembelian.id_status=0");
		while($array=mysql_fetch_array($query))
		$data[]=$array;
		return $data;
	}
	
	function histori_belanja(){
		error_reporting(0);
		$query=mysql_query("select * from pembelian,author,barang,kategori where pembelian.id_author=author.id_author and pembelian.id_barang=barang.id_barang and barang.id_kategori=kategori.id_kategori and pembelian.id_author=$_SESSION[id_author] and pembelian.id_status=2");
		while($array=mysql_fetch_array($query))
		$data[]=$array;
		return $data;
	}
	
	function konfirmasi_pembelian(){
		error_reporting(0);
		$query=mysql_query("select * from pembelian,author,barang,kategori where pembelian.id_author=author.id_author and pembelian.id_barang=barang.id_barang and barang.id_kategori=kategori.id_kategori and pembelian.id_status=1");
		while($array=mysql_fetch_array($query))
		$data[]=$array;
		return $data;
	}
	
	function tampil_transaksi(){
		error_reporting(0);
		$query=mysql_query("select * from pembelian,author,barang,kategori where pembelian.id_author=author.id_author and pembelian.id_barang=barang.id_barang and barang.id_kategori=kategori.id_kategori and pembelian.id_status=2");
		while($array=mysql_fetch_array($query))
		$data[]=$array;
		return $data;
	}
	
	function cek(){
		error_reporting(0);
		$id=$_REQUEST['id'];
		$update=mysql_query("update pembelian set id_status='1' where id_pembelian='$id' ");
		$query=mysql_query("select * from pembelian,author,barang,kategori where pembelian.id_author=author.id_author and pembelian.id_barang=barang.id_barang and barang.id_kategori=kategori.id_kategori and pembelian.id_pembelian=$id");
		while($array=mysql_fetch_array($query))
		$data[]=$array;
		return $data;
	}
	
	function edit_author(){
		@$id=$_REQUEST['id'];
		@$nama=$_POST['nama'];
		@$email=$_POST['email'];
		@$pass=$_POST['pass'];
		@$foto="img/".$_FILES['foto']['name'];
		$select=mysql_query("select * from konfimasi");
		$array=mysql_fetch_array($select);
		$jumlah=$array['jumlah'] + 1;
		if($nama==""){
			echo"<script>alert('Masukan Nama');</script>";
		}else if($email==""){
			echo"<script>alert('Masukan Email');</script>";
		}else if($pass==""){
			echo"<script>alert('Masukan Password');</script>";
		}else if($foto=="img/"){
			echo"<script>alert('Masukan Foto');</script>";
		}else{
			$query=mysql_query("update author set nama='$nama', email='$email', pass='$pass', foto='$foto' where id_author='$id' ");
			$cek=move_uploaded_file($_FILES['foto']['tmp_name'],$foto);
			echo"<script>document.location='?p=tampil_anggota';</script>";
		}
	}
	
	function hapus_author(){
		@$id=$_REQUEST['id'];
		$query=mysql_query("delete from author where id_author='$id' ");
		session_unset('id_author');
		echo"<script>document.location='index.php';</script>";
	}
	
	function terima_pembelian(){
		$id=$_REQUEST['id'];
		$query=mysql_query("update pembelian set id_status='2' where id_pembelian='$id' ");
		echo"<script>document.location='?p=tampil_transaksi';</script>";
	}
}
?>