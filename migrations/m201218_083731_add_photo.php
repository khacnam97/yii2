<?php

use yii\db\Migration;

/**
 * Class m201218_083731_add_photo
 */
class m201218_083731_add_photo extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%photos}}', 'title', $this->string());
        $this->addColumn('{{%photos}}', 'group', $this->integer());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%photos}}', 'title');
        $this->dropColumn('{{%photos}}', 'group');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201218_083731_add_photo cannot be reverted.\n";

        return false;
    }
    */
}
