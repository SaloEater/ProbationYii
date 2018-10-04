<?php

use yii\db\Migration;

/**
 * Handles the creation of table `producers`.
 */
class m181004_105850_create_producers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('producers', [
            'id' => $this->primaryKey(),
            'surname' => $this->text(),
            'name' => $this->text(),
            'patronymic' => $this->text(),
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
