<html>
<head>
<meta name=viewport content="width=device-width, initial-scale=1">
<title> Get distance between two cities using PHP | DreamsCoder.com </title>

</head>
<body bgcolor="gray">
<center><form action="" method="post">
<br><h1>Get the distance between two cities </h1>
<table cellspacing="10" cellpadding="20"><tr><td>
<font size="6" ><b>Source : </b></font></td><td><br>
<input type"text" name="source"  placeholder="Starting point" size="25" >
<font size="2"> (Optional) 
<br>if you don'y enter source it will fetch your current location</font></td></tr>
<tr><td>
<font size="6"><b>Destination : </b></td><td>
<input type="text" name="destination" required="required" 
placeholder="Destination" size="25">
<font color="red"> &nbsp;* </font></td></tr>

</table>
<br/>
<input type="submit" name="submit" value="Get distance"/> <input type="reset"/> 
<br><br><h2>
<a href="http://www.dreamscoder.com/viewprogram.php?id=107">View Source Code</a></h2>
</form>

<br><br><brDreamscoder.com<>
</body>
</html>



<?php

if(isset($_POST['submit']))
{


function getDistance($addressFrom, $addressTo, $unit){
	//Change address format
    $formattedAddrFrom = str_replace(' ','+',$addressFrom);
    $formattedAddrTo = str_replace(' ','+',$addressTo);
    
	//Send request and receive json data
    $geocodeFrom = file_get_contents
('http://maps.google.com/maps/api/geocode/json?address='.$formattedAddrFrom.'&sensor=false');
    $outputFrom = json_decode($geocodeFrom);
    $geocodeTo = file_get_contents
('http://maps.google.com/maps/api/geocode/json?address='.$formattedAddrTo.'&sensor=false');
    $outputTo = json_decode($geocodeTo);
    
	//Get latitude and longitude from geo data
    $latitudeFrom = $outputFrom->results[0]->geometry->location->lat;
    $longitudeFrom = $outputFrom->results[0]->geometry->location->lng;
    $latitudeTo = $outputTo->results[0]->geometry->location->lat;
    $longitudeTo = $outputTo->results[0]->geometry->location->lng;
    
	//Calculate distance from latitude and longitude
    $theta = $longitudeFrom - $longitudeTo;
    $dist = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) + 
cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;
    $unit = strtoupper($unit);
    if ($unit == "K") {
        return ($miles * 1.609344).' km';
    } else if ($unit == "N") {
        return ($miles * 0.8684).' nm';
    } else {
        return round($miles).' miles';
    }
}


/*Getting users IP */

 if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    

/*Users IP code end*/

$source = $_POST['source'];
$destination = $_POST['destination'];

if($source == "")
{
$geo = unserialize(file_get_contents
("http://www.geoplugin.net/php.gp?ip=$ipaddress"));
$city = $geo["geoplugin_city"];

}
else
$city = $source;
if($destination == "")
{
$destination = $city;
}

echo "<font size='5'><br>Distance between <u>$city</u> to <u>$destination</u> is '". 
$dis = getDistance($city,$destination,'M')."'"; 
//If you want distance in KM change 'M' to 'K'


}//submit

?>
 