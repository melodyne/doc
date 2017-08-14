/**
 * 科目
 */
angular.module('myApp.subject', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/subject', {
    templateUrl: 'view/subject.html',
    controller: 'SubjectCtrl'
  });
}])

.controller('SubjectCtrl',function($scope,$http,apiService) {

    $scope.action = 0;

    $scope.getSubjects = function () {
        $http.get('/api/subject/getList').then(function (resp) {
          $scope.datas = apiService.verifyDate(resp);
          $scope.lists=$scope.datas['data'];

          //分页
          $scope.currentPage = $scope.datas['current_page'];
          $scope.perPageNum = $scope.datas['per_page'];
          $scope.totalItems = $scope.datas['total'];

          $scope.maxSize = 5;//分页导航按钮个数
        })
    }

    $scope.getSubjects();

    //分页
    $scope.setPage = function (page) {
        $http.get('/api/subject/getList?page='+page).then(function (resp) {
            $scope.datas = apiService.verifyDate(resp);
            $scope.lists=$scope.datas['data'];
        })
    };

    //新增
    $scope.add = function () {
        $scope.action = 0;
        $scope.subj = null;
    }

    //确认新增
    $scope.addSubject = function () {
        if(!$scope.subj){alert("你什么都没有输入哦！");return;}
        if(!$scope.subj['name']){alert("你还没有输入科目名称哦！");return;}
        if(!$scope.subj['grede']){alert("你还没有输入学级哦！");return;}
        if(!$scope.subj['is_required']){alert("你还没有输入学修类型哦！");return;}
        $http.post('/api/subject/addOne',$scope.subj).then(function (resp) {
            if(apiService.verifyDate(resp)){
                $scope.subj = null;
                $scope.getSubjects();
                alert("添加成功");
            }
        })
    }

    //修改
    $scope.change = function (subj) {
        $scope.action = 1;
        $scope.subj = subj;
    }

    //确认修改
    $scope.updSubject = function () {

        if(!$scope.subj){alert("你什么都没有输入哦！");return;}
        if(!$scope.subj['name']){alert("你还没有输入科目名称哦！");return;}
        if(!$scope.subj['grede']){alert("你还没有输入学级哦！");return;}
        if(!$scope.subj['is_required']){alert("你还没有输入学修类型哦！");return;}
        delete $scope.subj["create_time"];
        $http.post('/api/subject/updOne',$scope.subj).then(function (resp) {
            if(apiService.verifyDate(resp)){
                $scope.subj = null;
                $scope.action = 0;
                $scope.getSubjects();
                alert("修改成功");
            }
        })
    }

    //删除
    $scope.del = function (id) {
        $http.get('/api/subject/delOne/id/'+id).then(function (resp) {
            if(apiService.verifyDate(resp)){
                $scope.getSubjects();
                alert("删除成功");
            }
        })
    }
});