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
class Cat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'my_Cat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            
        ];
    }

    
}
