<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "my_article".
 *
 * @property integer $id
 * @property string $article_name
 * @property integer $cat_id
 * @property string $article_content
 * @property integer $is_sh
 * @property string $is_sh_no
 * @property integer $is_fb
 * @property integer $is_tj
 * @property integer $click_num
 * @property integer $author
 */
class Article extends \yii\db\ActiveRecord
{
    //审核
    const STATUS_UNAUDITED = 0;//未审核
    const STATUS_AUDITED = 1;//审核通过
    const STATUS_AUDIT_FAILED = 2;//审核未通过
   //发布/推荐
    const STATUS_YES = 1;//是
    const STATUS_NO = 0;//否
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'my_article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['article_name', 'article_content'], 'required'],
            [['cat_id', 'is_sh', 'is_fb', 'is_tj', 'click_num', 'author'], 'integer'],
            [['article_name'], 'string', 'max' => 20],
            [['article_content', 'is_sh_no'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '自增id',
            'article_name' => '文章名称',
            'cat_id' => '文章分类',
            'article_content' => '文章内容',
            'is_sh' => '是否审核 0.未审核 1.审核通过  2.审核不通过',
            'is_sh_no' => '审核失败理由',
            'is_fb' => '是否发布 0.否 1.是',
            'is_tj' => '是否推荐 0.否 1.是',
            'click_num' => '点击数',
            'author' => '作者 0.代表系统',
        ];
    }

    

    /**
     * 获取状态说明信息
     * @param  int $intStatus 状态
     * @return array|string
     */
    public static function getArrayIs_sh($intStatus = null)
    {
 
            $array = [
                self::STATUS_UNAUDITED => Yii::t('article', 'STATUS_UNAUDITED'),
                self::STATUS_AUDITED => Yii::t('article', 'STATUS_AUDITED'),
                self::STATUS_AUDIT_FAILED => Yii::t('article', 'STATUS_AUDIT_FAILED'),
            ];
      

        if ($intStatus !== null && isset($array[$intStatus])) {
            $array = $array[$intStatus];
        }

        return $array;
    }

    /**
     * 获取状态值对应的颜色信息
     * @param  int $intStatus 状态值
     * @return array|string
     */
    public static function getIs_shColor($intStatus = null)
    {
        $array = [
            self::STATUS_UNAUDITED => 'label-success',
            self::STATUS_AUDITED => 'label-danger',
            self::STATUS_AUDIT_FAILED => 'label-important',
        ];

        if ($intStatus !== null && isset($array[$intStatus])) {
            $array = $array[$intStatus];
        }

        return $array;
    }

    /**
     * 获取状态说明信息
     * @param  int $intStatus 状态
     * @return array|string
     */
    public static function getyesstate($intStatus = null)
    {

        $array = [
            self::STATUS_YES => Yii::t('article', 'STATUS_YES'),
            self::STATUS_NO => Yii::t('article', 'STATUS_NO'),
        ];


        if ($intStatus !== null && isset($array[$intStatus])) {
            $array = $array[$intStatus];
        }

        return $array;
    }
    /**
     * 获取状态值对应的颜色信息
     * @param  int $intStatus 状态值
     * @return array|string
     */
    public static function getstateColor($intStatus = null)
    {
        $array = [
            self::STATUS_YES => 'label-danger',
            self::STATUS_NO => 'label-important',
        ];

        if ($intStatus !== null && isset($array[$intStatus])) {
            $array = $array[$intStatus];
        }

        return $array;
    }


   

}
