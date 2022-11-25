<?php

namespace frontend\modules\washer\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\washer\models\Washer;

/**
 * WasherSearch represents the model behind the search form of `frontend\modules\washer\models\Washer`.
 */
class WasherSearch extends Washer
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'salary_percent', 'salary_exit'], 'integer'],
            [['image', 'phone', 'add_phone', 'date_birth', 'name', 'add_phone_owner'], 'safe'],
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
        $query = Washer::find();

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
            'user_id' => $this->user_id,
            'salary_percent' => $this->salary_percent,
            'add_phone_owner' => $this->add_phone_owner,
            'salary_exit' => $this->salary_exit,
            'name' => $this->name,
        ]);

        $query->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'add_phone', $this->add_phone])
            ->andFilterWhere(['like', 'date_birth', $this->date_birth]);

        return $dataProvider;
    }
}
