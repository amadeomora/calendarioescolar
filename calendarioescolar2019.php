<?php // Curso 2019

$provisional = true;            // true / false

$f[ 2][ 9] = 'iniciocurso';     // Inicio del curso
$f[10][ 9] = 'inicioclases';    // Inicio de clases
$f[23][ 6] = 'finclases';       // Fin de clases (s/niveles)
$f[30][ 6] = 'fincurso';        // Fin de curso

//$f[ 9][ 9] = 'festivo';       // Santa Maria de la Cabeza (M)
//$f[13][ 10] = 'nolectivo';
//$f[11][10] = 'festivo';
$f[31][10] = 'nolectivo';
$f[ 1][11] = 'festivo';         // Todos los santos (ESP)
//$f[ 2][11] = 'nolectivo';
$f[ 9][11] = 'festivo';         // Almudena (M)
$f[ 6][12] = 'nolectivo';
$f[ 9][12] = 'festivo';         // Inmaculada Concepcion (ESP)
//$f[28][ 1] = 'nolectivo';     // Patron de la ensenanza
$f[28][ 2] = 'nolectivo';
$f[ 2][ 3] = 'nolectivo';
$f[ 1][ 5] = 'festivo';         // Di­a del trabajo (ESP)
$f[ 2][ 5] = 'festivo';         // Comunidad (CM)
//$f[23][ 6] = 'festivo';       // Corpus Christi (CM)

// Navidad
$navidad['inicio'] = [21, 12];  // Dia de inicio => array(dd, mm);
$navidad['fin']    = [7, 1];    // Dia de fin => array(dd, mm);
