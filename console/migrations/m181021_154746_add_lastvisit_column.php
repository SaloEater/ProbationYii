<?php

use yii\db\Migration;

/**
 * Class m181021_154746_add_lastvisit_column
 */
class m181021_154746_add_lastvisit_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'lastlogin', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user', 'lastlogin');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181021_154746_add_lastvisit_column cannot be reverted.\n";

        return false;
    }
    */
}
