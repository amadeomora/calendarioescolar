<?php // Curso 2014

$provisional = true;				// true / false

$f[ 1][ 9] = 'iniciocurso';     // Inicio del curso
$f[11][ 9] = 'inicioclases';    // Inicio de clases
$f[22][ 9] = 'inicioclases';    // Inicio de clases
$f[ 1][10] = 'inicioclases';    // Inicio de clases
$f[19][ 6] = 'finclases';       // Fin de clases
$f[30][ 6] = 'fincurso';        // Fin de curso

//$f[ 9][ 9] = 'festivo';         // Santa Mª de la Cabeza (M)
$f[31][10] = 'nolectivo';         
$f[12][10] = 'festivo';         // Hispanidad (ESP)
$f[ 1][11] = 'festivo';         // Todos los santos (ESP)
$f[ 9][11] = 'festivo';         // Almudena (M)
$f[10][11] = 'festivo';         // Almudena (M) aplazamiento
$f[28][11] = 'nolectivo';        
$f[ 6][12] = 'festivo';         // Constitución (ESP)
$f[ 8][12] = 'nolectivo';
$f[25][12] = 'festivo';         // Navidad (ESP)
$f[ 1][ 1] = 'festivo';         // Año Nuevo (ESP)
$f[ 6][ 1] = 'festivo';         // Reyes (ESP)
//$f[28][ 1] = 'nolectivo';       // Patrón de la enseñanza
$f[13][ 2] = 'nolectivo';       // 
$f[19][ 3] = 'festivo';         // San José (CM)
$f[ 1][ 5] = 'festivo';         // Día del trabajo (ESP)
$f[ 2][ 5] = 'festivo';         // Comunidad (CM)
//$f[ 3][ 5] = 'nolectivo';         // Comunidad (CM)
$f[15][ 5] = 'festivo';         // San Isidro (M)
$f[4][ 6] = 'festivo';         // Corpus Christi (CM)

$navidad['inicio'] = array(20, 12); // Dia de inicio de las fiestas de navidad => array(dd, mes);
$navidad['fin']    = array(7, 1);

$semanasanta['inicio'] = array(27, 3);
$semanasanta['fin']    = array(6, 4);
?>
