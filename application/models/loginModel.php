<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class loginModel extends CI_Model
{


    public function __construct()
    {
        parent::__construct();
    }    
    
    public function login($usuario,$clave){
        
        $this->db->where('usuario', $usuario);
        $this->db->where('clave',$clave);


        $this->security->xss_clean($usuario);
        $this->security->xss_clean($clave);


        $q = $this->db->get('cliente');

        return $q->result_array();
    }

    public function ingresar($usuario,$clave){
        $this->db->where('usuario', $usuario);
        $this->db->where('clave', $clave);


        $this->security->xss_clean($usuario);
        $this->security->xss_clean($clave);


        $q = $this->db->get('administrador');

        return $q->result_array();
    }
    
}
