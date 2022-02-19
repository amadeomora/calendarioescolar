<?php
/**
 * calendarioescolar.php
 *
 * @author  Amadeo Mora amadeomora(@)gmail.com
 * @since   20091201
 * @version 20.06
 */

/**
 * Si no se pasa el curso se detecta el curso actual
 */
if (isset($_GET['curso'])) {
	$curso = $_GET['curso'];
} else {
	$dat = time();
	$curso = date('Y', $dat);
	if ((int)date('m', $dat) < 7) $curso--;	// Hasta Junio inclusive
}

/**
 * Idioma
 */
$idioma = isset($_GET['lang']) ? $_GET['lang'] : 'default';
$ini = parse_ini_file('calendarioescolar.ini', true);
$txt = isset($ini[$idioma]) ? $ini[$idioma] : $ini['default'];
$dias = explode(',', $txt['dias']);
$meses = explode(',', $txt['meses']);

/**
 * Se busca el fichero de configuración de ese curso
 */
$provisional = true;
$fichero = 'calendarioescolar'.$curso.'.php';
if (file_exists($fichero)) {
    include_once($fichero);
}
navidad(isset($navidad) ? $navidad : null);
semanasanta($curso+1, isset($semanasanta) ? $semanasanta : null);
fiestasfijas();

/**
 * Se analizan las fiestas de navidad
 *
 * @param optional array('inicio'=>array(int dia,int mes), 'fin'=>array(int dia, int mes))
 */
function navidad($navidad) {
	global $f;

	if ($navidad == null) {
		$navidad['inicio'] = [24, 12];
		$navidad['fin']    = [6, 1];
	}

	$mes = 12;
	for ($i=$navidad['inicio'][0]; $i<=31; $i++) {
		if (!isset($f[$i][$mes])) {
			$f[$i][$mes] = 'nolectivo';
		}
	}
	$mes = 1;
	for ($i=1; $i<=$navidad['fin'][0]; $i++) {
		if (!isset($f[$i][$mes])) {
			$f[$i][$mes] = 'nolectivo';
		}
	}
	$f[25][12] = 'festivo';	// Navidad (ESP)
	$f[ 1][ 1] = 'festivo';	// Ano Nuevo (ESP)
	$f[ 6][ 1] = 'festivo'; // Reyes (CM)
}

/**
 * Se analizan las fiestas de semana santa
 *
 * @param int año
 * @param optional array('inicio'=>array(int dia,int mes), 'fin'=>array(int dia, int mes))
 */
function semanasanta($ano, $semanasanta) {
	global $f;

	if ($semanasanta == null) {
		$semanasanta['inicio'] = diassantos($ano, -9);
		$semanasanta['fin'] = diassantos($ano, 1);
	}

	$mes = $semanasanta['inicio'][1];
	if ($mes == $semanasanta['fin'][1]) {
		for ($i=$semanasanta['inicio'][0]; $i<=$semanasanta['fin'][0]; $i++) {
			if (!isset($f[$i][$mes])) {
				$f[$i][$mes] = 'nolectivo';
			}
		}
	} else {
		for ($i=$semanasanta['inicio'][0]; $i<=31; $i++) {
			if (!isset($f[$i][$mes])) {
				$f[$i][$mes] = 'nolectivo';
			}
		}
		$mes++;
		for ($i=1; $i<=$semanasanta['fin'][0]; $i++) {
			if (!isset($f[$i][$mes])) {
				$f[$i][$mes] = 'nolectivo';
			}
		}
	}
	$dia = diassantos($ano, -3);
	$f[$dia[0]][$dia[1]] = 'festivo';	// Jueves santo (ESP)
	$dia = diassantos($ano, -2);
	$f[$dia[0]][$dia[1]] = 'festivo';	// Viernes santo (ESP)
}

/**
 * Se marcan las fiestas fijas
 */
function fiestasfijas() {
	global $f;

	$f[ 6][12] = 'festivo';	// Constitucion (ESP)
	$f[12][10] = 'festivo';	// Hispanidad (ESP)
	$f[ 1][ 5] = 'festivo';	// Dia del trabajo (ESP)
	$f[ 2][ 5] = 'festivo';	// Comunidad (CM)
	$f[15][ 5] = 'festivo';	// San Isidro (M)
}

/**
 * Devuelve un mes
 *
 * @param int mes
 * @param int año
 * @return string
 */
function mes($m, $a) {
	global $dias, $meses;

	$dat = mktime(0, 0, 0, $m, 1, $a);
	$diasemana = (date('w',$dat) ? date('w', $dat) : 7) - 1;
	$totaldias = date('t',$dat);

	$out =<<< EOT
		<table class="calendario">
		<caption>{$meses[$m]} {$a}</caption>
		<colgroup><col width='14%'><col width='14%'><col width='14%'><col width='14%'><col width='14%'><col width='14%'><col width='14%'></colgroup>
		<thead>
			<tr>
				<th>{$dias[1]}</th>
				<th>{$dias[2]}</th>
				<th>{$dias[3]}</th>
				<th>{$dias[4]}</th>
				<th>{$dias[5]}</th>
				<th>{$dias[6]}</th>
				<th>{$dias[7]}</th>
			</tr>
		</thead>
		<tbody>
		<tr>
EOT;

	for($i=0; $i<$diasemana; $i++) {
		$out .= '<td></td>';
	}

	for($d=1; $d<=$totaldias; $d++) {
		$out .= dia($d, $m, $a);
	}

	$out .=<<< EOT
		</tr>
		</tbody>
		</table>
EOT;

	return $out;
}

/**
 * Devuelve un día según sus características
 *
 * @param int dia
 * @param int mes
 * @param int año
 * @return string
 */
function dia($d, $m, $a) {
	global $f;

	$dat = mktime(0, 0, 0, $m, $d, $a);
	$diasemana = (date('w',$dat) ? date('w', $dat) : 7) - 1;

	if ($diasemana == 6) return '<td class="domingo">'.$d.'</tr><tr>';
	if (isset($f[$d][$m])) return '<td class="'.$f[$d][$m].'">'.$d.'</td>';
	return '<td>'.$d.'</td>';
}

/**
 * La pascua es el domingo de resurrección
 *
 * @param int año
 * @return time fecha del domingo de resurrección
 */
function pascua($ano) {
	$m = 24;
	$n = 5;
	$a = $ano % 19;
	$b = $ano % 4;
	$c = $ano % 7;
	$d = (19 * $a + $m) % 30;
	$e = (2 * $b + 4 * $c + 6 * $d + $n) % 7;
	if ($d + $e < 10) {
		$dia = $d + $e + 22;
		$mes = 3; //marzo
	} else {
		$dia = $d + $e - 9;
		$mes = 4; //abril
	}
	// Casos especiales
	if ($dia == 26 && $mes == 4) $dia = 19;
	if ($dia == 25 && $mes == 4 && $d == 28 && $e == 6 && $a > 10) $dia = 18;
	//
	return mktime(0, 0, 0, $mes, $dia, $ano);
}

/**
 * Días relacionados con la pascua
 *
 * @param int año
 * @param int número de días respecto el domingo de resurrección
 * @return array(int dia, int mes)
 */
function diassantos($ano, $desplazamiento) {
	$dat = pascua($ano);
	$dia = $dat + $desplazamiento * 60 * 60 * ($desplazamiento < 0 ? 23 : 25);
	return array((int)date('d',$dia), (int)date('m',$dia));
}

/**
 * Devuelve la leyenda
 * 
 * @return string
 */
function leyenda() {
	global $txt;

	$out =<<< EOT
		<table class="calendario" summary="{$txt['Clave']}">
			<caption>{$txt['Clave']} </caption>
			<colgroup><col width="100"></colgroup>
			<tbody>
				<tr><td class="iniciocurso">{$txt['Inicio curso']}</td></tr>
				<tr><td class="inicioclases">{$txt['Inicio clases']}</td></tr>
				<tr><td class="nolectivo">{$txt['No lectivo']}</td></tr>
				<tr><td class="festivo">{$txt['Día festivo']}</td></tr>
				<tr><td class="finclases">{$txt['Fin clases']}</td></tr>
				<tr><td class="fincurso">{$txt['Fin curso']}</td></tr>
			</tbody>
		</table>
EOT;

	return $out;
}

/**
 * Devuelve el mensaje de calendario provisional
 * 
 * @return string
 */
function provisional($provisional) {
	global $txt;

	if ($provisional) {
		$out =<<< EOT
			<table summary="{$txt['Provisional']}">
				<caption>*&nbsp;{$txt['calendario provisional']}</caption>
				<colgroup><col width="170"></colgroup>
			</table>
EOT;
		return $out;
	}
}

/**
 * Devuelve la cabecera
 * 
 * @return string
 */
function cabecera($curso, $idioma, $provisional) {
	global $txt;

	$cursoPrev = $curso - 1;
	$cursoPost = $curso + 1;
	$marca = $provisional ? ' *' : '';
	$out =<<< EOT
		<a href="index.php?lang={$idioma}&curso={$cursoPrev}">&lt;&lt;</a>
		{$txt['CALENDARIO ESCOLAR']}
		{$curso}-{$cursoPost}
		{$marca}
		<a href="index.php?lang={$idioma}&curso={$cursoPost}">&gt;&gt;</a>
EOT;
	return $out;
}
?>
<!DOCTYPE html>
<html lang="<?= $idioma ?>">
<head>
<title><?= $txt['CALENDARIO ESCOLAR'] ?></title>
<meta name="author" content="Amadeo Mora (amadeomora(@)gmail.com)">
<link rel="stylesheet" href="style.css">
</head>
<body>
<h1><?= cabecera($curso, $idioma, $provisional) ?></h1>
<div id="calendario">
<?= mes( 9, $curso) ?>
<?= mes(10, $curso) ?>
<?= mes(11, $curso) ?>
<?= mes(12, $curso) ?>
<br class="clear">
<?= mes( 1, $curso+1) ?>
<?= mes( 2, $curso+1) ?>
<?= mes( 3, $curso+1) ?>
<?= mes( 4, $curso+1) ?>
<br class="clear">
<?= mes( 5, $curso+1) ?>
<?= mes( 6, $curso+1) ?>
<?= leyenda(); ?>
<br class="clear">
<?= provisional($provisional) ?>
</div>
</body>
</html>
