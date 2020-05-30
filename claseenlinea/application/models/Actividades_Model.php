
<?php
class Actividades_model extends CI_model
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

    public function crear($materia, $grado, $semana, $titulo, $descripcion)
    {
        $sql = "select idmateriacurso FROM `materias` where materia= '$materia' and grado= '$grado'";
        $result = $this->db->query($sql);
        if ($result->num_rows == 0) {
            $idmateria = $result->row('idmateriacurso');
        }
        $sql = "Insert into Actividades (titulo, idmateria, semana, descripcion) values  ('$titulo','$idmateria', '$semana', ' $descripcion')";

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
