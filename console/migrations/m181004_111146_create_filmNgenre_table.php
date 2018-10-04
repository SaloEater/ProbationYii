<?php

use yii\db\Migration;

/**
 * Handles the creation of table `filmNgenre`.
 */
class m181004_111146_create_filmNgenre_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('filmNgenre', [
            'id' => $this->primaryKey(),
            'film_id' => $this->integer()->notNull(),
            'genre_id' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('filmNgenre');
    }
}
