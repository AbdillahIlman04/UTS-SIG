<div id="map" style="height : 500px;"></div>


<script>
    var map = new L.Map('map', {
        zoom: 13,
        center: new L.latLng(-5.357195, 105.301113)
    });

    map.addLayer(new L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>,' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11'
    }));
    googleHybrid = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    });
    googleHybrid.addTo(map);

    var iconMarker = L.icon({
        iconUrl: '<?= base_url('assets/images/marker.png') ?>',
        iconSize: [50, 50]

    });

    //Marker Start Position
    var marker = L.marker([-5.357195, 105.301113], {
        icon: iconMarker
    }).bindPopup("My Location").addTo(map).openPopup();

    //Marker Destination
    var lok_array = [{
            "Lokasi": "Institut Teknologi Sumatera",
            "lat": -5.357943837417956,
            "lng": 105.31484949782573
        },
        {
            "Lokasi": "Masjid Airan Raya",
            "lat": -5.358472816988635,
            "lng": 105.30492909295354
        }, {
            "Lokasi": "RS. Airan Raya",
            "lat": -5.34960868246172,
            "lng": 105.2981143961241
        },
        {
            "Lokasi": "Pasar Way Kandis",
            "lat": -5.352457920978493,
            "lng": 105.29130239233592
        },
        {
            "Lokasi": "Pasar Jatimulyo",
            "lat": -5.338154532375201,
            "lng": 105.29368136876253
        },
        {
            "Lokasi": "Polsek Sukarame",
            "lat": -5.3595774139882915,
            "lng": 105.30531571257559
        }
    ];

    var markersLayer = new L.LayerGroup();

    map.addLayer(markersLayer);

    var controlSearch = new L.Control.Search({
        position: 'topleft',
        layer: markersLayer,
        initial: false,
        zoom: 17,
        marker: false
    });

    map.addControl(new L.Control.Search({
        layer: markersLayer,
        initial: false,
        collapsed: true,
        zoom: 17,
    }));

    for (i in lok_array) {
        var popup = lok_array[i].Lokasi;
        var loc = [lok_array[i].lat, lok_array[i].lng];
        var marker = new L.Marker(new L.latLng(loc), {
            title: popup

        });
        marker.bindPopup(popup)
        markersLayer.addLayer(marker);

    }
</script>