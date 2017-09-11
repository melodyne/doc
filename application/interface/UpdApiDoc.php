<?php
require_once 'ApiMode.php';



if(isset($_POST['docid'])&&!empty($_POST['docid'])&&isset($_POST['content'])&&!empty($_POST['content'])){

    $docid=$_POST['docid'];
    $artname=$_POST['apiname'];
    $hostid=$_POST['hostid'];
    $path=$_POST['path'];
    $method=$_POST['method'];
    $paras=$_POST['paras'];//参数
    $codes=$_POST['codes'];
    $content=$_POST['content'];
    $menuid=$_POST['menu'];
    $authorid=$_POST['author'];
    $delpara=$_POST['delpara'];
    $delcode=$_POST['delcode'];

    if($artname!=""&& $hostid!=""&&$path!=""&&$menuid!=""&&$content!=""){
        $valArr=array(
            "apiname"=>$artname,
            "hostid"=>$hostid,
            "upurl"=>$path,
			"codes"=>$codes,
            "method"=>$method,
            "retndata"=>$content,
            "menuid"=>$menuid,
            "authorid"=>$authorid,
         );
        $whereArr=array(
            "apiid"=>$docid

        );
        $rt=updApiDoc($valArr, $whereArr);
        if($rt=="1"){
             echo "修改成功！";
        }elseif($rt=="0"){
            echo "文档信息没有改变哦！\n";
        }else{
            echo "修改失败！$rt \n";
            return ;
        }
    }else{
        die ("数据缺失！");
    }


    //处理参数
    $paraArr=json_decode( $paras,true);
    $codeArr=json_decode( $codes,true);
    $delparaidArr=json_decode($delpara,true);//要删除的参数id

    foreach ($paraArr as $item){

        if(isset($item['paraid'])){
            $valArr=array(
                "pkey"=>$item['pname'],
                "pvalue"=>$item['pval'],
                "ptype"=>$item['ptype'],
                "necessary"=>$item['necc'],
                "intro"=>$item['intro']
            );
            $whereArr=array(
                "paraid"=>$item['paraid']
            );
            $rt=update("paras", $valArr, $whereArr);
            if($rt==1){
                echo "该api文档的1个参数被修改了!\n";
            }elseif($rt==0){
                echo "该api文档的1个参数未有改变！\n";
            }else{
                echo "该api文档的1个参数修改失败！\n".$rt;
            }
        }else{
            $valArr=array(
                "apiid"=>$docid,
                "pkey"=>$item['pname'],
                "pvalue"=>$item['pval'],
                "ptype"=>$item['ptype'],
                "necessary"=>$item['necc'],
                "intro"=>$item['intro']
            );
            print_r($valArr);
            $rt=add("paras", $valArr);
            if($rt==1){
                echo "该api文档增加了1个参数!\n";
            }else{
                echo "该api文档的1个参数添加失败！\n".$rt;
            }


        }

    }
   

    //删除参数
    foreach ($delparaidArr as $item){
        $pid=$item['delparaid'];
        $whereArr=array('paraid'=>$pid);
        $rt=del("paras", $whereArr);
        if($rt==1){
            echo "该api文档的1个参数被删除!\n";
        }else{
            echo "该api文档的1个参数删除失败！\n".$rt;
        }
    }

}


?>