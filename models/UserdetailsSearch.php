<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Userdetails;

/**
 * UserdetailsSearch represents the model behind the search form of `app\models\Userdetails`.
 */
class UserdetailsSearch extends Userdetails
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userId', 'adminId', 'phoneNo', 'eligibility', 'willingness', 'isActive'], 'integer'],
            [['name', 'userName', 'password', 'emailId', 'bloodGroup', 'dob', 'state', 'city', 'createdTime'], 'safe'],
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
        $query = Userdetails::find();

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
            'userId' => $this->userId,
            'adminId' => $this->adminId,
            'phoneNo' => $this->phoneNo,
            'dob' => $this->dob,
            'eligibility' => $this->eligibility,
            'willingness' => $this->willingness,
            'isActive' => $this->isActive,
            'createdTime' => $this->createdTime,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'userName', $this->userName])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'emailId', $this->emailId])
            ->andFilterWhere(['like', 'bloodGroup', $this->bloodGroup])
            ->andFilterWhere(['like', 'state', $this->state])
            ->andFilterWhere(['like', 'city', $this->city]);

        return $dataProvider;
    }
}
