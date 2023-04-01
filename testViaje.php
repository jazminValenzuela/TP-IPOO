<?php
include 'viajeFeliz.php';

/** La empresa de Transporte de Pasajeros “Viaje Feliz” quiere registrar la información referente a sus viajes. 
*De cada viaje se precisa almacenar el código del mismo, destino, cantidad máxima de pasajeros y los pasajeros 
*del viaje.

*Realice la implementación de la clase Viaje e implemente los métodos necesarios para modificar los atributos de 
*dicha clase (incluso los datos de los pasajeros). Utilice un array que almacene la información correspondiente a 
*los pasajeros. Cada pasajero es un array asociativo con las claves “nombre”, “apellido” y “numero de documento”.

*Implementar un script testViaje.php que cree una instancia de la clase Viaje y presente un menú que permita cargar 
*la información del viaje, modificar y ver sus datos.*/



/** MENU DE OPCIONES
 * @return int
 */
function seleccionarOpcion(){
    //int $eleccion

    echo "\n--------------MENÚ DE OPCIONES-------------\n" ;
    echo "SI ES LA PRIMERA VEZ QUE INGRESA, ELIGA LA OPCION 1 \n";
    echo "1.CARGAR INFORMACION DEL VIAJE \n";
    echo "2.MODIFICAR INFORMACION DEL VIAJE \n";
    echo "3.MODIFICAR INFORMACION DE PASAJEROS\n";
    echo "4.VER LOS DATOS \n";
    echo "5.SALIR \n";
    echo "\nIngrese su opción: ";
    $eleccion = solicitarNumeroEntre(1, 5);
    
    return $eleccion;
}



function solicitarNumeroEntre($min, $max){
    //int $numero
    $numero = trim(fgets(STDIN));
    while (!is_int($numero) && !($numero >= $min && $numero <= $max)) {
        echo "Debe ingresar un número entre " . $min . " y " . $max . ": ";
        $numero = trim(fgets(STDIN));
    }
    return $numero;
}




function cargarPasajeros($cantPasajeros){
    // arreglo $pasajeros , string $nombre , $apellido, int $dni
    for ($i=1; $i < $cantPasajeros+1 ; $i++) { 
        echo "Ingrese el nombre del pasajero ". $i. ": ";
        $nombre = trim(fgets(STDIN));
        echo "Ingrese el apellido del pasajero ". $i. ": ";
        $apellido = trim(fgets(STDIN));
        echo "Ingrese el DNI del pasajero ". $i. ": ";
        $dni = trim(fgets(STDIN));
        $pasajeros[$i]=["nombre"=>$nombre, "apellido"=>$apellido, "numeroDocumento"=>$dni];
    }
    return $pasajeros;

}


function nombreClave($clave){
   if($clave==1){
        $clave = "nombre";
   }
   elseif($clave==2){
        $clave = "apellido";
   }
   else{
        $clave = "numeroDocumento";
   }
    return $clave;
}


function modificar($clave){
    if($clave==1){
        echo "Ingrese un nombre nuevo: ";
        $modificacion = trim(fgets(STDIN));

   }
   elseif($clave==2){
        echo "Ingrese un apellido nuevo: ";
        $modificacion = trim(fgets(STDIN));

}
   else{
        echo "Ingrese un numero de documento nuevo: ";
        $modificacion = trim(fgets(STDIN));

}
    return $modificacion;
}


/********************************************************/
/****************** PROGRAMA PRINCIPAL ******************/
/********************************************************/


do {
    $opcion= seleccionarOpcion();
   
    switch ($opcion) {
        //CARGA INFORMACION DEL VIAJE
        case 1: 
            //string $destino int $codigo $cantPasajeros array $viajeCargado
            echo "ingrese el  destino del viaje: ";
            $destino = trim(fgets(STDIN));
            echo "ingrese el codigo de viaje: ";
            $codigo = trim(fgets(STDIN));
            echo "ingrese la cantidad de pasajeros: ";
            $cantPasajeros = trim(fgets(STDIN));
            $pasajerosCargados = cargarPasajeros($cantPasajeros);
            $objViajes = new Viaje($codigo, $destino, $cantPasajeros, $pasajerosCargados);
            //$objViajes->imprimirPasajeros($pasajerosCargados);
            break;
        //CARGA LOS DATOS DE LOS PASAJEROS
        case 2:
            echo "modifique el  destino del viaje: ";
            $destino2 = trim(fgets(STDIN));
            echo "modifique el codigo de viaje: ";
            $codigo2 = trim(fgets(STDIN));
            $objViajes->modificarViaje($destino2, $codigo2);
            break;
        //MODIFICA LOS DATOS DE LOS PASAJEROS
        case 3:
            echo "ingrese el numero del pasajero que desea modificar: ";
            $numPasajero = solicitarNumeroEntre(0,$cantPasajeros);
            echo "1.MODIFICAR NOMBRE: \n";
            echo "2.MODIFICAR APELLIDO: \n";
            echo "3.MODIFICAR NUMERO DE DOCUMENTO: \n";
            $numeroElegido = solicitarNumeroEntre(1,3);
            $claveArreglo = nombreClave($numeroElegido);
            $modificacion = modificar($numeroElegido) ;
            $objViajes->modificarPasajeros($numPasajero, $claveArreglo, $modificacion);
            break;
        //MUESTRA CON __TOSTRING EL OBJETO
        case 4:
            //$objViajes->imprimirPasajeros($pasajerosCargados);
            echo $objViajes . "\n";
            break;
    }
   
} while ($opcion != 5);

