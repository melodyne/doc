<?php
namespace app\api\controller;

use think\Controller;
use app\api\model\Hosts as HostsModel;

class Hosts extends Controller
{
    public function getAll()
    {
		$list =HostsModel::all();
        return json($list);
    }
	
	 public function add($nm="",$dm="",$ip="")
    {
		
		if($nm==""){
			$r['code']=101;
			$r['msg']="无nm参数";
			$r['data']=null;
			return json($r);
		}
		
		if($dm==""){
			$r['code']=101;
			$r['msg']="无dm参数";
			$r['data']=null;
			return json($r);
		}
		
		$host  = new HostsModel;
		$host->hostname = $nm;
        $host->domain    = $dm;
        $host->hostip = $ip;
		$rs=$host->save();
        if ($rs) {
            $r['code']=100;
			$r['msg']="主机添加成功";
			$r['data']=null;
			return json($r);
        } else {
			$r['code']=102;
			$r['msg']="主机添加失败";
			$r['data']=$host->getError();
            return json($r);
        }

    }
	
	 public function del($id=0)
    {
		if($id==0){
			$r['code']=101;
			$r['msg']="无id参数";
			$r['data']=null;
			return json($r);
		}
		$host  = HostsModel::get($id);
		if ($host) {
			$host->delete();
			
			$r['code']=100;
			$r['msg']="删除成功";
			$r['data']=null;
			return json($r);
		} else {
			$r['code']=102;
			$r['msg']="无此主机记录";
			$r['data']=null;
			return json($r);
		}
	}		
}
