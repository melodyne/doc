<?php
 require_once 'db.php';

 //获取api详细信息
 function getApiById($id) {
	 $sql="select * from apis,authors,menus,hosts
	 where apis.authorid=authors.authorid and apis.menuid=menus.menuid and apis.hostid=hosts.hostid and
     apiid='$id'";
	 $rerult= exesql($sql);
	 //echo $sql;
	 return  getInf($rerult);

 }

 //通过id获取api的参数
 function getParaByApiId($apiId) {
     $sql="select * from paras where apiid='$apiId'";
     $rerult= exesql($sql);
     return  getInf($rerult);

 }
 //获取所有开发者信息
 function getAuthorList() {
     $sql="select * from authors";
     $rerult= exesql($sql);
     return  getInf($rerult);

 }

 //获取所有开发者信息
 function getAuthorById($authorid) {
     $sql="select * from authors where authorid='$authorid'";
     $rerult= exesql($sql);
     return  getInf($rerult);

 }

 //获取主机信息
 function getHostList() {
     $sql="select * from hosts";
     $rerult= exesql($sql);
     return  getInf($rerult);

 }
 //获取菜单列表
 function getMenuList() {
     $sql="select * from menus order by priority asc";
     $rerult= exesql($sql);
     return  getInf($rerult);

 }

 //获取状态码列表
 function getCodesList() {
     $sql="select * from stacodes";
     $rerult= exesql($sql);
     return  getInf($rerult);

 }
 //通过id获取状态码信息
 function getCodeById($docid) {
     $sql="select * from stacodes,api_code where api_code.codeid=stacodes.codeid and apiid='$docid'";
     $rerult= exesql($sql);
     return  getInf($rerult);

 }

 //查询信息处理
 function getInf($rerult){
	if($rerult==null){
        return array();
    }

    if(!is_array($rerult)){
        echo $rerult;
        return array();
    }

    return $rerult;
 }

?>