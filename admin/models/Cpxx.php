<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cpxx".
 *
 * @property int $id
 * @property int $mid 对应产品
 * @property string $cpcc 产品尺寸
 * @property string $cpjg 产品价格
 * @property string $isdel
 */
class Cpxx extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cpxx';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mid', 'cpcc', 'cpjg'], 'required'],
            [['mid'], 'integer'],
            [['isdel','isrun'], 'string'],
            [['cpcc', 'cpjg'], 'string', 'max' => 255],
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
            'cpcc' => 'Cpcc',
            'cpjg' => 'Cpjg',
            'isdel' => 'Isdel',
            'isrun' => 'Isrun',
        ];
    }
}
