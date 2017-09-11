<?php
//模拟登录
function login_post($loginurl, $cookie, $paras) {
    $curl = curl_init();//初始化curl模块
    curl_setopt($curl, CURLOPT_URL, $loginurl);//登录提交的地址
    curl_setopt($curl, CURLOPT_HEADER, 0);//是否显示头信息
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);//是否自动显示返回的信息
    curl_setopt($curl, CURLOPT_COOKIEJAR, $cookie); //设置Cookie信息保存在指定的文件中
    curl_setopt($curl, CURLOPT_POST, 1);//post方式提交
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($paras));//要提交的信息
    curl_exec($curl);//执行cURL
    curl_close($curl);//关闭cURL资源，并且释放系统资源
}

//登录成功后获取数据
function get_content($url, $cookie, $paras) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie); //读取cookie
    curl_setopt($ch, CURLOPT_POST, 1);//post方式提交
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($paras));//要提交的信息
    $rs = curl_exec($ch); //执行cURL抓取页面内容
    curl_close($ch);
    return $rs;
}




//获取测试接口参数
if (isset($_POST['para']) && ! empty($_POST['para'])) {
    $apiurl=$_POST['url'];
    $para=$_POST['para'];//参数字符串

}else{
	$apiurl=$_POST['url'];
	$para=null;

}

//测试接口参数提交方式
if (isset($_POST['method']) && ! empty($_POST['method'])) {
	$method=$_POST['method'];
}else{
	$method="get";
}

//获取测试用户
if (isset($_POST['user']) && ! empty($_POST['user'])&&isset($_POST['pwd']) && ! empty($_POST['pwd'])) {
    $user=$_POST['user'];
    $pwd=$_POST['pwd'];//参数字符串

}else{
	$user=null;
    $pwd=null;//参数字符串
}

//设置post的数据
//echo "用户：".$user. "pwd：".$pwd. "mothod：".$method. "参数：".$para. "url：".$apiurl;

if($method=="post"){
	$url=$apiurl;
	$paras = array ();
	$arr = explode("&",$para);
	foreach($arr as $u){
		$strarr = explode("=",$u);
		$paras[$strarr[0]]=$strarr[1];
	}

	if($user==null||$pwd==null){
		echo noLoginGetRerult($url,$method,$paras);
	}else{
		$paras["telephone"]=$user;
		$paras["password"]=$pwd;
		echo afterLoginGetRerult($url,$paras);
	}
}else{
	$url=$apiurl."&".$para;
	if($user==null||$pwd==null){
	    echo noLoginGetRerult($url,null,null);
	}else{
		$paras["telephone"]=$user;
		$paras["password"]=$pwd;
		echo afterLoginGetRerult($url,null);
	}
}
return;
function afterLoginGetRerult($url,$paras){
	//登录地址
	$loginurl = "http://api.qingclouds.cn/index.php?route=moblie/login";
	//设置cookie保存路径
	$cookie = dirname(__FILE__) . '/cookie_oschina.txt';
	//模拟登录
	login_post($loginurl, $cookie, $paras);

	//获取的信息
	$content = get_content($url, $cookie, $paras);
	//删除cookie文件
	@ unlink($cookie);
	return $content;
 }

 function noLoginGetRerult($url,$method,$paras){
	$ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//是否自动显示返回的信息

	if($method=="post"){
		curl_setopt($ch, CURLOPT_POST, 1);//post方式提交
		if($paras!=null){
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($paras));//要提交的信息
		}
	}
    $rs = curl_exec($ch); //执行cURL抓取页面内容
    curl_close($ch);
    return $rs;
 }

?>