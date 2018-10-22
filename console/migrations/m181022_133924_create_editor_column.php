<?php

use yii\db\Migration;

/**
 * Class m181022_133924_create_editor_column
 */
class m181022_133924_create_editor_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('films', 'whoCreate', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('films', 'whoCreate');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181022_133924_create_editor_column cannot be reverted.\n";

        return false;
    }
    */
}
