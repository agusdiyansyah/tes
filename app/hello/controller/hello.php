<?php  
	/**
	* 
	Hello
	*/
	class Hello extends Controller
	{
		public function index($a = '')
		{

			$a = $this->model('m_hello')->data();
			$help = $this->model('help/m_help');
			$this->view('v_hello', $a);

		}
	}
?>