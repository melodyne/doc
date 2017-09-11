<?php
namespace app\api\controller;
use think\Controller;
use app\index\model\Project as ProjectModel;
use app\index\model\Website as WebsiteModel;

class Project extends Controller
{
    public function index()
    {
        $model = ProjectModel::all();
        foreach ($model as $m){
            $m->website;
        }
        return json($model);
    }

}
