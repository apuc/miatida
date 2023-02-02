<?php

namespace frontend\modules\cars\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\cars\models\Cars;

/**
 * CarsSearch represents the model behind the search form of `frontend\modules\cars\models\Cars`.
 */
class CarsSearch extends Cars
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'photo_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name','client_id','body_type_id'], 'safe'],
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
        $query = Cars::find();
        $query->leftJoin('clients', 'clients.id = cars.client_id')
            ->leftJoin('body_types', 'body_types.id = cars.body_type_id');


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
            'photo_id' => $this->photo_id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'cars.name', $this->name])
            ->andFilterWhere(['like', 'clients.name', $this->client_id])
            ->andFilterWhere(['like', 'body_types.name', $this->body_type_id]);

        return $dataProvider;
    }
}
//$query->andFilterWhere(['like', 'clients.name', $this->name])
//    ->andFilterWhere(['like', 'phone', $this->phone])
//    ->andFilterWhere(['like', 'additional_info', $this->additional_info])
//    ->andFilterWhere(['like', 'cars.name', $this->car_id]);