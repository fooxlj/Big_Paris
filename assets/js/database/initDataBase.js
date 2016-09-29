/**
 * Created by fooxlj on 08/12/2015.
 */

var paramsString = "";

function initDataBase(){
$.getJSON("../assets/json/lines_stations.json",function(data){

    var params = [];
    for(var i =0 ; i <data.length ; i++){
        alert(data[i].PROPERTIES.ID);
        if (data[i].PROPERTIES.ID == "15est"){
            alert(data[i].PROPERTIES.ID);
            break;
        }
        for(var j = 0 ; j<data[i].STATIONS.length ;j++){
            var json = {lineID:"", stationID:"", latitude:"", longitude:""};
            json.lineID = data[i].PROPERTIES.ID;
            json.stationID = data[i].STATIONS[j].ID;
            json.latitude = data[i].STATIONS[j].COORDINATES[1];
            json.longitude = data[i].STATIONS[j].COORDINATES[0];
            params.push(json);
        }
    }
    paramsString = JSON.stringify(params);
    $.ajax({

        type: "POST",
        url: "initDatabase.php",
        data: {stations : paramsString},
        cache: false,
        success: function(info){

         //   alert(info);
        }
    });
});
}



