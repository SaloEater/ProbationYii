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
use yii\helpers\VarDumper;

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
            [['film_id', 'producer_id'], 'integer'],
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
        //Выбираем номера
        $query = ProducerFilms::find();

        $query->groupBy('producer_id');

        $query->andHaving('COUNT(producer_id) > 1');

        /**
         * Делаем выборку
         * @var ProducerFilms[] $producers
         */
        $producers = $query->all();

        $query = Producers::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!$this->validate()) {
            //uncomment the following line if you do not want to return any records when validation fails
            $query->where('0=1');
            return $dataProvider;
        }

        foreach ($producers as $producer) {
            $query->orFilterWhere([
               'id' => $producer->producer_id
            ]);
        }

        if (isset($params['ProducersSearch']) && isset($params['ProducersSearch']['name'])) {
            $query->andFilterWhere(['like', 'name', $params['ProducersSearch']['name']]);
        }

        return $dataProvider;
    }
}