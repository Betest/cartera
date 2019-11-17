<?php
class recarga extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model("ProductoModel");
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
            $this->input->post("codigo"),
            $this->input->post("descripcion"),
            $this->input->post("precioVenta"),
            $this->input->post("precioCompra"),
            $this->input->post("existencia")
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
        $this->load->view("recarga/recarga");
    }

    public function recargar(){
        $resultado = $this->recargaModel->nuevarecarga(
                $this->input->post("codcliente"),
                $this->input->post("fecha"),
                $this->input->post("hora"),
                $this->input->post("valor")
            );
        if($resultado){
            $mensaje = "Recarga realizada correctamente";
            $clase = "success";
        }else{
            $mensaje = "Error al recargar";
            $clase = "danger";
        }
        $this->session->set_flashdata(array(
            "mensaje" => $mensaje,
            "clase" => $clase,
        ));
        redirect("recarga/recargar");
    }
}
?>