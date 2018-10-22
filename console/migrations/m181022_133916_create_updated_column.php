<?php

use yii\db\Migration;

/**
 * Class m181022_133916_create_updated_column
 */
class m181022_133916_create_updated_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('films', 'updated', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('films', 'updated');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181022_133916_create_updated_column cannot be reverted.\n";

        return false;
    }
    */
}
