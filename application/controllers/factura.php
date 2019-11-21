<?php
class factura extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model("facturaModel");
        $this->load->library('session');
    }

    public function agregar(){
        $this->load->view("head");
        $this->load->view("header");
        $this->load->view("factura/agregar");
    }

    public function guardarCambios(){
        $resultado = $this->facturaModel->guardarCambios(
            $this->input->post("nrofactura"),
            $this->input->post("codcliente"),
            $this->input->post("fecha"),
            $this->input->post("vlrfactura"),
            $this->input->post("saldo")
        );
        if($resultado){
            $mensaje = "Factura actualizado correctamente";
            $clase = "success";
        }else{
            $mensaje = "Error al actualizar la factura";
            $clase = "danger";
        }
        $this->session->set_flashdata(array(
            "mensaje" => $mensaje,
            "clase" => $clase,
        ));
        redirect("factura/");
    }

    public function editar($nrofactura){
        $factura = $this->facturaModel->uno($nrofactura);
        if(null === $factura){
            $this->session->set_flashdata(array(
                "mensaje" => "La factura que quieres editar no existe",
                "clase" => "danger",
            ));
            redirect("factura/");
        }
        $this->load->view("head");
        $this->load->view("header");
        $this->load->view("factura/editar", array("factura" => $factura));
    }

    public function eliminar($nrofactura){
        $resultado = $this->facturaModel->eliminar($nrofactura);
        if($resultado){
            $mensaje = "Factura eliminada correctamente";
            $clase = "success";
        }else{
            $mensaje = "Error al eliminar la factura";
            $clase = "danger";
        }
        $this->session->set_flashdata(array(
            "mensaje" => $mensaje,
            "clase" => $clase,
        ));
        redirect("factura/");
    }

    public function index(){
        
        $this->load->view("head");
        $this->load->view("header");
        $this->load->view("factura/listar", array(
            "facturas" => $this->facturaModel->todos()
        ));
    }

    public function guardar(){
        $resultado = $this->facturaModel->nuevo(
            $this->input->post("codcliente"),
            $this->input->post("fecha"),
            $this->input->post("vlrfactura"),
            $this->input->post("saldo")
            );
        if($resultado){
            $mensaje = "Factura guardada correctamente";
            $clase = "success";
        }else{
            $mensaje = "Error al guardar la factura";
            $clase = "danger";
        }
        $this->session->set_flashdata(array(
            "mensaje" => $mensaje,
            "clase" => $clase,
        ));
        redirect("factura/agregar");
    }
}
