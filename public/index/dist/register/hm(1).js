(function(){var h={},mt={},c={id:"d9faea3ccfaadb75e40124aa9b4819b7",dm:["tiku.com"],js:"tongji.baidu.com/hm-web/js/",etrk:[],icon:'',ctrk:false,align:-1,nv:-1,vdur:1800000,age:31536000000,rec:0,rp:[],trust:1,vcard:10069056,qiao:0,lxb:0,conv:0,med:0,cvcc:'',cvcf:[],apps:''};var q=void 0,r=!0,s=null,w=!1;mt.i={};mt.i.za=/msie (\d+\.\d+)/i.test(navigator.userAgent);mt.i.xa=/msie (\d+\.\d+)/i.test(navigator.userAgent)?document.documentMode||+RegExp.$1:q;mt.i.cookieEnabled=navigator.cookieEnabled;mt.i.javaEnabled=navigator.javaEnabled();mt.i.language=navigator.language||navigator.browserLanguage||navigator.systemLanguage||navigator.userLanguage||"";mt.i.Ba=(window.screen.width||0)+"x"+(window.screen.height||0);mt.i.colorDepth=window.screen.colorDepth||0;mt.cookie={};
mt.cookie.set=function(a,b,f){var d;f.G&&(d=new Date,d.setTime(d.getTime()+f.G));document.cookie=a+"="+b+(f.domain?"; domain="+f.domain:"")+(f.path?"; path="+f.path:"")+(d?"; expires="+d.toGMTString():"")+(f.Za?"; secure":"")};mt.cookie.get=function(a){return(a=RegExp("(^| )"+a+"=([^;]*)(;|$)").exec(document.cookie))?a[2]:s};mt.m={};mt.m.R=function(a){return document.getElementById(a)};mt.m.Sa=function(a,b){for(b=b.toUpperCase();(a=a.parentNode)&&1==a.nodeType;)if(a.tagName==b)return a;return s};
(mt.m.M=function(){function a(){if(!a.B){a.B=r;for(var b=0,f=d.length;b<f;b++)d[b]()}}function b(){try{document.documentElement.doScroll("left")}catch(d){setTimeout(b,1);return}a()}var f=w,d=[],g;document.addEventListener?g=function(){document.removeEventListener("DOMContentLoaded",g,w);a()}:document.attachEvent&&(g=function(){"complete"===document.readyState&&(document.detachEvent("onreadystatechange",g),a())});(function(){if(!f)if(f=r,"complete"===document.readyState)a.B=r;else if(document.addEventListener)document.addEventListener("DOMContentLoaded",
g,w),window.addEventListener("load",a,w);else if(document.attachEvent){document.attachEvent("onreadystatechange",g);window.attachEvent("onload",a);var d=w;try{d=window.frameElement==s}catch(n){}document.documentElement.doScroll&&d&&b()}})();return function(b){a.B?b():d.push(b)}}()).B=w;mt.event={};mt.event.c=function(a,b,f){a.attachEvent?a.attachEvent("on"+b,function(b){f.call(a,b)}):a.addEventListener&&a.addEventListener(b,f,w)};
mt.event.preventDefault=function(a){a.preventDefault?a.preventDefault():a.returnValue=w};mt.j={};mt.j.parse=function(){return(new Function('return (" + source + ")'))()};
mt.j.stringify=function(){function a(a){/["\\\x00-\x1f]/.test(a)&&(a=a.replace(/["\\\x00-\x1f]/g,function(a){var b=f[a];if(b)return b;b=a.charCodeAt();return"\\u00"+Math.floor(b/16).toString(16)+(b%16).toString(16)}));return'"'+a+'"'}function b(a){return 10>a?"0"+a:a}var f={"\b":"\\b","\t":"\\t","\n":"\\n","\f":"\\f","\r":"\\r",'"':'\\"',"\\":"\\\\"};return function(d){switch(typeof d){case "undefined":return"undefined";case "number":return isFinite(d)?String(d):"null";case "string":return a(d);case "boolean":return String(d);
default:if(d===s)return"null";if(d instanceof Array){var f=["["],l=d.length,n,e,k;for(e=0;e<l;e++)switch(k=d[e],typeof k){case "undefined":case "function":case "unknown":break;default:n&&f.push(","),f.push(mt.j.stringify(k)),n=1}f.push("]");return f.join("")}if(d instanceof Date)return'"'+d.getFullYear()+"-"+b(d.getMonth()+1)+"-"+b(d.getDate())+"T"+b(d.getHours())+":"+b(d.getMinutes())+":"+b(d.getSeconds())+'"';n=["{"];e=mt.j.stringify;for(l in d)if(Object.prototype.hasOwnProperty.call(d,l))switch(k=
d[l],typeof k){case "undefined":case "unknown":case "function":break;default:f&&n.push(","),f=1,n.push(e(l)+":"+e(k))}n.push("}");return n.join("")}}}();mt.lang={};mt.lang.d=function(a,b){return"[object "+b+"]"==={}.toString.call(a)};mt.lang.Wa=function(a){return mt.lang.d(a,"Number")&&isFinite(a)};mt.lang.Ya=function(a){return mt.lang.d(a,"String")};mt.localStorage={};
mt.localStorage.D=function(){if(!mt.localStorage.g)try{mt.localStorage.g=document.createElement("input"),mt.localStorage.g.type="hidden",mt.localStorage.g.style.display="none",mt.localStorage.g.addBehavior("#default#userData"),document.getElementsByTagName("head")[0].appendChild(mt.localStorage.g)}catch(a){return w}return r};
mt.localStorage.set=function(a,b,f){var d=new Date;d.setTime(d.getTime()+f||31536E6);try{window.localStorage?(b=d.getTime()+"|"+b,window.localStorage.setItem(a,b)):mt.localStorage.D()&&(mt.localStorage.g.expires=d.toUTCString(),mt.localStorage.g.load(document.location.hostname),mt.localStorage.g.setAttribute(a,b),mt.localStorage.g.save(document.location.hostname))}catch(g){}};
mt.localStorage.get=function(a){if(window.localStorage){if(a=window.localStorage.getItem(a)){var b=a.indexOf("|"),f=a.substring(0,b)-0;if(f&&f>(new Date).getTime())return a.substring(b+1)}}else if(mt.localStorage.D())try{return mt.localStorage.g.load(document.location.hostname),mt.localStorage.g.getAttribute(a)}catch(d){}return s};
mt.localStorage.remove=function(a){if(window.localStorage)window.localStorage.removeItem(a);else if(mt.localStorage.D())try{mt.localStorage.g.load(document.location.hostname),mt.localStorage.g.removeAttribute(a),mt.localStorage.g.save(document.location.hostname)}catch(b){}};mt.sessionStorage={};mt.sessionStorage.set=function(a,b){if(window.sessionStorage)try{window.sessionStorage.setItem(a,b)}catch(f){}};
mt.sessionStorage.get=function(a){return window.sessionStorage?window.sessionStorage.getItem(a):s};mt.sessionStorage.remove=function(a){window.sessionStorage&&window.sessionStorage.removeItem(a)};mt.Y={};mt.Y.log=function(a,b){var f=new Image,d="mini_tangram_log_"+Math.floor(2147483648*Math.random()).toString(36);window[d]=f;f.onload=f.onerror=f.onabort=function(){f.onload=f.onerror=f.onabort=s;f=window[d]=s;b&&b(a)};f.src=a};mt.O={};
mt.O.qa=function(){var a="";if(navigator.plugins&&navigator.mimeTypes.length){var b=navigator.plugins["Shockwave Flash"];b&&b.description&&(a=b.description.replace(/^.*\s+(\S+)\s+\S+$/,"$1"))}else if(window.ActiveXObject)try{if(b=new ActiveXObject("ShockwaveFlash.ShockwaveFlash"))(a=b.GetVariable("$version"))&&(a=a.replace(/^.*\s+(\d+),(\d+).*$/,"$1.$2"))}catch(f){}return a};
mt.O.Ra=function(a,b,f,d,g){return'<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" id="'+a+'" width="'+f+'" height="'+d+'"><param name="movie" value="'+b+'" /><param name="flashvars" value="'+(g||"")+'" /><param name="allowscriptaccess" value="always" /><embed type="application/x-shockwave-flash" name="'+a+'" width="'+f+'" height="'+d+'" src="'+b+'" flashvars="'+(g||"")+'" allowscriptaccess="always" /></object>'};mt.url={};
mt.url.f=function(a,b){var f=a.match(RegExp("(^|&|\\?|#)("+b+")=([^&#]*)(&|$|#)",""));return f?f[3]:s};mt.url.Ua=function(a){return(a=a.match(/^(https?:)\/\//))?a[1]:s};mt.url.na=function(a){return(a=a.match(/^(https?:\/\/)?([^\/\?#]*)/))?a[2].replace(/.*@/,""):s};mt.url.T=function(a){return(a=mt.url.na(a))?a.replace(/:\d+$/,""):a};mt.url.Ta=function(a){return(a=a.match(/^(https?:\/\/)?[^\/]*(.*)/))?a[2].replace(/[\?#].*/,"").replace(/^$/,"/"):s};
(function(){function a(){for(var a=w,f=document.getElementsByTagName("script"),d=f.length,d=100<d?100:d,g=0;g<d;g++){var l=f[g].src;if(l&&0===l.indexOf("https://hm.baidu.com/h")){a=r;break}}return a}return h.la=a})();var A=h.la;
h.p={Va:"http://tongji.baidu.com/hm-web/welcome/ico",X:"hm.baidu.com/hm.gif",ba:"baidu.com",ua:"hmmd",va:"hmpl",Ka:"utm_medium",ta:"hmkw",Ma:"utm_term",ra:"hmci",Ja:"utm_content",wa:"hmsr",La:"utm_source",sa:"hmcu",Ia:"utm_campaign",o:0,k:Math.round(+new Date/1E3),P:Math.round(+new Date/1E3)%65535,protocol:"https:"===document.location.protocol?"https:":"http:",K:A()||"https:"===document.location.protocol?"https:":"http:",Xa:0,Oa:6E5,Pa:10,Qa:1024,Na:1,w:2147483647,Z:"bs cc cf ci ck cl cm cp cu cw ds ep et fl ja ln lo lt nv rnd si st su v cv lv api sn u tt".split(" ")};
(function(){var a={l:{},c:function(a,f){this.l[a]=this.l[a]||[];this.l[a].push(f)},z:function(a,f){this.l[a]=this.l[a]||[];for(var d=this.l[a].length,g=0;g<d;g++)this.l[a][g](f)}};return h.r=a})();
(function(){function a(a,d){var g=document.createElement("script");g.charset="utf-8";b.d(d,"Function")&&(g.readyState?g.onreadystatechange=function(){if("loaded"===g.readyState||"complete"===g.readyState)g.onreadystatechange=s,d()}:g.onload=function(){d()});g.src=a;var l=document.getElementsByTagName("script")[0];l.parentNode.insertBefore(g,l)}var b=mt.lang;return h.load=a})();
(function(){function a(){var a="";h.b.a.nv?(a=encodeURIComponent(document.referrer),window.sessionStorage?f.set("Hm_from_"+c.id,a):b.set("Hm_from_"+c.id,a,864E5)):a=(window.sessionStorage?f.get("Hm_from_"+c.id):b.get("Hm_from_"+c.id))||"";return a}var b=mt.localStorage,f=mt.sessionStorage;return h.Q=a})();
(function(){var a=mt.m,b=h.p,f=h.load,d=h.Q;h.r.c("pv-b",function(){c.rec&&a.M(function(){for(var g=0,l=c.rp.length;g<l;g++){var n=c.rp[g][0],e=c.rp[g][1],k=a.R("hm_t_"+n);if(e&&!(2==e&&!k||k&&""!==k.innerHTML))k="",k=Math.round(Math.random()*b.w),k=4==e?"http://crs.baidu.com/hl.js?"+["siteId="+c.id,"planId="+n,"rnd="+k].join("&"):"http://crs.baidu.com/t.js?"+["siteId="+c.id,"planId="+n,"from="+d(),"referer="+encodeURIComponent(document.referrer),"title="+encodeURIComponent(document.title),"rnd="+
k].join("&"),f(k)}})})})();(function(){var a=h.p,b=h.load,f=h.Q;h.r.c("pv-b",function(){if(c.trust&&c.vcard){var d="https://tag.baidu.com/vcard/v.js?"+["siteid="+c.vcard,"url="+encodeURIComponent(document.location.href),"source="+f(),"rnd="+Math.round(Math.random()*a.w),"hm=1"].join("&");b(d)}})})();
(function(){function a(){function a(b){function k(){}for(var m=r,f=0,d=0,p=s,t=s,y=b.length,x=0,z=s,f=0;f<y;f++)if(p=b[f],p.chromeVer===n){m=r;t=p.tests;x=t.length;for(d=0;d<x;d++)if(k=g[t[d].name],k()!==t[d].expect){m=w;break}if(x&&m){z={name:"360browser",type:p.type,version:p.ver};break}}return z}var b=[];b.push({ver:"8.3",type:"fast",tests:[{name:"seamlessiframe",expect:1}],chromeVer:"42"});var g={pointerevents:function(){return"maxTouchPoints"in window.navigator?1:"msMaxTouchPoints"in window.navigator||
"mozMaxTouchPoints"in window.navigator||"webkitMaxTouchPoints"in window.navigator?9:0},webgl3D:function(){for(var a="webgl ms-webgl experimental-webgl moz-webgl opera-3d webkit-3d ms-3d 3d".split(" "),k=a.length,b="",f=document.createElement("canvas"),d=w,p=0;p<k;p++)try{if(f.getContext(a[p])){d=r;b=a[p];break}}catch(t){}return d?"webgl"===b?1:9:0},seamlessiframe:function(){return"seamless"in document.createElement("iframe")?1:0},speechsynthesis:function(){return"speechSynthesis"in window?1:"webkitSpeechSynthesis"in
window||"mozSpeechSynthesis"in window||"oSpeechSynthesis"in window||"msSpeechSynthesis"in window?9:0}},l=s,n=function(){var a=navigator.userAgent.toLowerCase().match(/chrome\/(\d+)/i);return a?a[1]:"-1"}();"-1"!==n&&(l=a(b));return l}var b=function(){var b=navigator.userAgent.toLowerCase();if(0<=b.indexOf("chrome")){var b=(b=b.match(/chrome\/(\d+)/))?b[1]:-1,d=window.document,g="track"in d.createElement("track"),d="scoped"in d.createElement("style"),l="v8Locale"in window,n=document.createElement("canvas"),
e="seamless"in document.createElement("iframe"),k=w;try{n.getContext("webgl")&&(k=r)}catch(m){}if(n=a())return"fast"===n.type?7:1;if(!k&&"31"===b)return 1;if(!(e=(e||!k)&&"38"===b))if(e=g)if(e=!d)if(e=!l){var u;a:{e=window.navigator.mimeTypes;for(u in e)if("application/vnd.chromium.remoting-viewer"===e[u].type){u=r;break a}u=w}e=!u&&46>+b}if(e)return 7;if(g&&d&&l)return 1}return-1}();return h.da=b})();
(function(){function a(){return function(){h.b.a.nv=0;h.b.a.st=4;h.b.a.et=3;h.b.a.ep=h.F.oa()+","+h.F.ma();h.b.h()}}function b(){clearTimeout(z);var a;y&&(a="visible"==document[y]);x&&(a=!document[x]);e="undefined"==typeof a?r:a;if((!n||!k)&&e&&m)t=r,v=+new Date;else if(n&&k&&(!e||!m))t=w,p+=+new Date-v;n=e;k=m;z=setTimeout(b,100)}function f(a){var k=document,b="";if(a in k)b=a;else for(var p=["webkit","ms","moz","o"],d=0;d<p.length;d++){var m=p[d]+a.charAt(0).toUpperCase()+a.slice(1);if(m in k){b=
m;break}}return b}function d(a){if(!("focus"==a.type||"blur"==a.type)||!(a.target&&a.target!=window))m="focus"==a.type||"focusin"==a.type?r:w,b()}var g=mt.event,l=h.r,n=r,e=r,k=r,m=r,u=+new Date,v=u,p=0,t=r,y=f("visibilityState"),x=f("hidden"),z;b();(function(){var a=y.replace(/[vV]isibilityState/,"visibilitychange");g.c(document,a,b);g.c(window,"pageshow",b);g.c(window,"pagehide",b);"object"==typeof document.onfocusin?(g.c(document,"focusin",d),g.c(document,"focusout",d)):(g.c(window,"focus",d),
g.c(window,"blur",d))})();h.F={oa:function(){return+new Date-u},ma:function(){return t?+new Date-v+p:p}};l.c("pv-b",function(){g.c(window,"unload",a())});return h.F})();
(function(){var a=mt.lang,b=h.p,f=h.load,d={ya:function(d){if((window._dxt===q||a.d(window._dxt,"Array"))&&"undefined"!==typeof h.b){var l=h.b.H();f([b.protocol,"//datax.baidu.com/x.js?si=",c.id,"&dm=",encodeURIComponent(l)].join(""),d)}},Ha:function(b){if(a.d(b,"String")||a.d(b,"Number"))window._dxt=window._dxt||[],window._dxt.push(["_setUserId",b])}};return h.fa=d})();
(function(){function a(k){for(var b in k)if({}.hasOwnProperty.call(k,b)){var d=k[b];f.d(d,"Object")||f.d(d,"Array")?a(d):k[b]=String(d)}}function b(a){return a.replace?a.replace(/'/g,"'0").replace(/\*/g,"'1").replace(/!/g,"'2"):a}var f=mt.lang,d=mt.j,g=h.p,l=h.r,n=h.fa,e={s:[],C:0,V:w,init:function(){e.e=0;l.c("pv-b",function(){e.ga();e.ia()});l.c("pv-d",e.ka);l.c("stag-b",function(){h.b.a.api=e.e||e.C?e.e+"_"+e.C:""});l.c("stag-d",function(){h.b.a.api=0;e.e=0;e.C=0})},ga:function(){var a=window._hmt||
[];if(!a||f.d(a,"Array"))window._hmt={id:c.id,cmd:{},push:function(){for(var a=window._hmt,b=0;b<arguments.length;b++){var k=arguments[b];f.d(k,"Array")&&(a.cmd[a.id].push(k),"_setAccount"===k[0]&&(1<k.length&&/^[0-9a-f]{32}$/.test(k[1]))&&(k=k[1],a.id=k,a.cmd[k]=a.cmd[k]||[]))}}},window._hmt.cmd[c.id]=[],window._hmt.push.apply(window._hmt,a)},ia:function(){var a=window._hmt;if(a&&a.cmd&&a.cmd[c.id])for(var b=a.cmd[c.id],d=/^_track(Event|MobConv|Order|RTEvent)$/,f=0,p=b.length;f<p;f++){var t=b[f];
d.test(t[0])?e.s.push(t):e.L(t)}a.cmd[c.id]={push:e.L}},ka:function(){if(0<e.s.length)for(var a=0,b=e.s.length;a<b;a++)e.L(e.s[a]);e.s=s},L:function(a){var b=a[0];if(e.hasOwnProperty(b)&&f.d(e[b],"Function"))e[b](a)},_setAccount:function(a){1<a.length&&/^[0-9a-f]{32}$/.test(a[1])&&(e.e|=1)},_setAutoPageview:function(a){if(1<a.length&&(a=a[1],w===a||r===a))e.e|=2,h.b.U=a},_trackPageview:function(a){if(1<a.length&&a[1].charAt&&"/"===a[1].charAt(0)){e.e|=4;h.b.a.et=0;h.b.a.ep="";h.b.I?(h.b.a.nv=0,h.b.a.st=
4):h.b.I=r;var b=h.b.a.u,d=h.b.a.su;h.b.a.u=g.protocol+"//"+document.location.host+a[1];e.V||(h.b.a.su=document.location.href);h.b.h();h.b.a.u=b;h.b.a.su=d}},_trackEvent:function(a){2<a.length&&(e.e|=8,h.b.a.nv=0,h.b.a.st=4,h.b.a.et=4,h.b.a.ep=b(a[1])+"*"+b(a[2])+(a[3]?"*"+b(a[3]):"")+(a[4]?"*"+b(a[4]):""),h.b.h())},_setCustomVar:function(a){if(!(4>a.length)){var d=a[1],f=a[4]||3;if(0<d&&6>d&&0<f&&4>f){e.C++;for(var g=(h.b.a.cv||"*").split("!"),p=g.length;p<d-1;p++)g.push("*");g[d-1]=f+"*"+b(a[2])+
"*"+b(a[3]);h.b.a.cv=g.join("!");a=h.b.a.cv.replace(/[^1](\*[^!]*){2}/g,"*").replace(/((^|!)\*)+$/g,"");""!==a?h.b.setData("Hm_cv_"+c.id,encodeURIComponent(a),c.age):h.b.Aa("Hm_cv_"+c.id)}}},_setReferrerOverride:function(a){1<a.length&&(h.b.a.su=a[1].charAt&&"/"===a[1].charAt(0)?g.protocol+"//"+window.location.host+a[1]:a[1],e.V=r)},_trackOrder:function(b){b=b[1];f.d(b,"Object")&&(a(b),e.e|=16,h.b.a.nv=0,h.b.a.st=4,h.b.a.et=94,h.b.a.ep=d.stringify(b),h.b.h())},_trackMobConv:function(a){if(a={webim:1,
tel:2,map:3,sms:4,callback:5,share:6}[a[1]])e.e|=32,h.b.a.et=93,h.b.a.ep=a,h.b.h()},_trackRTPageview:function(b){b=b[1];f.d(b,"Object")&&(a(b),b=d.stringify(b),512>=encodeURIComponent(b).length&&(e.e|=64,h.b.a.rt=b))},_trackRTEvent:function(b){b=b[1];if(f.d(b,"Object")){a(b);b=encodeURIComponent(d.stringify(b));var m=function(a){var b=h.b.a.rt;e.e|=128;h.b.a.et=90;h.b.a.rt=a;h.b.h();h.b.a.rt=b},l=b.length;if(900>=l)m.call(this,b);else for(var l=Math.ceil(l/900),n="block|"+Math.round(Math.random()*
g.w).toString(16)+"|"+l+"|",p=[],t=0;t<l;t++)p.push(t),p.push(b.substring(900*t,900*t+900)),m.call(this,n+p.join("|")),p=[]}},_setUserId:function(a){a=a[1];n.ya();n.Ha(a)}};e.init();h.ca=e;return h.ca})();
(function(){function a(){"undefined"===typeof window["_bdhm_loaded_"+c.id]&&(window["_bdhm_loaded_"+c.id]=r,this.a={},this.U=r,this.I=w,this.init())}var b=mt.url,f=mt.Y,d=mt.O,g=mt.lang,l=mt.cookie,n=mt.i,e=mt.localStorage,k=mt.sessionStorage,m=h.p,u=h.da,v=h.r;a.prototype={J:function(a,b){a="."+a.replace(/:\d+/,"");b="."+b.replace(/:\d+/,"");var d=a.indexOf(b);return-1<d&&d+b.length===a.length},W:function(a,b){a=a.replace(/^https?:\/\//,"");return 0===a.indexOf(b)},A:function(a){for(var d=0;d<c.dm.length;d++)if(-1<
c.dm[d].indexOf("/")){if(this.W(a,c.dm[d]))return r}else{var f=b.T(a);if(f&&this.J(f,c.dm[d]))return r}return w},H:function(){for(var a=document.location.hostname,b=0,d=c.dm.length;b<d;b++)if(this.J(a,c.dm[b]))return c.dm[b].replace(/(:\d+)?[\/\?#].*/,"");return a},S:function(){for(var a=0,b=c.dm.length;a<b;a++){var d=c.dm[a];if(-1<d.indexOf("/")&&this.W(document.location.href,d))return d.replace(/^[^\/]+(\/.*)/,"$1")+"/"}return"/"},pa:function(){if(!document.referrer)return m.k-m.o>c.vdur?1:4;var a=
w;this.A(document.referrer)&&this.A(document.location.href)?a=r:(a=b.T(document.referrer),a=this.J(a||"",document.location.hostname));return a?m.k-m.o>c.vdur?1:4:3},getData:function(a){try{return l.get(a)||k.get(a)||e.get(a)}catch(b){}},setData:function(a,b,d){try{l.set(a,b,{domain:this.H(),path:this.S(),G:d}),d?e.set(a,b,d):k.set(a,b)}catch(f){}},Aa:function(a){try{l.set(a,"",{domain:this.H(),path:this.S(),G:-1}),k.remove(a),e.remove(a)}catch(b){}},Fa:function(){var a,b,d,f,e;m.o=this.getData("Hm_lpvt_"+
c.id)||0;13===m.o.length&&(m.o=Math.round(m.o/1E3));b=this.pa();a=4!==b?1:0;if(d=this.getData("Hm_lvt_"+c.id)){f=d.split(",");for(e=f.length-1;0<=e;e--)13===f[e].length&&(f[e]=""+Math.round(f[e]/1E3));for(;2592E3<m.k-f[0];)f.shift();e=4>f.length?2:3;for(1===a&&f.push(m.k);4<f.length;)f.shift();d=f.join(",");f=f[f.length-1]}else d=m.k,f="",e=1;this.setData("Hm_lvt_"+c.id,d,c.age);this.setData("Hm_lpvt_"+c.id,m.k);d=m.k===this.getData("Hm_lpvt_"+c.id)?"1":"0";if(0===c.nv&&this.A(document.location.href)&&
(""===document.referrer||this.A(document.referrer)))a=0,b=4;this.a.nv=a;this.a.st=b;this.a.cc=d;this.a.lt=f;this.a.lv=e},Ea:function(){for(var a=[],b=this.a.et,d=0,f=m.Z.length;d<f;d++){var e=m.Z[d],g=this.a[e];"undefined"!==typeof g&&""!==g&&("tt"!==e||"tt"===e&&0===b)&&a.push(e+"="+encodeURIComponent(g))}switch(b){case 0:a.push("sn="+m.P);this.a.rt&&a.push("rt="+encodeURIComponent(this.a.rt));break;case 3:a.push("sn="+m.P);break;case 90:this.a.rt&&a.push("rt="+this.a.rt)}return a.join("&")},Ga:function(){this.Fa();
this.a.si=c.id;this.a.su=document.referrer;this.a.ds=n.Ba;this.a.cl=n.colorDepth+"-bit";this.a.ln=String(n.language).toLowerCase();this.a.ja=n.javaEnabled?1:0;this.a.ck=n.cookieEnabled?1:0;this.a.bs=u;this.a.lo="number"===typeof _bdhm_top?1:0;this.a.fl=d.qa();this.a.v="1.2.13";this.a.cv=decodeURIComponent(this.getData("Hm_cv_"+c.id)||"");this.a.tt=document.title||"";var a=document.location.href;this.a.cm=b.f(a,m.ua)||"";this.a.cp=b.f(a,m.va)||b.f(a,m.Ka)||"";this.a.cw=b.f(a,m.ta)||b.f(a,m.Ma)||"";
this.a.ci=b.f(a,m.ra)||b.f(a,m.Ja)||"";this.a.cf=b.f(a,m.wa)||b.f(a,m.La)||"";this.a.cu=b.f(a,m.sa)||b.f(a,m.Ia)||""},init:function(){try{this.Ga(),0===this.a.nv?this.Da():this.N(".*"),h.b=this,this.ea(),v.z("pv-b"),this.Ca()}catch(a){var b=[];b.push("si="+c.id);b.push("n="+encodeURIComponent(a.name));b.push("m="+encodeURIComponent(a.message));b.push("r="+encodeURIComponent(document.referrer));f.log(m.K+"//"+m.X+"?"+b.join("&"))}},Ca:function(){function a(){v.z("pv-d")}this.U?(this.I=r,this.a.et=
0,this.a.ep="",this.h(a)):a()},h:function(a){var b=this;b.a.rnd=Math.round(Math.random()*m.w);v.z("stag-b");var d=m.K+"//"+m.X+"?"+b.Ea();v.z("stag-d");b.aa(d);f.log(d,function(d){b.N(d);g.d(a,"Function")&&a.call(b)})},ea:function(){var a=document.location.hash.substring(1),d=RegExp(c.id),f=-1<document.referrer.indexOf(m.ba),e=b.f(a,"jn"),g=/^heatlink$|^select$/.test(e);a&&(d.test(a)&&f&&g)&&(this.a.rnd=Math.round(Math.random()*m.w),a=document.createElement("script"),a.setAttribute("type","text/javascript"),
a.setAttribute("charset","utf-8"),a.setAttribute("src",m.protocol+"//"+c.js+e+".js?"+this.a.rnd),e=document.getElementsByTagName("script")[0],e.parentNode.insertBefore(a,e))},aa:function(a){var b=k.get("Hm_unsent_"+c.id)||"",d=this.a.u?"":"&u="+encodeURIComponent(document.location.href),b=encodeURIComponent(a.replace(/^https?:\/\//,"")+d)+(b?","+b:"");k.set("Hm_unsent_"+c.id,b)},N:function(a){var b=k.get("Hm_unsent_"+c.id)||"";b&&(a=encodeURIComponent(a.replace(/^https?:\/\//,"")),a=RegExp(a.replace(/([\*\(\)])/g,
"\\$1")+"(%26u%3D[^,]*)?,?","g"),(b=b.replace(a,"").replace(/,$/,""))?k.set("Hm_unsent_"+c.id,b):k.remove("Hm_unsent_"+c.id))},Da:function(){var a=this,b=k.get("Hm_unsent_"+c.id);if(b)for(var b=b.split(","),d=function(b){f.log(m.K+"//"+decodeURIComponent(b),function(b){a.N(b)})},e=0,g=b.length;e<g;e++)d(b[e])}};return new a})();
(function(){var a=mt.m,b=mt.event,f=mt.url,d=mt.j;try{if(window.performance&&performance.timing&&"undefined"!==typeof h.b){var g=+new Date,l=function(a){var b=performance.timing,d=b[a+"Start"]?b[a+"Start"]:0;a=b[a+"End"]?b[a+"End"]:0;return{start:d,end:a,value:0<a-d?a-d:0}},n=s;a.M(function(){n=+new Date});var e=function(){var a,b,e;e=l("navigation");b=l("request");e={netAll:b.start-e.start,netDns:l("domainLookup").value,netTcp:l("connect").value,srv:l("response").start-b.start,dom:performance.timing.domInteractive-
performance.timing.fetchStart,loadEvent:l("loadEvent").end-e.start};a=document.referrer;var k=a.match(/^(http[s]?:\/\/)?([^\/]+)(.*)/)||[],t=s;b=s;if("www.baidu.com"===k[2]||"m.baidu.com"===k[2])t=f.f(a,"qid"),b=f.f(a,"click_t");a=t;e.qid=a!=s?a:"";b!=s?(e.bdDom=n?n-b:0,e.bdRun=g-b,e.bdDef=l("navigation").start-b):(e.bdDom=0,e.bdRun=0,e.bdDef=0);h.b.a.et=87;h.b.a.ep=d.stringify(e);h.b.h()};b.c(window,"load",function(){setTimeout(e,500)})}}catch(k){}})();
(function(){var a=mt.i,b=mt.lang,f=mt.event,d=mt.j;if("undefined"!==typeof h.b&&(c.med||(!a.za||7<a.xa)&&c.cvcc)){var g,l,n,e,k=function(a){if(a.item){for(var b=a.length,d=Array(b);b--;)d[b]=a[b];return d}return[].slice.call(a)},m=function(a,b){for(var d in a)if(a.hasOwnProperty(d)&&b.call(a,d,a[d])===w)return w},u=function(a,f){var e={};e.n=g;e.t="clk";e.v=a;if(f){var k=f.getAttribute("href"),l=f.getAttribute("onclick")?""+f.getAttribute("onclick"):s,m=f.getAttribute("id")||"";n.test(k)?(e.sn="mediate",
e.snv=k):b.d(l,"String")&&n.test(l)&&(e.sn="wrap",e.snv=l);e.id=m}h.b.a.et=86;h.b.a.ep=d.stringify(e);h.b.h();for(e=+new Date;400>=+new Date-e;);};if(c.med)l="/zoosnet",g="swt",n=/swt|zixun|call|chat|zoos|business|talk|kefu|openkf|online|\/LR\/Chatpre\.aspx/i,e={click:function(){for(var a=[],b=k(document.getElementsByTagName("a")),b=[].concat.apply(b,k(document.getElementsByTagName("area"))),b=[].concat.apply(b,k(document.getElementsByTagName("img"))),d,f,e=0,g=b.length;e<g;e++)d=b[e],f=d.getAttribute("onclick"),
d=d.getAttribute("href"),(n.test(f)||n.test(d))&&a.push(b[e]);return a}};else if(c.cvcc){l="/other-comm";g="other";n=c.cvcc.q||q;var v=c.cvcc.id||q;e={click:function(){for(var a=[],b=k(document.getElementsByTagName("a")),b=[].concat.apply(b,k(document.getElementsByTagName("area"))),b=[].concat.apply(b,k(document.getElementsByTagName("img"))),d,e,f,g=0,l=b.length;g<l;g++)d=b[g],n!==q?(e=d.getAttribute("onclick"),f=d.getAttribute("href"),v?(d=d.getAttribute("id"),(n.test(e)||n.test(f)||v.test(d))&&
a.push(b[g])):(n.test(e)||n.test(f))&&a.push(b[g])):v!==q&&(d=d.getAttribute("id"),v.test(d)&&a.push(b[g]));return a}}}if("undefined"!==typeof e&&"undefined"!==typeof n){var p;l+=/\/$/.test(l)?"":"/";var t=function(a,d){if(p===d)return u(l+a,d),w;if(b.d(d,"Array")||b.d(d,"NodeList"))for(var e=0,f=d.length;e<f;e++)if(p===d[e])return u(l+a+"/"+(e+1),d[e]),w};f.c(document,"mousedown",function(a){a=a||window.event;p=a.target||a.srcElement;var d={};for(m(e,function(a,e){d[a]=b.d(e,"Function")?e():document.getElementById(e)});p&&
p!==document&&m(d,t)!==w;)p=p.parentNode})}}})();(function(){var a=mt.m,b=mt.lang,f=mt.event,d=mt.j;if("undefined"!==typeof h.b&&b.d(c.cvcf,"Array")&&0<c.cvcf.length){var g={$:function(){for(var b=c.cvcf.length,d,e=0;e<b;e++)(d=a.R(decodeURIComponent(c.cvcf[e])))&&f.c(d,"click",g.ha())},ha:function(){return function(){h.b.a.et=86;var a={n:"form",t:"clk"};a.id=this.id;h.b.a.ep=d.stringify(a);h.b.h()}}};a.M(function(){g.$()})}})();
(function(){var a=mt.event,b=mt.j;if(c.med&&"undefined"!==typeof h.b){var f=+new Date,d={n:"anti",sb:0,kb:0,clk:0},g=function(){h.b.a.et=86;h.b.a.ep=b.stringify(d);h.b.h()};a.c(document,"click",function(){d.clk++});a.c(document,"keyup",function(){d.kb=1});a.c(window,"scroll",function(){d.sb++});a.c(window,"unload",function(){d.t=+new Date-f;g()});a.c(window,"load",function(){setTimeout(g,5E3)})}})();})();