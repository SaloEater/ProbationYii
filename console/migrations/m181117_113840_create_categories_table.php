<?php

use yii\db\Migration;

/**
 * Handles the creation of table `categories`.
 * Has foreign keys to the tables:
 *
 * - `users`
 * - `parentId`
 */
class m181117_113840_create_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('categories', [
            'id' => $this->primaryKey(),
            'createdBy' => $this->integer()->notNull(),
            'name' => $this->text(),
            'familyId' => $this->integer()->notNull(),
            'createdAt' => $this->integer(),
        ]);

        // creates index for column `createdBy`
        $this->createIndex(
            'idx-categories-createdBy',
            'categories',
            'createdBy'
        );

        // add foreign key for table `users`
        $this->addForeignKey(
            'fk-categories-createdBy',
            'categories',
            'createdBy',
            'users',
            'id',
            'CASCADE'
        );

        // creates index for column `parentId`
        $this->createIndex(
            'idx-categories-familyId',
            'categories',
            'familyId'
        );

        // add foreign key for table `parentId`
        $this->addForeignKey(
            'fk-categories-familyId',
            'categories',
            'familyId',
            'families',
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
            'fk-categories-createdBy',
            'categories'
        );

        // drops index for column `createdBy`
        $this->dropIndex(
            'idx-categories-createdBy',
            'categories'
        );

        // drops foreign key for table `parentId`
        $this->dropForeignKey(
            'fk-categories-familyId',
            'categories'
        );

        // drops index for column `parentId`
        $this->dropIndex(
            'idx-categories-familyId',
            'categories'
        );

        $this->dropTable('categories');
    }
}
