<?php

use yii\db\Migration;

/**
 * Handles the creation of table `filmNyear`.
 */
class m181004_111423_create_filmNyear_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('filmNyear', [
            'id' => $this->primaryKey(),
            'film_id' => $this->integer()->notNull(),
            'year' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('filmNyear');
    }
}
