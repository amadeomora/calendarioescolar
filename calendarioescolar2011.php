<?php // Curso 2011

$provisional = false;            // true / false

$f[ 1][ 9] = 'iniciocurso';     // Inicio del curso
$f[14][ 9] = 'inicioclases';    // Inicio de clases (según niveles)
$f[20][ 9] = 'inicioclases';    // ídem
$f[ 3][10] = 'inicioclases';    // ídem
$f[26][ 6] = 'finclases';       // Fin de clases (según niveles)
$f[30][ 6] = 'fincurso';        // Fin de curso

$f[ 9][ 9] = 'festivo';         // Santa M� de la Cabeza
$f[31][10] = 'nolectivo';         
$f[12][10] = 'festivo';         // Hispanidad (ESP)
$f[ 1][11] = 'festivo';         // Todos los santos
$f[ 9][11] = 'festivo';         // Almudena
$f[ 6][12] = 'festivo';         // Constitución (ESP)
$f[ 8][12] = 'festivo';         // Concepción
$f[ 9][12] = 'nolectivo';   
$f[25][12] = 'festivo';         // Navidad (ESP)
$f[ 1][ 1] = 'festivo';         // Año Nuevo (ESP)
$f[ 6][ 1] = 'festivo';         // Reyes (ESP)
//$f[28][ 1] = 'nolectivo';       // Patrón de la enseñanza
//$f[25][ 2] = 'nolectivo';       // 
$f[19][ 3] = 'festivo';         // San José (CM)
$f[30][ 4] = 'nolectivo';
$f[ 1][ 5] = 'festivo';         // Día del trabajo (E)
$f[ 2][ 5] = 'festivo';         // Comunidad (CM)
$f[15][ 5] = 'festivo';         // San Isidro (M)
//$f[23][ 6] = 'festivo';         // Corpus Christi (CM)

$navidad['inicio'] = array(23, 12); // Dia de inicio de las fiestas navideñas => array(día, mes);
$navidad['fin']    = array(8, 1);

$semanasanta['inicio'] = array(30, 3);
$semanasanta['fin']    = array(9, 4);
?>
