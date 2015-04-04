<?php  
	/**
	* 
	Hello
	*/
	class Hello extends Controller
	{
		public function index($a = '')
		{
			$data = $this->model('hello/M_HELLO')->data();
			var_dump($data);
			$this->view('hello/v_hello', $data);
		}
	}
?>