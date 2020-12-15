<?php

use yii\db\Migration;

/**
 * Class m201215_065909_add_column_from_post_table
 */
class m201215_065909_add_column_from_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%posts}}', 'created_at', $this->integer());
        $this->addColumn('{{%posts}}', 'updated_at', $this->integer());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%posts}}', 'created_at');
        $this->dropColumn('{{%posts}}', 'updated_at');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201215_065909_add_column_from_post_table cannot be reverted.\n";

        return false;
    }
    */
}
