<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
use think\Db;

function isLogin(){
	if(!isset($_SESSION)){
	    session_start();
	}
    if(isset($_SESSION['userid'])){
         return true;
    }else{
         return false;
    }
}



//判断是否是电话
function isPhone($phone){
    if(preg_match("/^1[34578]{1}\d{9}$/",$phone)){  
        return true;  
    }else{  
        return false;
    }  
}

/**
 *判断是否为email
 */
function isEmail($email){
    
    $pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
    
    if ( preg_match( $pattern,$email) ){
       return true;
    }else{
       return false;
    }
}


//pai接口返回
function api($code,$msg,$data=null){
    $rt['code']=$code;
    $rt['msg']=$msg;
    $rt['data']=$data;
    return json($rt);   
}

