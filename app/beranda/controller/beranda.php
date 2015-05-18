<?php  
	/**
	* 
	*/
	class Beranda extends Loader
	{
		function index()
		{
			$this->view('beranda/beranda');
			$a = $this->module('hello');
		}
	}
?>