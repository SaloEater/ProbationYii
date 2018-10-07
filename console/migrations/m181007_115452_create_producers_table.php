<?php

use yii\db\Migration;

/**
 * Handles the creation of table `producers`.
 */
class m181007_115452_create_producers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('producers', [
            'id' => $this->primaryKey(),
            'name' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('producers');
    }
}
