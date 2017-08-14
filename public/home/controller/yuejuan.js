/**
 * Created by chen on 2017/5/6.
 */
'use strict';

angular.module('myApp.yuejuan', ['ngRoute'])

    .config(['$routeProvider', function($routeProvider) {
        $routeProvider.when('/yuejuan', {
            templateUrl: 'view/yuejuan.html',
            controller: 'YuejuanCtrl'
        });
    }])
    .filter('duoxuan',function(){
        return function(e){
            var str="";
            var answer = angular.fromJson(e);
            for(var p in answer){
                if(answer[p]){
                    str=str+p+'、'
                }
            }
            return str.substr(0,str.length-1);
        }
    })
    .controller('YuejuanCtrl', function($scope,$http,$location,apiService) {

        $scope.paper = angular.fromJson(sessionStorage.getItem('paper'));

        if($scope.paper.status!=2){
            window.history.back();
        }

        $scope.getExam = function () {
            $http.get('/api/exam_test/getList/paperid/'+$scope.paper['paper_id']).then(function (resp) {
                $scope.datas = apiService.verifyDate(resp);
            })
        }
        $scope.getExam();

        $scope.submit = function () {
            if(confirm("该功即将上线，是否离开此页面？")){
                window.history.back();
            }

        }

    });

