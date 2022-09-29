<?php

namespace frontend\modules\prices\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\prices\models\Prices;

/**
 * PricesSearch represents the model behind the search form of `frontend\modules\prices\models\Prices`.
 */
class PricesSearch extends Prices
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'services_id', 'tarif_id', 'body_type_id', 'price'], 'integer'],
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
        $query = Prices::find();

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
            'services_id' => $this->services_id,
            'tarif_id' => $this->tarif_id,
            'body_type_id' => $this->body_type_id,
            'price' => $this->price,
        ]);

        return $dataProvider;
    }
}
