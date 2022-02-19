<?php
/**
 * anual.php
 *
 * @author  Amadeo Mora amadeomora(@)gmail.com
 * @update	20170802
 * @version 1.0
 */

/**
 * Si no se pasa el año se detecta el curso actual
 */
if (isset($_GET['curso'])) {
	$curso = $_GET['curso'];
} else {
	$dat = mktime();
	$curso = date('Y', $dat);
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
$fichero = 'calendarioescolar'.($curso-1).'.php';
if (file_exists($fichero)) {
	include_once($fichero);
	$f1 = $f; unset($f);
}
$fichero = 'calendarioescolar'.($curso).'.php';
if (file_exists($fichero)) {
	include_once($fichero);
	$f2 = $f; unset($f);
}
for ($i=1; $i<=31; $i++) for ($j=1; $j<=6; $j++) if (isset($f1[$i][$j])) $f[$i][$j] = $f1[$i][$j];
unset($f1);
for ($i=1; $i<=31; $i++) for ($j=9; $j<=12; $j++) if (isset($f2[$i][$j])) $f[$i][$j] = $f2[$i][$j];
unset($f2);
navidad(isset($navidad) ? $navidad : null);
semanasanta($curso, isset($semanasanta) ? $semanasanta : null);
fiestasfijas();

/**
 * Se analizan las fiestas de navidad
 *
 * @param optional array('inicio'=>array(int dia,int mes), 'fin'=>array(int dia, int mes))
 */
function navidad($navidad) {
	global $f;

	if ($navidad == null) {
		$navidad['inicio'] = array(24, 12);
		$navidad['fin']    = array(6, 1);
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

	$f[12][10] = 'festivo';	// Hispanidad (ESP)
	$f[ 1][ 5] = 'festivo';	// Dia del trabajo (ESP)
	$f[ 2][ 5] = 'festivo';	// Comunidad (CM)
	$f[15][ 5] = 'festivo';	// San Isidro (M)
	$f[15][ 8] = 'festivo';	//  (ESP)
}

/**
 * Muestra un mes
 *
 * @param int mes
 * @param int año
 */
function mes($m, $a) {
	global $dias, $meses;

	$dat = mktime(0, 0, 0, $m, 1, $a);
	$diasemana = (date('w',$dat) ? date('w', $dat) : 7) - 1;
	$totaldias = date('t',$dat);

	echo <<< EOT
		<table class="calendario">
		<caption>{$meses[$m]}</caption>
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
		echo '<td></td>';
	}

	for($d=1; $d<=$totaldias; $d++) {
		dia($d, $m, $a);
	}

	echo <<< EOT
		</tr>
		</tbody>
		</table>
EOT;
}

/**
 * Muestra un día según sus características
 *
 * @param int dia
 * @param int mes
 * @param int año
 */
function dia($d, $m, $a) {
	global $f;

	$dat = mktime(0, 0, 0, $m, $d, $a);
	$diasemana = (date('w',$dat) ? date('w', $dat) : 7) - 1;

	switch ($diasemana) {
		case 5: // Sábado
			echo '<td class="nolectivo">'.$d.'</td>';
			break;
		case 6: // Domingo
			echo '<td class="nolectivo">'.$d.'</tr><tr>';
			break;
		default:
			if (isset($f[$d][$m])) {
				echo '<td class="'.$f[$d][$m].'">'.$d.'</td>';
			} else {
				echo '<td>'.$d.'</td>';
			}
	}
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
 * Muestra la leyenda
 */
function leyenda() {
	global $txt;

	echo <<< EOT
		<table class="calendario" summary="{$txt['Clave']}">
			<caption>{$txt['Clave']} </caption>
			<colgroup><col width='100'></colgroup>
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
}

?>
<!DOCTYPE html>
<html lang="<?php echo $idioma; ?>">
<head>
	<meta charset="UTF-8" />
	<title><?php echo $txt['Calendario']; ?></title>
	<meta name="author" content="Amadeo Mora (amadeomora(@)gmail.com)">
	<style type="text/css">
	h1 { font-size: 125%;}
	a { color: #aaa; text-decoration: none; }
	#calendario { font: normal 11px Tahoma, Arial, sans-serif; margin: 0; padding: 0; padding-bottom: 1.5em; text-align: center; }
	table.calendario { font-size: 100%; text-align: center; border: 1px solid #ddd; margin: 0.5em; float: left; }
	table.calendario caption { color: #033799; font-weight: bold; padding: 0.2em; }
	table.calendario tr {}
	table.calendario thead th { color: #033799; font-weight: normal; padding: 0.1em; }
	table.calendario td { padding-top: 0.2em; padding: 0.1em 0.3em 0.1em 0.3em; }
	table.calendario td.domingo { color: #f00; }
	table.calendario td.iniciocurso { background-color: #0f0; }
	table.calendario td.inicioclases { background-color: #9f6; }
	table.calendario td.festivo { background-color: #f00; color: #fff; }
	table.calendario td.nolectivo { background-color: orange; color: #fff; }
	table.calendario td.finclases { background-color: #6495ed; color: #fff; }
	table.calendario td.fincurso { background-color: #708090; color: #fff; }
	</style>
</head>
<body>
<h1>
	<a href="anual.php?lang=<?php echo $idioma; ?>&curso=<?php echo ($curso-1); ?>">&lt;&lt;</a>
	<?php echo $txt['CALENDARIO']; ?>
	<?php echo $curso; ?>
	<a href="anual.php?lang=<?php echo $idioma; ?>&curso=<?php echo ($curso+1); ?>">&gt;&gt;</a>
</h1>
<div id="calendario">
<?php mes( 1, $curso); ?>
<?php mes( 2, $curso); ?>
<?php mes( 3, $curso); ?>
<?php mes( 4, $curso); ?>
<div style="clear: left;"> </div>
<?php mes( 5, $curso); ?>
<?php mes( 6, $curso); ?>
<?php mes( 7, $curso); ?>
<?php mes( 8, $curso); ?>
<div style="clear: left;"> </div>
<?php mes( 9, $curso); ?>
<?php mes(10, $curso); ?>
<?php mes(11, $curso); ?>
<?php mes(12, $curso); ?>
<div style="clear: left;"> </div>
<?php leyenda(); ?>
</div>
</body>
</html>
