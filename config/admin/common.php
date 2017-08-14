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

use think\Session;
use think\Request;

/**
 * 获取用户信息
 * @return mixed|null
 */
function getLoginUser(){
    $user = Session::get('loginUser');
    if($user){
        return $user;
    }else{
        return null;
    }
}

function doLogin($user){
    Session::set('loginUser',$user);
}

function doLogout(){
    Session::delete('loginUser');
}

/**
 * api 返回
 * @param $code
 * @param $msg
 * @param null $data
 */
function api($code,$msg,$data=null){
    header('Content-type: application/json');
    $rt['code']=$code;
    $rt['msg']=$msg;
    $rt['data']=$data;
    echo json_encode($rt);
    die();
}

/**
 * api 成功返回
 * @param null $data
 */
function success($data=null){
   api(100,'success',$data);
}

/**
 * api 错误返回
 * @param string $msg
 */
function error($msg='失败了哦！'){
    api(0,$msg);
}

/**
 * 获取API get参数
 * @param $name
 * @param bool $required
 * @param null $default
 * @return mixed
 */
function paramFromGet($name,$required=false,$default=null){
    $request = Request::instance();
    if($required){
        $rt = $request->get($name);
        if($rt===null){
            api(0,$name."参数缺失");
        }else{
            return $rt;
        }
    }else{
        $rt = $request->get($name,$default);
        return $rt;
    }

}

/**
 * 获取API POST参数
 * @param $name
 * @param bool $required
 * @param null $default
 * @return mixed
 */
function paramFromPost($name=null,$required=false,$default=null){

    $params = $_POST;
    if($params==null){
        $params = json_decode(file_get_contents("php://input"),true);
    }
    if($name==null){
        return $params;
    }

    if(isset($params[$name])){
        return $params[$name];
    }

    if($required){
        api(0,$name."参数缺失");
    }

    return null;
}

//判断是否是电话
function isPhone($phone){
    if(preg_match('/^1[34578]{1}\d{9}$/',$phone)){
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

/**
 * 生成随机字符串
 * @param $len
 * @return int|mixed
 */
function getRandChar($len){
    $chars='ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
    $string=time();
    for(;$len>=1;$len--) {
        $position=rand()%strlen($chars);
        $position2=rand()%strlen($string);
        $string=substr_replace($string,substr($chars,$position,1),$position2,0);
    }
    return $string;
}



