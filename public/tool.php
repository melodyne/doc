<?php require_once 'public/header.php';?>
<script src="/public//json_view/js/c.js" type="text/javascript"></script>
<link href="/public/json_view/css/s.css" type="text/css" rel="stylesheet"></link>
<div style="margin:20px 50px 260px 50px;">
    <div class="HeadersRow">
      <h3 id="HeaderSubTitle">云宿API文档工具-JSON格式化</h3>
      <textarea id="RawJson">
      </textarea>
    </div>

    <div id="ControlsRow">
      <input type="button" value="格式化" onclick='getJson()'/>
      <span id="TabSizeHolder">
        缩进量
        <select id="TabSize" onchange="TabSizeChanged()">
          <option value="1">1</option>
          <option value="2" selected="true">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
        </select>
      </span>
      <label for="QuoteKeys">
        <input type="checkbox" id="QuoteKeys" onclick="QuoteKeysClicked()" checked="true" />
        引号
      </label>&nbsp;
      <a href="javascript:void(0);" onclick="SelectAllClicked()">全选</a>
      &nbsp;
      <span id="CollapsibleViewHolder" >
          <label for="CollapsibleView">
            <input type="checkbox" id="CollapsibleView" onclick="CollapsibleViewClicked()" />
            显示控制
          </label>
      </span>
      <span id="CollapsibleViewDetail">
        <a href="javascript:void(0);" onclick="ExpandAllClicked()">展开</a>
        <a href="javascript:void(0);" onclick="CollapseAllClicked()">叠起</a>
        <a href="javascript:void(0);" onclick="CollapseLevel(3)">2级</a>
        <a href="javascript:void(0);" onclick="CollapseLevel(4)">3级</a>
        <a href="javascript:void(0);" onclick="CollapseLevel(5)">4级</a>
        <a href="javascript:void(0);" onclick="CollapseLevel(6)">5级</a>
        <a href="javascript:void(0);" onclick="CollapseLevel(7)">6级</a>
        <a href="javascript:void(0);" onclick="CollapseLevel(8)">7级</a>
        <a href="javascript:void(0);" onclick="CollapseLevel(9)">8级</a>
      </span>
    </div>
    <div id="Canvas" class="Canvas"  ondblclick="selectText('Canvas')" ></div>
</div>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript"></script>
<script type="text/javascript" src="/public/json_view/js/m.js"></script>

<?php require_once 'public/footer.php';?>

