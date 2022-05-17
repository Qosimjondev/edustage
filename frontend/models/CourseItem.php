<?php

namespace frontend\models;

use Yii;

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


    public function getVideolink(){
        return 'https://www.youtube.com/embed/'.$this->video_link.'?rel=0';
    }
}
