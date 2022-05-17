<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%course_item}}`.
 */
class m220411_062822_create_course_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%course_item}}', [
            'id' => $this->primaryKey(),
            'title_uz'=>$this->string(100),
            'description_uz'=>$this->text(),
            'tag_uz'=>$this->string(256),
            'title_en'=>$this->string(100),
            'description_en'=>$this->text(),
            'tag_en'=>$this->string(256),
            'video_link'=>$this->string(100),
            'status'=>$this->boolean()->defaultValue(false),
            'course_id'=>$this->integer()->notNull(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);
        $this->addForeignKey('fk_course_item_to_course', '{{%course_item}}', 'course_id', '{{%courses}}', 'id', 'CASCADE', 'CASCADE');
 
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_course_item_to_course', '{{%course_item}}');
        $this->dropTable('{{%course_item}}');
    }
}
