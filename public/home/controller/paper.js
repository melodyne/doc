'use strict';

angular.module('myApp.paper', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/paper', {
    templateUrl: 'view/paper.html',
    controller: 'PaperCtrl'
  });
}])
.filter('xueduan',function(){
    return function(e){
        var str="无学段";
        if(e==1){
            str = "小学";
        }else if(e==2){
            str = "初中";
        }else if(e==3){
            str = "高中";
        }else if(e==4){
            str = "大学";
        }
        return str;
    }
})
    .filter('paperStatus',function() {
        return function (e) {
            var str = "";
            if (e == 0) {
                str = "未答题";
            } else if (e == 1) {
                str = "答题中";
            } else if (e == 2) {
                str = "已交卷";
            } else if (e == 3) {
                str = "已阅卷";
            }
            return str;
        }
    })
.controller('PaperCtrl', function($scope,$http,$location,apiService) {

    $scope.user = angular.fromJson(sessionStorage.getItem('loginUser'));
    //试卷默认配置
    $scope.paper={
        danxuanNum:'20',duanxuanScore:'2',
        duoxuanNum:'5',duoxuanScore:'3',
        puanduanNum:'5',puanduanScore:'3',
        tiankongNum:'10',tiankongScore:'3',
        jiedaNum:'5',jiedaScore:'10',
    }

    //获取科目
    $http.get('/api/user/getSubs').then(function (resp) {
        if(resp['data']['code']==100){
            $scope.subs = resp['data']['data'];
        }
    })
    //获取试卷列表
    $scope.getPaper = function () {
        $http.get('/api/paper/getList').then(function (resp) {
            $scope.datas = apiService.verifyDate(resp);
            $scope.lists=$scope.datas['data'];

            //分页
            $scope.currentPage = $scope.datas['current_page'];
            $scope.perPageNum = $scope.datas['per_page'];
            $scope.totalItems = $scope.datas['total'];

            $scope.maxSize = 5;//分页导航按钮个数
        })
    }
    $scope.getPaper();

    //生成试卷
    $scope.bulidPaper = function () {
        if($scope.paper[''])
        $http.post('/api/paper/bulid',$scope.paper).then(function (resp) {
            if(resp['data']['code']==100){
                $scope.getPaper();
                alert("试卷生成成功！");
                jQuery('#myModal').trigger('reveal:close');
            }else {
                alert(resp['data']['msg']);
            }
        })
    }

    //跳转到预览试卷
    $scope.preview = function (paper) {
        sessionStorage.setItem('paper',angular.toJson(paper));
        $location.path("/preview");
    }

    //跳转到在线考试
    $scope.exam = function (paper) {
        sessionStorage.setItem('paper',angular.toJson(paper));
        if(paper.status==0||paper.status==1){
            $location.path("/exam");
        }else {
            alert("已交卷，无法作答了哦！");
        }
    }

    //跳到阅卷
    $scope.yuejuan = function (paper) {
        sessionStorage.setItem('paper',angular.toJson(paper));
        if(paper.status==2){
            $location.path("/yuejuan");
        }else {
            alert("该生还未交卷，还不能阅卷哦！");
        }
    }

});