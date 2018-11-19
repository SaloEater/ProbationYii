<?php

use yii\db\Migration;

/**
 * Handles the creation of table `invites`.
 * Has foreign keys to the tables:
 *
 * - `families`
 */
class m181117_114322_create_invites_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('invites', [
            'familyId' => $this->integer()->notNull()->unique(),
            'secret' => $this->text(),
            'createdAt' => $this->integer(),
        ]);

        // creates index for column `familyId`
        $this->createIndex(
            'idx-invites-familyId',
            'invites',
            'familyId'
        );

        // add foreign key for table `families`
        $this->addForeignKey(
            'fk-invites-familyId',
            'invites',
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
        // drops foreign key for table `families`
        $this->dropForeignKey(
            'fk-invites-familyId',
            'invites'
        );

        // drops index for column `familyId`
        $this->dropIndex(
            'idx-invites-familyId',
            'invites'
        );

        $this->dropTable('invites');
    }
}
