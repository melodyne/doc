<?php
namespace app\api\controller;

use think\Controller;
use app\api\model\Authors as AuthorsModel;

class User extends Controller
{

	
    public function login()
    {

        if(!isset($_POST['account'])||empty($_POST['account'])){
            return api(101,"account参数缺失");
        }
    
        if(!isset($_POST['password'])||empty($_POST['password'])){
            return api(102,"pwd参数缺失");
        }
      
        if(isLogin()){
            return api(103,"你已经登录！");
        }
       
        $account=$_POST['account']; 
        $pwd=$_POST['password'];  
        $user = AuthorsModel::get(['authname'=> $account,'loginpwd'=> $pwd ]);
        if( $user){
            $_SESSION['userid'] = $user->authorid;
            $_SESSION['username'] = $user->authname;
           
            return api(100,"登录成功");
        }
        
        return api(104,"该开发者不存在");
       
        
    }

     /**
     * 通过Api注册
     * @return [type] [description]
     */
     public function register(){

        if(!isset($_POST['account'])||empty($_POST['account'])){
            $rt['code']=121;
            $rt['msg']="account参数缺失";
            $rt['data']=null;
            return json($rt);
        }


        if(!isset($_POST['pwd'])||empty($_POST['pwd'])){
            $rt['code']=122;
            $rt['msg']="pwd参数缺失";
            $rt['data']=null;
            return json($rt);
        }

        $account=$_POST['account'];
        $pwd=$_POST['pwd'];
        if(isPhone($account)){
            $phone=$account;
            $email="";
            $user=UsersModel::getByPhone($account);
        }elseif(isEmail($account)){
            $phone="";
            $email=$account;
            $user=UsersModel::getByEmail($account);
        }else{
            $rt['code']=123;
            $rt['msg']="请输入手机号或者邮箱";
            $rt['data']=null;
            return json($rt);    
        }

     }

    /**
     * 退出登录
     * @return [type] [description]
     */
     function logout(){

        session_start(); 
        session_destroy();
        unset($_SESSION);
        if(isset($_SESSION)){
            return api(101,"退出失败");   
        }else{
            return api(100,"退出成功");   
        }
     }

}
