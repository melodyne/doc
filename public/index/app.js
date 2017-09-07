'use strict';

// Declare web level module which depends on views, and components
angular.module('myApp', [
    'ngRoute',
    'myApp.home',
    'myApp.subject',
    'myApp.topic',
    'myApp.paper',
    'myApp.preview',
    'myApp.sys',
    'myApp.exam',
    'myApp.yuejuan',
    "ui.bootstrap"
]).
config(['$locationProvider', '$routeProvider', function($locationProvider, $routeProvider,apiServiceProvider) {
  $locationProvider.hashPrefix('!');
  $routeProvider.otherwise({redirectTo: '/home'});
}])
.provider("apiService",function(){

    this.$get = function(){

        return {
            verifyDate:function verifyDate(resp) {
                var rt=resp['data'];
                if(rt['code']==100){ //成功
                    console.log(rt);
                    return rt['data'];
                }else if(rt['code']==101){//未登录
                    window.location.href="login.html";
                }else {
                    alert(rt['msg']);
                }
            }
        }
    }
})
//核心控制器
.controller("mainCtrl",function($scope,$http){

    // $scope.loginUser = angular.fromJson(sessionStorage.loginUser);
    // if(!$scope.loginUser){
    //     window.location.href="login.html";
    // }
    // if($scope.loginUser['user_type']==1){
    //     $scope.userTypeName = "业务员";
    // }else {
    //     $scope.userTypeName = "系统管理员";
    // }

    //时间选择器
    $scope.open2 = function() {
        $scope.popup2.opened = true;
    };

    $scope.popup2 = {
        opened: false
    };
    //时间选择器 end

    $scope.logout = function () {
        $http.get("/Api/User/logout").then(function(resp){
            if(resp['data']['code']==100){
                alert("成功退出登录！");
            }else {
                alert(['data']['msg']);
            }
            sessionStorage.loginUser=null;
            window.location.href="login.html";
        })
    }
});