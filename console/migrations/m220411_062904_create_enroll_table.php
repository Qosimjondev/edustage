<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%enroll}}`.
 */
class m220411_062904_create_enroll_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%enroll}}', [
            'id' => $this->primaryKey(),      
            'course_id'=>$this->integer()->notNull(),
            'user_id'=>$this->integer()->notNull(),
            'status'=>$this->boolean()->defaultValue(true),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);
        $this->addForeignKey('fk_enroll_to_course', '{{%enroll}}', 'course_id', '{{%courses}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_enroll_to_user', '{{%enroll}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_enroll_to_course', '{{%enroll}}');
        $this->dropForeignKey('fk_enroll_to_user', '{{%enroll}}');
        $this->dropTable('{{%enroll}}');
    }
}
