<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_catagory".
 *
 * @property integer $id
 * @property string $name
 * @property string $create_date
 */
class Catagory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_catagory';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['create_date'], 'safe'],
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
            'name' => 'Name',
            'create_date' => 'Create Date',
        ];
    }

    public function getJob()
    {
        return $this->hasMany(Job::className(), ['catagory_id' => 'id']);
    }
}
