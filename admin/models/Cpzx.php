<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cpzx".
 *
 * @property int $id
 * @property string $cpmc 产品名称
 * @property string $cpfl 产品分类
 * @property string $img
 * @property string $cpms 产品描述
 * @property string $isrun
 * @property string $isdel
 */
class Cpzx extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cpzx';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cpmc'], 'required'],
            [['cpms', 'isrun', 'isdel','cpmsimg'], 'string'],
            [['cpmc', 'cpfl', 'img'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cpmc' => '产品名称',
            'cpfl' => '产品分类',
            'img' => '产品图片',
            'cpms' => '产品描述',
            'isrun' => 'Isrun',
            'isdel' => 'Isdel',
        ];
    }
}
