<?php

switch($valor->Tipo){
    case 1:
        echo "Vacaciones";
    break;
    case 2:
        echo "Enfermedad común";
    break;
    case 3:
        echo "Baja laboral";
    break;
    case 4:
        echo "Permiso maternidad/paternidad";
    break;
    case 5:
        echo "Permiso nacimiento/fallecimiento/enfermedad grave familiar";
    break;
    case 6:
        echo "Permiso por matrimonio";
    break;
    case 7:
        echo "Permiso NO retribuido";
    break;
    case 8:
        echo "Permiso por traslado vivienda";
    break;
    case 9:
        echo "Permiso retribuido";
    break;
    case 10:
        echo "Horas sindicales";
    break;    
}
?>