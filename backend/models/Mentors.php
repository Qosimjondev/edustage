<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "mentors".
 *
 * @property int $id
 * @property string|null $fullname
 * @property string|null $job_uz
 * @property string|null $job_en
 * @property string|null $experience_uz
 * @property string|null $experience_en
 * @property string|null $facebook
 * @property string|null $twitter
 * @property string|null $linkedin
 * @property string|null $pinterest
 * @property string|null $img
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Courses[] $courses
 */
class Mentors extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mentors';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['experience_uz', 'experience_en'], 'string'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['fullname', 'job_uz', 'job_en', 'facebook', 'twitter', 'linkedin', 'pinterest'], 'string', 'max' => 100],
            ['img', 'file', 'extensions'=>['png', 'jpeg', 'jpg'], 'maxFiles'=>1]
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
            'job_uz' => Yii::t('app', 'Job Uz'),
            'job_en' => Yii::t('app', 'Job En'),
            'experience_uz' => Yii::t('app', 'Experience Uz'),
            'experience_en' => Yii::t('app', 'Experience En'),
            'facebook' => Yii::t('app', 'Facebook'),
            'twitter' => Yii::t('app', 'Twitter'),
            'linkedin' => Yii::t('app', 'Linkedin'),
            'pinterest' => Yii::t('app', 'Pinterest'),
            'img' => Yii::t('app', 'Img'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * Gets query for [[Courses]].
     *
     * @return \yii\db\ActiveQuery|\backend\models\query\CoursesQuery
     */
    public function getCourses()
    {
        return $this->hasMany(Courses::class, ['mentor_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \backend\models\query\MentorsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\query\MentorsQuery(get_called_class());
    }

        
    public function getImageLink(){
        return 'http://edustage/frontend/web/img/trainer/'.$this->img;
    }

    public function getStatuslabel(){
        if($this->status == 0){
            return "<span class='badge badge-warning'>NoFaol</span>";
        }
        return "<span class='badge badge-info'>Faol</span>";

    }
}
