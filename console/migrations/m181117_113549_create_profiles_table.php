<?php

use yii\db\Migration;

/**
 * Handles the creation of table `profiles`.
 * Has foreign keys to the tables:
 *
 * - `users`
 */
class m181117_113549_create_profiles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('profiles', [
            'userId' => $this->integer()->notNull()->unique(),
            'surname' => $this->text(),
            'name' => $this->text(),
        ]);

        // creates index for column `userId`
        $this->createIndex(
            'idx-profiles-userId',
            'profiles',
            'userId'
        );

        // add foreign key for table `users`
        $this->addForeignKey(
            'fk-profiles-userId',
            'profiles',
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
            'fk-profiles-userId',
            'profiles'
        );

        // drops index for column `userId`
        $this->dropIndex(
            'idx-profiles-userId',
            'profiles'
        );

        $this->dropTable('profiles');
    }
}
