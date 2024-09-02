<?php 
class Connection extends mysqli{
    function __construct()
    {
        parent::__construct('localhost','root','','api_rest');
        $this->set_charset('utf8');
        $this->connect_error == NULL ? 'Conexion exitosa a la DB' : die ('Error en la conexion a la DB');
    }//end construct
}//end class





?>