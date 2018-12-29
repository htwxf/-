<?php

namespace backend\controllers;
use backend\models\Cat;
use common\helpers\Tree;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use backend\models\Article;
/**
 * Class ArticleController t  执行操作控制器
 * @package backend\controllers
 */
class ArticleController extends Controller
{
    /**
     * @var string 定义使用的model
     */
    public $modelClass = 'backend\models\Article';
    
    public function actions()
    {
        return [
            'ueditor' => [
                'class' => 'common\widgets\ueditor\UeditorAction',
                'config' => [
                //上传图片配置
                    'imageUrlPrefix' => "http://www.learn.com/images", /* 图片访问路径前缀 */
                    'imagePathFormat' => "/image/{yyyy}{mm}{dd}/{time}{rand:6}", /* 上传保存路径,可以自定义保存路径和文件名格式 */
                ]
            ]
        ];
    }
    
    /**
     * 查询处理
     * @param  array $params
     * @return array 返回数组
     */
    public function where($params)
    {

        $where = [['=', 'is_sh',0],['=', 'is_fb',0],['=', 'is_tj', 0]];
        return [
            'article_name' => 'like', 
			'cat_id' => '=', 
			'is_sh' => '=', 
			'is_fb' => '=', 
            'is_tj' => '=',
            'where' => $where, 

        ];
    }

    /**
     * 首页显示
     * @return string
     */
    public function actionIndex()
    {
        // 查询父级分类信息
        $parents = Cat::find()->select(['id', 'cat_name', 'category_id'])->indexBy('id')->asArray()->all();

        // 处理显示select
        $strOptions = (new Tree(['array' => $parents, 'parentIdName' => 'category_id']))
            ->getTree(0, '<option value="{id}" data-pid="{category_id}"> {extend_space}{cat_name} </option>');
        $cat=Json::encode(ArrayHelper::map($parents, 'id', 'cat_name'));
        //审核
        $Is_sh=Article::getArrayIs_sh();
        $Is_shColor=Article::getIs_shColor();
        $Is_sh2= $Is_sh;
        unset($Is_sh2[0]);
        //发布  //推荐
        $state = Article::getyesstate();
        $stateColor = Article::getstateColor();
      
        
        return $this->render('index', [
            'options' => $strOptions,
            'parents' => $cat,
            'is_sh' => $Is_sh,
            'is_shColor' => $Is_shColor ,
            'is_sh2'=> $Is_sh2,
            'state' => $state,
            'stateColor' => $stateColor,

        ]);
    }


  



}
