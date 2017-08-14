'use strict';

angular.module('myApp.preview', ['ngRoute'])

    .config(['$routeProvider', function($routeProvider) {
        $routeProvider.when('/preview', {
            templateUrl: 'view/preview.html',
            controller: 'PreviewCtrl'
        });
    }])
    .filter('toCh',function(){
        return function(e){
            var str="";
            if(e==1){
                str = "一";
            }else if(e==2){
                str = "二";
            }else if(e==3){
                str = "三";
            }else if(e==4){
                str = "四";
            }else if(e==4){
                str = "五";
            }
            return str;
        }
    })
    .controller('PreviewCtrl', function($scope,$http,apiService) {
        $scope.paper = angular.fromJson(sessionStorage.getItem('paper'));
        
        $http.get('/api/exam_test/getList/paperid/'+$scope.paper['paper_id']).then(function (resp) {
            $scope.datas = apiService.verifyDate(resp);
        })
    });