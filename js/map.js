

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

    myMap.geoObjects.add(myPlacemark);
    myMap1.geoObjects.add(myPlacemark1);
    myMap2.geoObjects.add(myPlacemark2);
    myMap3.geoObjects.add(myPlacemark3);

}