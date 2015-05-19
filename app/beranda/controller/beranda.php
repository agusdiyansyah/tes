<?php  
	/**
	* 
	*/
	class Beranda extends Loader
	{
		function index()
		{
			$this->view("beranda/beranda");
			echo $this->lib('coba')->tes("alsdjakl djaskdj");
		}
	}
?>