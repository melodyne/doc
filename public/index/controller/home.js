'use strict';

angular.module('myApp.home', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/home', {
    templateUrl: 'view/home.html',
    controller: 'HomeCtrl'
  });
}])

.controller('HomeCtrl', function($scope,$http) {
  $http.get("/api/index/index").then(function (response) {
    $scope.datas = response['data'];
  });
});