define("static/libs/pro/index/sign_up",["require","exports","module","components/create/create","components/select2/select2","components/select2/select2_locale_zh-CN","components/create/server/person","components/create/server/course"],function(require,exports,module){function init(){$(document).on("change","#studyType2",function(){$("#courseId").val("").trigger("change");var e=$(this).select2("val");e&&e.length>0?c.api.courseApi.findCourseByStudyType({studyType:e},function(e){$("#courseId").select2({placeholder:"科目",data:{results:c.data.parseData(e.object,"id","courseName")}}).trigger("change")}):$("#courseId").select2({placeholder:"科目",data:[]}).trigger("change")}).on("click",".u-teh",function(){$(".u-stu").find("span").removeClass("active"),$(".m-box>h3").html("第三方登录完善资料（教师）"),change(this,1)}).on("click",".u-stu",function(){$(".u-teh").find("span").removeClass("active"),$(".m-box>h3").html("第三方登录完善资料（学生）"),change(this,0)}).on("blur",".phml",function(e){e.preventDefault(),""!=$(this).val()&&validate.check("#register-form")}).on("blur",".psdw",function(e){e.preventDefault(),""!=$(this).val()&&validate.check(".psdw")}).on("blur",".comf",function(e){e.preventDefault(),""!=$(this).val()&&validate.check(".comf")}).on("blur",".name",function(e){e.preventDefault();var t=$(this).val().toString();""!=$(this).val()&&(t.indexOf("管理")>=0?c.layer.tips("此名称涉及敏感词汇",$(this),{tips:1,time:3e3}):validate.check(".name"))}).on("click","#btn-submit",function(){register()}).on("click",".btn-send-chk",function(){sendChkNmb(parseInt($(this).attr("data-id")))}).on("click","#close",function(){window.close()}),$(".u-teh").trigger("click")}function change(e,t){$(".img").addClass("f-dn"),$(e).siblings(".item").find(".img-no").removeClass("f-dn"),$(e).find(".img-a").removeClass("f-dn"),$(e).find("span").addClass("active"),$("#register-form").html($.trim(tmpl({type:t}))),$("#studyType,#studyType2").select2({placeholder:"学段",data:c.data.studyType}),$("#courseId").select2({placeholder:"科目",data:[]})}function register(){var e="#btn-submit";if(!$(e).hasClass("z-dis")){var t=$("#register-form").serializeJson(),a=function(e){c.layer.alert(e.message,function(){window.location.href=c.PathUtil.namespace()+"/index.html"})},n=function(){$(e).text("注册").removeClass("z-dis")};validate.check("#register-form")&&($(e).text("").append('<i class="fa fa fa-spinner fa-pulse fa-fw"></i>注册中').addClass("z-dis"),token&&tokenFlag&&token.length>0&&tokenFlag.length>0?(t.token=token,t.tokenFlag=tokenFlag,c.api.personApi.authorRegist(t,a,n)):c.api.personApi.regist(t,a,n))}}function sendChkNmb(){var e="#register-form .btn-send-chk",t=60;if(!$(e).hasClass("z-dis")){var a=$("#register-form input[name='personCode']").val();c.validate.rule.em.test(a)?($(e).text("").append('<i class="fa fa fa-spinner fa-pulse fa-fw"></i>正在发送').addClass("z-dis"),c.api.personApi.sendRegistCheckNumber({personCode:a},function(){var a=setInterval(function(){1==t?(clearInterval(a),$(e).text("获取验证码").removeClass("z-dis")):($(e).text(t+" s可重发").addClass("z-dis"),t--)},1e3)},function(){$(e).text("获取验证码").removeClass("z-dis")})):c.layer.tips("请填写真实的手机或邮箱",$("#register-form .phml"),{tips:1,time:3e3})}}require("components/create/create"),require("components/select2/select2"),require("components/select2/select2_locale_zh-CN"),require("components/create/server/person"),require("components/create/server/course");var validate=c.validate,token=c.PathUtil.getUrlParameter("token"),tokenFlag=c.PathUtil.getUrlParameter("tokenFlag"),tmpl=function(obj){{var __p="";Array.prototype.join}with(obj||{})__p+="",0==type?__p+='\n	<input type="hidden" name="personType" value="2">\n    <div class="formitm">\n        <label class="lab" for="xueduan">学段<font color="red">*</font></label>\n        <div class="ipt">\n            <input class="u-xueduan u-select"  type="hidden" name="studyType" id="studyType" datatype="*" errMsg="请选择学段"/>\n        </div>\n    </div>\n    <div class="formitm">\n        <label class="lab">手机／邮箱<font color="red">*</font></label>\n        <div class="ipt">\n            <input class="u-ipt phml" type="text" datatype="em" name="personCode">\n        </div>\n    </div>\n    <div class="formitm">\n        <label class="lab" for="personPassword">密码<font color="red">*</font></label>\n        <div class="ipt">\n            <input class="u-ipt psdw" type="password" datatype="up{5,16}" name="personPassword" id="personPassword">\n        </div>\n    </div>\n    <div class="formitm">\n        <label class="lab">确认密码<font color="red">*</font></label>\n        <div class="ipt">\n            <input class="u-ipt comf" type="password" errMsg="您输入的密码不一致" datatype="up{5,16}|tobe(personPassword)">\n        </div>\n    </div>\n    <div class="formitm">\n        <label class="lab" for="name">姓名<font color="red">*</font></label>\n        <div class="ipt">\n            <input class="u-ipt name" type="text" datatype="name{2,16}" name="realName" id="name">\n        </div>\n    </div>\n     <div class="formitm formitm-1">\n        <a class="u-btn primary larger" id="btn-submit">提交</a>\n    </div>\n    <div class="formitm formitm-1">\n        <p class="tip">\n            <input errMsg="请接受服务条款与协议" datatype="*" type="checkbox" id="agree" checked="checked" />\n            <label for="agree">我已经阅读并接受<a class="a-tk" target="_blank" href="terms.html">《服务条款与协议》</a></label>\n        </p>\n    </div>\n':1==type&&(__p+='\n	<input type="hidden" name="personType" value="1">\n    <div class="formitm">\n        <label class="lab" for="xueduan">学段<font color="red">*</font></label>\n        <div class="ipt">\n            <input class="u-xueduan u-select"  type="hidden" name="studyType" id="studyType2" datatype="*" errMsg="请选择学段"/>\n        </div>\n    </div>\n    <div class="formitm">\n        <label class="lab" for="xueke">任教学科<font color="red">*</font></label>\n        <div class="ipt">\n            <input class="u-xueke u-select" id="courseId"  name="courseId" datatype="*" errMsg="请选择任教学科"/>\n        </div>\n    </div>\n    <div class="formitm">\n        <label class="lab">手机／邮箱<font color="red">*</font></label>\n        <div class="ipt">\n            <input class="u-ipt phml" type="text" datatype="em" name="personCode">\n        </div>\n    </div>\n    <div class="formitm">\n        <label class="lab" for="personPassword">密码<font color="red">*</font></label>\n        <div class="ipt">\n            <input class="u-ipt psdw" type="password" datatype="up{5,16}" name="personPassword" id="psdw">\n        </div>\n    </div>\n    <div class="formitm">\n        <label class="lab" >确认密码<font color="red">*</font></label>\n        <div class="ipt">\n            <input class="u-ipt comf" type="password" errMsg="您输入的密码不一致" datatype="up{5,16}|tobe(psdw)">\n        </div>\n    </div>\n    <div class="formitm">\n        <label class="lab" for="name">姓名<font color="red">*</font></label>\n        <div class="ipt">\n            <input class="u-ipt name" type="text" datatype="name{2,16}" name="realName" id="name">\n        </div>\n    </div>\n      <div class="formitm formitm-1">\n        <a class="u-btn primary larger" id="btn-submit">提交</a>\n    </div>\n    <div class="formitm formitm-1">\n        <p class="tip">\n            <input errMsg="请接受服务条款与协议" datatype="*" type="checkbox" id="agree" checked="checked" />\n            <label for="agree">我已经阅读并接受<a class="a-tk" target="_blank" href="terms.html">《服务条款与协议》</a></label>\n        </p>\n    </div>\n'),__p+="";return __p};init()});