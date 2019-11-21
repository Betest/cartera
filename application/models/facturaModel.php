<?php
    class facturaModel extends CI_Model{
        public $nrofactura;
        public $codcliente;
        public $fecha;
        public $vlrfactura;
        public $saldo;

        public function __construct(){
            $this->load->database();
        }

        public function nuevo($codcliente, $fecha, $vlrfactura, $saldo){
            $this->codcliente = $codcliente;
            $this->fecha = $fecha;
            $this->vlrfactura = $vlrfactura;
            $this->saldo = $saldo;
            return $this->db->insert('factura', $this);
        }

        public function guardarCambios($nrofactura, $codcliente, $fecha, $vlrfactura, $saldo){
            $this->nrofactura = $nrofactura;
            $this->codcliente = $codcliente;
            $this->fecha = $fecha;
            $this->vlrfactura = $vlrfactura;
            $this->saldo = $saldo;
            return $this->db->update('factura', $this, array("nrofactura" => $nrofactura));
        }

        public function todos(){
            return $this->db->get("factura")->result();
        }

        public function eliminar($nrofactura){
            return $this->db->delete("factura", array("nrofactura" => $nrofactura));
        }

        public function uno($nrofactura){
            return $this->db->get_where("factura", array("nrofactura" => $nrofactura))->row();
        }

        public function porCodigoDeBarras($codcliente){
            return $this->db->get_where("factura", array("codcliente" => $codcliente))->row();
        }
    }
?>