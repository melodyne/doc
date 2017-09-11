<?php
require_once 'ApiMode.php';



if(isset($_POST['apiname'])&&!empty($_POST['apiname'])&&isset($_POST['content'])&&!empty($_POST['content'])){

    $artname=$_POST['apiname'];
    $hostid=$_POST['hostid'];
    $path=$_POST['path'];
    $method=$_POST['method'];
    $paras=$_POST['paras'];//参数
    $codes=$_POST['codes'];
    $content=$_POST['content'];
    $menuid=$_POST['menu'];
    $authorid=$_POST['author'];

    $lastid=0;
    if($artname!=""&& $hostid!=""&&$path!=""&&$menuid!=""&&$content!=""){
        $docrt=addApiDoc($artname, $hostid, $path, $method,$codes,$menuid, $authorid, $content);
        if(is_numeric($docrt)){
           $lastid=$docrt;
           echo "api文档成功写入数据库！\n自增长id=".$lastid."\n";
        }else{
            die($docrt);
        }
    }else{
        die ("数据有误！");
    }


    //处理参数
    $paraArr=json_decode( $paras,true);

    foreach ($paraArr as $item){
        $rt=addParas($lastid, $item['pname'],$item['pval'], $item['ptype'], $item['necc'], $item['intro']);
        if ($rt==1){
            echo "成功插入1条该接口的参数！\n";
        }else{
             die ("api参数插入失败！"+$rt+"\n");
        }
    }

}


?>