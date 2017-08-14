'use strict';

angular.module('myApp.sys', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/sys', {
    templateUrl: 'view/sys.html',
    controller: 'SysCtrl'
  });
}])

.controller('SysCtrl', [function() {

}]);