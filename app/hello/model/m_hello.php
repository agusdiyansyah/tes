<?php 
	/**
	* 
	Model
	*/
	class M_hello extends Model
	{
		public function data()
		{
			return $this->get_row('kategori');
		}
		public function coba()
		{
			// $sql->coba();
		}
	}
?>