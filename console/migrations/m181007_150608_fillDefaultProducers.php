<?php

use yii\db\Migration;

/**
 * Class m181007_150608_fillDefaultProducers
 */
class m181007_150608_fillDefaultProducers extends Migration
{
    /**
     * {@inheritdoc}
     */

    /*
     * @var $content array[]
     */
    private $content = ['Кевин Файги', 'Эми Паскаль', 'Гейл Энн Хёрд', 'Ави Арад', 'Стивен Бруссар'];

    public function safeUp()
    {
        foreach ($this->content as $prod) {
            $this->insert(
                'producers',
                [
                    'name' => $prod]
            );
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        foreach ($this->content as $prod) {
            $this->delete(
                'producers',
                [
                    'name' => $prod]
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
        echo "m181007_150608_fillDefaultProducers cannot be reverted.\n";

        return false;
    }
    */
}
