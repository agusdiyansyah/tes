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
        $query = mysqli_query($this->kon, 'select * from kategori');
        $res = [];
        while ($data   = mysqli_fetch_assoc($query)) {
            
            array_push($res, $data);

        }
        return $this->obj($res);
        mysqli_close($this->kon);
    }

    // convert array to Object
        public function obj( $array ) {
            if (is_array($array)) {

                foreach ($array as $Key => $Value){

                    if (is_array($Value)){
                        $array[$Key] = (object) $this->obj($Value);
                    }

                }
            }

            return (object) $array;

        }
}