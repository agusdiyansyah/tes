<?php  
	/**
	* 
	*/
	class Beranda extends Loader
	{
		function index()
		{
			$this->fun('coba/coba');
			echo coba("function coba");
			$this->view("beranda/beranda");
			require APP . 'beranda/view/beranda.php';
		}
	}
?>