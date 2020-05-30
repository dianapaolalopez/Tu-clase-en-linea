<?php
class Login extends CI_Controller
{
    public function index()
    {
        $this->load->view('login.php');
    }

    public function verifica()
    {
        $usuario = $this->input->post('usuario');
        $clave = $this->input->post('clave');

        $this->load->model('Login_Model');
        $result = $this->Login_Model->login($usuario, $clave);
        if ($result) {

            foreach ($result as $row) {

                $sess_array = array(
                    'usuario' => $row['usuario'],
                    'nombres' => $row['nombres'],
                    'identificacion' => $row['identificacion'],
                    'tipo' => $row['tipo'],
                    'logged_in' => TRUE
                );
                //  echo '<pre>';
                //  print_r($sess_array);
                // die;
                $this->session->set_userdata($sess_array);
            }           
            redirect('welcome');
        } else {
            // $this->form_validation->set_message('verifica','Contraseña incorrecta');
            // show_error ( 'Contraseña incorrecta' );
            echo "<script>alert('CONTRASEÑA incorrecta o USUARIO inactivo');</script>";
            redirect('Login', 'refresh');
        }
    }

    function logout()
    {
        $user_data = $this->session->all_userdata();
        foreach ($user_data as $key => $value) {
            if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
                $this->session->unset_userdata($key);
            }
        }
        $this->session->sess_destroy();
        redirect('Login');
    }
}
