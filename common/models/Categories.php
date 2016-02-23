<?php

namespace common\models;

use Yii;
use common\models\Post;

/**
 * This is the model class for table "categories".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $publications
 * @property integer $status
 * @property integer $counter
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['publications', 'status','counter'], 'integer'],
            [['name'], 'string', 'max' => 45],
            [['description'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'publications' => Yii::t('app', 'Publications'),
            'status' => Yii::t('app', 'Status'),
            'counter' => Yii::t('app', 'contador'),
        ];
    }
    
    public function getPost()
    {
	   return $this->hasMany(Post::className(), ['id' => 'blog_category_id']);
    }
}
