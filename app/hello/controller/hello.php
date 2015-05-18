<?php  
	/**
	* 
	Hello
	*/
	class Hello extends Loader
	{

		public function index()
		{
			$this->module('help/help/coba/aku');
			echo "<br>";
			$data['a'] = $this->model('hello/m_hello')->data();
			$this->view('hello/v_hello', $data);
		}

		
	}
?>