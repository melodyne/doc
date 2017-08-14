var $validCodeImg;
var $userNameIpt;
var $passwordIpt;
var $validCodeIpt;
var $loginBtn;
var loginValidation;

$().ready(function () {
    var account=$.cookie('account');
    if(account){
        window.location.href = 'index.html';
        return;
    }
    $validCodeImg = $("#validCode");
    $userNameIpt = $('#userNameIptl');
    $passwordIpt = $('#passwordIptl');
    $loginBtn = $('#loginBtn');
    var t;
    var setErrorInfo = function (jq, text) {
        jq.text(text).show();
        window.clearTimeout(t);
        t = window.setTimeout(function () {
            jq.text("").hide();
        }, 10000);
    };
    $loginBtn.bind('click', function () {
        $("#userNameInfo").text("").hide();
        $("#passwordInfo").text("").hide();
        var name = $userNameIpt.val().trim();
        var password = $passwordIpt.val();
        if (name.length == 0) {
            setErrorInfo($("#userNameInfo"), "请输入管理员账户");
            return;
        }
        var regx = /^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/;
        var regx2 = /^1[34578]\d{9}$/;
        if (!(regx.test(name)||regx2.test(name))) {
            setErrorInfo($("#userNameInfo"), "邮箱或者手机号无效");
            return;
        }
        if (password.length == 0) {
            setErrorInfo($("#passwordInfo"), "请输入密码");
            return;
        }

    });

    var checkEmpty = function () {
        if ($(this).val().length > 0)
            $(this).next().show();
        else {
            $(this).next().hide();
        }
    };
    if ($("#userNameIptl").val().length == 0) {
        $("#userNameIptl").next().hide();
    }
    if ($("#passwordIptl").val().length == 0) {
        $("#passwordIptl").next().hide();
    }
    $("#userNameIptl,#passwordIptl").keyup(checkEmpty);
    $("#userNameIptl,#passwordIptl").change(checkEmpty);
    $("#userNameIptl,#passwordIptl").next().click(function () {
        $(this).prev().val("");
        $(this).hide();
    });
    $("#userNameIptl,#passwordIptl").focus(function () {
        $("#userNameInfo").text("").hide();
        $("#passwordInfo").text("").hide();
    });
});

$(document).keyup(function (e) {
    if ((e.keyCode || e.which) == 13) {
        $('#loginBtn').click();
    }
});