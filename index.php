<?php

$json = file_get_contents("products.json");
$data=json_decode($json, true);

	$dom = new DOMDocument();

		$dom->encoding = 'utf-8';

		$dom->xmlVersion = '1.0';

		$dom->formatOutput = true;

	$xml_file_name = 'feed.xml';

		$root = $dom->createElement('Products');

		for ($i=0; $i < 10 ; $i++) { 

		    $id = $data[$i]['id'];
		    $name = $data[$i]['name'];
		    $price = $data[$i]['price'];
		    $category = $data[$i]['category'];

		    $product_node = $dom->createElement('product');

			$attr_product_id = new DOMAttr('ID', $id);

			$product_node->setAttributeNode($attr_product_id);

			$child_node_name = $dom->createElement('Name', $name);

			$product_node->appendChild($child_node_name);

			$child_node_price = $dom->createElement('Price', $price);

			$product_node->appendChild($child_node_price);

			$child_node_category = $dom->createElement('Category', $category);

			$product_node->appendChild($child_node_category);

			$root->appendChild($product_node);

			$dom->appendChild($root);

		}

	$dom->save($xml_file_name);

	echo "<a href= ".$xml_file_name.">". $xml_file_name ."</a> has been successfully created";
?>