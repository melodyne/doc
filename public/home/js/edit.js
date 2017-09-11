/**
 * 编辑页处理函数
 */
//全局变量
var editor=1;
var delparaid=[];
var delcodeid=[];
$(function(){
	 var value=$('#host').find("option:selected").text();
     $('#hostview').text(value);
	//选择主机
    $('#host').change(function(e){
       var value=$('#host').find("option:selected").text();
       $('#hostview').text(value);
    });
});



//选择编辑器
function seleditor(num){
    if(editor==1){
	   ue = UM.getEditor('myEditor');
	}else{
	   ue = UE.getEditor('editor');
	}
	var content=ue.getContent();
	if(ue.getContentTxt().trim()=="此编辑器支持，表格嵌套输入。"){
		content="";
	}
	editor=num;
	if(num==1){
		$('#editor1').css("background","#FF4500").css("color","white");
		$('#editor2').css("background","white").css("color","black");
		$('.umeditor').show();
		$('.ueditor').hide();
	}else{
		$('#editor1').css("background","white").css("color","black");
		$('#editor2').css("background","#FF4500").css("color","white");
		$('.umeditor').hide();
		$('.ueditor').show();
	}

	if(editor==1){
		   ue = UM.getEditor('myEditor');
	}else{
		   ue = UE.getEditor('editor');
	}
	ue.setContent(content);
}

//获提交表单的取值
function getValuse(){
	//获取apidocid
	var docid=$("#apiname").attr("docid");
	//主机
	var hostid=$('#host').val();
	//接口路径
	var path=$('#apipath').val();
	if(path==""||path==null){
		alert("你还没有填接口资源路径哦！");
		return false;
	}

    //提交方式
	var method=$('.item input[name="action"]:checked').val();
	if(method==""||method==null){
		alert("你还没有选择参数提交方式哦！");
		return false;
	}

	//获取参数
	var parajson=[];
	$('.paraval').each(function(){
		var paraid=$(this).attr("paraid");
		var pname=$(this).find('input[name="pname"]').val();
		var pval=$(this).find('input[name="pval"]').val();
		var ptype=$(this).find('input[name="ptype"]').val();
		var necc=$(this).find('select[name="necc"]').val();
		var intro=$(this).find('input[name="intro"]').val();
		if(paraid==null){
			parajson.push({pname:pname,pval:pval,ptype:ptype,necc:necc,intro:intro});
		}else{
			parajson.push({paraid:paraid,pname:pname,pval:pval,ptype:ptype,necc:necc,intro:intro});
		}

	});
	var paraStr=JSON.stringify(parajson);

	//获取状态码
	var codejson=[];
	$('.code_item').each(function(){
		var code=$(this).find('input[name="code"]').val();
		var msg=$(this).find('input[name="msg"]').val();
		codejson.push({code:code,msg:msg});
		

	});
	if(JSON.stringify(codejson)=="[]"){
		alert("你还没有添加状态码哦！");
		return false;
	}
    var codeStr=JSON.stringify(codejson);


    //获取内容
    var ue=null;

    if(editor==1){
    	ue = UM.getEditor('myEditor');
    }else{
    	ue = UE.getEditor('editor');
    }

    if (!ue.hasContents()||ue.getContentTxt().trim()=="此编辑器支持，表格嵌套输入。") {
		alert("文章内容为空");
		return false;
	}
    var content = ue.getContent();

    var men=$("#sl_menus").val();
	var apinam=$("#apiname").val();
	var auth=$("#sl_authors").val();
	if(men==""){
		alert("你还没选择所属菜单！");
		return false;
	}
	if(apinam==""){
		alert("你还没输入接口名称！");
		return false;
	}
	if(apinam.length>10){
		alert("接口名称不要超过10个字符！");
		return false;
	}
	if(auth==""){
		alert("你还没选择开发者！");
		return false;
	}

    //组合请求参数
	if(docid==null){
		var rtjson={
	    		apiname:apinam,
	    		hostid:hostid,
	    		path:path,
	    		method:method,
	    		paras:paraStr,
	    		codes:codeStr,
	    		content:content,
	    		menu:men,
				author:auth
	    };
	}else{
		var rtjson={
	    		docid:docid,
	    		apiname:apinam,
	    		hostid:hostid,
	    		path:path,
	    		method:method,
	    		paras:paraStr,
	    		codes:codeStr,
	    		content:content,
	    		menu:men,
				author:auth,
				delpara:JSON.stringify(delparaid),
				delcode:JSON.stringify(delcodeid)
	    };
	}


	return rtjson;
}

//提交api文档
function release(){
	var rtjson=getValuse();
	if(rtjson==false)return;

	alert(JSON.stringify(rtjson));
	$.post("interface/AddApiDoc.php",rtjson,
		    function(data,status){
		    alert("数据：" + data + "\n状态：" + status);
	});
}



function addPara(){
	
	var i=$(".paraval").length;
	var paras="";
	if(i==0){
		 paras=' <tr class="paras_title">'
		 +'<th>序号</th>'
		 +'<th>字段</th>'
		 +'<th>示例值</th>'
		 +'<th>类型</th>'
		 +'<th>是否必填</th>'
		 +'<th>说明</th>'
		 +'<th></th>'
		 +'</tr>'
		 +'<tr class="paraval">'
		 +'<td><div class="xuhao">'+(i+1)+'</div></td>'
		 +'<td><input name="pname"  style="width: 80px;"/></td>'
		 +'<td><input name="pval"   style="width: 80px;"/></td>'
		 +'<td><input name="ptype"  style="width: 80px;"/></td>'
		 +'<td>'
		 +'<select name="necc" style="width: 60px;">'
		 +'<option value="1">必填</option>'
		 +'<option value="0">选填</option>'
		 +'</select>'
		 +'</td>'
		 +'<td><input name="intro" style="width: 200px;"/></td>'
		 +'<td><img onclick="removeHtml(this)" width="20px" src="/public/home/images/del.png"></td>'
		 +'</tr>';
	}else{
		 paras='<tr class="paraval">'
		 +'<td><div class="xuhao">'+(i+1)+'</div></td>'
		 +'<td><input name="pname"  style="width: 80px;"/></td>'
		 +'<td><input name="pval"   style="width: 80px;"/></td>'
		 +'<td><input name="ptype"  style="width: 80px;"/></td>'
		 +'<td>'
		 +'<select name="necc" style="width: 60px;">'
		 +'<option value="1">必填</option>'
		 +'<option value="0">选填</option>'
		 +'</select>'
		 +'</td>'
		 +'<td><input name="intro" style="width: 200px;"/></td>'
		 +'<td><img onclick="removeHtml(this)" width="20px" src="/public/home/images/del.png"></td>'
		 +'</tr>';
	}
	
	 $('#paras').append(paras);

}


function addCode(){
	var i=$(".code_item").length;
	var htm="";
	if(i==0){
		 htm=' <tr class="codes_tetle">'
		 +'<th>序号</th>'
		 +'<th>状态值</th>'
		 +'<th>提示信息</th>'
		 +'<th></th>'
		 +'</tr>'
		 +'<tr class="code_item">'
		 +'<td><div class="xuhao">'+(i+1)+'</div></td>'
		 +'<td><input name="code"  style="width: 80px;"/></td>'
		 +'<td><input name="msg"   style="width: 308px;text-align: left;"/></td>'
		 +'<td><img onclick="removeHtml(this)" width="20px" src="/public/home/images/del.png"></td>'
		 +'</tr>';
	}else{
		 htm='<tr class="code_item">'
		 +'<td><div class="xuhao">'+(i+1)+'</div></td>'
		 +'<td><input name="code"  style="width: 80px;"/></td>'
		 +'<td><input name="msg"   style="width: 308px;text-align: left;"/></td>'
		 +'<td><img onclick="removeHtml(this)" width="20px" src="/public/home/images/del.png"></td>'
		 +'</tr>';
	}
	
	$('#codes').append(htm);
}

function removeHtml(em){
	var p=$(em).parent().parent();
    delparaid.push({delparaid:$(p).attr('paraid')});
	p.remove();
	var p=$(".paraval").length;
	if(p==0){
		$(".paras_title").remove();
	}
	var c=$(".code_item").length;
	if(c==0){
		$(".codes_tetle").remove();
	}
}

//---------------修改提交------------
function confirmUpd(){

	var pwd=prompt("为了防止恶意更改，请您输入更改口令","");
    if(pwd!="yunsuapi"){alert("口令错误！");return;};

	var rtjson=getValuse();
	if(rtjson==false)return;

	alert(JSON.stringify(rtjson));
	$.post("interface/UpdApiDoc.php",rtjson,
		    function(data,status){
		    alert("数据：" + data + "\n状态：" + status);
	});
}
