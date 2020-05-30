<?php
class Registro extends CI_Controller
{
    public function index()
    {
        //    $this->load->model('Usuarios_Model','UM',true);
        //     $datos['Usuarios']=$this->UM->getAll();
        $this->load->view('Registro.php');
    }

    public function creaUsuario()
    {
        $nombreColegio = $this->input->post('nombreColegio');
        $identificacion = $this->input->post('identificacion');
        $nombres = $this->input->post('nombres');
        $apellidos = $this->input->post('apellidos');
        $direccion = $this->input->post('direccion');
        $grado = $this->input->post('grado');
        $correo = $this->input->post('correo');
        $celular = $this->input->post('celular');
        $fechadenacimiento = $this->input->post('fechadenacimiento');
        $genero = $this->input->post('genero');
        $tipo = $this->input->post('tipo');
        $usuario = $this->input->post('usuario');
        $estado = '0';
        $clave = $this->input->post('clave');
        // echo '<pre>';
        // print_r('ingreso');
        // die;

        // echo '<pre>';
        // print_r($data);
        // die;
        $this->load->model('Registro_Model');
        $return = $this->Registro_Model->crear($nombreColegio, $identificacion, $nombres, $apellidos, $direccion, $grado, $correo, $celular, $fechadenacimiento, $genero, $tipo, $usuario, $estado, $clave);
        if ($return) {
            // echo '<pre>';
            //  print_r('ingreso');
            //  die;           
            echo "<script>alert('Estás suscrito, ¡Gracias!.');</script>";
            redirect('welcome', 'refresh');
        } else {
            echo "<script>alert('No se ha podido realizar el proceso');</script>";
            redirect('Registro', 'refresh');
        }
    }

    public function listaUsuarios()
    {
        $this->load->model('Registro_Model', 'RM', true);
        $datos['LUsuarios'] = $this->RM->enlistausuarios();
        //  echo '<pre>';
        //  print_r($datos);
        // die; 
        $this->load->view('ListaUsuarios.php', $datos);
    }


    public function actUsuarios($identificacion)
    {
        $this->load->model('Registro_Model', 'RM', true);
        $datos['LUsuario'] = $this->RM->enlistausuario($identificacion);
        //  echo '<pre>';
        //  print_r($datos);
        //  die; 
        $this->load->view('actUsuarios.php', $datos);
    }

    public function editaUsuario()
    {
        $identificacion = $this->input->post('identificacion');
        $direccion = $this->input->post('direccion');
        $grado = $this->input->post('grado');
        $correo = $this->input->post('correo');
        $telefono = $this->input->post('telefono'); 
        $usuario = $this->input->post('usuario');
        $estado =  $this->input->post('estado'); ;
        $clave = $this->input->post('clave');
        // echo '<pre>';
        // print_r('ingreso');
        // die;

        // echo '<pre>';
        // print_r($data);
        // die;
        $this->load->model('Registro_Model');
        $return = $this->Registro_Model->editar($identificacion, $direccion, $grado, $correo, $telefono,$usuario, $estado, $clave);
        if ($return) {
            // echo '<pre>';
            //  print_r('ingreso');
            //  die;           
            echo "<script>alert('Se ha modificado satisfactoriamente.');</script>";
            redirect('Registro/listaUsuarios', 'refresh');
        } else {
            echo "<script>alert('No se ha podido realizar el proceso');</script>";
            redirect('actUsuarios', 'refresh');
        }
    }
}
