<?php

use yii\db\Migration;

/**
 * Handles dropping columns from table `{{%post}}`.
 */
class m201215_065639_drop_position_column_from_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('posts', 'created_at');
        $this->dropColumn('posts', 'updated_at');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
