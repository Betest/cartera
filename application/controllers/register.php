<?php
class register extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model("registerModel");
    }
    
    public function index(){

        // //validando que la sesion exista
        // if (!$this->session->userdata('txtuser')) {
        //     redirect('login');
        // }        
        
        $this->load->view('head');
        $this->load->view('header');
        $this->load->view("register");
    }

    public function register()
    {
        // //validando que la sesion exista
        // if (!$this->session->userdata('usuario')) {
        //     redirect('login');
        // }
        $this->load->view('head');
        $this->load->view('header');
        $this->load->view('login/register');
    }

    public function registrar(){
        //validando que la sesion exista
        if (!$this->session->userdata('usuario')) {
            redirect('login');
        }      

        $resultado = $this->registerModel->nuevo(
                $this->input->post("codcliente"),
                $this->input->post("apellidos"),
                $this->input->post("nombres"),
                $this->input->post("usuario"),
                $this->input->post("saldo"),
                $this->input->post("clave")
                
            );
        if($resultado){
            $mensaje = "Cliente registrado correctamente";
            $clase = "success";
        }else{
            $mensaje = "Este cliente ya existe";
            $clase = "danger";
        }
        $this->session->set_flashdata(array(
            "mensaje" => $mensaje,
            "clase" => $clase,
        ));
        redirect("register/register");
    }
}
?>