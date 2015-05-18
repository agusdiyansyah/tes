<?php  
	/**
	* 
	Hello
	*/
	class Hell extends Loader
	{

		public function index()
		{
			$data = $this->model('hello/m_hello')->data();
			foreach ($data as $key) {
				echo $key['kategori'].'<br>';
			}
			echo "mantab";
		}

		
	}
?>