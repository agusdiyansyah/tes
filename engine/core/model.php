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


    /**
    GET ALL RESULT FUNCTION
    */

    public function get_all($table = '')
    {
        if ($table != '') {

            $query = mysqli_query($this->kon, 'select * from '.$table);
            $res = [];
            while ($data   = mysqli_fetch_assoc($query)) {
                
                array_push($res, $data);

            }
            return $this->obj($res);;
            mysqli_close($this->kon);

        } else {

            echo "Harap pilih nama table yang akan di cek !!!";

        }
    }


    /**
    GET ROW
    untuk mengirim result row

    */

    public function get_row($table = '')
    {
        if ($table != '') {

            $query = mysqli_query($this->kon, 'select * from '.$table);
            $res = mysqli_fetch_assoc($query);
            return $this->obj($res);;
            mysqli_close($this->kon);

        } else {

            echo "Harap pilih nama table yang akan di cek !!!";

        }
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