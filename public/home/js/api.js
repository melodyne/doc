/**
 * 接口文档浏览页
 */
function del(docid) {
	
	if(window.confirm('你确定要删除该api吗？')){}else{return false;}
	var pwd=prompt("为了防止恶意删除，请您输入删除口令","");
    if(pwd!="yunsuapi"){alert("口令错误！");return;};
	 $.get("interface/DelApiDoc.php?docid="+docid,function(data,status){
		    alert("Data: " + data + "\nStatus: " + status);
		    document.location = "api.php";
     });

}
function openmenu(id) {
	 $('#item'+id).slideToggle(function(){
	     if ($(this).is(':hidden')) {
	         $("#menu"+id+" img").attr("src","css/closemenu.png");
	     }else{
	     	 $("#menu"+id+" img").attr("src","css/openmenu.png");
	     }
	  });
}

function doTest(){
   //接口测试
	var islogin=$("input[name='islogin']").is(':checked');
    var paraStr=$('#RawJson').val();
	var apiurl=$('#apiurl').text();
	var method=$('#method').text();

	if(islogin){
		var user=$('#user').val();
		var pwd=$('#pwd').val();
		if(!confirm("账户："+user+"\n密码："+pwd+"\n方式："+method+"\n参数："+paraStr+"\n地址："+apiurl+"\n\n是否进行接口测试？"))return;
		var paras={
	    		  user:user,
	    		  pwd:pwd,
	    		  url:apiurl,
	    	      para:paraStr,
	    		  method:method
	    	    };
	}else{
		if(!confirm("方式："+method+"\n参数："+paraStr+"\n地址："+apiurl+"\n\n是否进行接口测试？"))return;
		var paras={
	    		  url:apiurl,
	    	      para:paraStr,
	    		  method:method
	    	    };
	}


    $.post("interface/getRerult.php?t="+Math.random(),paras,
    function(data,status){ 
	    alert(data);
	    if(status=="success"){
		    if((data.substr(0,1)=="{"&&data.substr(-1)=="}")||(data.substr(0,1)=="["&&data.substr(-1)=="]")){
				 Process(data);
			}else{
				doms = $.parseHTML( data, true );
				$("#testmsg").append(doms);
			}		
			
	    }else{
			$("#testmsg").append("网络请求失败！");
		}
    });

}