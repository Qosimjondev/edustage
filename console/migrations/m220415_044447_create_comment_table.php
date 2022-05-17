<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comment}}`.
 */
class m220415_044447_create_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comment}}', [
            'id' => $this->primaryKey(),
            'quality'=>$this->string(5),
            'text'=>$this->text(),
            'status'=>$this->boolean()->defaultValue(false),
            'course_id'=>$this->integer()->notNull(),
            'user_id'=>$this->integer()->notNull(),
            'created_at'=>$this->integer(),
        ]);
        $this->addForeignKey('fk_comment_to_course', '{{%comment}}', 'course_id', '{{%courses}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_comment_to_user', '{{%comment}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_comment_to_course', '{{%comment}}');
        $this->dropForeignKey('fk_comment_to_user', '{{%comment}}');

        $this->dropTable('{{%comment}}');
    
    }
}
