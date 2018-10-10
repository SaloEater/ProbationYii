<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 10.10.2018
 * Time: 12:06
 */

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * FilmsSearch represents the model behind the search form of `common\models\Films`.
 */
class ProducerFilmsSearch extends ProducerFilms
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'film_id', 'producer_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        // add conditions that should always apply here

        $this->load($params);

        //Выбираем номера
        $query = ProducerFilms::find();

        $query->groupBy('producer_id');

        $query->andHaving('COUNT(producer_id) > 1');

        /*
         * @var $result Producers[]
         */
        $result = $query->all();
        //Выбираем имена по номерам
        $query = Producers::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id
        ]);

        foreach ($result as $record) {
            $query->orFilterWhere([
               'id' => $record->attributes['producer_id']
            ]);
        }

        return $dataProvider;
    }
}