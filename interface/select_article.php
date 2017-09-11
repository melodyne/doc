<?php
if (isset($_GET['articleid']) && ! empty($_GET['articleid'])) {
    $ariticleid = $_GET['articleid'];
    $sql="select * from apis,authors,menus,sysconfig where
    apis.authorid=authors.authorid and apis.menuid=menus.menuid and apis.hostid=sysconfig.configid and
    articleid='$ariticleid'";
}
if (isset($_GET['limit']) && ! empty($_GET['limit'])) {
    $limit = $_GET['limit'];
    $sql="select * from apis,authors,menus where
        apis.authorid=authors.authorid and apis.menuid=menus.menuid
        order by priority asc,wtime asc limit $limit";
}
if(isset($sql) && ! empty($sql)){
    require_once '../inc/db.php';
    $apis= exesql($sql);
    if(is_array($apis)&&$apis!=null){
        echo json_encode($apis,JSON_UNESCAPED_UNICODE);
    }else{
        echo '[{"err":"查询结果为空"}]';
    }

}else{
    echo '[{"err":"参数错误"}]';
}