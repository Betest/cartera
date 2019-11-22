<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class recargaModel extends CI_Model
{
    public $nrorecarga;
    public $codcliente;
    public $fecha;
    public $hora;
    public $valor;

    public function __construct()
    {
        $this->load->database();
    }

    public function nuevarecarga($codcliente, $fecha, $hora, $valor)
    {
        $this->codcliente = $codcliente;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->valor = $valor;

        return $this->db->insert('recarga', $this);
    }

    public function actsaldo($codcliente, $valor)
    {   
        
        $this->db->select('saldo');
        $this->db->where('codcliente', $codcliente);
        $saldo = $this->db->get('cliente', 1)->row();
        $query = $this->db->query("Select saldo From cliente where codcliente = '".$codcliente."'");
        $datos = [
            //'codcliente'=> $codcliente,
            'saldo' => ($saldo->saldo+$valor)
        ];
        

        if($query->num_rows()>0) { 
            $this->db->where('codcliente',$codcliente);
            $this->db->update('cliente',$datos);
            
        }
        
        return $query;
    }

    public function todos()
    {
        return $this->db->get("recarga")->result();
    }

    public function eliminar($nrorecarga)
    {
        return $this->db->delete("recarga", array("nrorecarga" => $nrorecarga));
    }

    public function uno($nrorecarga)
    {
        return $this->db->get_where("recarga", array("nrorecarga" => $nrorecarga))->row();
    }

    public function porCodCliente($codcliente)
    {
        return $this->db->get_where("recarga", array("codcliente" => $codcliente))->row();
    }
}
