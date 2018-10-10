<?php

use yii\db\Migration;

/**
 * Class m181010_083722_changeFilmNProducersThirdColumnName
 */
class m181010_083722_changeFilmNProducersThirdColumnName extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameColumn('filmNproducers', 'genre_id', 'producer_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->renameColumn('filmNproducers', 'producer_id', 'genre_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181010_083722_changeFilmNProducersThirdColumnName cannot be reverted.\n";

        return false;
    }
    */
}
