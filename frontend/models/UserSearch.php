<?php

namespace frontend\models;

use common\models\User;
use yii\data\ActiveDataProvider;

class UserSearch extends \andrewdanilov\adminpanel\models\UserSearch
{
    /**
     * @var mixed|null
     */

    public function rules()
    {
        $rules = parent::rules();
        $rules[] = [['phone'], 'safe'];
        return $rules;
    }

    public function search($params)
    {
        $query = \common\models\User::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
            'is_admin' => $this->is_admin,
            'phone' => $this->phone,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }


}