
var overlay = angular.module('dash',[]);

overlay.controller('classlist', function ($scope) {

    var xmlhttp  = new XMLHttpRequest();
    var svsu   = "https://api.svsu.edu/courses";

    xmlhttp.onreadystatechange=function() {

        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
            $scope.svsuJSON = JSON.parse(xmlhttp.responseText);
        }

    }

    xmlhttp.open("GET", svsu, true);
    xmlhttp.send();

    $scope.add = function(a) {
        $scope.myClassList.push(a);
    };

    $scope.setSelected = function(a) {


        $scope.class = "class-row-item selected";

        console.log("tuo");

    }

    $scope.myClassList = [];
    $scope.visible = false;
});

overlay.controller('weather', function($scope){

    var xmlhttp2 = new XMLHttpRequest();
    var wunder = "http://api.openweathermap.org/data/2.5/weather?zip=48609,us";

    xmlhttp2.onreadystatechange=function() {

        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200){
            $scope.weatherJSON = JSON.parse(xmlhttp2.responseText);
            $scope.path = 'http://openweathermap.org/img/w/'+ $scope.weatherJSON.weather[0].icon +'.png';
            $scope.$digest();
        }

    }

    xmlhttp2.open("GET", wunder, true);
    xmlhttp2.send();

    $scope.path = '';

});

overlay.controller('todoList', function($scope){

    var xmlhttp2 = new XMLHttpRequest();
    var wunder = "";

    xmlhttp2.onreadystatechange=function() {

        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200){
            $scope.weatherJSON = JSON.parse(xmlhttp2.responseText);
            $scope.path = 'http://openweathermap.org/img/w/'+ $scope.weatherJSON.weather[0].icon +'.png';
            $scope.$digest();
        }

    }

    //xmlhttp2.open("GET", wunder, true);
    //xmlhttp2.send();

    
});
