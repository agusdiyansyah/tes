<?php  
	/**
	* 
	Hello
	*/
	class Hello extends Controller
	{
		public function index($a = '')
		{
			$a['res'] = $this->model('m_hello')->data();
			
			var_dump($a);
			$this->view('v_hello',$a);
		}

		
	}
?>