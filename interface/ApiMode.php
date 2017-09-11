<?php
require_once '../inc/db.php';

//--------------------------参数--------------------------------
//增加api参数
function addParas($apiid,$pkey,$valuse,$ptype,$ness,$intro) {
    $sql="INSERT INTO paras (apiid,pkey, pvalue, ptype,necessary,intro)
    VALUES ($apiid,'$pkey', '$valuse', '$ptype', '$ness', '$intro')";
    $rt= exesql($sql);

    return $rt;

}
function getParaList(){
    $sql="select * from paras";
    $rt= exesql($sql);

    return $rt;
}
//----------------------------api文档-------------------------------------
//增加api文档记录
function addApiDoc($apiname,$hostid,$path,$method,$codes,$menuid,$authorid,$content){
    $sql="INSERT INTO apis (apiname,hostid, upurl, method,codes,menuid,authorid,retndata)
    VALUES ('$apiname',$hostid,'$path','$method','$codes',$menuid,$authorid,'$content')";
    $rt= query($sql);
    return $rt;
}

/**
 * 更新apidoc记录
 * @param unknown $valArr
 * @param unknown $whereArr
 */
function updApiDoc ($valArr,$whereArr) {

    $rt= update("apis", $valArr, $whereArr);
    return $rt;
}

//-------------------------------基本处理增删改查-------------------------
/**
 * 数据增加
 * @param unknown $table
 * @param unknown $par
 * @return string
 */
function add($table,$par){
    $key="";
    $val="";
    $i=0;
    foreach($par as $k=>$v) {
        $i++;
        if($i==1){
            $key=$k;
            $val="'".$v."'";
        }else {
            $key=$key.",".$k;
            $val=$val.",'".$v."'";
        }
    }
    $sql="INSERT INTO $table ($key) VALUES ($val)";
    $rt= exesql($sql);
    return $rt;
}
/**
 * 数据删除
 * @param unknown $table
 * @param unknown $whereArr
 * @return string
 */
function del($table,$whereArr){

    $wv="";
    $i=0;
    foreach($whereArr as $k=>$v) {
        $i++;
        if($i==1){
            $wv=$k."='".$v."'";
        }else {
            $wv=$wv.",".$k."='".$v."'";
        }

    }
    $sql = "delete from $table where $wv";
    $rt= exesql($sql);
    return $rt;

}

/**
 * 数据修改
 * @param unknown $table
 * @param unknown $valArr
 * @param unknown $whereArr
 * @return string
 */
function update($table,$valArr,$whereArr) {
    $kv="";
    $i=0;
    foreach($valArr as $k=>$v) {
        $i++;
        if($i==1){
            $kv=$k."='".$v."'";
        }else {
            $kv=$kv.",".$k."='".$v."'";
        }

    }

    $wv="";
    $i=0;
    foreach($whereArr as $k=>$v) {
        $i++;
        if($i==1){
            $wv=$k."='".$v."'";
        }else {
            $wv=$wv.",".$k."='".$v."'";
        }

    }
    $sql = "UPDATE $table SET $kv WHERE $wv";
    $rt= exesql($sql);
    return $rt;
}