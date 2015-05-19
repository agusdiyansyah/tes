<?php  
	/**
	* 
	*/
	class M_beranda extends Model
	{
		function get()
		{
			return $this->select()->from('kategori')->fetch();
		}
	}
?>