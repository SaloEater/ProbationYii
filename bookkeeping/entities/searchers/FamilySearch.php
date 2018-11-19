<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 18.11.2018
 * Time: 10:02
 */

namespace bookkeeping\entities\searchers;

use bookkeeping\entities\Family;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class FamilySearch extends Family
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'ownerId'], 'integer'],
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
        $query = Family::find();
        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $this->load($params);
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        return $dataProvider;
    }
}