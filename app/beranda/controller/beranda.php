<?php  
	/**
	* 
	*/
	class Beranda extends Loader
	{
		function index()
		{
			$this->view("beranda/beranda");
			$this->fun('coba');
			echo coba("function coba");
		}
	}
?>