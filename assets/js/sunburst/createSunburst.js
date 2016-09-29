/**
 * Created by fooxlj on 14/12/2015.
 */

   function onClickPoint(stationID,lineID,station){

       $.ajax({
           type: "POST",
           data:{'stationID' :stationID , 'lineID' : lineID,'station':station},
           //data:{'stationID' :stationID , 'lineID' : lineID},
           url: "./server/getJson.php",
           cache: false,
           success: function(noRecord){
               if(!noRecord){
                   window.open("public/sunburst.php");
               }
           }
       });
}

