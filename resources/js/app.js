var $ = window.$ = window.jQuery = require('jquery');
require('bootstrap');
require('datatables.net');
require('leaflet/dist/leaflet');
var anchorme = require("anchorme").default;

$("#occurrences-table").DataTable();


var $map = $("#map");
if ($map.length) {
    var lat = $map.data('latitude');
    var lon = $map.data('longitude');

    var coords = [lat, lon];

    var map = L.map('map').setView(coords, 14);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
        maxZoom: 18
    }).addTo(map);

    var marker = L.marker(coords).addTo(map);
}

var $comment_text = $(".comment-text");

if ($comment_text.length) {
    $comment_text.each(function (idx, obj) {
        var anchors = anchorme($(this).html());
        $(this).html(anchors);
    });
}
