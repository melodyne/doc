<?php
require_once 'inc/Mode.php';

$menus = getMenuList();
$authors = getAuthorList();
$hosts=getHostList();
if (isset($_GET['docid']) && ! empty($_GET['docid'])) {
    $docid = $_GET['docid'];
    $apidoc=getApiById($docid);
    $hostid= $apidoc[0]['hostid'];
    $path=$apidoc[0]['upurl'];
    $paras=getParaByApiId($docid);
}else{
    die("参数错误！");
}
require_once 'public/header.php';
?>

<style>
tr{
	font-size: 13px;
}
td input,td select {
	margin: 0px 20px 0px 20px;
	width: 80px;
	text-align: center;
}
div label{
	margin-right: 30px;
}

lable{
	font-weight: bold;
}

.item{
	margin: 20px;
}
.vi{
	margin-bottom: 10px;
	margin-top: 10px;
}
.round-none {
	margin:20px;
    padding:10px;
    border: 2px solid #dedede;
    -moz-border-radius: 5px;      /* Gecko browsers */
    -webkit-border-radius: 5px;   /* Webkit browsers */
    border-radius:5px;            /* W3C syntax */
}
.round-yellow {
    padding:10px;
    background:#FC9;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    border-radius:5px;
}
.round-white {
	margin-left:8px;
    padding:3px 15px 3px 15px;
    background:#ffffff;
    -moz-border-radius: 15px;
    -webkit-border-radius: 15px;
    border-radius:15px;
}
.round-red {
	width:80px;
	height:26px;
	line-height:26px;
	cursor:pointer;
    background:#FF4500;
	color:#ffffff;
	font-size:18px;
	text-align:center;
    -moz-border-radius: 13px;
    -webkit-border-radius: 13px;
    border-radius:13px;
}
.round-red:HOVER{
	  background:#FC9;
}
</style>
<script type="text/javascript" charset="utf-8" src="/public/home/js/edit.js"></script>

<div  class="edt" style="width: 900px; margin:0 auto;">

       <div class="item">
           <lable>主机:</lable>
           <select id="host">
           <?php
           foreach ($hosts as $item){
               $h=$item['hostid'];
               $d=$item['domain'];
               if ($hostid==$h){
                   echo "<option value='$h' selected = 'selected' >$d</option>";
               }else{
                   echo "<option value='$h'>$d</option>";
               }
           }
           ?>
            </select>
        </div>

        <div class="item">
        	<lable>地址:</lable><span id="hostview"><?php echo $apidoc[0]['domain'];?></span><input id="apipath" value="<?php echo $path?>"/>
        </div>

        <div class="item">
            <lable>提交方式:</lable>
            <input type="radio" <?php if($apidoc[0]['method']=="get")echo 'checked="checked"';?> name="action" value="get" /><span>Get</apan>
            <input type="radio" <?php if($apidoc[0]['method']=="post")echo 'checked="checked"';?> name="action" value="post" /><span>Post</span>
			 <input type="radio" <?php if ($apidoc[0]['method']=="get post")echo 'checked="checked"';?> name="action" value="get post" /><span>Get Post</span>
        </div>
        <?php $i=0; foreach ($paras as $item){$i++;}?>
       <div class="round-none">
           <div class="vi">
               <lable>请求参数</lable>
            </div>
            <hr style="height:1px;border:none;border-top:1px dashed #ccc;" />
            <table id="paras">
            <?php $j=0; foreach ($paras as $item){$j++;if($j==1){?>
                <tr>
                    <th>序号</th>
                    <th>字段</th>
                    <th>示例值</th>
                    <th>类型</th>
                    <th>是否必填</th>
                    <th>说明</th>
                    <th></th>
                </tr>
                <tr class="paraval" paraid="<?php echo $item['paraid']?>">
                    <td><div class="xuhao"><?php echo $j?></div></td>
                    <td><input name="pname" value="<?php echo $item['pkey']?>" style="width: 80px;"></td>
                    <td><input name="pval" value="<?php echo $item['pvalue']?>" style="width: 80px;"></td>
                    <td><input name="ptype" value="<?php echo $item['ptype']?>" style="width: 80px;"></td>
                    <td>
                        <select name="necc" style="width: 60px;">
                            <option value="1" <?php if($item['necessary']==1)echo'selected="selected"'?>>必填</option>
                            <option value="0" <?php if($item['necessary']==0)echo'selected="selected"'?>>选填</option>
                        </select>
                    </td>
                    <td><input name="intro" value="<?php echo $item['intro']?>" style="width: 200px;"></td>
                    <td><img onclick="removePara(this)" width="20px" src="static/main/images/del.png"></td>
                </tr>
                <?php }else{?>
                  <tr class="paraval" paraid="<?php echo $item['paraid']?>">
                    <td><div class="xuhao"><?php echo $j?></div></td>
                    <td><input name="pname" value="<?php echo $item['pkey']?>" style="width: 80px;"></td>
                    <td><input name="pval" value="<?php echo $item['pvalue']?>" style="width: 80px;"></td>
                    <td><input name="ptype" value="<?php echo $item['ptype']?>" style="width: 80px;"></td>
                    <td>
                        <select name="necc" style="width: 60px;">
                            <option value="1" <?php if($item['necessary']==1)echo'selected="selected"'?>>必填</option>
                            <option value="0" <?php if($item['necessary']==0)echo'selected="selected"'?>>选填</option>
                        </select>
                    </td>
                    <td><input name="intro" value="<?php echo $item['intro']?>" style="width: 200px;"></td>
                    <td><img onclick="removePara(this)" width="20px" src="static/main/images/del.png"></td>
                </tr>
                <?php }}?>
            </table>
            <div class="addpara"><img onclick="addPara()" width="37px" src='static/main/images/add.jpg'></div>
       </div>

       <div class="round-none">
            <div class="vi">
               <lable>状态码信息</lable>
            </div>

            <hr style="height:1px;border:none;border-top:1px dashed #ccc;" />
            <table id="codes">
			    <tr class="codes_tetle">
					<th>序号</th>
					<th>状态值</th>
					<th>提示信息</th>
					<th></th>
				</tr>
				
            	<?php $i=0;foreach (json_decode($apidoc[0]['codes'],true) as $item){$i++;?>
				<tr class="code_item">
					<td><div class="xuhao"><?php echo $i?></div></td>
					<td><input name="code" value="<?php echo $item['code']?>" style="width: 80px;" /></td>
					<td><input name="msg"  value="<?php echo $item['msg']?>" style="width: 308px;text-align: left;"/></td>
					<td><img onclick="removeHtml(this)" width="20px" src="static/main/images/del.png"></td>
				</tr>
                <?php }?>

            </table>
			<div class="addpara"><img onclick="addCode()" width="37px" src='static/main/images/add.jpg'></div>
       </div>


         <div style="margin:40px 0px 0px 20px">
             <label style="font-weight: bold;margin-right: 500px">返回数据data[]:</label>
             <button id="editor1" onclick="seleditor(1)" style="background:#FF4500;color:white;" >普通编辑模式</button>
             <button id="editor2" onclick="seleditor(2)" style="background:white;">高级编辑模式</button>
         </div>

        <!-- 编辑器1 umeditor-->
        <div class="umeditor" >

            <link href="umeditor1_2_2/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
            <script type="text/javascript" src="umeditor1_2_2/third-party/jquery.min.js"></script>
            <script type="text/javascript" charset="utf-8" src="umeditor1_2_2/umeditor.config.js"></script>
            <script type="text/javascript" charset="utf-8" src="umeditor1_2_2/umeditor.min.js"></script>
            <script type="text/javascript" src="umeditor1_2_2/lang/zh-cn/zh-cn.js"></script>

            <div align="center" style="margin: 20px;">
                <div align="left" style="width:100%">
            	   <script type="text/plain" id="myEditor" style="width:100%;height:500px;"><?php echo $apidoc[0]['retndata'] ?></script>
                </div>
            </div>

            <script type="text/javascript">
                //实例化编辑器
                var um = UM.getEditor('myEditor');
            </script>

        </div>

         <!-- 编辑器2 ueditor -->
        <div class="ueditor" style="display: none;">
            <script type="text/javascript" charset="utf-8" src="ueditor/ueditor.config.js"></script>
            <script type="text/javascript" charset="utf-8" src="ueditor/ueditor.all.min.js"></script>
            <script type="text/javascript" charset="utf-8" src="ueditor/third-party/jquery-1.10.2.min.js"></script>

            <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
            <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
            <script type="text/javascript" charset="utf-8" src="ueditor/lang/zh-cn/zh-cn.js"></script>

            <div align="center" style="margin: 20px;">
            		<script id="editor" type="text/plain" style="width:100%;height:600px;"></script>
            </div>

            <script type="text/javascript">
            		//实例化编辑器
            		//建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
            		var ue = UE.getEditor('editor');
            	</script>
        </div>

        <!-- 表单提交 -->
    	<div style="font-size: 13px;text-align: center;">
    		<span style="margin-left: 20px;">所属菜单:</span>
    		<select id="sl_menus" name="menus">
    			<option valued="">选择</option>
    			<?php foreach ($menus as $menu){?>
    			<option value="<?php echo $menu['menuid']?>"  <?php if($apidoc[0]['menuid']==$menu['menuid'])echo'selected="selected"'?>><?php echo $menu['menuname']?></option>
    			<?php }?>
    		</select>
    			<span style="margin-left: 20px;">接口名称：</span>
    			<input id="apiname" type="text" docid="<?php echo $docid?>" value="<?php echo $apidoc[0]['apiname']?>" style="width: 200px;margin: 0px;text-align: left;" >

    			<span style="margin-left: 20px;">开发者：</span>
    			<select id="sl_authors" name="authors">
    			   <option valued="">选择</option>
    			   <?php foreach ($authors as $author){?>
    			   <option value="<?php echo $author['authorid']?>" <?php if($apidoc[0]['authorid']==$author['authorid'])echo'selected="selected"'?> ><?php echo $author['authname']?></option>
    			   <?php }?>
    			</select>
    		<button style="margin-left: 20px;" onclick="confirmUpd()">提交修改</button>

    	</div>
     </div>
    <!--   左边结束 -->
<?php require_once 'public/footer.php';?>