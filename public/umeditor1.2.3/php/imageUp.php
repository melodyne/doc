<?php
    header("Content-Type:text/html;charset=utf-8");
    error_reporting( E_ERROR | E_WARNING );
    date_default_timezone_set("Asia/chongqing");
    include "Uploader.class.php";
    /* 七牛云存储信息配置 */
    $config = array(
        'bucket' => 'town',
        'host' => 'http://static.icloudinn.com',
        'access_key' => 'SWztsOHXNpC2dvl5AkRsCeDevQe0ECrbhMIo_OWJ',
        'secret_key' => 'wuqaWXhwF0NIlhSeJk5f7AeWjZn7Dukr9Sks_S0c',
        'qiniuUploadPath'=> 'uploads/image/',                                   /*七牛上传的前缀 */
	    'qiniuDatePath'=>'yyyymmdd',                                            // 文件夹后的时间例如 uploads/0712
        'fieldName'=>'upfile',                                                  // 表单名称 文件域名
        'timeout'     => '3600',  // 上传时间
        'maxSize' => 1000 ,                                                     // 允许的文件最大尺寸，单位KB
        'allowFiles' => array( '.gif' , '.png' , '.jpg' , '.jpeg' , '.bmp' ),  // 允许的文件格式
    );

    $up = new Uploader($config );// 表单名称
    $type = $_REQUEST['type'];
    $callback=$_GET['callback'];

    $info = $up->getFileInfo();
    /**
     * 返回数据
     */
    if($callback) {
        echo '<script>'.$callback.'('.json_encode($info).')</script>';
    } else {
        echo json_encode($info);
    }
