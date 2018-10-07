<?php

use yii\db\Migration;

/**
 * Handles the creation of table `filmNgenres`.
 * Has foreign keys to the tables:
 *
 * - `films`
 * - `genres`
 */
class m181007_130605_create_filmNgenres_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('filmNgenres', [
            'id' => $this->primaryKey(),
            'film_id' => $this->integer(),
            'genre_id' => $this->integer(),
        ]);

        // creates index for column `film_id`
        $this->createIndex(
            'idx-filmNgenres-film_id',
            'filmNgenres',
            'film_id'
        );

        // add foreign key for table `films`
        $this->addForeignKey(
            'fk-filmNgenres-film_id',
            'filmNgenres',
            'film_id',
            'films',
            'id',
            'CASCADE'
        );

        // creates index for column `genre_id`
        $this->createIndex(
            'idx-filmNgenres-genre_id',
            'filmNgenres',
            'genre_id'
        );

        // add foreign key for table `genres`
        $this->addForeignKey(
            'fk-filmNgenres-genre_id',
            'filmNgenres',
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
            'fk-filmNgenres-film_id',
            'filmNgenres'
        );

        // drops index for column `film_id`
        $this->dropIndex(
            'idx-filmNgenres-film_id',
            'filmNgenres'
        );

        // drops foreign key for table `genres`
        $this->dropForeignKey(
            'fk-filmNgenres-genre_id',
            'filmNgenres'
        );

        // drops index for column `genre_id`
        $this->dropIndex(
            'idx-filmNgenres-genre_id',
            'filmNgenres'
        );

        $this->dropTable('filmNgenres');
    }
}
