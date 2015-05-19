<h2>Struktur File</h2>
<b>Q/</b><br>
|___ <a href="#app">app/</a><br>
|___ |___ <a href="#module">module/</a><br>
|___ |___ |___ <a href="#controller">controller/</a><br>
|___ |___ |___ <a href="#model">model/</a><br>
|___ |___ |___ <a href="#view">view/</a><br>
|___ <a href="#engine">engine/</a><br>
|___ |___ <a href="#core">core/</a><br>
|___ |___ <a href="#function">function/</a><br>
|___ |___ <a href="#library">library/</a><br>
|___ <a href="#gudang">gudang/</a><br>
<h2 id="controller">Controller</h2>
```sh
<?php  
	/**
	CONTROLLER
	*/
	class Beranda extends Loader
	{
		function index()
		{
			$this->view("beranda/beranda");
		}
	}
?>
```
<h2 id="model">Model</h2>
<a href="https://bitbucket.org/getvivekv/php-mysqli-class">Active record mysqli class</a>
<br>
<b>Class model</b>
```sh
<?php  
	/**
	* 
	*/
	class M_beranda extends Model
	{
		function get()
		{
			return $this->select()->from('kategori')->fetch();
		}
	}
?>
```
<b>Penggunaannya pada controller</b>
```sh
<?php  
	/**
	CONTROLLER
	*/
	class Beranda extends Loader
	{
		function index()
		{
			$data = $this->model("beranda/m_beranda")->get();
			var_dump($data);
		}
	}
?>
```
<b>Result</b>
```sh
array (size=2)
  0 => 
    array (size=3)
      'id_kategori' => string '1' (length=1)
      'kategori' => string 'membaca' (length=7)
      'deskripsi' => string 'semua hal tentang membaca' (length=25)
  1 => 
    array (size=3)
      'id_kategori' => string '2' (length=1)
      'kategori' => string 'menulis' (length=7)
      'deskripsi' => string 'semua hal tentang menulis' (length=25)
```
<h2 id="view">View</h2>
Untuk memparsing data dari model, dapat menggunakan contoh model sebelumnya dengan menambahkan beberapa fungsi tambahan <br>
<b>Class controller</b>
```sh
<?php  
	/**
	CONTROLLER
	*/
	class Beranda extends Loader
	{
		function index()
		{
			$data['kategori'] = $this->model("beranda/m_beranda")->get();
			$this->view("beranda/v_beranda" , $data);
		}
	}
?>
```
<b>View</b><br>
```sh
<?php  
	foreach ($kategori as $key) {
		echo $key["deskripsi"] . "<br>";
	}
?>
```
<b>Result</b>
```sh
semua hal tentang membaca
semua hal tentang menulis
```
<h2 id="function">Function</h2>
Pembuatan function sama dengan pembuatan function biasa, untuk memanggil function dapat dengan menggunakan kode berikut
```sh
$this->fun("nama_function");
nama_function();
```
Kode fungsi tambahan dapat disimpan didalam folder function yang terdapat pada folder engine
<br><b>Function</b>
```sh
<?php  
	function coba($a = '')
	{
		return "Berhasil ".$a;
	}
?>
```
<b>Controller</b>
```sh
<?php  
	/**
	CONTROLLER
	*/
	class Beranda extends Loader
	{
		function index()
		{
			$this->fun("coba");
			echo coba("hehe");
		}
	}
?>
```
<h2 id="library">Library</h2>
untuk membuat librari juga tidak berbeda dengan embuat class seperti biasa pada class php, berikut cara yang digunkaan untuk memanggil libray
```sh
$this->lib("nama_library")->function();
```
library tambahan dapat disimpan didalam folder library yang terdapat didalam folder engine <br>
<b>Contoh Library</b>
```sh
<?php 

/**
* 
Coba
*/
class Coba
{
	function tes($a = "")
	{
		return "berhasil ".$a;
	}
}
?>
```
<b>Controller</b>
```sh
<?php  
	/**
	CONTROLLER
	*/
	class Beranda extends Loader
	{
		function index()
		{
			echo $this->lib("coba")->tes("heheheh");
		}
	}
?>
```
