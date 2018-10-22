<?php

use yii\db\Migration;

/**
 * Class m181022_133906_create_created_column
 */
class m181022_133906_create_created_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('films', 'created', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('films', 'created');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181022_133906_create_created_column cannot be reverted.\n";

        return false;
    }
    */
}
