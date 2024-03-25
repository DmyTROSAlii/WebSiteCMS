<?php
function getVar($name, $dev_val = "")
{
	$val = $dev_val;
	if (isset($_POST[$name]))
		$val = $_POST[$name];
	else if (isset($_GET[$name]))
		$val = $_GET[$name];

	return $val;
}
//=============================================

function sort_name_down_dir($a, $b)
{
	if ($a['dir'] && !$b['dir']) {
		return 1;
	} else if (!$a['dir'] && $b['dir'])
		return -1;
	else {
		return strcmp($a['fname'], $b['fname']);
	}
}
function sort_name_up_dir($a, $b)
{
	if ($a['dir'] && !$b['dir']) {
		return -1;
	} else if (!$a['dir'] && $b['dir'])
		return 1;
	else {
		return strcmp($a['fname'], $b['fname']);
	}
}
//=============================================

function sort_name_up_size($a, $b)
{
	if ($a["size"] == $b["size"]) {
		return 0;
	}
	return ($a["size"] < $b["size"]) ? 1 : -1;
}
function sort_name_down_size($a, $b)
{
	if ($a["size"] == $b["size"]) {
		return 0;
	}
	return ($a["size"] < $b["size"]) ? -1 : 1;
}
//=============================================

function sort_name_up_name($a, $b)
{
	if ($a["fname"] == $b["fname"]) {
		return 0;
	}
	return ($a["fname"] < $b["fname"]) ? 1 : -1;
}
function sort_name_down_name($a, $b)
{
	if ($a["fname"] == $b["fname"]) {
		return 0;
	}
	return ($a["fname"] < $b["fname"]) ? -1 : 1;
}
//=============================================

function sort_name_up_date($a, $b)
{
	if ($a["date"] == $b["date"]) {
		return 0;
	}
	return ($a["date"] < $b["date"]) ? 1 : -1;
}
function sort_name_down_date($a, $b)
{
	if ($a["date"] == $b["date"]) {
		return 0;
	}
	return ($a["date"] < $b["date"]) ? -1 : 1;
}
//=============================================

function sort_name($a, $b)
{
	if ($a['dir'] && !$b['dir'])
		return -1;
	elseif (!$a['dir'] && $b['dir'])
		return 1;
	else
		return strcmp($a['fname'], $b['fname']);
}

function format_size($size)
{
	$metr[0] = 'байт';
	$metr[1] = 'Кбайт';
	$metr[2] = 'Мбайт';
	$metr[3] = 'Гбайт';
	$metr[4] = 'Тбайт';
	$metric = 0;
	while (floor($size / 1024) > 0) {
		$metric++;
		$size /= 1024;
	}
	$result = round($size, 1) . " " .
		(isset($metr[$metric]) ? $metr[$metric] : '???');
	return $result;
}

function create_array($curDir)
{
	$flist = array();
	$d = opendir($curDir);
	while ($fname = readdir($d)) {
		$flist[] = array(
			"fname" => $fname,
			"dir" => is_dir($fname),
			"size" => filesize($fname),
			"date" => filectime($fname)
		);
	}
	closedir($d);
	usort($flist, "sort_name");
	if (isset($_POST['sort_up_dir'])) {
		usort($flist, "sort_name_up_dir");
	} else if (isset($_POST['sort_down_dir'])) {
		usort($flist, "sort_name_down_dir");
	} else if (isset($_POST['sort_up_size'])) {
		usort($flist, "sort_name_up_size");
	} else if (isset($_POST['sort_down_size'])) {
		usort($flist, "sort_name_down_size");
	} else if (isset($_POST['sort_up_date'])) {
		usort($flist, "sort_name_up_date");
	} else if (isset($_POST['sort_down_date'])) {
		usort($flist, "sort_name_down_date");
	} else if (isset($_POST['sort_up_name'])) {
		usort($flist, "sort_name_up_name");
	} else if (isset($_POST['sort_down_name'])) {
		usort($flist, "sort_name_down_name");
	}
	return $flist;
}

function create_table($flist, $curDir, $baseDir_bool)
{
	echo '<table class = "table_dir">';
	foreach ($flist as $fitem) {
		$fname = $fitem['fname'];
		if ($fname == ".") {
			continue;
		}
		if ($baseDir_bool) {
			if ($fname != "..") {
				echo '<tr>
                                <td id="name_dir" style="width: 150px;">' . '<br><button name="newDir" class="button" value="' . $curDir . "/" . $fname . '">' . $fname . '</button>' . '</td>
                                <td>' . ($fitem['dir'] ? ' DIR ' : 'FILE') . '</td>
                                <td>' . format_size($fitem['size']) . '</td>
                                <td>' . date("d.m.Y H:i", $fitem['date']) . '</td>
                            </tr>';
			}
		} else {
			echo '<tr>
                                <td id="name_dir" style="width: 150px;">' . '<br><button name="newDir" class="button" value="' . $curDir . "/" . $fname . '">' . $fname . '</button>' . '</td>
                                <td>' . ($fitem['dir'] ? ' DIR ' : 'FILE') . '</td>
                                <td>' . format_size($fitem['size']) . '</td>
                                <td>' . date("d.m.Y H:i", $fitem['date']) . '</td>
                            </tr>';
		}
	}
	echo '</table>';
}



//==========================SHOP=============================

function parse_parametrs($node)
{
	$tmpName = array();
	$tmpValue = array();
	$i = 0;
	foreach ($node->childNodes as $params) {
		$tmpName[$i] = $params->getAttribute('pname');
		$tmpValue[$i] = $params->nodeValue;
		$i++;
	}
	return array_combine($tmpName, $tmpValue);
}

function parse_product($product) {
	foreach ($product->childNodes as $spec) {
		switch ($spec->nodeName) {
			case "type":
				$valueType = $spec->nodeValue;
				break;
			case "singer":
				$valueSinger = $spec->nodeValue;
				break;
			case "title":
				$valueTitle = $spec->nodeValue;
				break;
			case "price":
				$valuePrice = $spec->nodeValue;
				break;
			case "image":
				$valueImage = $spec->nodeValue;
				break;
			case "params":
				$parametrs[] = parse_parametrs($spec);
				break;
		}
	}
	$valueID = $product->getAttribute('id');
	return array(
		"id" => $valueID,
		"image" => $valueImage,
		"type" => $valueType,
		"singer" => $valueSinger,
		"title" => $valueTitle,
		"price" => $valuePrice
	);
}