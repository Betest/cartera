<?php
class recarga extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model("recargaModel");
        $this->load->library('session');
    }

    public function recarga(){
        //validando que la sesion exista
        if (!$this->session->userdata('usuario')) {
            redirect('login/login');
        }
        $this->load->view('head');
        $this->load->view('header');
        $this->load->view("recarga/recarga");
    }
    

    public function actsaldo(){
        $resultado = $this->recargaModel->actsaldo(
            $this->input->post("id"),
            $this->input->post("codcliente"),
            $this->input->post("apellidos"),
            $this->input->post("nombres"),
            $this->input->post("usuario"),
            $this->input->post("saldo")
        );
        if($resultado){
            $mensaje = "Recarga correcta";
            $clase = "success";

        }else{
            $mensaje = "Error al actualizar saldo";
            $clase = "danger";
        }
        $this->session->set_flashdata(array(
            "mensaje" => $mensaje,
            "clase" => $clase,
        ));
        redirect("recarga/listar");
    }
    

    public function index(){
        //validando que la sesion exista
        if (!$this->session->userdata('usuario')) {
            redirect('login/login');
        }
        
        $this->load->view('head');
        $this->load->view('header');
        $this->load->view("recarga/listar",array(
            "recargas" => $this->recargaModel->todos()
        ));
    }

    public function nueva(){
        $codcliente = $this->input->post("codcliente");
        $valor = $this->input->post("valor");
        $cliente = $this->recargaModel->porCodCliente($codcliente);

        if($cliente){
            $resultado = $this->recargaModel->nuevarecarga(
                $this->input->post("codcliente"),
                $this->input->post("fecha"),
                $this->input->post("hora"),
                $this->input->post("valor")
            );
        if($resultado){
            $mensaje = "Recarga realizada correctamente";
            $clase = "success";
            $this->recargaModel->actsaldo($codcliente,$valor );
            
        }else{
            $mensaje = "Error al recargar";
            $clase = "danger";
        }
        $this->session->set_flashdata(array(
            "mensaje" => $mensaje,
            "clase" => $clase,
        ));
        redirect("recarga/recarga");

        }else{
            $mensaje = "Este cliente no se encuentra registrado";
            $clase = "danger";
            $this->session->set_flashdata(array(
                "mensaje" => $mensaje,
                "clase" => $clase,
            ));
            $this->load->view("head");
            $this->load->view("header");
            $this->load->view("pago/pago");
        }
        
    }
}
?>