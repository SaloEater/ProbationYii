<?php

use yii\db\Migration;

/**
 * Handles the creation of table `transactions`.
 * Has foreign keys to the tables:
 *
 * - `users`
 * - `categories`
 */
class m181117_114111_create_transactions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('transactions', [
            'id' => $this->primaryKey(),
            'userId' => $this->integer()->notNull()->unique(),
            'wealth' => $this->float(),
            'categoryId' => $this->integer(),
            'createdAt' => $this->integer(),
            'date' => $this->integer(),
        ]);

        // creates index for column `userId`
        $this->createIndex(
            'idx-transactions-userId',
            'transactions',
            'userId'
        );

        // add foreign key for table `users`
        $this->addForeignKey(
            'fk-transactions-userId',
            'transactions',
            'userId',
            'users',
            'id',
            'CASCADE'
        );

        // creates index for column `categoryId`
        $this->createIndex(
            'idx-transactions-categoryId',
            'transactions',
            'categoryId'
        );

        // add foreign key for table `categories`
        $this->addForeignKey(
            'fk-transactions-categoryId',
            'transactions',
            'categoryId',
            'categories',
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
            'fk-transactions-userId',
            'transactions'
        );

        // drops index for column `userId`
        $this->dropIndex(
            'idx-transactions-userId',
            'transactions'
        );

        // drops foreign key for table `categories`
        $this->dropForeignKey(
            'fk-transactions-categoryId',
            'transactions'
        );

        // drops index for column `categoryId`
        $this->dropIndex(
            'idx-transactions-categoryId',
            'transactions'
        );

        $this->dropTable('transactions');
    }
}
