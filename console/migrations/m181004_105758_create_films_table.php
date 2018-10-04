<?php

use yii\db\Migration;

/**
 * Handles the creation of table `films`.
 */
class m181004_105758_create_films_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('films', [
            'id' => $this->primaryKey(),
            'name' => $this->text()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('films');
    }
}
