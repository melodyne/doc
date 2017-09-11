<?php
if (isset($_GET['menuid']) && ! empty($_GET['menuid'])) {
    $menuid = $_GET['menuid'];
    $sql = "delete from menus where menuid='$menuid'";
}
if (isset($_GET['authorid']) && ! empty($_GET['authorid'])) {
    $authorid = $_GET['authorid'];
    $sql = "delete from authors where authorid='$authorid'";
}
//删除友情链接
if (isset($_GET['linkid']) && ! empty($_GET['linkid'])) {
    $authorid = $_GET['linkid'];
    $sql = "delete from links where lkid='$authorid'";
}
if (isset($sql) && ! empty($sql)) {
    require_once '../inc/db.php';
    $mes = exesql($sql);
    if ($mes==1) {
        echo '[{"success":"删除成功！影响行数' . $mes . '"}]';
    } else {
        echo '[{"err":"删除失败！' . $mes . '"}]';
    }
} else {
    echo '[{"err":"参数错误"}]';
}