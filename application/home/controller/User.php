<?php
namespace app\home\controller;

use think\Controller;
use app\home\model\Authors as AuthorsModel;

class User extends Controller
{

	
    /**
     * 登录
     * @return [type] [description]
     */
    public function login()
    {
        if(isLogin()){
            $user=$_SESSION['username'];
            $info="用户：".$user."&nbsp;&nbsp;<a onclick=\"logout()\">退出登录</a>";
           
        }else{
            $info="";
        }

        $this->assign("loginInfo", $info);
        return $this->fetch();
 
  
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
            $user=UsersModel::getByPhone($account);
        }elseif(isEmail($account)){
            $user=UsersModel::getByEmail($account);
        }else{
            $rt['code']=123;
            $rt['msg']="请输入手机号或者邮箱";
            $rt['data']=null;
            return json($rt);    
        }

        if($user){
            if(md5($pwd)==$user['pwd']){
                $_SESSION['yunsuId']=$user['yunsu_id'];
                $rt['code']=100;
                $rt['msg']="成功登录云宿用户系统！";
                $rt['data']=$user;
                return json($rt);
            }else{
                $rt['code']=103;
                $rt['msg']="密码错误！";
                $rt['data']=$user;
                return json($rt);
                }
        }else{
			$url="http://www.icloudinn.com:8090/yunsu-mobile-webapp/Server/user/ILogin?account=$account&password=$pwd";
            $lg=httpGet($url);
            $luser=json_decode($lg,true);
            $code=$luser['code'];
            if($luser==null){
                $rt['code']=104;
                $rt['msg']="系统未知错误";
                $rt['data']=$lg;
                return json($rt);
            }
            if($code==0){
                
                $yunsuId=$luser['data']['yunsuId'];
                $livePhone=$luser['data']['phone'];
                $account=$luser['data']['account'];
                $pwd=$luser['data']['password'];

                if(isPhone($livePhone)){
                    $phone=$livePhone;
                }elseif(isPhone($account)){
                    $phone=$account;
                }else{
                    $rt['code']=105;
                    $rt['msg']="你的账号存在问题，请联系管理员";
                    $rt['data']=$lg;
                    return json($rt);
                }

                //总用户系统
		        $paras = array(
		        	'yunsu_id'=>$yunsuId,
		            'account' =>$phone, 
		            'pwd' =>md5($pwd),
		            'phone' => $phone, 
		            'email' =>"", 
		            );
		        $result = UsersModel::create($paras);
                $user=UsersModel::getByPhone($phone);

                if(!$user){
                	$user=UsersModel::getByAccount($phone);
                }

                $_SESSION['yunsuId']=$yunsuId;
                $rt['code']=100;
                $rt['msg']="恭喜你，成功登录云宿用户系统！";
                $rt['data']=$user;
                return json($rt);

            }elseif($code==1){
                $rt['code']=106;
                $rt['msg']="请输入正确的手机";
                $rt['data']=$lg;
                return json($rt);
            }else{
                $rt['code']=110;
                $rt['msg']=$luser['msg'];
                $rt['data']=$lg;
                return json($rt);
            }

            }    
       
        return json();
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

       
        if($user){
            $rt['code']=124;
            $rt['msg']="该账号已经注册1，请直接登录";
            $rt['data']=null;
            return json($rt);   
        }

        $user=UserModel::getByPhone($account);
        if($user){
            $rt['code']=124;
            $rt['msg']="该账号已经注册2,请直接登录";
            $rt['data']=null;
            return json($rt);   
        }
        $user=UserModel::getByAccount($account);
        if($user){
            $rt['code']=124;
            $rt['msg']="该账号已经注册3,请直接登录";
            $rt['data']=null;
            return json($rt);   
        }
        

        //注册字段
        $paras = array(
            'account' =>$account, 
            'pwd' =>md5($pwd),
            'phone' =>$phone, 
            'email' =>$email, 
            );
        $result = UsersModel::create($paras);
        if ($result) {
            $rt['code']=100;
            $rt['msg']="注册成功";
            $rt['data']=$result;
            return json($rt);    
        } else {
            $rt['code']=101;
            $rt['msg']="注册失败";
            $rt['data']=$result;
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
            $rt['code']=101;
            $rt['msg']="退出失败";
            $rt['data']=null;
            return json($rt);   
        }else{
            $rt['code']=101;
            $rt['msg']="已退登录";
            $rt['data']=null;
            return json($rt);   
        }
     }

}
