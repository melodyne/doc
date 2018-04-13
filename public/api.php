<?php
require_once '../inc/db.php';
require_once '../inc/Mode.php';
require_once 'header.php';
$menus = exesql("select * from doc_menus order by priority asc");
if (isset($_GET['docid']) && !empty($_GET['docid'])) {
    $apiId = $_GET['docid'];
    $apiInf = getApiById($apiId);
} else {
    $apiInf = array();
}
?>
<script src="/json_view/js/c.js" type="text/javascript"></script>
<link href="/json_view/css/s.css" type="text/css" rel="stylesheet"></link>
<script src="/home/js/api.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function () {
        $('#st').change(function (e) {
            var value = $('#st').val();
            strs = value.split("&"); //字符分割
            $('#user').val(strs[0]);
            $('#pwd').val(strs[1]);
        })
    });
</script>

<!-- 左边开始 -->
<div id="Content-Left">

    <?php foreach ($menus as $menu) { ?>
        <div id="menu<?php echo $menu['menuid'] ?>" onclick="openmenu('<?php echo $menu['menuid'] ?>')" class="menu">
            <img style="margin-right: 5px;" height="20px" src="/home/css/openmenu.png"><?php echo $menu['menuname'] ?>
        </div>

        <ul id="item<?php echo $menu['menuid'] ?>" class="list">
            <?php
            $menuid = $menu['menuid'];
            $arts = exesql("select * from doc_apis,doc_authors,doc_menus where doc_apis.authorid=doc_authors.authorid and doc_apis.menuid=doc_menus.menuid and doc_menus.menuid=$menuid order by wtime asc");
            foreach ($arts as $art) {
                ?>
                <li onclick="location='api.php?docid=<?php echo $art['apiid'] ?>'"><?php echo $art['apiname'] ?></li>
            <?php } ?>
        </ul>
    <?php } ?>

</div>
<!-- 左边结束 -->
<?php
//无apiId时显示
if ($apiInf == null) {
    ?>
    <div id="Content-Main" style="margin-top:-50px">
        <div align="center"><img src="/home/images/02.jpg"/></div>
        <div align="center"><img id="round-none" src="/home/images/01.png"/></div>
    </div>
    <?php

    require_once 'footer.php';
    return;
} ?>

<!-- 右边开始 -->
<div id="Content-Main">
    <?php foreach ($apiInf as $item) {
        $codes = $item['codes'];
        if ($codes != "") {
            $codeList = json_decode($codes, true);
        } ?>

        <link href="//cdn.bootcss.com/bootstrap/3.0.1/css/bootstrap.min.css" rel="stylesheet">
        <!-- 导航条开始 -->
        <div class="row clearfix">
            <div class="col-md-12 column">
                <ul class="breadcrumb">
                    <li><a id="navig1" href="#">接口</a></li>
                    <li><a id="navig2" href="#"><?php echo $item['menuname'] ?></a></li>
                    <li id="navig3" class="active"><?php echo $item['apiname'] ?></li>
                </ul>
            </div>
        </div>
        <!-- 导航条结束 -->


        <div id="apiname"><?php echo $item['apiname'] ?></div>

        <!-- 文档信息开始  -->
        <div clsaa="docinfo" style="margin: 5px">
            <div style="float: left; width: 80%;">
                开发者：<span id="auth" style="color: #68228B; margin-right: 20px;"><?php echo $item['authname'] ?></span>
                发布时间：<span id=wtime style="color: #68228B; margin-right: 20px;"><?php echo $item['wtime'] ?></span>
                阅读量：<span id=rdnum style="color: #68228B;"><?php echo $item['readnum'] ?></span>次
            </div>
            <div style="float: right; width: 20%; text-align: right;">
                <span><a id="upda" style="text-decoration: none;"
                         href="update.php?docid=<?php echo $apiId ?>">编辑</a></span>&nbsp;&nbsp;&nbsp;<span
                        id="delapi" onclick="del('<?php echo $apiId ?>')">删除</span>
            </div>
        </div>

        <div class="Clear"></div>

        <!-- 文档开始-->
        <div id="round-none" style="clear: both; margin: 10px 0px 15px 0px; padding: 35px;">

            <div class="round-yellow">
                URL<span id="apiurl" class="round-white"><?php echo $item['domain'] . $item['upurl'] ?></span><span
                        style="margin: 0px 5px 0px 30px">方式</span><span id="method"
                                                                        class="round-white"><?php echo $item['method'] ?></span>
            </div>
            <?php
            $parasStr = "";
            $paras = getParaByApiId($apiId);
            if (count($paras) > 0) {
                ?>

                <!-- --参数-- -->
                <h5 style="margin: 40px 5px 5px 5px; font-weight: bold">参数:</h5>
                <table id="pmt" style="width: 800px">
                    <tr style="height: 40px; font-weight: bold">
                        <td>参数名</td>
                        <td>类型</td>
                        <td>是否必选</td>
                        <td>说明</td>
                    </tr>
                    <?php
                    $i = 0;
                    foreach ($paras as $info) {

                        $i++;
                        if ($i == 1) {
                            $parasStr = $info['pkey'] . "=" . $info['pvalue'];
                        } else {
                            $parasStr = $parasStr . "&" . $info['pkey'] . "=" . $info['pvalue'];
                        }

                        if ($info['necessary'] == 1) {
                            $tian = "<td style='color:#FF4500'>【必填】</td>";
                        } else {
                            $tian = "<td>【选填】</td>";
                        }
                        ?>
                        <tr>
                            <td><?php echo $info['pkey'] ?></td>
                            <td><?php echo $info['ptype'] ?></td><?php echo $tian ?>
                            <td
                                    style='text-align: left; padding-left: 5px'><?php echo $info['intro'] ?></td>
                        </tr>
                    <?php } ?>
                </table>
                <?php
            } else {
                echo '<h5 style="margin:30px 5px 0px 5px;font-weight: bold">参数：无</h5>';
            }
            ?>

            <!-- --返回-- -->
            <h5 style="margin: 30px 5px 5px 5px; font-weight: bold">返回:</h5>
            <table style="width: 500px;">
                <tr align="center" style="height: 40px; font-weight: bold">
                    <td>字段</td>
                    <td>值</td>
                    <td>说明</td>
                </tr>
                <tr>
                    <td>status</td>
                    <td>success/error</td>
                    <td style="text-align:left">操作状态</td>
                </tr>
                <tr>
                    <td>code</td>
                    <td>整数</td>
                    <td style="text-align:left">
                        <?php
                        foreach ($codeList as $code) {
                            echo "&nbsp;&nbsp;" . $code['code'] . "&nbsp;&nbsp;&nbsp;&nbsp;" . $code['msg'] . "<br>";
                        }
                        ?>

                    </td>
                </tr>
                <tr>
                    <td>msg</td>
                    <td>文本</td>
                    <td style="text-align:left">提示信息</td>
                </tr>
                <tr>
                    <td>data</td>
                    <td>对象/数组</td>
                    <td style="text-align:left">返回的数据</td>
                </tr>
            </table>

            <!-- --data-- -->
            <h5 style="margin: 30px 5px 5px 5px; font-weight: bold">data[]:</h5>
            <div id="article" style="clear: both;"><?php echo $item['retndata'] ?></div>

        </div>


        <!-- 测试接口 -->
        <div id="round-none" style="margin-bottom: 20px">
            <legend style="line-height: 30px">
                <input name="islogin" type="checkbox" style="width: 18px; height: 18px;"/>
                <label style="vertical-align: middle; margin-left: 10px">是否需要登录</label>
            </legend>

            <div style="margin-bottom: 15px">
                <label> 选择登录账号：</label> <select id="st" style="margin-right: 100px">
                    <?php

                    $i = 0;
                    foreach (getAuthorList() as $author) {
                        $i++;
                        if ($i == 1) {
                            $u = $author['testacnt'];
                            $p = $author['pwd'];
                        }
                        ?>
                        <option value="<?php echo $author['testacnt'] . "&" . $author['pwd'] ?>"><?php echo $author['authname'] ?></option>
                    <?php } ?>
                </select>
                <label>用户：</label><input id="user" value="<?php echo $u ?>">
                <label style="margin-left: 20px">密码：</label><input id="pwd" value="<?php echo $p ?>">
            </div>

            <textarea id="RawJson" style="margin-bottom: 15px"><?php echo $parasStr ?></textarea>
            <br>
            <div class="round-red" onclick='doTest()'>test</div>
        </div>

    <?php } ?>

    <!-- 格式化json开始 -->
    <script src="/json_view/js/c.js" type="text/javascript"></script>
    <link href="/json_view/css/s.css" type="text/css" rel="stylesheet"></link>
    <div id="ControlsRow">
        <input type="Button" value="隐藏"/> <span id="TabSizeHolder"> 缩进量
						<select id="TabSize" onchange="TabSizeChanged()">
							<option value="1">1</option>
							<option value="2" selected="true">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
					</select>
					</span> <label for="QuoteKeys"> <input type="checkbox"
                                                           id="QuoteKeys" onclick="QuoteKeysClicked()" checked="true"/>
            引号
        </label>&nbsp; <a href="javascript:void(0);"
                          onclick="SelectAllClicked()">全选</a> &nbsp; <span
                id="CollapsibleViewHolder"> <label for="CollapsibleView"> <input
                        type="checkbox" id="CollapsibleView"
                        onclick="CollapsibleViewClicked()"/> 显示控制
					</label>
					</span> <span id="CollapsibleViewDetail"> <a
                    href="javascript:void(0);" onclick="ExpandAllClicked()">展开</a> <a
                    href="javascript:void(0);" onclick="CollapseAllClicked()">叠起</a>
						<a href="javascript:void(0);" onclick="CollapseLevel(3)">2级</a>
						<a href="javascript:void(0);" onclick="CollapseLevel(4)">3级</a>
						<a href="javascript:void(0);" onclick="CollapseLevel(5)">4级</a>
						<a href="javascript:void(0);" onclick="CollapseLevel(6)">5级</a>
						<a href="javascript:void(0);" onclick="CollapseLevel(7)">6级</a>
						<a href="javascript:void(0);" onclick="CollapseLevel(8)">7级</a>
						<a href="javascript:void(0);" onclick="CollapseLevel(9)">8级</a>
					</span>
    </div>
    <!-- -json显示界面-- -->
    <div id="Canvas" class="Canvas" ondblclick="selectText('Canvas')"></div>
    <div id="testmsg"></div>
    <script src="http://www.google-analytics.com/urchin.js" type="text/javascript"></script>
    <script type="text/javascript" src="/json_view/js/m.js"></script>
    <!-- 格式化json结束-->

</div>
<!-- 右边结束 -->
