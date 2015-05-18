<?php 
	/**
	* 
	Model
	*/
	class M_hello extends Model
	{
		public function data()
		{
			return $this->select()->from('kategori')->fetch();
		}
		public function coba()
		{
			// $sql->coba();
		}
	}
?>