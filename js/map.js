
ymaps.ready(init);

function init() {
    // Если есть данные о занятиях, создаем карты динамически
    if (window.lessonsData && Array.isArray(window.lessonsData)) {
        window.lessonsData.forEach(function(lesson) {
            if (lesson.map_link && lesson.latitude && lesson.longitude) {
                var mapLinkId = lesson.map_link.replace('#', '');
                var mapContainerId = 'map-' + mapLinkId;
                var mapContainer = document.getElementById(mapContainerId);
                var modalElement = document.getElementById(mapLinkId);
                
                if (mapContainer && modalElement) {
                    // Функция инициализации карты
                    var initMap = function() {
                        if (mapContainer.hasAttribute('data-initialized')) {
                            // Карта уже инициализирована, просто обновляем размер
                            var mapInstance = ymaps.Map.getById(mapContainerId);
                            if (mapInstance) {
                                setTimeout(function() {
                                    mapInstance.container.fitToViewport();
                                }, 100);
                            }
                            return;
                        }
                        
                        // Проверяем, что контейнер видим
                        if (mapContainer.offsetWidth === 0 && mapContainer.offsetHeight === 0) {
                            // Контейнер еще не видим, попробуем позже
                            setTimeout(function() {
                                if (!mapContainer.hasAttribute('data-initialized')) {
                                    initMap();
                                }
                            }, 300);
                            return;
                        }
                        
                        var map = new ymaps.Map(mapContainerId, {
                            center: [parseFloat(lesson.latitude), parseFloat(lesson.longitude)],
                            zoom: 18,
                            controls: ["zoomControl", "fullscreenControl"]
                        });
                        
                        var placemark = new ymaps.Placemark(
                            [parseFloat(lesson.latitude), parseFloat(lesson.longitude)],
                            {
                                balloonContent: lesson.address || lesson.park_name,
                                hintContent: lesson.park_name
                            },
                            {
                                preset: 'islands#blueDotIcon'
                            }
                        );
                        
                        map.geoObjects.add(placemark);
                        mapContainer.setAttribute('data-initialized', 'true');
                    };
                    
                    // Функция проверки видимости модального окна
                    var checkModalVisibility = function() {
                        var hash = window.location.hash.replace('#', '');
                        // Модальное окно открыто через :target, если hash соответствует его ID
                        var isVisible = hash === mapLinkId;
                        
                        // Дополнительная проверка через стили (на случай, если используется другой способ открытия)
                        if (!isVisible) {
                            var computedStyle = window.getComputedStyle(modalElement);
                            isVisible = computedStyle.display !== 'none' && 
                                       computedStyle.opacity !== '0' &&
                                       modalElement.offsetParent !== null;
                        }
                        
                        if (isVisible && !mapContainer.hasAttribute('data-initialized')) {
                            setTimeout(function() {
                                initMap();
                            }, 300);
                        } else if (isVisible && mapContainer.hasAttribute('data-initialized')) {
                            // Если карта уже инициализирована, обновляем размер
                            var mapInstance = ymaps.Map.getById(mapContainerId);
                            if (mapInstance) {
                                setTimeout(function() {
                                    mapInstance.container.fitToViewport();
                                }, 200);
                            }
                        }
                    };
                    
                    // Проверяем при загрузке страницы (если модальное окно уже открыто через hash)
                    // Используем несколько проверок с задержками для надежности
                    setTimeout(function() {
                        checkModalVisibility();
                    }, 100);
                    
                    setTimeout(function() {
                        checkModalVisibility();
                    }, 500);
                    
                    // Также проверяем после полной загрузки DOM
                    if (document.readyState === 'loading') {
                        document.addEventListener('DOMContentLoaded', function() {
                            setTimeout(function() {
                                checkModalVisibility();
                            }, 200);
                        });
                    } else {
                        setTimeout(function() {
                            checkModalVisibility();
                        }, 200);
                    }
                    
                    // Отслеживаем изменения hash в URL
                    window.addEventListener('hashchange', function() {
                        checkModalVisibility();
                    });
                    
                    // Инициализируем карту при открытии модального окна
                    // Находим все ссылки, которые открывают это модальное окно
                    var linkElements = document.querySelectorAll('a[href="#' + mapLinkId + '"]');
                    linkElements.forEach(function(link) {
                        link.addEventListener('click', function(e) {
                            // Небольшая задержка, чтобы модальное окно успело открыться
                            setTimeout(function() {
                                checkModalVisibility();
                            }, 300);
                        });
                    });
                    
                    // Также отслеживаем изменения видимости модального окна
                    var observer = new MutationObserver(function(mutations) {
                        checkModalVisibility();
                    });
                    
                    observer.observe(modalElement, { 
                        attributes: true, 
                        attributeFilter: ['style', 'class'],
                        childList: false,
                        subtree: false
                    });
                }
            }
        });
    }
    
    // Обратная совместимость: создаем старые карты, если они есть в DOM
    var oldMaps = [
        { id: 'map-1', center: [55.616092, 37.674804] },
        { id: 'map-2', center: [55.655762, 37.654233] },
        { id: 'map-3', center: [55.711822, 37.560917] },
        { id: 'map-4', center: [55.667296, 37.533005] },
        { id: 'map-5', center: [55.787516, 37.534455] },
        { id: 'map-6', center: [55.700833, 37.556801] },
        { id: 'map-7', center: [55.592555, 37.673502] },
        { id: 'map-8', center: [55.690477, 37.753919] },
        { id: 'map-9', center: [55.700602, 37.764278] }
    ];
    
    oldMaps.forEach(function(mapConfig) {
        var mapElement = document.getElementById(mapConfig.id);
        if (mapElement && !mapElement.hasAttribute('data-initialized')) {
            var map = new ymaps.Map(mapConfig.id, {
                center: mapConfig.center,
                zoom: 18,
                controls: ["zoomControl", "fullscreenControl"]
            });
            
            var placemark = new ymaps.Placemark(mapConfig.center, null, {
                preset: 'islands#blueDotIcon'
            });
            
            map.geoObjects.add(placemark);
            mapElement.setAttribute('data-initialized', 'true');
        }
    });
}
