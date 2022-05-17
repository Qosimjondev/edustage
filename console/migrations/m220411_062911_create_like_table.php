<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%like}}`.
 */
class m220411_062911_create_like_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%like}}', [
            'id' => $this->primaryKey(),
            'course_id'=>$this->integer()->notNull(),
            'user_id'=>$this->integer()->notNull(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);
        $this->addForeignKey('fk_like_to_course', '{{%like}}', 'course_id', '{{%courses}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_like_to_user', '{{%like}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {    
        $this->dropForeignKey('fk_like_to_course', '{{%like}}');
        $this->dropForeignKey('fk_like_to_user', '{{%like}}');
        $this->dropTable('{{%like}}');
    }
}
