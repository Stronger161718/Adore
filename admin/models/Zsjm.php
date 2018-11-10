<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "zsjm".
 *
 * @property int $id
 * @property string $dpmc 店铺名称
 * @property string $sf 省份
 * @property string $sq 市区
 * @property string $xq 县区
 * @property string $xxdz 详细地址
 * @property string $tel 电话
 * @property string $isrun
 * @property string $isdel
 */
class Zsjm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'zsjm';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['isrun', 'isdel'], 'string'],
            [['dpmc', 'sf', 'sq', 'xq'], 'string', 'max' => 50],
            [['xxdz'], 'string', 'max' => 255],
            [['tel'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dpmc' => 'Dpmc',
            'sf' => 'Sf',
            'sq' => 'Sq',
            'xq' => 'Xq',
            'xxdz' => 'Xxdz',
            'tel' => 'Tel',
            'isrun' => 'Isrun',
            'isdel' => 'Isdel',
        ];
    }
    public static function getsf()
    {
        $sql = 'SELECT provinceid, province FROM provinces ORDER BY id ASC';
    
        return Yii::$app->db->createCommand($sql)->queryAll(\PDO::FETCH_KEY_PAIR);
    }
    public static function getsq($sf)
    {
        $sql = 'SELECT cityid, city FROM cities where provinceid="'.$sf.'" ORDER BY id ASC';
    
        return Yii::$app->db->createCommand($sql)->queryAll(\PDO::FETCH_KEY_PAIR);
    }
    public static function getxq($sq)
    {
        $sql = 'SELECT areaid, area FROM areas where cityid="'.$sq.'" ORDER BY id ASC';
    
        return Yii::$app->db->createCommand($sql)->queryAll(\PDO::FETCH_KEY_PAIR);
    }
    public static function getallsq()
    {
        $sql = 'SELECT cityid, city FROM cities ORDER BY id ASC';
    
        return Yii::$app->db->createCommand($sql)->queryAll(\PDO::FETCH_KEY_PAIR);
    }
    public static function getallxq()
    {
        $sql = 'SELECT areaid, area FROM areas ORDER BY id ASC';
    
        return Yii::$app->db->createCommand($sql)->queryAll(\PDO::FETCH_KEY_PAIR);
    }
    
}
