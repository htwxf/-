<?php

namespace backend\controllers;

/**
 * Class CatController 文章分类 执行操作控制器
 * @package backend\controllers
 */
class CatController extends Controller
{
    /**
     * @var string 定义使用的model
     */
    public $modelClass = 'backend\models\Cat';
     
    /**
     * 查询处理
     * @param  array $params
     * @return array 返回数组
     */
    public function where($params)
    {
        return [
            			'cat_name' => '=', 

        ];
    }
}
