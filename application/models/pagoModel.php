<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class pagoModel extends CI_Model
{
    public $nropago;
    public $nrofactura;
    public $fecha;
    public $valor;

    public function __construct()
    {
        $this->load->database();
    }

    public function nuevopago($nrofactura, $fecha, $valor)
    {
        $this->nrofactura = $nrofactura;
        $this->fecha = $fecha;
        $this->valor = $valor;

        return $this->db->insert('pago', $this);
    }

    public function actfact($codcliente, $valor)
    {   
        
        $this->db->select('saldo');
        $this->db->where('codcliente', $codcliente);
        $saldofactura = $this->db->get('factura', 1)->row();
        $cliente = $this->db->query("Select saldo From cliente where codcliente = '".$codcliente."'");
        $factura = $this->db->query("Select saldo From factura where codcliente = '".$codcliente."'");

        $this->db->select('saldo');
        $this->db->where('codcliente', $codcliente);
        $saldocliente = $this->db->get('cliente', 1)->row();

        

            $datos = [
                //'codcliente'=> $codcliente,
                'saldo' => ($saldofactura->saldo-$valor)
            ];

            $datos2 = [
                //'codcliente'=> $codcliente,
                'saldo' => ($saldocliente->saldo-$valor)
            ];
            
    
            if($factura->num_rows()>0 && $cliente->num_rows()>0) { 
                $this->db->where('codcliente',$codcliente);
                $this->db->update('cliente',$datos2);
                $this->db->where('codcliente',$codcliente);
                $this->db->update('factura',$datos);
                
            }
            
            return $saldofactura;
        



        
    }

    public function todos()
    {
        return $this->db->get("pago")->result();
    }

    public function eliminar($nropago)
    {
        return $this->db->delete("pago", array("nropago" => $nropago));
    }

    public function uno($nropago)
    {
        return $this->db->get_where("pago", array("nropago" => $nropago))->row();
    }

    public function porCodCliente($cliente)
    {
        return $this->db->get_where("factura", array("codcliente" => $cliente))->row();
    }
    public function porNroFact($nrofactura){
        return $this->db->get_where("factura", array("nrofactura" => $nrofactura))->row();
    }
    function listapagos()
        {
           $query = $this->db->query("Select * From pago Order By nropago Desc");
            return $query->result();
        }
}
