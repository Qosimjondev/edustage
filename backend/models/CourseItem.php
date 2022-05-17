<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "course_item".
 *
 * @property int $id
 * @property string|null $title_uz
 * @property string|null $description_uz
 * @property string|null $tag_uz
 * @property string|null $title_en
 * @property string|null $description_en
 * @property string|null $tag_en
 * @property string|null $video_link
 * @property int|null $status
 * @property int $course_id
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Courses $course
 */
class CourseItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'course_item';
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
            [['description_uz', 'description_en'], 'string'],
            [['status', 'course_id', 'created_at', 'updated_at'], 'integer'],
            [['course_id'], 'required'],
            [['title_uz', 'title_en', 'video_link'], 'string', 'max' => 100],
            [['tag_uz', 'tag_en'], 'string', 'max' => 256],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Courses::class, 'targetAttribute' => ['course_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'title_uz' => 'Title Uz',
            'description_uz' => 'Description Uz',
            'tag_uz' => 'Tag Uz',
            'title_en' => 'Title En',
            'description_en' => 'Description En',
            'tag_en' => 'Tag En',
            'video_link' => 'Video Link',
            'status' => 'Status',
            'course_id' => 'Course ID',
        ];
    }

    /**
     * Gets query for [[Course]].
     *
     * @return \yii\db\ActiveQuery|\backend\models\query\CoursesQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Courses::class, ['id' => 'course_id']);
    }

    /**
     * {@inheritdoc}
     * @return \backend\models\query\CourseItemQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\query\CourseItemQuery(get_called_class());
    }

    public function getStatuslabel(){
        if($this->status == 0){
            return "<span class='badge badge-warning'>NoFaol</span>";
        }
        return "<span class='badge badge-info'>Faol</span>";

    }

    public function getVideolink(){
        return 'https://www.youtube.com/embed/'.$this->video_link.'?rel=0';
    }
}
