<?php
class Materias_model extends CI_model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function lmatexis()
    {
        $sql = "select materia FROM `materias` GROUP BY materia";
        $result = $this->db->query($sql);
        $materia = $result->result_array();
        return $materia;
    }

    public function lgraexis()
    {
        $sql = "select grado FROM `materias` GROUP BY grado ASC";
        $result = $this->db->query($sql);
        $grado = $result->result_array();
        return $grado;
    }

    public function crear($materia, $grado)
    {
        // echo '<pre>';
        // print_r('ingreso  modelo');
        // die;
        $sql = "Insert into materias (materia, grado) values  ('$materia', '$grado')";
        // echo '<pre>';
        // print_r($sql);   
        // die;
        $return = $this->db->query($sql);
        //  echo '<pre>';
        //  print_r($return);   
        //  die;
        if ($return) {
            return  $return;
        } else {
            return false;
        }
    }
    public function enlistamaterias()
    {
        $result = $this->db->get('materias');
        $materias = $result->result_array();
        return $materias;
    }

    function getUserDetails($postData = array())
    {
        $response = array();
        if (isset($postData['username'])) {
            // Select record
            $this->db->select('*');
            $this->db->where('username', $postData['username']);
            $records = $this->db->get('users');
            $response = $records->result_array();
        }
        return $response;
    }

    public function mGuaEstAct($identificacion, $idmateria, $idactividad, $resolucion)
    {
        // echo '<pre>';
        // print_r('ingreso  modelo');
        // die;
        $sql = "Insert into notamateria (`identificacion`, `idmateria`, `idactividad`, `resolucion`) values ('$identificacion', '$idmateria', '$idactividad', '$resolucion')";
        // echo '<pre>';
        // print_r($sql);   
        // die;
        $return = $this->db->query($sql);
        //  echo '<pre>';
        //  print_r($return);   
        //  die;
        if ($return) {
            return  $return;
        } else {
            return false;
        }
    }

    public function get_current_page_records($limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get("notamateria");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
        //  echo '<pre>';
        //  print_r($row);
        // die;
            return $data;
        }

        return false;
    }

    public function get_total()
    {
        return $this->db->count_all("notamateria");
    }
}
