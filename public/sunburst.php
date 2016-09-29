<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Population</title>
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/sunburst/createSunburst.js"></script>
    <script src="../assets/js/d3.js"></script>
<!--    <script src="//d3js.org/d3.v3.min.js"></script>-->
    <script src="../assets/js/sunburst/sequences.js"></script>
<!--    <link rel="stylesheet" type="text/css"-->
<!--          href="https://fonts.googleapis.com/css?family=Open+Sans:400,600">-->
    <link rel="stylesheet" type="text/css" href="../assets/css/sequences.css"/>

    <script>
       $('document').ready(function(){
           var json = $("#data").text();
           var station = $("#station").text();
           createVisualization(json,station);
       });
    </script>
</head>
<div id="main">
    <div id="sequence"></div>
    <div id="chart">
    </div>
    <div id="explanation" style="visibility: hidden;">
        <span id="percentage"></span><br/>
    </div>
</div>
<?php
//  echo $_SESSION["data"];
echo '<div id="data" style="display:none" >'. $_SESSION["data"].'</div>';
echo '<div id="station" style="display:none">'. $_SESSION["station"].'</div>'
?>

<script type="text/javascript" src="../assets/js/sunburst/sequences.js"></script>
<script src="../assets/js/sunburst/createSunburst.js"></script>
<script src="../assets/js/sunburst/sequences.js"></script>
<?php
// remove all session variables
session_unset();

// destroy the session
session_destroy();
?>
</body>
</html>