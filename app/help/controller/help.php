<?php  
	/**
	* 
	Help
	*/
	class Help extends Loader
	{
		public function index()
		{
			echo "here we are on help module";
		}

		public function coba($value='')
		{
			echo " | this is on inside help controller with params " .$value;
		}
	}
?>