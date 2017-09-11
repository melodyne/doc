<?php
namespace app\home\controller;

use think\Controller;
use app\home\model\Authors as AuthorsModel;
use app\home\model\Tasks as TasksModel;

class Task extends Controller{

	function show(){

        $year=date('y');
		$month=date('m');
        $today=date('d');
        $days = date("t"); 
        $strday="2016-".$month."-1";//本月1号
  		$weekarray=array("日","一","二","三","四","五","六");
        $strweek=date("w",strtotime($strday));//本月1号新期几
        //月份时间轴
        $dayarr=array();
        for ($i=0; $i<$days ; $i++) { 
        	$dayInfo['day']=$i+1;
        	$dayInfo['week']=$weekarray[($i+$strweek)%7];	
        	$dayInfo['iswork']=1;
        	$dayarr[$i]=$dayInfo;
        }
        
        $this->assign("year",$year);
        $this->assign("month",$month);
        $this->assign("today",$today);
        $this->assign("openday",$today);
        $this->assign("dayarr",$dayarr);
         
        if(isset($_GET['d'])&&!empty($_GET['d'])&&isset($_GET['y'])&&!empty($_GET['y'])&&isset($_GET['m'])&&!empty($_GET['m'])){
            $y=$_GET['y'];
            $m=$_GET['m'];
            $d=$_GET['d'];
            $this->assign("openday",$d);
            $this->assign("todayTasks", $this->getUsersTasks($y,$m,$d));
            return $this->fetch();
        }

        if(date("w")==0||date("w")==6){
            $this->assign("todayTasks", null);
            return $this->fetch();
        }

        $this->assign("todayTasks", $this->getUsersTasks($year,$month,$today));
		return $this->fetch();
	}

    function add(){
        if(!isLogin()){
           $this->assign("loginInfo","");
           return $this->fetch('user/login'); 
        }
        $tasks = TasksModel::get(['year'=> date("y"),'month'=> date("m"),'day'=>date("d") ,'authorid'=>$_SESSION['userid']]);
        if($tasks){
            $taskid= $tasks->taskid;
            $taskList=json_decode($tasks->describe,true);

            $this->assign("taskid",'taskid="'.$taskid.'"');
            $this->assign("taskList",$taskList);
        }else{
            $this->assign("taskid","");
            $this->assign("taskList",null);
        }
        return $this->fetch();
    }

    //获取用户的
    private function getUsersTasks($y,$m,$d){
        $userList=AuthorsModel::select();
        $todayTasks=[];
        foreach ($userList as $key => $value) {
            $uid=$value['authorid'];
            $tasks = TasksModel::where(['year'=>$y,'month'=>$m,'day'=>$d,'authorid'=>$uid])->find();

            if($tasks)$tasks['describe']=json_decode($tasks->describe,true);
            $todayTasks[$key]['user']=$value;
            $todayTasks[$key]['tasks']=$tasks;
        }
        return $todayTasks;
    }

}