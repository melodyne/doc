<?php
namespace app\home\controller;

use think\Controller;

class Project extends Controller
{
	
  public function index(){
      $str = '[{"name":"kekek","url":"http://www.baidu.com"},{"name":"于是","url":"http://saas.icloudinn.com/doc"}]';
      $data = json_decode($str,true);
      $this->assign("projects",$data);
	  return $this->fetch();   
  }
}
