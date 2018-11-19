<?php

use yii\db\Migration;

/**
 * Handles the creation of table `accounts`.
 * Has foreign keys to the tables:
 *
 * - `users`
 */
class m181117_113620_create_accounts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('accounts', [
            'userId' => $this->integer()->notNull()->unique(),
            'wealth' => $this->float(),
        ]);

        // creates index for column `userId`
        $this->createIndex(
            'idx-accounts-userId',
            'accounts',
            'userId'
        );

        // add foreign key for table `users`
        $this->addForeignKey(
            'fk-accounts-userId',
            'accounts',
            'userId',
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
            'fk-accounts-userId',
            'accounts'
        );

        // drops index for column `userId`
        $this->dropIndex(
            'idx-accounts-userId',
            'accounts'
        );

        $this->dropTable('accounts');
    }
}
