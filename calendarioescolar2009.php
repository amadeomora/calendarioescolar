<?php // Curso 2009

$provisional = false;            // true / false

$f[ 1][ 9] = 'iniciocurso';     // Inicio del curso
$f[16][ 9] = 'inicioclases';    // Inicio de clases (según niveles)
$f[21][ 9] = 'inicioclases';    // ídem
$f[ 5][10] = 'inicioclases';    // ídem
$f[23][ 6] = 'finclases';       // Fin de clases (según niveles)
$f[30][ 6] = 'fincurso';        // Fin de curso

$f[12][10] = 'festivo';         // Hispanidad (ESP)
$f[ 9][11] = 'festivo';         // Almudena
$f[ 6][12] = 'festivo';         // Constitución (ESP)
$f[ 7][12] = 'nolectivo';   
$f[ 8][12] = 'festivo';         // Concepción
$f[25][12] = 'festivo';         // Navidad (ESP)
$f[ 1][ 1] = 'festivo';         // Año Nuevo (ESP)
$f[ 6][ 1] = 'festivo';         // Reyes (ESP)
$f[29][ 1] = 'nolectivo';       // Patrón de la enseñanza
$f[19][ 3] = 'festivo';         // San José (CM)
$f[ 1][ 5] = 'festivo';         // Día del trabajo (E)
$f[ 2][ 5] = 'festivo';         // Comunidad (CM)
$f[15][ 5] = 'festivo';         // San Isidro (M)
$f[ 3][ 6] = 'festivo';         // Corpus Christi (CM)

$navidad['inicio'] = array(23, 12); // Dia de inicio de las fiestas navideñas => array(día, mes);
$navidad['fin']    = array(8, 1);

$semanasanta['inicio'] = array(26, 3);
$semanasanta['fin']    = array(5, 4);
?>
