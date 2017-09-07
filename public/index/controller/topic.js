'use strict';

angular.module('myApp.topic', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/topic', {
    templateUrl: 'view/topic.html',
    controller: 'TopicCtrl'
  });
}])
.filter('tixiang',function(){
    return function(e){

        var str="未知";
        if(e==1){
            str = "单选";
        }else if(e==2){
            str = "多选";
        }else if(e==3){
            str = "判断";
        }else if(e==4){
            str = "填空";
        }else if(e==5){
            str = "解答";
        }
        return str;
    }
})
.controller('TopicCtrl', function($scope,$interval,$timeout,$http,apiService) {

    $scope.isShow = true;

    //编辑表单
    $scope.form={
        timu:"一加一等于",
        tixing:[
            {k : "单选", v : 1},
            {k : "多选", v : 2},
            {k : "判断", v : 3},
            {k : "填空", v : 4},
            {k : "解答", v : 5},
        ],
        answer:"A",
        difficulty:[
            {k : "1", v : 1},
            {k : "2", v : 2},
            {k : "3", v : 3},
            {k : "4", v : 4},
            {k : "5", v : 5},
            {k : "6", v : 6},
            {k : "7", v : 7},
            {k : "8", v : 8},
            {k : "9", v : 9},
            {k : "10", v : 10},
        ],
        sbuj:[
            {k : "数学", v : 1},
            {k : "语文", v : 2},
            {k : "计算机", v : 3},
            {k : "物理", v : 4},
        ],
        radio:[
            {k : "A", v : "A"},
            {k : "B", v : "B"},
            {k : "C", v : "C"},
            {k : "D", v : "D"},
        ]
    };
    /**
     * 显示列表
     */
    $scope.showList = function () {
        $http.get('/api/topic/getList').then(function (resp) {
            $scope.datas = apiService.verifyDate(resp);
            $scope.lists=$scope.datas['data'];

            //分页
            $scope.currentPage = $scope.datas['current_page'];
            $scope.perPageNum = $scope.datas['per_page'];
            $scope.totalItems = $scope.datas['total'];

            $scope.maxSize = 5;//分页导航按钮个数
        });
    }
    $scope.showList();
    //分页
    $scope.setPage = function (page) {
        $http.get('/api/topic/getList?page='+page).then(function (resp) {
            $scope.datas = apiService.verifyDate(resp);
            $scope.lists=$scope.datas['data'];
        })
    };

    //获取科目
    $http.get('/api/user/getSubs').then(function (resp) {
        if(resp['data']['code']==100){
            $scope.subs = resp['data']['data'];
        }

    })

    $scope.doSearch = function () {
       if(!$scope.model){
           alert('你什么都没有输入哦！');
       }

       $http.post('/api/topic/search',$scope.model).then(function (resp) {
            $scope.datas = apiService.verifyDate(resp);
            $scope.lists=$scope.datas['data'];

            //分页
            $scope.currentPage = $scope.datas['current_page'];
            $scope.perPageNum = $scope.datas['per_page'];
            $scope.totalItems = $scope.datas['total'];

            $scope.maxSize = 5;//分页导航按钮个数
       });
    }

    var timeout;
    $scope.$watch('search.subj',function (newVal, oldVal) {
        if (newVal !== oldVal) {
            if (timeout) $timeout.cancel(timeout);
            timeout = $timeout(function() {
                $scope.doSearch();
            }, 800);
        }
    }, true);
    $scope.$watch('search.tixing',function (newVal, oldVal) {
        if (newVal !== oldVal) {
            if (timeout) $timeout.cancel(timeout);
            timeout = $timeout(function() {
                $scope.doSearch();
            }, 800);
        }
    }, true);
    $scope.$watch('search.keywords',function (newVal, oldVal) {
        if (newVal !== oldVal) {
            if (timeout) $timeout.cancel(timeout);
            timeout = $timeout(function() {
                $scope.doSearch();
            }, 800);
        }
    }, true);


    $scope.tab=1;
    $scope.showTab = function ( tab ) {
        $scope.tab = tab;
        if(tab==2){
            if($scope.subId){
                $scope.subId = null;
                $scope.tixing = "";
                $scope.question = "";
                $scope.difficulty = "";
                $scope.option = "";
                $scope.answer ="";
            }

        }
        if(tab==3){
            //显示统计信息
            $http.get('/api/topic/tongji').then(function (resp) {
                $scope.countData = apiService.verifyDate(resp);
            })
        }
    }

    /**
     * 录入试题
     */
    $scope.doRecord = function ( action ) {

        if(!$scope.subId){
            alert("科目不能为空！");
            return ;
        }

        var tixing = $scope.tixing;//题型
        if(!tixing){
            alert("没有选择题型！");
            return ;
        }
        var question = $scope.question;
        if(!question){
            alert("你还没有输入试题题目哦！");
            return ;
        }
        if($scope.option){
            var option = $scope.option;//选项
        }

        var answer = "";
        if(tixing==1){
            if(!option){
                alert("你还没有输入单选题的选项哦！");
                return ;
            }
            if(!$scope.answer){
                alert("你还没有输入单选题的答案哦！");
                return ;
            }
            answer = $scope.answer;//单选答案
        }else if(tixing==2) {
            answer = angular.toJson($scope.answer);//多选答案
            if(!option){
                alert("你还没有输入多选题的选项哦！");
                return ;
            }
        }else {
            answer = $scope.answer;
        }

        if(!answer){
            alert("你还没有添加答案哦！");
            return ;
        }
        if(!$scope.difficulty){
            alert("你还么有设置试题难度系数哦！");
            return ;
        }

        var data={
            sub_id : $scope.subId,
            questions:question,
            answer:answer,
            option:angular.toJson(option) ,
            type:tixing,
            difficulty:$scope.difficulty
        }
        if(action=='upd'){
            data['topic_id'] = $scope.x['topic_id'];
            $http.post('/api/topic/updOne',data).then(function (resp) {
                if(resp['data']['code']==100){
                    $scope.showList();
                    alert("修改成功！");
                    $scope.showTab(1);
                }else {
                    alert(resp['data']['msg'])
                }
            })
        }else {
            $http.post('/api/topic/addOne',data).then(function (resp) {
                if(resp['data']['code']==100){
                    $scope.showList();
                    alert("录入成功！");
                }else {
                    alert(resp['data']['msg'])
                }
            })
        }


    }

    //删除试题
    $scope.delTopic = function (id){
        if(!confirm("你确定删除该试题么？")){
            return;
        }
        $http.get('/api/topic/delOne/id/'+id).then(function (resp) {
            if(resp['data']['code']==100){
                $scope.showList();
                alert("删除成功！");
            }else {
                alert(resp['data']['msg'])
            }
        })
    }
    /**
     * 查看详情
     * @param e
     */

    $scope.seeDetail = function (e) {
        $scope.detail = e;
        $scope.detail.option = angular.fromJson(e.option);
        $scope.answer = angular.fromJson(e.answer);
    }

    $scope.updTopic = function (x) {

        $scope.tab = 4;
        if(x['subject']){
            $scope.subId = x['subject']['sub_id'];
        }

        $scope.x = x;

        $scope.tixing = x.type+"";

        $scope.question = x.questions;
        $scope.difficulty = x.difficulty+"";
        if(x.type==1){//单选
            $scope.option = angular.fromJson(x.option);
            $scope.answer = x.answer;
        }else if(x.type==2){//多选
            $scope.option = angular.fromJson(x.option);
            $scope.answer = angular.fromJson(x.answer);
        }else if(x.type==3){//判断
            $scope.answer = x.answer;
        }else if(x.type==4){//填空
            $scope.answer = x.answer;
        }else if(x.type==5){//解答
            $scope.answer = x.answer;
        }

    }

});