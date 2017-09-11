/**
 *设置界面
 */

//增加开发者
function addauthor() {
	var auth=$("#new_authname").val();
	var depar=$("#new_department").val();
	var posi=$("#new_position").val();
	var access=$("#new_access").val();
	var pwd=$("#new_pwd").val();
	if(auth==""){
		alert("你还没输入姓名！");
		$("#new_authname").focus();
		return;
	}

	if(depar==""){
		alert("你还没输入部门！");
		$("#new_department").focus();
		return;
	}

	if(posi==""){
		alert("你还没输入职位！");
		$("#new_position").focus();
		return;
	}


	$.post("interface/add.php",
		{
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