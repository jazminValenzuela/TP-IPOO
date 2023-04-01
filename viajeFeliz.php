<?php

class Viaje{

    //atributos
    private $codigoViaje;
    private $destinoViaje;
    private $cantidadMax;
    private $pasajeros;

    //metodos
    public function __construct($codigoViaje, $destinoViaje, $cantidadMax, $pasajeros){
        $this-> codigoViaje = $codigoViaje;
        $this -> destinoViaje = $destinoViaje;
        $this -> cantidadMax = $cantidadMax;
        $this -> pasajeros = $pasajeros;
    }


    public function getCodigoViaje(){
        return $this->codigoViaje;
    }


    public function getDestinoViaje(){
        return $this->destinoViaje;
    }


    public function getCantidadMax(){
        return $this->cantidadMax;
    }


    public function getPasajeros(){
        return $this->pasajeros;
    }


    public function setCodigoViaje ($codigo){
        $this->codigoViaje =  $codigo;
    }


    public function setDestinoViaje ($destino){
        $this->destinoViaje =  $destino;
    }


    public function setCantidadMax ($cantMax){
        $this->cantidadMax =  $cantMax;
    }


    public function setPasajeros ($pasajeros){
        $this->pasajeros =  $pasajeros;
    }


    public function setPasajero($indice, $llave, $modificacion){
        $this->pasajeros[$indice][$llave] = $modificacion;
    }


    public function modificarViaje($destinoViaje, $codigoViaje){
        $this->setDestinoViaje($destinoViaje);
        $this->setCodigoViaje($codigoViaje);
    }


    public function modificarPasajeros($indice, $clave, $modificacion){
        $this->setPasajero($indice, $clave, $modificacion);
    }


    public function imprimirPasajeros($pasajeros){
        // $stringPasajeros
        $stringPasajeros=null;
        for ($i=1; $i <((count($this->pasajeros))+1) ; $i++) { 
            $numeroPasajero = $i;
            $nombre = $this->pasajeros[$i]["nombre"];
            $apellido = $this->pasajeros[$i]["apellido"];
            $nroDocumento = $this->pasajeros[$i]["numeroDocumento"];
            $stringPasajeros = $stringPasajeros . "pasajero ". $numeroPasajero ." NOMBRE: ".$nombre. " APELLIDO: " .$apellido. " DNI: " .$nroDocumento. "\n";
        }
    return $stringPasajeros;
        
    }


    public function __toString(){
        $cadena = $this->imprimirPasajeros($this->getPasajeros);
        //$cadenaPasajeros = imprimirPasajeros($pasajeros);
        return "destino del viaje: ". $this->getDestinoViaje() . ", codigo del viaje: ". $this->getCodigoViaje() . 
        ",\ncantidad de pasajeros: ". $this->getCantidadMax()."\n". $cadena;
    }

}














