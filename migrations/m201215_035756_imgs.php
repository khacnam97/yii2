<?php

use yii\db\Migration;

/**
 * Class m201215_035756_imgs
 */
class m201215_035756_imgs extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%imgs}}', [
            'id' => $this->primaryKey(),
            'post_id' => $this->string()->notNull(),
            'img_path' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%imgs}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201215_035756_imgs cannot be reverted.\n";

        return false;
    }
    */
}
