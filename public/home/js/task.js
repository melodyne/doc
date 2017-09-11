//添加输入
function addTask(){
	
	var i=$(".paraval").length;
	var paras="";
	if(i==0){
		 paras=' <tr class="paras_title">'
		             +'<th width="41px">序号</th>'
		             +'<th width="100px">类型</th>'
		             +'<th width="100px">模块</th>'
		             +'<th width="350px">任务名称</th>'
		             +'<th width="100px">进度</th>'
		             +'<th></th>'
	             +'</tr>'
		
	}

	paras=paras+'<tr class="paraval">'
		             +'<td><div class="xuhao">'+(i+1)+'</div></td>'
		             +'<td>'  
		             	+'<select name="type" style="width: 80px;height:21px;">'
		             	     +'<option value=""></option>'
				             +'<option value="新增功能">新增功能</option>'
				             +'<option value="新增界面">新增界面</option>'
				             +'<option value="完善功能">完善功能</option>'
				             +'<option value="美化界面">美化界面</option>'
				             +'<option value="删隐功能">删隐功能</option>'
				             +'<option value="bug优化">bug优化</option>'
				             +'<option value="软件测试">软件测试</option>'
				             +'<option value="搭建框架">搭建框架</option>'
				             +'<option value="文档学习">文档学习</option>'
				             +'<option value="其它">其它</option>'
			             +'</select>'
			         +'</td>'
		             +'<td><input name="module" style="width: 80px;"></td>'
		             +'<td><input name="task" style="width: 300px;"></td>'
		             +'<td><input name="progress" style="width: 50px;text-align:center""></td>'
		             +'<td><img onclick="removeHtml(this)" width="20px" src="/public/home/images/del.png"></td>'
	             +'</tr>'

	$('#paras').append(paras);

}

function removeHtml(em){
	var p=$(em).parent().parent();
	p.remove();
	var p=$(".paraval").length;
	if(p==0){
		$(".paras_title").remove();
	}
}

function taskcommit(){
    
	//获取apidocid
	var taskid=$("#tasks").attr("taskid");
	//获取参数
	var parajson=[];
	$('.paraval').each(function(){
		var Htype=$(this).find('select[name="type"]');
		var Hmodule=$(this).find('input[name="module"]');
		var Htask=$(this).find('input[name="task"]');
		var Hprogress=$(this).find('input[name="progress"]');
		
		var type=$.trim(Htype.val());
		var module=$.trim(Hmodule.val());
		var task=$.trim(Htask.val());
		var progress=$.trim(Hprogress.val());
		if(type.length==0){
			Htype.focus();
			alert("请选择任务类型！");
			exit();
		}
		if(module.length<1||module.length>6){
			Hmodule.focus();
			alert("请输入1-4个字符的模块名，无模块时请填“无”");
			exit();
		}
		if(task.length==0){
			Htask.focus();
			alert("今日任务不能为空");
			exit();
		}
		if(task.length<2){
			Htask.focus();
			alert("任务描述不能低于2个字符");
			exit();
		}

		if(task.length>30){
			Htask.focus();
			alert("任务描述不大于30个字符");
			exit();
		}

		if(!isPInt(progress)||progress>100){
			Hprogress.focus();
			alert("任务进度中请输入0-100的数字");
			exit();
		}
		
		parajson.push({type:type,module:module,task:task,progress:progress});
		
	});
	var paraStr=JSON.stringify(parajson);
    //组合请求参数
	if(taskid==null){
		var rtjson={
	    		describe:paraStr,
	    };
	}else{
		alert(paraStr);
		var rtjson={
	    		taskid:taskid,
	    		describe:paraStr
	    };
	}

	
	$.post("../../api/task/commit",rtjson,
	    function(data,status){
	    	alert("数据：" + data['msg'] + "\n状态：" + status);
        }
	);
}

function nocommit(){
	if(confirm("放弃是不可恢复的，你确认要放弃提交吗？")){
		 window.location.href="add"; 
	}
}
//----------------------------------------验证--------------------------------------------------
//正整数
function isPInt(str) {
    var g = /^[1-9]*[1-9][0-9]*$/;
    return g.test(str);
}
//整数
function isInt(str)
{
    var g=/^-?\d+$/;
    return g.test(str);
}
