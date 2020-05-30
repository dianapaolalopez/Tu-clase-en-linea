<?php
class Notas extends CI_Controller
{
    public function index()
    {        
        $this->load->model('Actividades_Model', 'AM', true);
        $datos['Lmateria'] = $this->AM->lmatexis();

        $this->load->model('Actividades_Model', 'AM', true);
        $datos['Lgrado'] = $this->AM->lgraexis();
        $this->load->view('Notas.php', $datos);
    }
}