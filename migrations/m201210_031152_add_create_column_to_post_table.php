<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%post}}`.
 */
class m201210_031152_add_create_column_to_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%posts}}', 'created_at', $this->datetime());
        $this->addColumn('{{%posts}}', 'updated_at', $this->datetime());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%posts}}', 'created_at');
        $this->dropColumn('{{%posts}}', 'updated_at');
    }
}
