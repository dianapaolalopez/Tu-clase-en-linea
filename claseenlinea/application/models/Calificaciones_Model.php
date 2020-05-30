<?php
class Calificaciones_model extends CI_model
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

    public function crear($identificacion, $idmateria, $idactividad, $nota)
    {              
        $sql = "update `notamateria` SET `nota`= $nota WHERE `identificacion`='$identificacion' and `idmateria`='$idmateria' and `idactividad`= '$idactividad'";       
        // echo '<pre>';
        //  print_r($sql);   
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
}
