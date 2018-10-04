<?php

use yii\db\Migration;

/**
 * Handles the creation of table `filmNproducer`.
 */
class m181004_111218_create_filmNproducer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('filmNproducer', [
            'id' => $this->primaryKey(),
            'film_id' => $this->integer()->notNull(),
            'producer_id' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('filmNproducer');
    }
}
