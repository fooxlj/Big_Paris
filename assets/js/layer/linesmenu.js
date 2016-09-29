/**
 * Created by fooxlj on 13/12/2015.
 */

$.getJSON('./assets/json/lines_stations.json', function(data) {
    var output="";
    for(var i =0 ; i<data.length ; i++){
        output = output+'<li class="dropdown"><a id="' +
        "l" +data[i].PROPERTIES.ID+
        '" class="dropdown-toggle" data-toggle="dropdown">' +
        '<img src="./assets/images/metro/L_M.png" width="15px" height="15px"/>' +
        '<img src="./assets/images/metro/M_' + data[i].PROPERTIES.ID +'.png" width="15px" height="15px"/>' +
        " LIGNE " + data[i].PROPERTIES.ID+
        '<b class="fa fa-plus dropdown-plus"></b></a>' +
        '<ul class="dropdown-menu">' ;

        for(var j= 0; j < data[i].STATION.length;j++){
            output = output +
                '<li><a id="s'+data[i].STATION[j].id+'"><i class="fa fa-caret-right"></i>' +
                data[i].STATION[j].station +
                '<p id="ps'+data[i].STATION[j].id+'" style="display:none">'+data[i].STATION[j].coordinates[0]+','+data[i].STATION[j].coordinates[1]+'</p></a></li>';
        }
    output += '</ul></li>';
    }
    $("#menu_lines").html(output);
});

$("#menu_lines").delegate('a[id^="s"]','click',function(e){
    var lid = "p"+e.currentTarget.id;
    var cor = $('#'+lid).text().split(",");
    setViewPoint(cor[1],cor[0]);
});
