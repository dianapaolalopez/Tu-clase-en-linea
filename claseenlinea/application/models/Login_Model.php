<?php
class Login_model extends CI_model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function login($usuario, $clave)
    {

        $sql = "select tab1.usuario, tab1.clave,tab2.nombres, tab2.identificacion,tab2.tipo, tab2.estado FROM cuentas tab1 INNER JOIN usuarios tab2 ON (tab1.usuario=tab2.usuario) WHERE tab1.usuario='$usuario' AND tab1.clave='$clave' and tab2.estado='1'";

        //$return = $this->db->query($sql)->num_rows();
        $return = $this->db->query($sql);
        $usuario = $return->result_array();
        // echo '<pre>';
        // print_r($usuario);
        // die;      
        if ($return == 1) {           
            return $usuario;
        } else {
            return false;
        }
    }

    function visitas()
    {
       
        // Pregunto si la variable counte existe
        if (!isset($_COOKIE['counte'])) 
        {
          
            // $dtz = new DateTimeZone("America/Lima"); //Your timezone
            // $currentv = new DateTime('NOW');
            // $currentv = $currentv->format('Y-m-d H:i:s'); // had to format this  
 
            $dtz = new DateTimeZone("America/Bogota"); //Your timezone
            $currentv = new DateTime('NOW', $dtz);
            $currentv = $currentv->format("Y-m-d H:i:s");                   
           
            // Los campos a registrar
            $fecha = $currentv;
            $direccionip   = $_SERVER['REMOTE_ADDR']; // direccionip
            $direccionip4  = ip2long($_SERVER['REMOTE_ADDR']); // direccionip4
            if($direccionip4== ""){
                $direccionip4="127.0.0.1";
            }            
            $sql = "Insert into `visitas`(`fecha`,`direccionip`,`direccionip4`) values ('$fecha','$direccionip','$direccionip4')";
            
            $return = $this->db->query($sql);
           
            // $this->db->insert('visitas', $this);
 
        }
 
        setcookie('counte', 1, time()+3700);
       
        // Realizo una query a la la tabla visitas
        $consulta = $this->db->query('select count(*) as visitas FROM visitas');  
                  
        $res= $consulta->row();  // retorna los resultados de la tabla visitas
        // echo '<pre>';
        // print_r($res);
        // die;
        return $res;
 
    }


}
