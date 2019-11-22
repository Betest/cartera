<?php
class pago extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model("pagoModel");
        $this->load->library('session');
    }

    public function pago(){
        //validando que la sesion exista
        if (!$this->session->userdata('usuario')) {
            redirect('login/login');
        }

        
        $this->load->view('head');
        $this->load->view('header');
        $this->load->view("pago/pago");
    }
    

    public function actfact(){
        $resultado = $this->pagoModel->actsaldo(
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
        redirect("pago/listar");
    }
    

    public function index(){
        //validando que la sesion exista
        if (!$this->session->userdata('usuario')) {
            redirect('login/login');
        }
        
        $this->load->view('head');
        $this->load->view('header');
        $this->load->view("pago/listar",array(
            "pagos" => $this->pagoModel->todos()
        ));
    }

    public function nueva(){
        
        $cliente = $this->input->post("codcliente");
        $valor = $this->input->post("valor");
        $nrofactura = $this->input->post("nrofactura");
        $factura = $this->pagoModel->porNroFact($nrofactura);

        
        if($factura){
            $resultado = $this->pagoModel->nuevopago(
                $this->input->post("nrofactura"),
                $this->input->post("fecha"),
                $this->input->post("valor")
            );
            if($resultado){
                $mensaje = "Pago realizada correctamente";
                $clase = "success";
                $this->pagoModel->actfact($cliente,$valor );
                
            }else{
                $mensaje = "Error al pagar";
                $clase = "danger";
            }
            $this->session->set_flashdata(array(
                "mensaje" => $mensaje,
                "clase" => $clase,
            ));
            redirect("pago/");

        }else{
            $mensaje = "Esta factura no esta asignada para pagar";
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