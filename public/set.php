<?php
require_once '../inc/db.php';
$menus = exesql("select * from doc_menus order by priority asc");
$authors = exesql("select * from doc_authors");
$mylink = exesql("select * from doc_links order by priority asc");
$hosts = exesql("select * from doc_hosts");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>云游网API_设置</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
</head>
<link rel="stylesheet" href="/public/home/css/yunyou.css" type="text/css" media="screen" />
<script type="text/javascript" charset="utf-8" src="ueditor/third-party/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/check.js"></script>
<script type="text/javascript" src="js/set.js"></script>
<style type="text/css">
span{
	color:#68228B;
}
span:HOVER {
	color:blue;
}
td {
	text-align: center;
	font-size: 14px;
}

tr {
	height: 30px;
}
</style>
<script>
function addmenu() {
	var name=$("#new_menuname").val();
	var prio=$("#new_prio").val();
	if(name==""){
		alert("你还没输入菜单名！");
		return;
	}

	if(prio==""){
		alert("优先级不能为空！");
		return;
	}
	 var re = /^[1-9]+[0-9]*]*$/;
     if (!re.test(prio))
    {
        alert("优先级，请输入正整数！");
        $("#new_prio").focus();
        return false;
     }
	$.post("interface/add.php",
			  {
			    menuname:name,
			    priority:prio
			  },
			  function(data,status){
			    alert("Data: " + data + "\nStatus: " + status);
			    document.location = "set.php";
	});
}

//增加首页友情链接
function add_link() {
	var name=$("#new_link_name").val();
	var url=$("#new_link_url").val();
	var por=$("#new_link_priority").val();
	if(name==""){
		alert("你还没输入友情链接的名称！");
		$("#new_link_name").focus();
		return;
	}


	if(!IsURL(url)){
		$("#new_link_url").focus();
		return;
	}

	if(por==""){
		alert("你还没输优先级！");
		$("#new_link_priority").focus();
		return;
	}


	$.post("interface/add.php",
		{
		lkname:name,
		lkurl:url,
		priority:por
		},
	    function(data,status){
		  alert("Data: " + data + "\nStatus: " + status);
		  document.location = "set.php";
	});

}

function upda_menu(id) {
	var name=$("#menuname"+id).val();
	var prio=$("#prio"+id).val();
	if(name==""){
		alert("你还没输入菜单名！");
		return;
	}

	if(prio==""){
		alert("优先级不能为空！");
		return;
	}
	 var re = /^[1-9]+[0-9]*]*$/;
     if (!re.test(prio))
    {
        alert("优先级，请输入正整数！");
        $("#new_prio").focus();
        return false;
     }
	if(window.confirm('你确定要修改该"'+name+'"菜单吗？')){}else{return false;}
	$.post("interface/update.php",
			  {
		        menuid:id,
			    menuname:name,
			    priority:prio
			  },
			  function(data,status){
			    alert("Data: " + data + "\nStatus: " + status);
	});
}
function upda_befor(id){
	$("#upda_auth"+id).text("保存");
	$("#upda_auth"+id).attr("onclick","upda_author('"+id+"')");
	$(".auth"+id).css("display",function(){return "none";});
	$("#authname"+id).css("display","inline");
	$("#department"+id).css("display","inline");
	$("#position"+id).css("display","inline");
	$("#access"+id).css("display","inline");
	$("#pwd"+id).css("display","inline");
}
function upda_author(id) {

	var auth=$("#authname"+id).val();
	var depar=$("#department"+id).val();
	var posi=$("#position"+id).val();
	var access=$("#access"+id).val();
	var pwd=$("#pwd"+id).val();
	if(auth==""){
		alert("你还没输入姓名！");
		$("#authname"+id).focus();
		return;
	}

	if(depar==""){
		alert("你还没输入部门！");
		$("#department"+id).focus();
		return;
	}

	if(posi==""){
		alert("你还没输入职位！");
		$("#position"+id).focus();
		return;
	}
	if(window.confirm('你确定要修改"'+auth+'"的信息吗？')){}else{return false;}
	$.post("interface/update.php",
			  {
		        authorid:id,
		        authname:auth,
				department:depar,
				position:posi,
				access:access,
				pwd:pwd
			  },
			  function(data,status){
			    alert("Data: " + data + "\nStatus: " + status);
			    document.location = "set.php";
	});
}
//-----------修改首页友情链接---------------------------------------------
function upda_link_befor(id){
	$("#upda_link"+id).text("保存");
	$("#upda_link"+id).attr("onclick","upda_link('"+id+"')");
	$(".link"+id).css("display",function(){return "none";});
	$("#link_name"+id).css("display","inline");
	$("#link_url"+id).css("display","inline");
	$("#link_priority"+id).css("display","inline");
}
function upda_link(id) {

	var name=$("#link_name"+id).val();
	var url=$("#link_url"+id).val();
	var por=$("#link_priority"+id).val();
	if(name==""){
		alert("你还没输入友情链接名称！");
		$("#link_name"+id).focus();
		return;
	}

	if(!IsURL(url)){
		$("#link_url"+id).focus();
		return;
	}

	if(por==""){
		alert("优先级不能为空！");
		return;
	}
	 var re = /^[1-9]+[0-9]*]*$/;
     if (!re.test(por))
    {
        alert("优先级，请输入正整数！");
        $("#link_priority").focus();
        return false;
     }
	if(window.confirm('你确定要修改"'+name+'"友情链接的信息吗？')){}else{return false;}
	$.post("interface/update.php",
			  {
		        linkid:id,
		        lkname:name,
				lkurl:url,
				priority:por
			  },
			  function(data,status){
			    alert("Data: " + data + "\nStatus: " + status);
			    document.location = "set.php";
	});
}
function delmenu(id) {
	var pwd=prompt("删除该菜单，会自动删除该菜单下所有文章！\n谨慎操作！请输入删除密码！","");
	if(pwd!="yunsuapi"){
		alert("密码错误！");
		return false;
	}
	$.get("interface/del.php?menuid="+id,function(data,status){
			    alert("Data: " + data + "\nStatus: " + status);
			    document.location = "set.php";
	});
}
function delauthor(id) {
	//if(!window.confirm('你确定要删除该开发者吗？'))return false;
	//$.get("interface/del.php?authorid="+id,function(data,status){
	//		    alert("Data: " + data + "\nStatus: " + status);
	//		    document.location = "set.php";
	//});
	alert("你无操作权限，请联系管理员！");
}
function del_link(id) {
	if(!window.confirm('你确定要删除该条首页友情链接吗？'))return false;
	$.get("interface/del.php?linkid="+id,function(data,status){
			    alert("Data: " + data + "\nStatus: " + status);
			    document.location = "set.php";
	});
}
//------------------------------------------------主机-------------------------------------------------------
function isValidIP(ip)     
{     
    var reg =  /^(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])$/     
    return reg.test(ip);     
}    
//增加首页友情链接
function add_host() {
	var nm=$("#new_host_nm").val();
	var dm=$("#new_host_dm").val();
	var ip=$("#new_host_ip").val();
	if(nm==""){
		alert("你还没输入主机名称！");
		$("#new_host_nm").focus();
		return;
	}

    if(!(dm.substr(0,7)=="http://"||dm.substr(0,7)=="https://")){
		$("#new_host_dm").focus();
		alert("请输入以http://开头的url");
		return;
	}else{
		if(dm.length<11){
			alert("请输入正确的域名");
			return;
		}
		if(dm.substr(-1)!="/"){
			alert("域名请以‘/’结尾");
			return;
		}
	}
	
	if(ip.length>0){
		
		if(!isValidIP(ip)){
			return;
		}
	}
	
	$.getJSON("index.php/api/Hosts/add",{nm:nm,dm:dm,ip:ip},function(result){
		 alert(result['msg']);
		 if(result['code']==100){
			 document.location = "set.php";
		 }
		
	});


}


</script>
</head>

<body>
  <div id="container">
		<div id="contents" style="margin: 10px 100px 10px 100px;">
			<div class="set_menu">
				<h3>API导航菜单设置</h3>
			</div>
			<table>
				<colgroup>
					<col width="42">
					<col width="74">
					<col width="126">
					<col width="96">
				</colgroup>
				<thead>
					<tr>
						<th>&nbsp;</th>
						<th>菜单</th>
						<th>优先级</th>
						<th>操作</th>
					</tr>
				<thead>
				<tbody>
	            <?php $i=0; foreach ($menus as $menu){$i++;?>
	            <tr>
						<td><?php echo $i?></td>
						<td><input id="menuname<?php echo $menu['menuid']?>" class="inpt_menu" type="text" value="<?php echo $menu['menuname']?>"></td>
						<td><input id="prio<?php echo $menu['menuid']?>" class="inpt_prio"  type="text" value="<?php echo $menu['priority']?>"></td>
						<td>
						   <span onclick="upda_menu('<?php echo $menu['menuid']?>')">修改</span>&nbsp;
						   <span onclick="delmenu('<?php echo $menu['menuid']?>')">删除</span>
						</td>
				</tr>
	            <?php }?>
	            </tbody>
				<tfoot >
					<tr style="height: 50px;">
						<td>&nbsp;</td>
						<td><input id="new_menuname" class="inpt_menu" type="text" value=""></td>
						<td><input id="new_prio" class="inpt_prio"  type="text" value=""></td>
						<td><div class="yuanjiao" onclick="addmenu()">添加菜单</div></td>
					</tr>
				</tfoot>
			</table>
			<div class="set_menu">
				<h3>开发者管理</h3>
			</div>
			<table>
			   <colgroup>
					<col width="42">
					<col width="74">
					<col width="126">
					<col width="100">
					<col width="100">
					<col width="150">
					<col width="150">
				</colgroup>
				<thead>
					<tr>
						<th>&nbsp;</th>
						<th>姓名</th>
					    <th>部门</th>
					    <th>职位</th>
					    <th>测试账号</th>
					    <th>测试密码</th>
					    <th>操作</th>
					</tr>
				<thead>

	           <?php $i=0; foreach ($authors as $author){$i++;?>
	           <tr>
					<td><?php echo $i?></td>
					<td>
					   <input id="authname<?php echo $author['authorid']?>" style="display:none;text-align: center;" class="inpt_menu" type="text" value="<?php echo $author['authname']?>">
					   <div class="auth<?php echo $author['authorid']?>"><?php echo $author['authname']?></div>
					</td>
					<td>
					   <input id="department<?php echo $author['authorid']?>" style="display:none;width: 60px;text-align: center;"  class="inpt_menu" type="text" value="<?php echo $author['department']?>">
					   <div class="auth<?php echo $author['authorid']?>"><?php echo $author['department']?></div>
					</td>
					<td>
					   <input id="position<?php echo $author['authorid']?>" style="display:none;width: 80px;text-align: center;"  class="inpt_menu" type="text" value="<?php echo $author['position']?>">
					   <div class="auth<?php echo $author['authorid']?>"><?php echo $author['position']?></div>
					</td>
					<td>
					   <input id="access<?php echo $author['authorid']?>" style="display:none;width: 100px;text-align: center;"  class="inpt_menu" type="text" value="<?php echo $author['testacnt']?>">
					   <div class="auth<?php echo $author['authorid']?>"><?php echo $author['testacnt']?></div>
					</td>
					<td>
					   <input id="pwd<?php echo $author['authorid']?>" style="display:none;width: 100px;text-align: center;"  class="inpt_menu" type="text" value="<?php echo $author['pwd']?>">
					   <div class="auth<?php echo $author['authorid']?>"><?php echo $author['pwd']?></div>
					</td>
					<td>
					   <span id="upda_auth<?php echo $author['authorid']?>" onclick="upda_befor('<?php echo $author['authorid']?>')">修改</span>&nbsp;
					   <span onclick="delauthor('<?php echo $author['authorid']?>')">删除</span>
					</td>
				</tr>
	         <?php }?>
	          </tbody>
				<tfoot >
					<tr style="height: 50px;">
						<td>&nbsp;</td>
						<td><input id="new_authname" class="inpt_menu" type="text" value=""></td>
						<td><input id="new_department" class="inpt_prio"  type="text" value=""></td>
						<td><input id="new_position" class="inpt_prio"  type="text" value="" style="width:80px"></td>
						<td><input id="new_access" class="inpt_prio"  type="text" value="" style="width:100px"></td>
						<td><input id="new_pwd" class="inpt_prio"  type="text" value="" style="width:100px"></td>
						<td><div class="yuanjiao" onclick="addauthor()">添加开发者</div></td>
					</tr>
				</tfoot>
	          </table>

	        <!-- 首页友情链接设置 -->
	        <div class="set_menu">
				<h3>首页友情链接设置</h3>
			</div>
			<table>
			   <colgroup>
					<col width="42">
					<col width="200">
					<col width="260">
					<col width="96">
					<col width="96">
				</colgroup>
				<thead>
					<tr>
						<th>&nbsp;</th>
						<th>名称</th>
					    <th>URL</th>
					    <th>优先级</th>
					    <th>操作</th>
					</tr>
				<thead>

	           <?php $i=0; foreach ($mylink as $link){$i++;?>
	           <tr>
					<td><?php echo $i?></td>
					<td>
					   <input id="link_name<?php echo $link['lkid']?>" style="display:none;text-align: center;width: 150px;" class="inpt_menu" type="text" value="<?php echo $link['lkname']?>">
					   <div class="link<?php echo $link['lkid']?>"><?php echo $link['lkname']?></div>
					</td>
					<td>
					   <input id="link_url<?php echo $link['lkid']?>" style="display:none;width: 240px;"  class="inpt_menu" type="text" value="<?php echo $link['lkurl']?>">
					   <div class="link<?php echo $link['lkid']?>"><?php echo $link['lkurl']?></div>
					</td>
					<td>
					   <input id="link_priority<?php echo $link['lkid']?>" style="display:none;width: 60px;text-align: center;"  class="inpt_menu" type="text" value="<?php echo $link['priority']?>">
					   <div class="link<?php echo $link['lkid']?>"><?php echo $link['priority']?></div></td>
					<td>
					   <span id="upda_link<?php echo $link['lkid']?>" onclick="upda_link_befor('<?php echo $link['lkid']?>')">修改</span>&nbsp;
					   <span onclick="del_link('<?php echo $link['lkid']?>')">删除</span>
					</td>
				</tr>
	         <?php }?>
	          </tbody>
				<tfoot >
					<tr style="height: 50px;">
						<td>&nbsp;</td>
						<td><input id="new_link_name"  style="width: 150px" type="text" value=""></td>
						<td><input id="new_link_url"  style="width: 240px"type="text" value=""></td>
						<td><input id="new_link_priority" style="width: 60px"  type="text" value=""></td>
						<td><div class="yuanjiao" onclick="add_link()">添加链接</div></td>
					</tr>
				</tfoot>
	          </table>
			<!-- 服务器信息管理 -->
	        <div class="set_menu">
				<h3>服务器信息管理</h3>
			</div>
			<table>
			   <colgroup>
					<col width="42">
					<col width="200">
					<col width="260">
					<col width="200">
					<col width="96">
				</colgroup>
				<thead>
					<tr>
						<th>&nbsp;</th>
						<th>服务器</th>
					    <th>域名</th>
					    <th>主机ip</th>
					    <th>操作</th>
					</tr>
				<thead>

	           <?php $i=0; foreach ($hosts as $host){$i++;?>
	           <tr>
					<td><?php echo $i?></td>
					<td>
					   <input id="link_name<?php echo $host['hostid']?>" style="display:none;text-align: center;width: 150px;" class="inpt_menu" type="text" value="<?php echo $host['hostname']?>">
					   <div class="host<?php echo $host['host']?>"><?php echo $host['hostname']?></div>
					</td>
					<td style="text-align: left;">
					   <input id="host_url<?php echo $host['hostid']?>" style="display:none;width: 240px;"  class="inpt_menu" type="text" value="<?php echo $host['domain']?>">
					   <div class="host<?php echo $host['hostid']?>"><?php echo $host['domain']?></div>
					</td>
					<td>
					   <input style="display:none;width: 120px;text-align: center;" type="text" value="<?php echo $host['hostip']?>">
					   <div class="host<?php echo $host['hostid']?>"><?php echo $host['hostip']?></div></td>
					<td>
					   <span id="upda_host<?php echo $host['hostid']?>" onclick="alert('你无操作权限，请联系管理员！')">修改</span>&nbsp;
					   <span onclick="alert('你无操作权限，请联系管理员！')">删除</span>
					</td>
				</tr>
	         <?php }?>
	          </tbody>
				<tfoot >
					<tr style="height: 50px;">
						<td>&nbsp;</td>
						<td><input id="new_host_nm"  style="width: 150px" type="text" value=""></td>
						<td><input id="new_host_dm"  style="width: 240px"type="text" value=""></td>
						<td><input id="new_host_ip" style="width: 150px"  type="text" value=""></td>
						<td><div class="yuanjiao" onclick="add_host()">添加服务器</div></td>
					</tr>
				</tfoot>
	          </table>
			
		</div>
	</div>
</body>
</html>