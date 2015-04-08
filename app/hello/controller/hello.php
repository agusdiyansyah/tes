<?php  
	/**
	* 
	Hello
	*/
	class Hello extends Loader
	{

		var $m_hello;

		function __construct() {
			$this->m_hello = $this->model('m_hello');
		}

		public function index()
		{
			$cat = $this->m_hello->data();
			var_dump($cat);
			$this->fun('sds');
			// echo $this->m_hello->kategori;
			// $a['data'] = array('nama' => 'agus diyansyah', );
			// $this->lib('coba');
			// echo $a->kategori;
			// var_dump($a);
			$this->view('v_hello', $cat);
		}

		
	}
?>