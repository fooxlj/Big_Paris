<?php
/**
 * Created by PhpStorm.
 * User: fooxlj
 * Date: 14/12/2015
 * Time: 15:11
 */
session_start();

$sex = ['man','woman'];
//$age = ['13-17','18-24','25-34','35-49','50-64','65+'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "grand_paris";

$stationID = $_POST['stationID'];
$lineNom = 'line'.$_POST['lineID'];
$noRecord = false;

$_SESSION["station"] =  $_POST['station'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data = '{"name":"data", "children":[';
for($i=0;$i<count($sex);$i++) {
    $age = array();
    $sql = "SELECT DISTINCT(age) FROM ".$lineNom." WHERE sex = '".$sex[$i]."' AND stationID = ".$stationID;
    $result = $conn->query($sql);
    if (empty($result) === false) {
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                array_push($age, $row['age']);
            }
        } else {
            echo "0 results";
        }
    }
    $data = $data . '{"name":"' . $sex[$i] . '","children":[';
    for ($j = 0; $j < count($age); $j++) {
        $data = $data . '{"name":"' . $age[$j] . '","children":[';
        $sql = "SELECT count(*) as num, country from ".$lineNom."  WHERE  stationID=".$stationID."  AND  sex ='".$sex[$i]."' AND age='".$age[$j]."' group by country;";
        $result = $conn->query($sql);
        if (empty($result) === false) {
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                      $data = $data.'{"name":"'.$row['country'].'","size":'.$row['num'].'},';
//                    array_push($parms,$str);
                }
            } else {
                echo "0 results";
            }
          $data = substr($data, 0, -1).']}';
       }else{
            $noRecord=true;
        }
        $data =$data.',';
    }
    $data = substr($data, 0, -1).']},';
   // $data = substr($data, 0, -1).']}';
}
$data = substr($data, 0, -1).']}';
//$data = $data.']}';
if($noRecord){
   echo true;
}else{
    $_SESSION["data"] = $data;
}

$conn->close();