<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "content".
 *
 * @property int $id
 * @property string $menu
 * @property string $img
 * @property string $text
 * @property string $link
 * @property int $isrun
 * @property int $isDel
 */
class Content extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'content';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['menu'], 'required'],
            [['isrun', 'isDel'], 'integer'],
            [['menu', 'img', 'text', 'link'], 'string', 'max' => 255],
            [['content'], 'string'],
			
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'menu' => 'Menu',
            'img' => 'Img',
            'text' => 'Text',
            'link' => 'Link',
            'isrun' => 'Isrun',
            'isDel' => 'Is Del',
        ];
    }
	public function beforeSave($insert)
    {
        if ($insert) {
            $this->setAttribute('addtime', time());
			$this->setAttribute('isrun', '1');
        }
        return parent::beforeSave($insert);
    }
}
