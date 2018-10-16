<?php

use yii\db\Migration;

/**
 * Class m181010_084039_fillDefaultFilmsNProducers
 */
class m181010_084039_fillDefaultproducer_n_films extends Migration
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
                'producer_n_films',
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
                'producer_n_films',
                [
                    'film_id' => $item[0],
                    'producer_id' => $item[1],
                ]
            );
        }
    }
}
