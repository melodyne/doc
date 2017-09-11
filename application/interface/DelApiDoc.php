<?php
if (isset($_GET['docid']) && ! empty($_GET['docid'])) {
    $docid = $_GET['docid'];
    $sql="delete from apis where apiid='$docid'";
}

if(isset($sql) && ! empty($sql)){
    require_once '../inc/db.php';
    $rt= exesql($sql);
    if($rt==1){
        echo "文档删除成功！\n";
        $rt=exesql("delete from paras where apiid='$docid'");
        echo "删除参数".$rt."个！\n";
    }else{
        echo "删除失败！\n".$rt;
    }


}else{
    echo '[{"err":"参数错误"}]';
}