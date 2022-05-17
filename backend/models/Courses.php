<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "courses".
 *
 * @property int $id
 * @property int $mentor_id
 * @property string|null $title_uz
 * @property string|null $description_uz
 * @property string|null $tag_uz
 * @property string|null $title_en
 * @property string|null $description_en
 * @property string|null $tag_en
 * @property int|null $status
 * @property string|null $poster
 * @property int $category_id
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Category $category
 * @property CourseItem[] $courseItems
 * @property Enroll[] $enrolls
 * @property Like[] $likes
 * @property Mentors $mentor
 */
class Courses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'courses';
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
            [['mentor_id', 'category_id'], 'required'],
            [['mentor_id', 'status', 'category_id', 'created_at', 'updated_at'], 'integer'],
            [['description_uz', 'description_en'], 'string'],
            [['title_uz', 'title_en'], 'string', 'max' => 100],
            [['tag_uz', 'tag_en'], 'string', 'max' => 256],
            ['poster', 'file', 'extensions'=>['png', 'jpeg', 'jpg'], 'maxFiles'=>1],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
            [['mentor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Mentors::class, 'targetAttribute' => ['mentor_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'mentor_id' => Yii::t('app', 'Mentor ID'),
            'title_uz' => Yii::t('app', 'Title Uz'),
            'description_uz' => Yii::t('app', 'Description Uz'),
            'tag_uz' => Yii::t('app', 'Tag Uz'),
            'title_en' => Yii::t('app', 'Title En'),
            'description_en' => Yii::t('app', 'Description En'),
            'tag_en' => Yii::t('app', 'Tag En'),
            'status' => Yii::t('app', 'Status'),
            'poster' => Yii::t('app', 'Poster'),
            'category_id' => Yii::t('app', 'Category ID'),
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery|\backend\models\query\CategoryQuery
     */
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
    public static function find()
    {
        return new \backend\models\query\CoursesQuery(get_called_class());
    }

        
    public function getImageLink(){
        return 'http://edustage/frontend/web/img/courses/'.$this->poster;
    }

    public function getStatuslabel(){
        if($this->status == 0){
            return "<span class='badge badge-warning'>NoFaol</span>";
        }
        return "<span class='badge badge-info'>Faol</span>";

    }
}
