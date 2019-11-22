<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class adminModel extends CI_Model
{
    public $id;
    public $codcliente;
    public $apellidos;
    public $nombres;
    public $usuario;
    public $saldo;
    public $clave;


    public function __construct()
    {
        parent::__construct();
    }



    public function ingresar($usuario, $clave)
    {
        $this->db->where('usuario', $usuario);
        $this->db->where('clave', $clave);


        $this->security->xss_clean($usuario);
        $this->security->xss_clean($clave);


        $q = $this->db->get('administrador');

        return $q->result_array();
    }

    public function nuevo($codcliente, $apellidos, $nombres, $usuario, $saldo, $clave)
    {
        $this->codcliente = $codcliente;
        $this->apellidos = $apellidos;
        $this->nombres = $nombres;
        $this->usuario = $usuario;
        $this->saldo = $saldo;        
        $this->clave = $clave;
        return $this->db->insert('cliente', $this);
    }

    public function guardarCambios($id, $codcliente, $apellidos, $nombres, $usuario, $saldo, $clave)
    {
        $this->id = $id;
        $this->codcliente = $codcliente;
        $this->apellidos = $apellidos;
        $this->nombres = $nombres;
        $this->usuario = $usuario;
        $this->saldo = $saldo;
        $this->clave = $clave;
        return $this->db->update('cliente', $this, array("id" => $id));
    }

    public function todos()
    {
        return $this->db->get("cliente")->result();
    }

    public function eliminar($id)
    {
        return $this->db->delete("cliente", array("id" => $id));
    }

    public function uno($id)
    {
        return $this->db->get_where("cliente", array("id" => $id))->row();
    }
}
