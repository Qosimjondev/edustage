<?php

namespace frontend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\StringHelper;

/**
 * This is the model class for table "events".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $content
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

}
