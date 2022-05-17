<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "events".
 *
 * @property int $id
 * @property string|null $title_en
 * @property string|null $content_en
 * @property string|null $title_uz
 * @property string|null $content_uz
 * @property string|null $event_date
 * @property string|null $start_time
 * @property string|null $end_time
 * @property string|null $place
 * @property string|null $image
 * @property int|null $status
 * @property int|null $created_at
 */
class Events extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'events';
    }

    /**
     * {@inheritdoc}
     */
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
            [['content_en', 'content_uz'], 'string'],
            [['status', 'created_at'], 'integer'],
            [['title_en', 'title_uz', 'place'], 'string', 'max' => 100],
            [['event_date'], 'string', 'max' => 12],
            [['start_time', 'end_time'], 'string', 'max' => 6],
            ['image', 'file', 'extensions'=>['png', 'jpeg', 'jpg'], 'maxFiles'=>1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title_en' => Yii::t('app', 'Title En'),
            'content_en' => Yii::t('app', 'Content En'),
            'title_uz' => Yii::t('app', 'Title Uz'),
            'content_uz' => Yii::t('app', 'Content Uz'),
            'event_date' => Yii::t('app', 'Event Date'),
            'start_time' => Yii::t('app', 'Start Time'),
            'end_time' => Yii::t('app', 'End Time'),
            'place' => Yii::t('app', 'Place'),
            'image' => Yii::t('app', 'Image'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return \backend\models\query\EventsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\query\EventsQuery(get_called_class());
    }

    
    public function getImageLink(){
        return 'http://edustage/frontend/web/img/event/'.$this->image;
    }

    public function getStatuslabel(){
        if($this->status == 0){
            return "<span class='badge badge-warning'>NoFaol</span>";
        }
        return "<span class='badge badge-info'>Faol</span>";

    }
}
