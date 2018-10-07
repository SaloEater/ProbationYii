<?php

use yii\db\Migration;

/**
 * Handles the creation of table `filmNproducers`.
 * Has foreign keys to the tables:
 *
 * - `films`
 * - `producer`
 */
class m181007_130648_create_filmNproducers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('filmNproducers', [
            'id' => $this->primaryKey(),
            'film_id' => $this->integer(),
            'genre_id' => $this->integer(),
        ]);

        // creates index for column `film_id`
        $this->createIndex(
            'idx-filmNproducers-film_id',
            'filmNproducers',
            'film_id'
        );

        // add foreign key for table `films`
        $this->addForeignKey(
            'fk-filmNproducers-film_id',
            'filmNproducers',
            'film_id',
            'films',
            'id',
            'CASCADE'
        );

        // creates index for column `genre_id`
        $this->createIndex(
            'idx-filmNproducers-genre_id',
            'filmNproducers',
            'genre_id'
        );

        // add foreign key for table `producer`
        $this->addForeignKey(
            'fk-filmNproducers-genre_id',
            'filmNproducers',
            'genre_id',
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
            'fk-filmNproducers-film_id',
            'filmNproducers'
        );

        // drops index for column `film_id`
        $this->dropIndex(
            'idx-filmNproducers-film_id',
            'filmNproducers'
        );

        // drops foreign key for table `producer`
        $this->dropForeignKey(
            'fk-filmNproducers-genre_id',
            'filmNproducers'
        );

        // drops index for column `genre_id`
        $this->dropIndex(
            'idx-filmNproducers-genre_id',
            'filmNproducers'
        );

        $this->dropTable('filmNproducers');
    }
}
