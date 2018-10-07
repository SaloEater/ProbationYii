<?php

use yii\db\Migration;

/**
 * Class m181007_150547_fillDefaultFilms
 */
class m181007_150547_fillDefaultFilms extends Migration
{
    /**
     * {@inheritdoc}
     */
    private $content = ['Тор: Рагнарёк', 'Человек-паук: Возвращение домой', 'Невероятный Халк', 'Человек-муравей и Оса',
                    'Железный человек'];
    private $years = [2013, 2016, 2008, 2017, 2013];
    public function safeUp()
    {
        foreach ($this->content as $key => $film) {
            $this->insert(
                'films',
                [
                    'name' => $film,
                    'year' => $this->years[$key]]
            );
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        foreach ($this->content as $key => $film) {
            $this->delete(
                'films',
                [
                    'name' => $film,
                    'year' => $this->years[$key]]
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
        echo "m181007_150547_fillDefaultFilms cannot be reverted.\n";

        return false;
    }
    */
}
