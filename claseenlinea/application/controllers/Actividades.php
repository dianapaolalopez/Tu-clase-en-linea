<?php
class Actividades extends CI_Controller
{
    public function index()
    {
        $this->load->model('Actividades_Model', 'AM', true);
        $datos['Lmateria'] = $this->AM->lmatexis();

        $this->load->model('Actividades_Model', 'AM', true);
        $datos['Lgrado'] = $this->AM->lgraexis();


        $this->load->view('Actividades.php', $datos);
    }
    
    public function cargaMaterias()
    {
        $this->load->model('Materias_Model', 'MM', true);
        $materias = $this->MM->lmatexis();
        $data_materias = array();
        foreach ($materias->result() as $r) {
            $data_materias[] = array(
                "materias" => $r,
            );
        }
        echo json_encode(array("materias" => $data_materias));
    }


    public function nuevaMateria()
    {       
        $this->load->view('NuevaMateria.php');
    }


    public function creaActividad()
    {
        $materia = $this->input->post('materia');
        $grado = $this->input->post('grado');
        $semana = $this->input->post('semana');
        $titulo = $this->input->post('titulo');
        $descripcion = $this->input->post('descripcion');

        $this->load->model('Actividades_Model');
        $return = $this->Actividades_Model->crear($materia, $grado,$semana, $titulo, $descripcion);
        if ($return) {
            // echo '<pre>';
            //  print_r('ingreso');
            //  die;           
            echo "<script>alert('Se ha creado una nueva actividad.');</script>";
            redirect('Actividades', 'refresh');
        } else {
            echo "<script>alert('No se ha podido realizar el proceso');</script>";
            redirect('Actividades', 'refresh');
        }
    }
}
