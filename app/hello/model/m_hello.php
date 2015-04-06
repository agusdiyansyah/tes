<?php 
	/**
	* 
	Model
	*/
	class M_hello extends Model
	{
		public function data()
		{
			return $this->db_get('kategori');
		}
		public function coba()
		{
			// $sql->coba();
		}
	}
?>