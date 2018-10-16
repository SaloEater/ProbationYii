<?php

use yii\db\Migration;

/**
 * Handles the creation of table `producer_n_films`.
 * Has foreign keys to the tables:
 *
 * - `films`
 * - `producer`
 */
class m181010_084038_create_producer_n_films_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('producer_n_films', [
            'film_id' => $this->integer(),
            'producer_id' => $this->integer(),
        ]);

        // creates index for column `film_id`
        $this->createIndex(
            'idx-producer_n_films-film_id',
            'producer_n_films',
            'film_id'
        );

        // add foreign key for table `films`
        $this->addForeignKey(
            'fk-producer_n_films-film_id',
            'producer_n_films',
            'film_id',
            'films',
            'id',
            'CASCADE'
        );

        // creates index for column `producer_id`
        $this->createIndex(
            'idx-producer_n_films-producer_id',
            'producer_n_films',
            'producer_id'
        );

        // add foreign key for table `producer`
        $this->addForeignKey(
            'fk-producer_n_films-producer_id',
            'producer_n_films',
            'producer_id',
            'producers',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `films`
        $this->dropForeignKey(
            'fk-producer_n_films-film_id',
            'producer_n_films'
        );

        // drops index for column `film_id`
        $this->dropIndex(
            'idx-producer_n_films-film_id',
            'producer_n_films'
        );

        // drops foreign key for table `producer`
        $this->dropForeignKey(
            'fk-producer_n_films-producer_id',
            'producer_n_films'
        );

        // drops index for column `producer_id`
        $this->dropIndex(
            'idx-producer_n_films-producer_id',
            'producer_n_films'
        );

        $this->dropTable('producer_n_films');
    }
}
