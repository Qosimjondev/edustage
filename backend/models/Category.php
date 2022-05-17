<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string|null $title_uz
 * @property string|null $title_en
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Courses[] $courses
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
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
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['title_uz', 'title_en'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'title_uz' => Yii::t('app', 'Title Uz'),
            'title_en' => Yii::t('app', 'Title En'),
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
        return $this->hasMany(Courses::class, ['category_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \backend\models\query\CategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\query\CategoryQuery(get_called_class());
    }

    public function getStatuslabel(){
        if($this->status == 0){
            return "<span class='badge badge-warning'>NoFaol</span>";
        }
        return "<span class='badge badge-info'>Faol</span>";

    }
}
