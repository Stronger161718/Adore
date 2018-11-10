<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cpfl".
 *
 * @property int $id
 * @property string $cpfl
 * @property string $isrun
 * @property string $isdel
 */
class Xwssimg extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'xwss_img';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',

        ];
    }

}
