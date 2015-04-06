<?php 

/**
* 
MODEL
*/
class Model extends Db_class
{
    protected $kon;

    public function __construct()
    {

        // config file
        require_once CONFIG.'db_conf.php';

        $this->kon = $this->db_connect($HOSTNAME, $USERNAME, $PW, $DB);      

    }

    public function db_get($table)
    {
        $result = mysqli_query($this->kon, 'select * from kategori');
        $res = mysqli_fetch_object($result);
        return $res;
        mysqli_close($this->kon);
    }
}