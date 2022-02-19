<?php // Curso 2013

$provisional = false;            // true / false

$f[ 2][ 9] = 'iniciocurso';     // Inicio del curso
$f[11][ 9] = 'inicioclases';    // Inicio de clases
$f[19][ 9] = 'inicioclases';    // Inicio de clases
$f[ 1][10] = 'inicioclases';    // Inicio de clases
$f[20][ 6] = 'finclases';       // Fin de clases
$f[30][ 6] = 'fincurso';        // Fin de curso

//$f[ 9][ 9] = 'festivo';		// Santa Mª de la Cabeza (M)
//$f[31][10] = 'nolectivo';         
$f[12][10] = 'festivo';         // Hispanidad (ESP)
$f[ 1][11] = 'festivo';         // Todos los santos (ESP)
//$f[ 2][11] = 'nolectivo';        
$f[ 9][11] = 'festivo';         // Almudena (M)
$f[ 6][12] = 'festivo';         // Constitución (ESP)
//$f[ 7][12] = 'nolectivo';
//$f[ 9][12] = 'nolectivo';   
$f[25][12] = 'festivo';         // Navidad (ESP)
$f[ 1][ 1] = 'festivo';         // Año Nuevo (ESP)
$f[ 6][ 1] = 'festivo';         // Reyes (ESP)
$f[31][ 1] = 'nolectivo';       // Patrón de la enseñanza
$f[28][ 2] = 'nolectivo';       // 
//$f[19][ 3] = 'festivo';         // San José (CM)
//$f[30][ 4] = 'nolectivo';
$f[ 1][ 5] = 'festivo';         // Día del trabajo (ESP)
$f[ 2][ 5] = 'festivo';         // Comunidad (CM)
//$f[ 3][ 5] = 'nolectivo';		// Comunidad (CM)
$f[15][ 5] = 'festivo';         // San Isidro (M)
$f[19][ 6] = 'festivo';         // Corpus Christi (CM)

$navidad['inicio'] = array(21, 12); // Dia de inicio de las fiestas de navidad => array(dd, mm);
$navidad['fin']    = array(7, 1);

$semanasanta['inicio'] = array(11, 4); // Dia de inicio de las semana santa => array(dd, mm);
$semanasanta['fin']    = array(21, 4);
?>
