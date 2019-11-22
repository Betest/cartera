<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('adminModel');
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect("inicio");
    }
    public function ingresar()
    {
        if (isset($_POST['usuario'], $_POST['clave'])) {

            $usuario = $_POST['usuario'];
            $clave = $_POST['clave'];
            $sesion = $this->adminModel->ingresar($usuario, $clave);
            if ($sesion) {
                $this->session->set_userdata('identif', $_POST['usuario']); //asignando la sesion al usuario actual
                $this->session->set_flashdata(array(
                    "mensaje" => "Sesion iniciada",
                    "clase" => "primary",
                ));
                $this->load->view('head');
                $this->load->view('header');
                $this->load->view("admin/listar", array(
                    "clientes" => $this->adminModel->todos()
                ));
            }
            if (null === $sesion) {
                $this->session->set_flashdata(array(
                    "mensaje" => "Ocurrio un error con el usuario error 420",
                    "clase" => "danger",
                ));
            }
            $this->session->set_flashdata(array(
                "mensaje" => "Admin o contraseña invalida",
                "clase" => "danger",
            ));
            $this->load->view("head");
            $this->load->view('header');
            $this->load->view("admin/admin");
        } else {
            $this->session->set_flashdata(array(
                "mensaje" => "Su usuario o contraseña son incorrectos",
                "clase" => "danger",
            ));
            redirect("admin/admin");
        }
    }
    public function agregar()
    {
        $this->load->view('head');
        $this->load->view('header');
        $this->load->view("admin/agregar");
    }
    public function guardarCambios()
    {
        $resultado = $this->adminModel->guardarCambios(
            $this->input->post("id"),
            $this->input->post("codcliente"),
            $this->input->post("apellidos"),
            $this->input->post("nombres"),
            $this->input->post("usuario"),
            $this->input->post("saldo"),
            $this->encrypt->encode($this->input->post("clave")) //falta encriptar
        );
        if ($resultado) {
            $mensaje = "Cliente actualizado correctamente";
            $clase = "success";
        } else {
            $mensaje = "Este Cliente ya existe";
            $clase = "danger";
        }
        $this->session->set_flashdata(array(
            "mensaje" => $mensaje,
            "clase" => $clase,
        ));
        redirect("admin/");
    }
    public function editar($id)
    {
        $cliente = $this->adminModel->uno($id);
        if (null === $cliente) {
            $this->session->set_flashdata(array(
                "mensaje" => "El usuario que quieres editar no existe",
                "clase" => "danger",
            ));
            redirect("admin/");
        }
        $this->load->view('head');
        $this->load->view('header');
        $this->load->view("admin/editar", array("cliente" => $cliente));
    }
    public function eliminar($id)
    {
        $resultado = $this->adminModel->eliminar($id);
        if ($resultado) {
            $mensaje = "cliente eliminado correctamente";
            $clase = "success";
        } else {
            $mensaje = "Error al eliminar el cliente";
            $clase = "danger";
        }
        $this->session->set_flashdata(array(
            "mensaje" => $mensaje,
            "clase" => $clase,
        ));
        $data["nombre"] = $this->session->userdata('ident');
        redirect("admin/", $data);
    }
    public function index()
    {
        //validando que la sesion exista
        // if (!$this->session->userdata('identif')) {
        //     redirect('admin/admin');
        // }
        if (!$this->session->userdata('identif')) {
            $this->load->view('head');
            $this->load->view('header');
            $this->load->view('admin/admin');
        } else {
            $this->load->view('head');
            $this->load->view('header');
            $this->load->view("admin/listar", array(
                "clientes" => $this->adminModel->todos()
            ));
        }
    }
    public function guardar()
    {
        $resultado = $this->adminModel->nuevo(
            $this->input->post("codcliente"),
            $this->input->post("apellidos"),
            $this->input->post("nombres"),
            $this->input->post("usuario"),
            $this->input->post("saldo"),
            $this->encrypt->decode($this->input->post("clave")) //falta encriptar
        );
        if ($resultado) {
            $mensaje = "Cliente guardado correctamente";
            $clase = "success";
        } else {
            $mensaje = "Este cliente ya existe";
            $clase = "danger";
        }
        $this->session->set_flashdata(array(
            "mensaje" => $mensaje,
            "clase" => $clase,
        ));
        redirect("admin/");
    }
}
