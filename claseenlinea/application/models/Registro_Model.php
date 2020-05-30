<?php
class Registro_Model extends CI_model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function crear($nombreColegio, $identificacion, $nombres, $apellidos, $direccion, $grado, $correo, $celular, $fechadenacimiento, $genero, $tipo, $usuario, $estado, $clave)
    {
        // echo '<pre>';
        // print_r('ingreso  modelo');
        // die;
        $sql = "Insert into cuentas (usuario, clave) values  ('$usuario', '$clave')";
        // echo '<pre>';
        // print_r($sql);   
        // die;
        if ($query =  $this->db->query($sql)) {
            $sql = "Insert into usuarios (nombreColegio, identificacion, nombres, apellidos, direccion, grado, correo, telefono, fechanacimiento, genero,tipo, usuario, estado) 
            values 
            ('$nombreColegio', '$identificacion', '$nombres', '$apellidos', '$direccion', '$grado', '$correo', '$celular', '$fechadenacimiento', '$genero','$tipo', '$usuario', '$estado')";
            $return = $this->db->query($sql);
            if ($return) {
                return  $return;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function editar($identificacion, $direccion, $grado, $correo, $telefono,$usuario, $estado, $clave)
    {
        // echo '<pre>';
        // print_r('ingreso  modelo');
        // die;
        $sql = "update `cuentas` set `clave`='$clave' WHERE usuario = '$usuario'";
        // echo '<pre>';
        // print_r($sql);   
        // die;
        if ($query =  $this->db->query($sql)) {
            $sql = "update usuarios set direccion ='$direccion' , grado='$grado' , correo='$correo', telefono ='$telefono', estado='$estado' 
            WHERE identificacion = '$identificacion'";
            $return = $this->db->query($sql);
            if ($return) {
                return  $return;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }    

    public function enlistausuarios(){
        $result = $this->db->get('usuarios');
        $usuarios= $result->result_array();
        return $usuarios;
    }

    public function enlistausuario($identificacion){
        $sql = "select * from usuarios tab1 INNER JOIN cuentas tab2 ON(tab1.usuario = tab2.usuario) where identificacion = $identificacion" ;      
        $result = $this->db->query($sql);
        $usuario= $result->result_array();
        return $usuario;
    }
}
