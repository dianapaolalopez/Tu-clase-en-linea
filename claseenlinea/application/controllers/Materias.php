<?php
class Materias extends CI_Controller
{
    public function index()
    {
        $this->load->model('Materias_Model', 'MM', true);
        $datos['Lmateria'] = $this->MM->lmatexis();

        $this->load->model('Materias_Model', 'MM', true);
        $datos['Lgrado'] = $this->MM->lgraexis();

        $this->load->view('MisMaterias.php', $datos);
    }

    public function listaMaterias()
    {
        $this->load->model('Materias_Model', 'MM', true);
        $datos['LMaterias'] = $this->MM->enlistamaterias();
        //  echo '<pre>';
        //  print_r($datos);
        // die; 
        $this->load->view('ListaMaterias.php', $datos);
    }

    public function Lactv()
    {
        // POST data
        $postData = $this->input->post();
        echo '<pre>';
        print_r($postData);
        die;

        // get data
        $data = $this->Main_model->getUserDetails($postData);

        echo json_encode($data);
    }

    public function nuevaMateria()
    {
        //    $this->load->model('Usuarios_Model','UM',true);
        //     $datos['Usuarios']=$this->UM->getAll();
        $this->load->view('NuevaMateria.php');
    }
    public function creaMateria()
    {
        $materia = $this->input->post('materia');
        $grado = $this->input->post('grado');

        $this->load->model('Materias_Model');
        $return = $this->Materias_Model->crear($materia, $grado);
        if ($return) {
            // echo '<pre>';
            //  print_r('ingreso');
            //  die;           
            echo "<script>alert('Se ha creado una nueva materia.');</script>";
            redirect('Materias/listaMaterias', 'refresh');
        } else {
            echo "<script>alert('No se ha podido realizar el proceso');</script>";
            redirect('Materias/listaMaterias', 'refresh');
        }
    }
    
    public  function guaEstAct()
    {
        $identificacion = $this->input->post('identificacion');
        $idmateria = $this->input->post('idmateria');
        $idactividad = $this->input->post('idactividad');
        $resolucion = $this->input->post('resolucion');

        $this->load->model('Materias_Model');
        $return = $this->Materias_Model->mGuaEstAct($identificacion, $idmateria,$idactividad, $resolucion);
        if ($return) {
            // echo '<pre>';
            //  print_r('ingreso');
            //  die;           
            echo "<script>alert('Se ha cargado la SOLUCIÓN de la ACTIVIDAD.');</script>";
            redirect('Materias', 'refresh');
        } else {
            echo "<script>alert('No se ha podido realizar el proceso');</script>";
            redirect('Materias', 'refresh');
        }
    }
}
