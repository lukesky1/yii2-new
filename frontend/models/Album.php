<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "album".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $access
 * @property string $name
 * @property integer $sort_order
 */
class Album extends \yii\db\ActiveRecord
{
    const ACCESS_ALL = 1;
    const ACCESS_PERSONAL = 2;
    const ACCESS_MEMBERS = 3;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'album';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'access', 'name'], 'required'],
            [['user_id', 'access', 'sort_order'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'access' => 'Access',
            'name' => 'Name',
            'sort_order' => 'Sort Order',
        ];
    }

    /**
     * @inheritdoc
     * @return \frontend\models\query\AlbumQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\query\AlbumQuery(get_called_class());
    }
    
    /**
     * @return array
     */
    public function getAccessTypes()
    {
        return [
            self::ACCESS_ALL => 'All',
            self::ACCESS_PERSONAL => 'Only me',
            self::ACCESS_MEMBERS => 'Registered uses',
        ];
    }
    
    public function beforeValidate()
    {
        $this->user_id = Yii::$app->user->id;
        return parent::beforeValidate();
    }
}
