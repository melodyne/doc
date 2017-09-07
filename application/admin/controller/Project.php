<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/10
 * Time: 15:16
 */

namespace app\admin\controller;

use app\common\controller\AdminController;
use think\Db;
use think\Request;

use app\admin\model\Project as ProjectModel;

class Project extends AdminController
{
    protected $with = 'website';

    protected $rule = [
        'pro_name'=>'require|min:3|max:10',
        'web_list'=>'array|min:1'
    ];
    protected $msg = [
        'pro_name.require' => '项目名称不能为空！',
        'pro_name.min'     => '项目名称最少3个字！',
        'pro_name.max'   => '项目名称不能超过10个字！',
        'web_list.min'        => '至少1条站点导航信息！',
    ];

    protected $rule2 = [
        'name' => 'require|min:2|max:10',
        'url' => 'require|url'
    ];
    protected $msg2 = [
        'name.require' => '导航名称不能为空！',
        'name.min' => '导航名称最少2个字！',
        'name.max' => '导航名称不能超过10个字！',
        'url.require' => '网址不能为空！',
        'url.url' => '网址不合法，请填写带了http://或者https://协议头的地址！',
    ];

    public function save()
    {
        // 数据库事务
        Db::transaction(function() {
            $param = Request::instance()->param();

            $this->validate($param, $this->rule, $this->msg);

            foreach ($param['web_list'] as $i => $list) {
                $this->validate($list, $this->rule2, $this->msg2);
            }

            $m = new ProjectModel();
            $m->name = $param['pro_name'];
            if ($rt = $m->save()) {
                $rt = $m->website()->saveAll($param['web_list']);
            }

            if(!$rt)$this->error("新增失败！");

        });

        $this->success("新增成功！","/index");
    }

    public function edit($id)
    {
        $model = $this->findModel($id);
        $model->website;
        $this->assign('model',$model);
        return $this->fetch();
    }

}