<?php // Curso 2018

$provisional = true;            // true / false

$f[ 1][ 9] = 'iniciocurso';     // Inicio del curso
$f[10][ 9] = 'inicioclases';    // Inicio de clases (s/niveles)
//$f[19][ 9] = 'inicioclases';    // Idem
//$f[22][ 9] = 'inicioclases';    // Idem
$f[21][ 6] = 'finclases';       // Fin de clases (s/niveles)
$f[28][ 6] = 'fincurso';        // Fin de curso

//$f[ 9][ 9] = 'festivo';		// Santa Maria de la Cabeza (M)
//$f[13][ 10] = 'nolectivo';
//$f[31][10] = 'nolectivo';         
$f[ 1][11] = 'festivo';		// Todos los santos (ESP)
$f[ 2][11] = 'nolectivo';        
$f[ 9][11] = 'festivo';			// Almudena (M)
$f[ 7][12] = 'nolectivo';
$f[ 8][12] = 'festivo';   		// Inmaculada Concepcion (ESP)
//$f[28][ 1] = 'nolectivo';		// Patron de la ensenanza
$f[ 1][ 3] = 'nolectivo';
$f[ 4][ 3] = 'nolectivo';
//$f[19][ 3] = 'festivo';		// San Jose (CM)
//$f[30][ 4] = 'nolectivo';
$f[ 3][ 5] = 'nolectivo';		// Comunidad (CM)
//$f[23][ 6] = 'festivo';		// Corpus Christi (CM)

// Navidad
$navidad['inicio'] = array(23, 12); 	// Dia de inicio => array(dd, mm);
$navidad['fin']    = array(7, 1); 		// Dia de fin
?>
