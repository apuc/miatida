<?php

namespace frontend\modules\cashBox\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\cashBox\models\CashBox;

/**
 * CashBoxSearch represents the model behind the search form of `frontend\modules\cashBox\models\CashBox`.
 */
class CashBoxSearch extends CashBox
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'date', 'revenue'], 'integer'],
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
        $query = CashBox::find();

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
            'date' => $this->date,
            'revenue' => $this->revenue,
        ]);

        return $dataProvider;
    }
}
