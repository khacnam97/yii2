<?php

use yii\db\Migration;

/**
 * Class m201215_035310_add_colunm_posts
 */
class m201215_035310_add_colunm_posts extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%posts}}', 'content', $this->string());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201215_035310_add_colunm_posts cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201215_035310_add_colunm_posts cannot be reverted.\n";

        return false;
    }
    */
}
