<?php

use yii\db\Migration;

/**
 * Handles the creation of table `film_n_genres`.
 * Has foreign keys to the tables:
 *
 * - `films`
 * - `genres`
 */
class m181007_130605_create_film_n_genres_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('film_n_genres', [
            'film_id' => $this->integer(),
            'genre_id' => $this->integer(),
        ]);

        // creates index for column `film_id`
        $this->createIndex(
            'idx-film_n_genres-film_id',
            'film_n_genres',
            'film_id'
        );

        // add foreign key for table `films`
        $this->addForeignKey(
            'fk-film_n_genres-film_id',
            'film_n_genres',
            'film_id',
            'films',
            'id',
            'CASCADE'
        );

        // creates index for column `genre_id`
        $this->createIndex(
            'idx-film_n_genres-genre_id',
            'film_n_genres',
            'genre_id'
        );

        // add foreign key for table `genres`
        $this->addForeignKey(
            'fk-film_n_genres-genre_id',
            'film_n_genres',
            'genre_id',
            'genres',
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
            'fk-film_n_genres-film_id',
            'film_n_genres'
        );

        // drops index for column `film_id`
        $this->dropIndex(
            'idx-film_n_genres-film_id',
            'film_n_genres'
        );

        // drops foreign key for table `genres`
        $this->dropForeignKey(
            'fk-film_n_genres-genre_id',
            'film_n_genres'
        );

        // drops index for column `genre_id`
        $this->dropIndex(
            'idx-film_n_genres-genre_id',
            'film_n_genres'
        );

        $this->dropTable('film_n_genres');
    }
}
