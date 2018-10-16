<?php

use yii\db\Migration;

/**
 * Handles the creation of table `films`.
 */
class m181007_115430_create_films_table extends Migration
{

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('films', [
            'id' => $this->primaryKey(),
            'name' => $this->text(),
            'year' => $this->integer()
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
