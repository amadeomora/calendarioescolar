<?php // Curso 2010

$provisional = false;            // true / false

$f[ 1][ 9] = 'iniciocurso';     // Inicio del curso
$f[15][ 9] = 'inicioclases';    // Inicio de clases (según niveles)
$f[20][ 9] = 'inicioclases';    // ídem
$f[ 4][10] = 'inicioclases';    // ídem
$f[24][ 6] = 'finclases';       // Fin de clases (según niveles)
$f[30][ 6] = 'fincurso';        // Fin de curso

$f[11][10] = 'nolectivo';         
$f[12][10] = 'festivo';         // Hispanidad (ESP)
$f[ 1][11] = 'festivo';         // Todos los santos
$f[ 9][11] = 'festivo';         // Almudena
$f[ 6][12] = 'festivo';         // Constitución (ESP)
$f[ 7][12] = 'nolectivo';   
$f[ 8][12] = 'festivo';         // Concepción
$f[25][12] = 'festivo';         // Navidad (ESP)
$f[ 1][ 1] = 'festivo';         // Año Nuevo (ESP)
$f[ 6][ 1] = 'festivo';         // Reyes (ESP)
//$f[28][ 1] = 'nolectivo';       // Patrón de la enseñanza
$f[25][ 2] = 'nolectivo';       // 
//$f[19][ 3] = 'festivo';         // San José (CM)
$f[ 1][ 5] = 'festivo';         // Día del trabajo (E)
$f[ 2][ 5] = 'festivo';         // Comunidad (CM)
$f[15][ 5] = 'festivo';         // San Isidro (M)
$f[23][ 6] = 'festivo';         // Corpus Christi (CM)

$navidad['inicio'] = array(24, 12); // Dia de inicio de las fiestas navideñas => array(día, mes);
$navidad['fin']    = array(9, 1);

$semanasanta['inicio'] = array(15, 4);
$semanasanta['fin']    = array(25, 4);
?>
