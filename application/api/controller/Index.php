<?php
namespace app\api\controller;
use think\Controller;
use app\index\model\Project as ProjectModel;
use app\index\model\Website as WebsiteModel;

class Index extends Controller
{
    public function index()
    {
        $model = ProjectModel::all();
        foreach ($model as $m){
            $m->website;
        }
        return json($model);
    }

    public function getList()
    {
        $model = ProjectModel::all();
        return json($model);
    }



}
