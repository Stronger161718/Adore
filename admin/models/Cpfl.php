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
class Cpfl extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cpfl';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cpfl','type'], 'required'],
            [['isrun', 'isdel'], 'string'],
            [['cpfl'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cpfl' => '产品分类',
            'isrun' => 'Isrun',
            'isdel' => 'Isdel',
        ];
    }
    public function beforeSave($insert)
    {
        if ($insert) {
			$this->setAttribute('isrun', '0');
        }
        return parent::beforeSave($insert);
    }
    public static function getCpfl($type=null)
    {
        if($type==null){
            $sql = 'SELECT id, cpfl FROM ' . self::tableName() . ' where isrun="0" and isdel="0" ORDER BY id ASC';
     
        }else{
            $sql = 'SELECT id, cpfl FROM ' . self::tableName() . ' where isrun="0" and isdel="0" and type="'.$type.'" ORDER BY id ASC';
        }
    
        return Yii::$app->db->createCommand($sql)->queryAll(\PDO::FETCH_KEY_PAIR);
    }
}
