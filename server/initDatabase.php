<?php
/**
 * Created by PhpStorm.
 * User: fooxlj
 * Date: 11/12/2015
 * Time: 19:29
 */

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "grand_paris";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    echo "connect fail";
}

$stations = json_decode(stripslashes($_POST['stations']));
$oldLineID = 0;
foreach($stations as $record){
    $lineID = strval($record->lineID);
    $stationID = strval( $record->stationID);
    $latitude = strval($record->latitude);
    $longitude = strval( $record->longitude);
    $lineNom = "instragram_line". $lineID;
    $sql = "";
    if($lineID === $oldLineID){
        $sql = "insert into ".$lineNom."
         select *,".$stationID." as stationID ,( 6371000 * acos ( cos ( radians(".$latitude.") )
          * cos( radians( `latitude` ) )
          * cos( radians(`longitude` ) - radians(".$longitude.") )
          + sin ( radians(".$latitude.") )
          * sin( radians( `latitude`) ) ) )as distance
          from  instagram_new having distance < 250 ";
    }else{
        $oldLineID = $lineID;
        $sql = "create table ".$lineNom." as
        select *,".$stationID." as stationID ,(
            6371000 * acos ( cos ( radians(".$latitude.") )
            * cos( radians( `latitude` ) )
            * cos( radians(`longitude` ) - radians(".$longitude.") )
            + sin ( radians(".$latitude.") )
             * sin( radians( `latitude`) ) ) )as distance
from instagram_new
having distance < 250";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Update Table  instragram successfully";
    } else {
        echo "Error Update Table  instragram: " . $conn->error;
    }
}

$conn->close();
?>