<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%courses}}`.
 */
class m220411_062738_create_courses_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%courses}}', [
            'id' => $this->primaryKey(),
            'mentor_id'=>$this->integer()->notNull(),
            'title_uz'=>$this->string(100),
            'description_uz'=>$this->text(),
            'tag_uz'=>$this->string(256),
            'title_en'=>$this->string(100),
            'description_en'=>$this->text(),
            'tag_en'=>$this->string(256),
            'status'=>$this->boolean()->defaultValue(false),
            'poster'=>$this->string(100),
            'category_id'=>$this->integer()->notNull(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);
        $this->addForeignKey('fk_courses_to_category', '{{%courses}}', 'category_id', '{{%category}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_courses_to_mentor', '{{%courses}}', 'mentor_id', '{{%mentors}}', 'id', 'CASCADE', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_courses_to_category', '{{%courses}}');
        $this->dropForeignKey('fk_courses_to_mentor', '{{%courses}}');
        $this->dropTable('{{%courses}}');
    }
}
