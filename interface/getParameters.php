<?php

//获取参数
if (isset($_GET['apiid']) && ! empty($_GET['apiid'])) {
    $apiid = $_GET['apiid'];
    $sql="select * from parameters where apiid='$apiid'";
	header("Content-Type: text/html; charset=utf-8");
}

if(isset($sql) && ! empty($sql)){
    require_once '../inc/db.php';
    $articles= exesql($sql);
    if(is_array($articles)&&$articles!=null){
        echo json_encode($articles,JSON_UNESCAPED_UNICODE);
    }else{
        echo '{"code":0,"msg":"查询结果为空"}';
    }

}else{
    echo '{"code":1,"msg":"操作失误"}';
}