<?php
class Calificacion extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // load Pagination library
        $this->load->library('pagination');

        // load URL helper
        $this->load->helper('url');
    }

    public function index()
    {
        $this->load->model('Calificaciones_Model', 'CM', true);
        $params['Lmateria'] = $this->CM->lmatexis();

        $this->load->model('Calificaciones_Model', 'CM', true);
        $params['Lgrado'] = $this->CM->lgraexis();

        $this->load->view('listAct', $params);
    }

    public function lstCalEst()
    {
        $this->load->model('Materias_Model', 'MM', true);
        $datos['LMaterias'] = $this->MM->enlistamaterias();
        //  echo '<pre>';
        //  print_r($datos);
        // die; 
        $this->load->view('CalificacionesEst.php', $datos);
    }

    public  function guadarNota()
    {
        $identificacion = $this->input->post('identificacion');
        $idmateria = $this->input->post('idmateria');
        $idactividad = $this->input->post('idactividad');
        $nota = $this->input->post('nota');
        $this->load->model('Calificaciones_Model');
        $return = $this->Calificaciones_Model->crear($identificacion, $idmateria, $idactividad, $nota);
        if ($return) {
            // echo '<pre>';
            //  print_r('ingreso');
            //  die;           
            echo "<script>alert('YA cargo la NOTA.');</script>";
            redirect('Calificacion', 'refresh');
        } else {
            echo "<script>alert('No se ha podido realizar el proceso');</script>";
            redirect('Calificacion', 'refresh');
        }
    }
}
