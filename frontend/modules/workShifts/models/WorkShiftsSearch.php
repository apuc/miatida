<?php

namespace frontend\modules\workShifts\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\workShifts\models\WorkShifts;

/**
 * WorkShiftsSearch represents the model behind the search form of `frontend\modules\work-shifts\models\WorkShifts`.
 */
class WorkShiftsSearch extends WorkShifts
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'date'], 'integer'],
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
        $query = WorkShifts::find();

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
        ]);

        return $dataProvider;
    }
}
