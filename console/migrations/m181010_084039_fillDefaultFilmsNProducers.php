<?php

use yii\db\Migration;

/**
 * Class m181010_084039_fillDefaultFilmsNProducers
 */
class m181010_084039_fillDefaultFilmsNProducers extends Migration
{
    private $content = [
        [1, 1],
        [2, 1],
        [3, 3],
        [4, 2],
        [5, 2],
    ];

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        foreach ($this->content as $item) {
            $this->insert(
                'filmNproducers',
                [
                    'film_id' => $item[0],
                    'producer_id' => $item[1],
                ]
            );
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        foreach ($this->content as $item) {
            $this->delete(
                'filmNproducers',
                [
                    'film_id' => $item[0],
                    'producer_id' => $item[1],
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
        echo "m181010_084039_fillDefaultFilmsNProducers cannot be reverted.\n";

        return false;
    }
    */
}
