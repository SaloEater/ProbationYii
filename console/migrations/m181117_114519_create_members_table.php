<?php

use yii\db\Migration;

/**
 * Handles the creation of table `members`.
 * Has foreign keys to the tables:
 *
 * - `users`
 * - `families`
 */
class m181117_114519_create_members_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('members', [
            'userId' => $this->integer()->notNull()->unique(),
            'familyId' => $this->integer()->notNull(),
        ]);

        // creates index for column `userId`
        $this->createIndex(
            'idx-members-userId',
            'members',
            'userId'
        );

        // add foreign key for table `users`
        $this->addForeignKey(
            'fk-members-userId',
            'members',
            'userId',
            'users',
            'id',
            'CASCADE'
        );

        // creates index for column `familyId`
        $this->createIndex(
            'idx-members-familyId',
            'members',
            'familyId'
        );

        // add foreign key for table `families`
        $this->addForeignKey(
            'fk-members-familyId',
            'members',
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
            'fk-members-userId',
            'members'
        );

        // drops index for column `userId`
        $this->dropIndex(
            'idx-members-userId',
            'members'
        );

        // drops foreign key for table `families`
        $this->dropForeignKey(
            'fk-members-familyId',
            'members'
        );

        // drops index for column `familyId`
        $this->dropIndex(
            'idx-members-familyId',
            'members'
        );

        $this->dropTable('members');
    }
}
