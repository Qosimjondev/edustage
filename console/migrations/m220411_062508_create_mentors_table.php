<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%mentors}}`.
 */
class m220411_062508_create_mentors_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%mentors}}', [
            'id' => $this->primaryKey(),
            'fullname'=>$this->string(100),
            'job_uz'=>$this->string(100),
            'job_en'=>$this->string(100),
            'experience_uz'=>$this->text(),
            'experience_en'=>$this->text(),
            'facebook'=>$this->string(100),
            'twitter'=>$this->string(100),
            'linkedin'=>$this->string(100),
            'pinterest'=>$this->string(100),
            'img'=>$this->string(100),
            'status'=>$this->boolean()->defaultValue(false),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%mentors}}');
    }
}
