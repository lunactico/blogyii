<?php

namespace common\models;

use Yii;
use backend\models\Categories;

/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property integer $create_by
 * @property string $tittle
 * @property string $excerpt
 * @property string $body
 * @property integer $blog_category_id
 * @property integer $status
 * @property integer $comment_status
 * @property integer $comment_count
 * @property integer $views
 * @property string $publish_up
 * @property string $publish_down
 *
 * @property Comments[] $comments
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['create_by', 'tittle', 'blog_category_id', 'comment_status', 'publish_up', 'publish_down'], 'required'],
            [['create_by', 'blog_category_id', 'status', 'comment_status', 'comment_count', 'views'], 'integer'],
            [['tittle', 'excerpt', 'body'], 'string'],
            [['publish_up', 'publish_down'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'create_by' => Yii::t('app', 'Create By'),
            'tittle' => Yii::t('app', 'Tittle'),
            'excerpt' => Yii::t('app', 'Excerpt'),
            'body' => Yii::t('app', 'Body'),
            'blog_category_id' => Yii::t('app', 'Blog Category ID'),
            'status' => Yii::t('app', 'Status'),
            'comment_status' => Yii::t('app', 'Comment Status'),
            'comment_count' => Yii::t('app', 'Comment Count'),
            'views' => Yii::t('app', 'Views'),
            'publish_up' => Yii::t('app', 'Publish Up'),
            'publish_down' => Yii::t('app', 'Publish Down'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comments::className(), ['blog_post_id' => 'id']);
    }
    
    public function getCategories()
    {
	   return $this->hasOne(Categories::className(), ['id' => 'blog_category_id']);
    }
}
