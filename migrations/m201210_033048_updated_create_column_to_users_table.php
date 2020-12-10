<?php

use yii\db\Migration;

/**
 * Class m201210_033048_updated_create_column_to_users_table
 */
class m201210_033048_updated_create_column_to_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameColumn('posts', 'titles', 'title');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201210_033048_updated_create_column_to_users_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201210_033048_updated_create_column_to_users_table cannot be reverted.\n";

        return false;
    }
    */
}
