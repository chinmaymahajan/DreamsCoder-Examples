<?php
session_start();
?>
<html>
   <head>
        <meta charset="UTF-8">
<meta name="description" content="Free Website to Convert files from XML to JSON format">
<meta name="keywords" content="DreamsCoder,XML,JSON, XML Conversion, JSON Format, JSON Array, PHP, free xml to json">
<meta name="author" content="Chinmay Mahajan">
<title> Online XML to JSON Conversion | DreamsCoder.com</title>
</head>
<body>

<?php
$target_dir = "xml/";
$target_file = $target_dir . basename($_FILES["xml"]["name"]);
$uploadOk = 1;
$fileType = pathinfo($target_file,PATHINFO_EXTENSION);
//$file_type = $_FILES['foreign_character_upload']['type'];

            $check = getimagesize($_FILES["xml"]["tmp_name"]);
            $filename = basename( $_FILES["xml"]["name"]);

        if ($uploadOk == 0)
         {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["xml"]["tmp_name"], $target_file)) 
            {
             //   echo "The file ". $filename. " has been uploaded.<br>";
            } else 
            {
                echo "<br><br><br><h1>Sorry, there was an error uploading your file.</h1>";
            }
        }
        if($fileType != "xml")
            {
                echo "<br><br><br><h1> NOT A XML FILE</h1></center>";

            }

$url = 'http://dreamscoder.com/examples/xml_to_json/xml/'.$filename;

$xmlNode = simplexml_load_file($url);
$arrayData = xmlToArray($xmlNode);
function xmlToArray($xml, $options = array()) {
   $defaults = array(
        'namespaceSeparator' => ':',//Seperator
        'attributePrefix' => '@',   //to distinguish between attributes and nodes with the same name
        'alwaysArray' => array(),   //array of xml tag names which should always become arrays
        'autoArray' => true,        //only create arrays for tags which appear more than once
        'textContent' => '$',       //key used for the text content of elements
        'autoText' => true,         //skip textContent key if node has no attributes or child nodes
        'keySearch' => false,       //optional search and replace on tag and attribute names
        'keyReplace' => false       //replace values for above search values 
    );
    $options = array_merge($defaults, $options);
    $namespaces = $xml->getDocNamespaces();
    $namespaces[''] = null; //add base (empty) namespace
 
    //get attributes from all namespaces
    $attributesArray = array();
    foreach ($namespaces as $prefix => $namespace) {
        foreach ($xml->attributes($namespace) as $attributeName => $attribute) {
            //replace characters in attribute name
            if ($options['keySearch']) $attributeName =
                    str_replace($options['keySearch'], $options['keyReplace'], $attributeName);
            $attributeKey = $options['attributePrefix']
                    . ($prefix ? $prefix . $options['namespaceSeparator'] : '')
                    . $attributeName;
                    echo "<br>";
            $attributesArray[$attributeKey] = (string)$attribute;
        }
    }
 
    //get child nodes from all namespaces
    $tagsArray = array();
    foreach ($namespaces as $prefix => $namespace) {
        foreach ($xml->children($namespace) as $childXml) {
            //recurse into child nodes
            $childArray = xmlToArray($childXml, $options);
            list($childTagName, $childProperties) = each($childArray);
 
            //replace characters in tag name
            if ($options['keySearch']) $childTagName =
                    str_replace($options['keySearch'], $options['keyReplace'], $childTagName);
            //add namespace prefix, if any
            if ($prefix) $childTagName = $prefix . $options['namespaceSeparator'] . $childTagName;
 
            if (!isset($tagsArray[$childTagName])) {
                $tagsArray[$childTagName] =
                        in_array($childTagName, $options['alwaysArray']) || !$options['autoArray']
                        ? array($childProperties) : $childProperties;
            } elseif (
                is_array($tagsArray[$childTagName]) && array_keys($tagsArray[$childTagName])
                === range(0, count($tagsArray[$childTagName]) - 1)
            ) {
                
                $tagsArray[$childTagName][] = $childProperties;
            } else {
                
                $tagsArray[$childTagName] = array($tagsArray[$childTagName], $childProperties);
            }
        }
    }
 
    //get text content of node
    $textContentArray = array();
    $plainText = trim((string)$xml);
    if ($plainText !== '') $textContentArray[$options['textContent']] = $plainText;
 
    //stick it all together
    $propertiesArray = !$options['autoText'] || $attributesArray || $tagsArray || ($plainText === '')
            ? array_merge($attributesArray, $tagsArray, $textContentArray) : $plainText;
 
    //return node as array
    return array(
        $xml->getName() => $propertiesArray
    );
}


$jdata = json_encode($arrayData);
echo "<br><br><center><div style='border:solid 2px;margin-left:10%; margin-right:10%;'>".$jdata."</div>";
 //$dt = date("h:i:sa");
 //echo "Date is " . $dt;
 $json = ".json";
 $sid = session_id();
 $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename);


$fnm = $withoutExt.$sid.$json;
echo "<br><b> <h3>Your New Json file is created with name - <a href='json_files/$fnm' target = '_blank'>".$fnm."</a></h3>";

$myfile = fopen("json_files/".$fnm, "w") or die("Unable to open file!");
fwrite($myfile, $jdata);
fwrite($myfile, "Code by DreamsCoder.com");
fclose($myfile);

?>
<br><br>goto This <a href="index.php"> Link</a> for converting again  
<br><br> Source code for XML to JSON is <a href="http://www.dreamscoder.com/viewprogram.php?id=110" target = '_blank'>HERE </a> 
</body>
</html>