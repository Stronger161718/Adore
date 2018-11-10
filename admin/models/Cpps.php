<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cpps".
 *
 * @property int $id
 * @property int $mid 产品id
 * @property string $img
 * @property string $isdel
 */
class Cpps extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cpps';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mid'], 'required'],
            [['mid'], 'integer'],
            [['isdel','isrun'], 'string'],
            [['img'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mid' => 'Mid',
            'img' => 'Img',
            'isdel' => 'Isdel',
            'isrun' => 'Isrun',
        ];
    }
}
