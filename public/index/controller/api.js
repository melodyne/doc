/**
 * Created by chen on 2017/5/6.
 */
'use strict';

angular.module('myApp.api', ['ngRoute'])

    .config(['$routeProvider', function($routeProvider) {
        $routeProvider.when('/api', {
            templateUrl: 'view/api.html',
            controller: 'ApiCtrl'
        });
    }])
    .controller('ApiCtrl', function($scope,$http,$location,apiService) {

        $scope.paper = angular.fromJson(sessionStorage.getItem('paper'));

        if(!($scope.paper.status==0||$scope.paper.status==1)){
            window.history.back();
        }

        $scope.getExam = function () {
            $http.get('/api/exam_test/getList/paperid/'+$scope.paper['paper_id']).then(function (resp) {
                $scope.datas = apiService.verifyDate(resp);
            })
        }
        $scope.getExam();

        //作答(单选、多选、判断)
        $scope.makeAnswer = function (id,ans,type) {
            var data = {
                "extestid": id,
                "answer": ans.trim(),
                'type':type
            };
            $http.post('/api/exam_test/saveAnswer',data).then(function (resp) {
                if(resp['data']['code']==100){
                    $scope.getExam();
                }else {
                    alert("答案保存失败，请联系管理员！");
                }
            })
        }

        //作答（填空、解答）
        $scope.makeAnswer2 = function (id,$event) {
            var data = {
                "extestid": id,
                "answer": $event.target.value.trim(),
            };
            $http.post('/api/exam_test/saveAnswer',data).then(function (resp) {
                if(resp['data']['code']==100){
                    $scope.getExam();
                }else {
                    alert("答案保存失败，请联系管理员！");
                }
            })
        }

        //提交试卷
        $scope.submit = function () {
            if(!confirm("提交后不能继续答题了哦，是否确认提交试卷！")){
                return;
            }
            var data = {
                paper_id:$scope.paper['paper_id'],
                status:2
            };
            $http.post('/api/paper/updOne',data).then(function (resp) {
                if(resp['data']['code']==100){
                    alert("试卷已提交！");
                    $location.path("/paper");
                }else if(resp['data']['code']==400){
                    alert("你还有题没有完成哦！");
                }else {
                    alert("试卷提交失败，请联系管理员！");
                }
            })
        }

    });

