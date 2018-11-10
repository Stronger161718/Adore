<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "join".
 *
 * @property int $id
 * @property string $name
 * @property string $sex 0男1女
 * @property string $xl
 * @property string $phone
 * @property string $tel
 * @property string $yb
 * @property string $email
 * @property string $qw
 * @property string $lxdz
 * @property string $qd
 * @property string $sytz
 * @property string $sf
 * @property string $sq
 * @property string $xq
 * @property string $qt
 * @property string $xdmd
 * @property string $hyjy
 * @property string $zwfx
 * @property string $dplx
 * @property string $ly
 * @property string $isread
 */
class Join extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'join';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sex', 'sytz', 'xdmd', 'hyjy', 'zwfx', 'dplx', 'ly', 'isread'], 'string'],
            [['name', 'xl', 'email', 'lxdz'], 'string', 'max' => 50],
            [['phone'], 'string', 'max' => 11],
            [['tel', 'qw'], 'string', 'max' => 12],
            [['yb'], 'string', 'max' => 10],
            [['qd', 'sf', 'sq', 'xq'], 'string', 'max' => 20],
            [['qt'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'sex' => 'Sex',
            'xl' => 'Xl',
            'phone' => 'Phone',
            'tel' => 'Tel',
            'yb' => 'Yb',
            'email' => 'Email',
            'qw' => 'Qw',
            'lxdz' => 'Lxdz',
            'qd' => 'Qd',
            'sytz' => 'Sytz',
            'sf' => 'Sf',
            'sq' => 'Sq',
            'xq' => 'Xq',
            'qt' => 'Qt',
            'xdmd' => 'Xdmd',
            'hyjy' => 'Hyjy',
            'zwfx' => 'Zwfx',
            'dplx' => 'Dplx',
            'ly' => 'Ly',
            'isread' => 'Isread',
        ];
    }
}
