<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $type 1企业动态2行业新闻
 * @property string $date
 * @property string $isrun
 * @property string $isdel
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'js','content', 'date'], 'required'],
            [['content', 'img','type', 'isrun', 'isdel'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['date'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'type' => 'Type',
            'date' => 'Date',
            'isrun' => 'Isrun',
            'isdel' => 'Isdel',
        ];
    }
    public function beforeSave($insert)
    {
        $this->setAttribute('date',strtotime($this->date));
        return parent::beforeSave($insert);
    }
}
