<?php
require_once 'vendor/spout/Autoloader/autoload.php';
require_once 'basics/config.php';
require_once 'basics/conexion.php';

use Box\Spout\Writer\WriterFactory;
use Box\Spout\Common\Type;
use Box\Spout\Writer\Style\StyleBuilder;
use Box\Spout\Writer\Style\Color;

$fileName = "full_db_catalytic.xlsx";
$columnas = "id, artistid";

$style = (new StyleBuilder())
           ->setFontBold()
           //->setFontSize(15)
           //->setFontColor(Color::BLUE)
           ->setShouldWrapText(false)
           ->setBackgroundColor(Color::rgb(220, 255, 230))
           ->build();

$style2 = (new StyleBuilder())
           ->setFontColor(Color::rgb(10, 10, 10))
           ->setShouldWrapText(false)
           ->build();

$writer = WriterFactory::create(Type::XLSX); // for XLSX files
//$writer = WriterFactory::create(Type::CSV); // for CSV files
//$writer = WriterFactory::create(Type::ODS); // for ODS files

//$writer->openToFile($filePath); // write data to a file or to a PHP stream
$writer->openToBrowser($fileName); // stream data directly to the browser

//$writer->addRow($singleRow); // add a row at a time
//$writer->addRows($multipleRows); // add multiple rows at a time

$sheet = $writer->getCurrentSheet();
$sheet->setName('full_db_catalytic');

//$writer->addRowWithStyle(['id', 'artistid', 'albumname', 'albumartist', 'personnel', 'label', 'releaseyear', 'formats', 'bandcamplink', 'bandcampembedid', 'quantity', 'wholesalecost', 'physical', 'albumcredits', 'coverlink', 'newadd', 'newrelease'], $style); //Header
$writer->addRowWithStyle(['Album Id', 'Artist Id', 'Album Name', 'Album Artist', 'Personnel', 'Label', 'Year of Release', 'Formats', 'Bandcamp Link', 'Bandcamp embed id', 'Quantity', 'Wholesale Cost', 'Physical', 'Album Credits', 'Cover Link', 'New Addition tag', 'New Release tag'], $style); //Header

$array = array();
$sqlx = "SELECT * FROM full_db WHERE act = 1 ORDER BY id ASC";
$result = $conn->query($sqlx);
if ($result->num_rows > 0) {
// output data of each row
	while($rowx = $result->fetch_assoc()) {

		//$array[$rowx['id']] = $rowx;
		//foreach ($rowx as $key => $value) {
		//	$array[$key] = $value;
			
		//}

    	//echo "$value, ";
		//$writer->addRowWithStyle([$array[$value]], $style); //Header
		//$writer->addRow([$rowx[$key]]);

		//echo "'$key, '";
    	//echo "'$rowx[$key]', "; // Same output as previous line
    	//}

    	$writer->addRowWithStyle([$rowx['id'], $rowx['artistid'], $rowx['albumname'], $rowx['albumartist'], $rowx['personnel'], $rowx['label'], $rowx['releaseyear'], $rowx['formats'], $rowx['bandcamplink'], $rowx['bandcampembedid'], $rowx['quantity'], $rowx['wholesalecost'], $rowx['physical'], $rowx['albumcredits'], $rowx['coverlink'], $rowx['newadd'], $rowx['newrelease']], $style2);
    	
	}
}

//$writer->addRowWithStyle(['id', 'artistid'], $style); //Header
//$writer->addRow(['2012-12-25', 'Easter gift', 444, 'ARS']);

$writer->close();
$result->free();  
?>