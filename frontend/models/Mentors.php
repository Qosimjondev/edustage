<?php 

namespace frontend\models;

use yii\db\ActiveRecord;

class Mentors extends ActiveRecord{

    public static function tableName()
    {
        return 'mentors';
    }

}



?>