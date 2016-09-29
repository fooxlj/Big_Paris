/**
 * Created by fooxlj on 12/12/2015.
 */


var map = L.map('map').setView([48.853, 2.333], 13);

L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
    maxZoom: 18,
    id: 'fooxlj.cif6m4cxk006lucm4w4hwvoy3',
    accessToken: 'pk.eyJ1IjoiZm9veGxqIiwiYSI6ImNpZjZtNGQ0dTAwNnJ0bW0wam5uanY1M2UifQ.Nc2pMGpyVuorfo4RdooUvQ'
}).addTo(map);

var svg = d3.select(map.getPanes().overlayPane).append("svg");
var linesGroup = svg.append("g").attr("class", "leaflet-zoom-hide");
var stationsGroup = svg.append("g").attr("class", "leaflet-zoom-hide");
var rootWidth,previousWidth;

queue()
    .defer(d3.json,"./assets/json/stations.json")
    .defer(d3.json, "./assets/json/lines.json")
    .await(ready);

//Loading and Projecting GeoJSON
function ready(error,stations, lines) {

    var radius = d3.scale.linear()
        .domain([0, d3.max(stations.features, function(d) { return +d.properties.TRAFIC; })])
        .range([2, 50]);
    // Use Leaflet to implement a D3 geometric transformation.
    function projectPoint(x, y) {
        var point = map.latLngToLayerPoint(new L.LatLng(y, x));
        this.stream.point(point.x, point.y);
    }
//  Create a d3.geo.path to convert GeoJSON to SVG
    var transform = d3.geo.transform({ point: projectPoint });
    var path = d3.geo.path().projection(transform);
    // create path elements for each of the features

    featureStation = stationsGroup.selectAll(".station")
        .data(stations.features)
        .enter().append("path")
        .attr("class", "station")
        .attr("id", function(d){ return "s_" + d.properties.ID; })
        .attr("d", path)
        .style("fill", function(d) { return (d.properties.COLORS.indexOf('-') > 0 ? "#B8B8B8" : d.properties.COLORS); })
        //.style("z-index", function(d){ return Math.floor(50 - (d.properties.TRAFIC / 1000000)); })
        .on("click",function(d){
            map.setView(new L.LatLng(d.geometry.coordinates[1], d.geometry.coordinates[0]),16);
            var linesID = d.properties.LINES.split("-");
            onClickPoint(d.properties.ID,linesID[0],d.properties.STATION);
        });

    featureLine = linesGroup.selectAll("lines")
        .data(lines.features)
        .enter()
        .append("path")
        .attr('class', 'line')
        .attr('id', function(d) { return 'l' + d.properties.LINE; })
        .attr("d", path)
        .style("stroke", function(d) { return d.properties.COLOR; });

    map.on("viewreset", reset);
    reset();

    // Fit the SVG element to leaflet's map layer
    // Reposition the SVG to cover the features.
    function reset() {
        var bounds = path.bounds(stations),
            topLeft = bounds[0],
            bottomRight = bounds[1];

        svg.attr("width", bottomRight[0] - topLeft[0])
            .attr("height", bottomRight[1] - topLeft[1])
            .style("left", topLeft[0] + "px")
            .style("top", topLeft[1] + "px");

        linesGroup.attr("transform", "translate(" + -topLeft[0] + "," + -topLeft[1] + ")");
        stationsGroup.attr("transform", "translate(" + -topLeft[0] + "," + -topLeft[1] + ")");

        featureLine.attr("d", path);

        if (rootWidth === undefined) { // rootWidth means max range for stations radius = 50
            rootWidth = bottomRight[0] - topLeft[0];
            previousWidth = rootWidth;
        }

        var newWidth = bottomRight[0] - topLeft[0];
        if (previousWidth != newWidth) {
            radius.range([2, 50 * (newWidth / rootWidth)]);
        }
        featureStation.attr("d", path.pointRadius(function(d) { return radius(d.properties.TRAFIC) }));
        previousWidth = newWidth;
    }
}

function setViewPoint (lat,lng){
    map.setView(new L.LatLng(lat, lng),17);
}