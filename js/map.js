

ymaps.ready(init);

function init() {
    var myMap = new ymaps.Map("map-1", {
        center: [55.616092, 37.674804],
        zoom: 18,
        controls: ["zoomControl", "zoomControl", "fullscreenControl"]

    });
    var myMap1 = new ymaps.Map("map-2", {
        center: [55.655762, 37.654233],
        zoom: 18,
        controls: ["zoomControl", "zoomControl", "fullscreenControl"]

    });
     var myMap2 = new ymaps.Map("map-3", {
    	center: [55.711822, 37.560917],
    	zoom: 18,
        controls: ["zoomControl", "zoomControl", "fullscreenControl"]

     });
     var myMap3 = new ymaps.Map("map-4", {
    	center: [55.667296, 37.533005],
    	zoom: 18,
        controls: ["zoomControl", "zoomControl", "fullscreenControl"]

     });

     var myMap4 = new ymaps.Map("map-5", {
    	center: [55.787516, 37.534455],
    	zoom: 18,
        controls: ["zoomControl", "zoomControl", "fullscreenControl"]

     });
     var myMap5 = new ymaps.Map("map-6", {
    	center: [55.700833, 37.556801],
    	zoom: 18,
        controls: ["zoomControl", "zoomControl", "fullscreenControl"]

     });
     var myMap6 = new ymaps.Map("map-7", {
    	center: [55.592555,37.673502],
    	zoom: 18,
        controls: ["zoomControl", "zoomControl", "fullscreenControl"]

     });
    var myPlacemark = new ymaps.Placemark([55.616092, 37.674804], null, {
        preset: 'islands#blueDotIcon'
    });
    var myPlacemark1 = new ymaps.Placemark([55.655762, 37.654233], null, {
        preset: 'islands#blueDotIcon'
    });
    var myPlacemark2 = new ymaps.Placemark([55.711822, 37.560917], null, {
        preset: 'islands#blueDotIcon'
    });
    var myPlacemark3 = new ymaps.Placemark([55.667296, 37.533005], null, {
        preset: 'islands#blueDotIcon'
    });
    var myPlacemark4 = new ymaps.Placemark([55.787516, 37.534455], null, {
        preset: 'islands#blueDotIcon'
    });
    var myPlacemark5 = new ymaps.Placemark([55.700833, 37.556801], null, {
        preset: 'islands#blueDotIcon'
    });
    var myPlacemark6 = new ymaps.Placemark([55.592555,37.673502], null, {
        preset: 'islands#blueDotIcon'
    });
    myMap.geoObjects.add(myPlacemark);
    myMap1.geoObjects.add(myPlacemark1);
    myMap2.geoObjects.add(myPlacemark2);
    myMap3.geoObjects.add(myPlacemark3);
    myMap4.geoObjects.add(myPlacemark4);
    myMap5.geoObjects.add(myPlacemark5);
    myMap6.geoObjects.add(myPlacemark6);
}