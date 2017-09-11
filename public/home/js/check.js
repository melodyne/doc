/**
 * 表单验证网址函数
 */
function IsURL(str_url){

	if(str_url==""){
		alert("你还没输人url！");
		return false;
	}

	var strRegex = "^((https|http|ftp|rtsp|mms)://)?[a-z0-9A-Z]{3}\.[a-z0-9A-Z][a-z0-9A-Z]{0,61}?[a-z0-9A-Z]\.com|net|cn|cc (:s[0-9]{1-4})?/$"+ "([0-9a-z][0-9a-z-]{0,61})?[0-9a-z]." ;
	var re = new RegExp(strRegex);
	if (re.test(str_url)) {
		return true;
	}
	var re=/^(\d+)\.(\d+)\.(\d+)\.(\d+)/;//正则表达式
	if(re.test(str_url)){
	   if( RegExp.$1<256 && RegExp.$2<256 && RegExp.$3<256 && RegExp.$4<256)
	       return true;
	}
   alert("你输人的url无效！");
   return false;

}

function isIP(ip)  
{  
   var re=/^(\d+)\.(\d+)\.(\d+)\.(\d+)/;//正则表达式
	if(re.test(ip)){
	   if( RegExp.$1<256 && RegExp.$2<256 && RegExp.$3<256 && RegExp.$4<256)
	       return true;
	}
   alert("你输人的ip无效！");
   return false;
}  
