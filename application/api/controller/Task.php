<?php
namespace app\api\controller;

use think\Controller;
use app\api\model\Tasks as TasksModel;

class Task extends Controller{

	
    function commit(){
        if(!isLogin()){
            return api(1,"你还没登陆哦");
        }

        if(isset($_POST['taskid'])&&!empty($_POST['taskid'])){

           if(!isset($_POST['describe'])||empty($_POST['describe'])){
                 return api(102,"describe参数缺失");
            }
            $task['taskid']       = (int) $_POST['taskid'];
            $task['describe'] = $_POST['describe'];

            $result = TasksModel::update($task);
            if($result){
                return api(100,"更新成功");
             }else{
                return api(104,"更新失败");
            }
           
           
        }else{
            if(!isset($_POST['describe'])||empty($_POST['describe'])){
                 return api(102,"describe参数缺失");
            }
            $task['authorid']=$_SESSION['userid'];
            $task['athname'] = $_SESSION['username'];
            $task['describe']  = $_POST['describe'];
            $task['year'] = date("y");
            $task['month'] = date("m");
            $task['day'] = date("d");
            if ($result = TasksModel::create($task)) {
                return api(100,"保存成功",$result);
            } else {
                return api(101,$result->getError());
            } 
        }
       
    }

}