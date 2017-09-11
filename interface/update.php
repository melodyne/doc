<?php
if (isset($_POST['menuname']) && ! empty($_POST['menuname'])) {
    $menuid=$_POST['menuid'];
    $menuname=$_POST['menuname'];
    $priority=$_POST['priority'];
    $sql = "UPDATE menus SET menuname='$menuname',priority=$priority WHERE menuid=$menuid";
}
//更新authors表
if (isset($_POST['authname']) && ! empty($_POST['authname'])) {
    $authorid=$_POST['authorid'];
    $authname=$_POST['authname'];
    $department=$_POST['department'];
    $position = $_POST['position'];
	$access = $_POST['access'];
	$pwd = $_POST['pwd'];
    $sql = "UPDATE authors SET authname='$authname',department='$department',position='$position',testacnt='$access',pwd='$pwd' WHERE authorid=$authorid";
}

//更新阅读量
if (isset($_GET['res']) && ! empty($_GET['res'])) {
    $res=$_GET['res'];
    $sql = "UPDATE articles SET readnum=readnum+1 WHERE articleid='$res'";
}
//更新首页友情链接
if (isset($_POST['lkname']) && ! empty($_POST['lkname'])) {
    $linkid=$_POST['linkid'];
    $lkname=$_POST['lkname'];
    $lkurl=$_POST['lkurl'];
    $priority = $_POST['priority'];
    $sql = "UPDATE links SET lkname='$lkname',lkurl='$lkurl',priority='$priority' WHERE lkid=$linkid";
}
if (isset($sql) && ! empty($sql)) {
    require_once '../inc/db.php';
    $mes = exesql($sql);
    if ($mes == 1) {
        echo '[{"success":"修改成功！影响行数' . $mes . '"}]';
    } elseif($mes == 0) {
        echo '[{"err":"检测到你没有改动输入框里任何数据！' . $mes . '"}]';
    }else{
        echo '[{"success":"修改失败！' . $mes . '"}]';
    }
} else {
    echo '[{"err":"参数错误"}]';
}