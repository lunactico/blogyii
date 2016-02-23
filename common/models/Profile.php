<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $birthdate
 * @property string $avatar
 * @property string $filename
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'avatar', 'filename'], 'required'],
            [['user_id'], 'integer'],
            [['birthdate'], 'safe'],
            [['first_name', 'last_name'], 'string', 'max' => 60],
            [['avatar', 'filename'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
     //esto es un join 
     
    public function getUser()
    {
	    return $this->hasOne(User::className(),['id' => 'user_id']);
    }
    
    
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'birthdate' => Yii::t('app', 'Birthdate'),
            'avatar' => Yii::t('app', 'Avatar'),
            'filename' => Yii::t('app', 'Filename'),
        ];
    }
}
