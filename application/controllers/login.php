<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller
{



    public function __construct()
    {
        parent::__construct();


        $this->load->model('loginModel');
    }


    public function login()
    {
        if ($this->session->userdata('usuario')) {
            $this->load->view('head');
            $this->load->view('header');
            $this->load->view('recarga/recarga');
        } else {
            $this->load->view('head');
            $this->load->view('header');
            $this->load->view('login/login');
        }
    }



    public function index()
    {



        //validando que la sesion exista
        // if ($this->session->userdata('usuario')) {
        //     redirect('crecarga');


        // }

        // if (isset($_POST['usuario'], $_POST['clave'])) {


        //     if ($this->loginModel->login($_POST['usuario'], md5($_POST['clave']))) {
        //         $this->session->set_userdata('usuario', $_POST['usuario']); //asignando la sesion al usuario actual
        //         $this->load->view('head');
        //         $this->load->view('header');
        //         $this->load->view('recarga/recargar');
        //     } else {
        //         redirect('login');
        //     }
        // }
        // $this->load->view('head');
        // $this->load->view('header');
        // $this->load->view('login');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect("inicio");
    }

    public function iniciar()
    {
        if (isset($_POST['usuario'], $_POST['clave'])) {

            $usuario = $_POST['usuario'];
            $clave = $_POST['clave'];
            $sesion = $this->loginModel->login($usuario, $clave);
            if ($sesion) {
                $this->session->set_userdata('usuario', $_POST['usuario']); //asignando la sesion al usuario actual
                $this->session->set_flashdata(array(
                    "mensaje" => "Sesion iniciada",
                    "clase" => "primary",

                ));
                $this->load->view("head");
                $this->load->view('header');
                $this->load->view("recarga/recarga");
            }
            if (null === $sesion) {
                $this->session->set_flashdata(array(
                    "mensaje" => "Ocurrio un error con el usuario error 420",
                    "clase" => "danger",
                ));
            }
            if (!$sesion){       
                $this->session->set_flashdata(array(
                    "mensaje" => "Usuario o contraseña invalida",
                    "clase" => "danger",
                ));
                $this->load->view("head");
                $this->load->view('header');
                $this->load->view("login/login");

            }
            
        } else {
            $this->session->set_flashdata(array(
                "mensaje" => "Ocurrio un error inesperado",
                "clase" => "danger",
            ));
            $this->load->view("head");
            $this->load->view('header');
            $this->load->view("login/");
        }
    }
}
