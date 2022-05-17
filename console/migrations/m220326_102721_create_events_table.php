<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%events}}`.
 */
class m220326_102721_create_events_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%events}}', [
            'id' => $this->primaryKey(),
            'title_en'=>$this->string(100),
            'content_en'=>$this->text(),
            'title_uz'=>$this->string(100),
            'content_uz'=>$this->text(),
            'event_date'=>$this->string(12),
            'start_time'=>$this->string(6),
            'end_time'=>$this->string(6),
            'place'=>$this->string(100),
            'image'=>$this->string(100),
            'status'=>$this->boolean()->defaultValue(false),
            'created_at'=>$this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%events}}');
    }
}
