<?php
if (isset($_POST['menuname']) && ! empty($_POST['menuname'])) {
    $mununame=$_POST['menuname'];
    $priority=$_POST['priority'];
    $sql = "INSERT INTO menus (menuname,priority)
    VALUES ('$mununame','$priority')";
}

if (isset($_POST['authname']) && ! empty($_POST['authname'])) {
    $authname=$_POST['authname'];
    $department=$_POST['department'];
    $position = $_POST['position'];
	$access = $_POST['access'];
	$pwd = $_POST['pwd'];
	
    $sql = "INSERT INTO authors (authname,department,position,testacnt,pwd)
    VALUES ('$authname','$department','$position','$access','$pwd')";
}

if (isset($_POST['lkname']) && ! empty($_POST['lkname'])) {
    $lkname=$_POST['lkname'];
    $lkurl=$_POST['lkurl'];
    $priority = $_POST['priority'];
    $sql = "INSERT INTO links (lkname,lkurl,priority)
    VALUES ('$lkname','$lkurl','$priority')";
}

if (isset($sql) && ! empty($sql)) {
    require_once '../inc/db.php';
    $mes = exesql($sql);
    if ($mes==1) {
        echo '[{"success":"添加成功！影响行数' . $mes . '"}]';
    } else {
        echo '[{"err":"添加失败！' . $mes . '"}]';
    }
} else {
    echo '[{"err":"参数错误"}]';
}