<?php

use yii\db\Migration;

/**
 * Handles the creation of table `families`.
 * Has foreign keys to the tables:
 *
 * - `users`
 */
class m181117_113659_create_families_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('families', [
            'id' => $this->primaryKey(),
            'ownerId' => $this->integer()->notNull()->unique(),
        ]);

        // creates index for column `ownerId`
        $this->createIndex(
            'idx-families-ownerId',
            'families',
            'ownerId'
        );

        // add foreign key for table `users`
        $this->addForeignKey(
            'fk-families-ownerId',
            'families',
            'ownerId',
            'users',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `users`
        $this->dropForeignKey(
            'fk-families-ownerId',
            'families'
        );

        // drops index for column `ownerId`
        $this->dropIndex(
            'idx-families-ownerId',
            'families'
        );

        $this->dropTable('families');
    }
}
