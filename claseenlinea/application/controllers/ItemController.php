<?php


defined('BASEPATH') or exit('No direct script access allowed');


class ItemController extends CI_Controller
{
    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    public function ajaxRequest()
    {
        $data['data'] = $this->db->get("items")->result();
        $this->load->view('itemlist', $data);
    }


    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    public function ajaxRequestPost()
    {
        $data = array(
            'materia' => $this->input->post('materia'),
            'grado' => $this->input->post('grado'),
            'semana' => $this->input->post('semana')
        );
        $sql = "select idmateriacurso FROM `materias` where materia='$data[materia]' and grado='$data[grado]'";
        $result = $this->db->query($sql);
        if ($result->num_rows == 0) {
            $idmateria = $result->row('idmateriacurso');
        }
        $sql = "select idactividad,titulo,descripcion  FROM `actividades` where idmateria='$idmateria' and semana= '$data[semana]'";
        $data2 = $this->db->query($sql);
        $act = $data2->result_array();
        // echo '<pre>';
        // print_r($act);
        // die;       
        echo json_encode($act);
    }

    public function ajaxReqPostidmat()
    {
        $data = array(
            'materia' => $this->input->post('materia'),
            'grado' => $this->input->post('grado'),
        );
        $sql = "select idmateriacurso FROM `materias` where materia='$data[materia]' and grado='$data[grado]'";
        $result = $this->db->query($sql);
        if ($result->num_rows == 0) {
            $idmateria = $result->row('idmateriacurso');
        }

        // echo '<pre>';
        // print_r($act);
        // die;       
        echo json_encode($idmateria);
    }

    public function ajaxReqSol()
    {
        $data = array(
            'idmateria' => $this->input->post('idmateria'),
            'idactividad' => $this->input->post('idactividad'),
            'identificacion' => $this->input->post('identificacion'),
        );
        $sql = "select resolucion FROM `notamateria` where identificacion='$data[identificacion]' and idmateria='$data[idmateria]' and idactividad='$data[idactividad]'";
        $result = $this->db->query($sql);
        if ($result->num_rows == 0) {
            $solucion = $result->row('resolucion');
        }
        // echo '<pre>';
        // print_r($act);
        // die;       
        echo json_encode($solucion);
    }

    public function ajaxReqNotas()
    {
        $data = array(           
            'ident' => $this->input->post('identificacion')
        );
        $sql = "select 
        tab1.identificacion, 
        tab2.materia,
        tab3.titulo, 
        tab3.semana, 
        tab1.nota 
        FROM `notamateria` as tab1 
        INNER JOIN `materias` as tab2 
        ON (tab1.idmateria = tab2.idmateriacurso) 
        INNER JOIN `actividades` tab3 
        ON (tab1.idactividad = tab3.idactividad ) 
        WHERE tab1.identificacion='$data[ident]' ";
        // echo '<pre>';
        // print_r($sql);
        // die;
        $data2 = $this->db->query($sql);
        // echo '<pre>';
        // print_r($data2);
        // die;
        $act = $data2->result_array();
        // echo '<pre>';
        // print_r($act);
        // die;
        echo json_encode($act);
    }
}
