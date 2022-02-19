<?php // Curso 2015/16

$provisional = false;            // true / false

$f[ 1][ 9] = 'iniciocurso';     // Inicio del curso
$f[11][ 9] = 'inicioclases';    // Inicio de clases (s/niveles)
$f[21][ 9] = 'inicioclases';    // Idem
$f[ 1][10] = 'inicioclases';    // Idem
$f[21][ 6] = 'finclases';       // Fin de clases (s/niveles)
$f[30][ 6] = 'fincurso';        // Fin de curso

//$f[ 9][ 9] = 'festivo';		// Santa Maria de la Cabeza (M)
$f[12][10] = 'festivo';			// La Hispanidad         
//$f[31][10] = 'nolectivo';         
//$f[ 1][11] = 'festivo';		// Todos los santos (ESP)
$f[ 2][11] = 'nolectivo';        
$f[ 9][11] = 'festivo';			// Almudena (M)
$f[ 6][12] = 'festivo';			// Constitucion (ESP)
$f[ 7][12] = 'nolectivo';
$f[ 8][12] = 'festivo';   		// Inmaculada Concepción
//$f[28][ 1] = 'nolectivo';		// Patron de la enseñanza
$f[8][ 2] = 'nolectivo';
//$f[19][ 3] = 'festivo';		// San Jose (CM)
//$f[30][ 4] = 'nolectivo';
//$f[ 3][ 5] = 'nolectivo';		// Comunidad (CM)
//$f[23][ 6] = 'festivo';		// Corpus Christi (CM)

// Navidad
$navidad['inicio'] = array(23, 12); 	// Dia de inicio => array(dd, mm);
$navidad['fin']    = array(7, 1); 		// Dia de fin

// Semana santa
$semanasanta['inicio'] = array(18, 3); 	// Dia de inicio => array(dd, mm);
$semanasanta['fin']    = array(29, 3);	// Dia de fin

// Fiestas fijas
$f[12][10] = 'festivo';         // Hispanidad (ESP)
$f[25][12] = 'festivo';         // Navidad (ESP)
$f[ 1][ 1] = 'festivo';         // Ano Nuevo (ESP)
$f[ 6][ 1] = 'festivo';         // Reyes (CM)
$f[ 1][ 5] = 'festivo';         // Dia del trabajo (ESP)
$f[ 2][ 5] = 'festivo';         // Comunidad (CM)
$f[15][ 5] = 'festivo';         // San Isidro (M)
$f[16][ 5] = 'festivo';         // San Isidro (M) por ser domingo
?>
