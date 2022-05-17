<?php

namespace common\models;

use frontend\models\Courses;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property int|null $quality
 * @property string|null $text
 * @property int|null $status
 * @property int $course_id
 * @property int $user_id
 * @property int|null $created_at
 *
 * @property Courses $course
 * @property User $user
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment';
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
            [['status', 'course_id', 'user_id', 'created_at'], 'integer'],
            [['quality', 'text'], 'string'],
            [['course_id', 'user_id'], 'required'],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Courses::class, 'targetAttribute' => ['course_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'quality' => 'Quality',
            'text' => 'Text',
            'status' => 'Status',
            'course_id' => 'Course ID',
            'user_id' => 'User ID',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Course]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Courses::class, ['id' => 'course_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public function getStatuslabel(){
        if($this->status == 0){
            return "<span class='badge badge-warning'>NoFaol</span>";
        }
        return "<span class='badge badge-info'>Faol</span>";

    }
}
