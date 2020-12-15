<?php

use yii\db\Migration;

/**
 * Class m201215_034536_add_colunm_post
 */
class m201215_034536_add_colunm_post extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%posts}}', 'user_id', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201215_034536_add_colunm_post cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201215_034536_add_colunm_post cannot be reverted.\n";

        return false;
    }
    */
}
