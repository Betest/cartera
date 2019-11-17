<?php
    class recargaModel extends CI_Model{
        public $nrorecarga;
        public $codcliente;
        public $fecha;
        public $hora;
        public $valor;

        public function __construct(){
            $this->load->database();
        }

        public function nuevarecarga($codcliente, $fecha, $hora, $valor){
            $this->codcliente = $codcliente;
            $this->fecha = $fecha;
            $this->hora = $hora;
            $this->valor = $valor;
            return $this->db->insert('recarga', $this);
        }

        public function actsaldo($codcliente, $valor){
            $this->codcliente = $codcliente;
            $this->valor = $valor;

            $this->db->get_where("cliente", array("codcliente" => $codcliente))->result();
            $valor2 = $this->db->get_where("cliente", array("valor" => $valor))->result();
            return $this->db->update('cliente', $this, array("valor" => $valor+$valor2));
        }

        public function todos(){
            return $this->db->get("productos")->result();
        }

        public function eliminar($id){
            return $this->db->delete("productos", array("id" => $id));
        }

        public function uno($id){
            return $this->db->get_where("productos", array("id" => $id))->row();
        }

        public function porCodigoDeBarras($codigoDeBarras){
            return $this->db->get_where("productos", array("codigo" => $codigoDeBarras))->row();
        }
    }
?>