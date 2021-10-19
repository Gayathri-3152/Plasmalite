<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Requestdetails;

/**
 * RequestdetailsSearch represents the model behind the search form of `app\models\Requestdetails`.
 */
class RequestdetailsSearch extends Requestdetails
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['requestId', 'unitsNeeded', 'phoneNo', 'requestedBy', 'isAccepted'], 'integer'],
            [['bloodGroup', 'city', 'state', 'dateAndTime', 'acceptedTime'], 'safe'],
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
        $query = Requestdetails::find();

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
            'requestId' => $this->requestId,
            'unitsNeeded' => $this->unitsNeeded,
            'phoneNo' => $this->phoneNo,
            'requestedBy' => $this->requestedBy,
            'dateAndTime' => $this->dateAndTime,
            'isAccepted' => $this->isAccepted,
            'acceptedTime' => $this->acceptedTime,
        ]);

        $query->andFilterWhere(['like', 'bloodGroup', $this->bloodGroup])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'state', $this->state]);

        return $dataProvider;
    }
}
