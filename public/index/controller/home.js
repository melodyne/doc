'use strict';

angular.module('myApp.home', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/home', {
    templateUrl: 'view/home.html',
    controller: 'HomeCtrl'
  });
}])

.controller('HomeCtrl', function($scope,$http) {
  $http.get("/api/project/index").then(function (response) {
    $scope.datas = response['data'];
    $('.pro_menu').css('border', '1px solid #c9c9c9');// 给导航加边框
  });
});