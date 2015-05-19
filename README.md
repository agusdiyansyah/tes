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
	* 
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
<h2 id="controller">Model</h2>
Class model
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
Penggunaannya pada controller
```sh
<?php  
	/**
	* 
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
Result
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
