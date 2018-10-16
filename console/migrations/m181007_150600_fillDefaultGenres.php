<?php

use yii\db\Migration;

/**
 * Class m181007_150600_fillDefaultGenres
 */
class m181007_150600_fillDefaultGenres extends Migration
{
    /**
     * {@inheritdoc}
     */
    private $content = ['Superhero', 'Sci-fi', 'Action', 'Adventure', 'Comedy'];

    public function safeUp()
    {
        foreach ($this->content as $genre) {
            $this->insert(
                'genres',
                [
                    'name' => $genre,
                ]
            );
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        foreach ($this->content as $genre) {
            $this->delete(
                'genres',
                [
                    'name' => $genre,
                ]
            );
        }
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181007_150600_fillDefaultGenres cannot be reverted.\n";

        return false;
    }
    */
}
