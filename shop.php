<?php
$arr_products = array();
$valueType = null;
$valueSinger = null;
$valueTitle = null;
$valuePrice = 0;
$valueImage = 0;
$parametrs[] = null;

include "php/func.php";

$domxml = new DOMDocument;
$domxml->load("data/data.xml", LIBXML_NOBLANKS);
if ($domxml->validate()) {
	$products = $domxml->getElementsByTagName('product');
	foreach ($products as $product) {
		$newprod = parse_product($product);
		$arr_products[] = $newprod;
	}

	include "php/header.php";

	echo '<table>
        <tr>
            <th>ID</td>
            <th>Image</td>
            <th>Type</td>
            <th>Singer</td>
            <th>Title</td>
            <th>Price, ₴</td>
        </tr>';
	for ($i = 0; $i < count($arr_products); $i++) {
		echo '<tr>
            <td>' . $arr_products[$i]["id"] . '</td>
            <td><img src="' . (isset($arr_products[$i]["image"]) ? $arr_products[$i]["image"] : "") . '" width="100px" height="100px"></td>
            <td>' . $arr_products[$i]["type"] . '</td>
            <td>' . $arr_products[$i]["singer"] . '</td>
            <td>' . $arr_products[$i]["title"] . '</td>
            <td>' . $arr_products[$i]["price"] . '</td>
			<td><button>BUY</button></td>
            </tr>';
	}
	echo '</table>';
}


include "php/footer.php";
