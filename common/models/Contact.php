<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\StringHelper;

/**
 * This is the model class for table "contact".
 *
 * @property int $id
 * @property string|null $fullname
 * @property string|null $email
 * @property string|null $title
 * @property string|null $content
 * @property int|null $status
 * @property int|null $created_at
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact';
    }


    public function behaviors()
    {
        return [
            [
                'class'=>TimestampBehavior::class,
                'updatedAtAttribute'=>false
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'content'], 'required'],
            [['content'], 'string'],
            [['status', 'created_at'], 'integer'],
            [['fullname'], 'string', 'max' => 255],
            [['title'], 'string', 'max' => 100],
            ['email', 'email']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'fullname' => Yii::t('app', 'Fullname'),
            'email' => Yii::t('app', 'Email'),
            'title' => Yii::t('app', 'Title'),
            'content' => Yii::t('app', 'Content'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return ContactQuery the active query used by this AR class.
     */

    public function getStatuslabel(){
        if($this->status == 0){
            return "<span class='badge badge-warning'>O'qilmagan</span>";
        }
        return "<span class='badge badge-info'>O'qilgan</span>";

    }


    public function getShorttext()
    {
        return StringHelper::truncateWords($this->content, 2);
    }

    public static function find()
    {
        return new ContactQuery(get_called_class());
    }
}
