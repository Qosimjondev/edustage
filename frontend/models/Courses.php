<?php 

namespace frontend\models;

use backend\models\Category;
use backend\models\CourseItem;
use backend\models\Enroll;
use backend\models\Like;
use backend\models\Mentors;
use yii\db\ActiveRecord;

class Courses extends ActiveRecord{

    public static function tableName()
    {
        return 'courses';
    }

    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    } 

    /**
     * Gets query for [[CourseItems]].
     *
     * @return \yii\db\ActiveQuery|\backend\models\query\CourseItemQuery
     */
    public function getCourseItems()
    {
        return $this->hasMany(CourseItem::class, ['course_id' => 'id']);
    }

    /**
     * Gets query for [[Enrolls]].
     *
     * @return \yii\db\ActiveQuery|\backend\models\query\EnrollQuery
     */
    public function getEnrolls()
    {
        return $this->hasMany(Enroll::class, ['course_id' => 'id']);
    }

    /**
     * Gets query for [[Likes]].
     *
     * @return \yii\db\ActiveQuery|\backend\models\query\LikeQuery
     */
    public function getLikes()
    {
        return $this->hasMany(Like::class, ['course_id' => 'id']);
    }

    /**
     * Gets query for [[Mentor]].
     *
     * @return \yii\db\ActiveQuery|\backend\models\query\MentorsQuery
     */
    public function getMentor()
    {
        return $this->hasOne(Mentors::class, ['id' => 'mentor_id']);
    }

    /**
     * {@inheritdoc}
     * @return \backend\models\query\CoursesQuery the active query used by this AR class.
     */
    

}



?>