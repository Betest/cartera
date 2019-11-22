<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class registerModel extends CI_Model{
        public $id;
        public $codcliente;
        public $apellidos;
        public $nombres;
        public $usuario;
        public $saldo;
        public $clave;
        

        public function __construct(){
            $this->load->database();
        }

        public function nuevo($codcliente, $apellidos, $nombres, $usuario, $saldo, $clave){

            if(!$this->db->get_where("cliente", array("codcliente" => $codcliente))->row()){
                $this->codcliente = $codcliente;
                $this->apellidos = $apellidos;
                $this->nombres = $nombres;
                $this->usuario = $usuario;                
                $this->saldo = $saldo;
                $this->clave = $clave;
            return $this->db->insert('cliente', $this);
            }else{
                return false;
            }
             
            
        }
        
    }
?>