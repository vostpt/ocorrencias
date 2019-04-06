var $ = window.$ = window.jQuery = require('jquery');
require('bootstrap');
require('datatables.net');
require('leaflet/dist/leaflet');
require('flot/dist/es5/jquery.flot');
var omnivore = require('leaflet-omnivore');
var anchorme = require("anchorme").default;

$("#occurrences-table").DataTable();

var $map = $("#map");
if ($map.length) {
    var lat = $map.data('latitude');
    var lon = $map.data('longitude');
    var zoom = $map.data('zoom') !== undefined ? $map.data('zoom') : 14
    var coords = [lat, lon];

    var kmlIcon = L.icon({
        iconUrl: 'https://fogos.pt/img/ico_fire.svg',
        className: 'kml-marker',
        iconSize: [22, 22]
    });
    var fireIcon = L.icon({
        iconUrl: 'https://fogos.pt/img/ico_fire.svg',
        className: 'fire-marker',
        iconSize: [22, 22]
    });
    var map = L.map('map').setView(coords, zoom);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
        maxZoom: 18
    }).addTo(map);

    var kml = $map.data('kml');
    if (kml !== undefined) {
        var kmlLayer = omnivore.kml(kml).on('ready', function () {
            kmlLayer.eachLayer(function (layer) {
                if (layer instanceof L.Marker) {
                    layer.setIcon(kmlIcon);
                }
            });
        }).addTo(map);
    }


    var markers = $map.data('markers');
    console.log(markers);
    if (markers !== undefined) {
        for (var i = 0; i < markers.length; i++) {
            var popup = L.popup({
                autoClose: true
            }).setContent("<strong>" + markers[i].locality + "</strong>" +
                "<br>" + markers[i].type.name + "" +
                "<br>" + markers[i].NumeroOperacionaisTerrestresEnvolvidos + " 👩‍🚒" + markers[i].NumeroMeiosTerrestresEnvolvidos + " 🚒");
            L.marker([markers[i].lat, markers[i].lon], {icon: fireIcon})
                .bindPopup(popup)
                .addTo(map);
        }
    }
    var marker = L.marker(coords, {icon: fireIcon}).addTo(map);
}

var $comment_text = $(".comment-text");

if ($comment_text.length) {
    $comment_text.each(function (idx, obj) {
        var anchors = anchorme($(this).html());
        $(this).html(anchors);
    });
}

// Charts
(function () {
    'use strict';


    $(initFlotBar)

    function initFlotBar() {

        var data = [{
            "label": "Sales",
            "color": "#9cd159",
            "data": [
                ["Jan", 27],
                ["Feb", 82],
                ["Mar", 56],
                ["Apr", 14],
                ["May", 28],
                ["Jun", 77],
                ["Jul", 23],
                ["Aug", 49],
                ["Sep", 81],
                ["Oct", 20]
            ]
        }];

        console.log(data);
        var options = {
            series: {
                bars: {
                    align: 'center',
                    lineWidth: 0,
                    show: true,
                    barWidth: 0.6,
                    fill: 0.9
                }
            },
            grid: {
                borderColor: '#eee',
                borderWidth: 1,
                hoverable: true,
                backgroundColor: '#fcfcfc'
            },
            tooltip: true,
            tooltipOpts: {
                content: function (label, x, y) {
                    return x + ' : ' + y;
                }
            },
            xaxis: {
                tickColor: '#fcfcfc',
                mode: 'categories'
            },
            yaxis: {
                // position: 'right' or 'left'
                tickColor: '#eee'
            },
            shadowSize: 0
        };

        var chart = $('.chart-bar');
        if (chart.length)
            $.plot(chart, data, options);

    }

})();