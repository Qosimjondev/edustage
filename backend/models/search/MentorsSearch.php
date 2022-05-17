<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Mentors;

/**
 * MentorsSearch represents the model behind the search form of `backend\models\Mentors`.
 */
class MentorsSearch extends Mentors
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['fullname', 'job_uz', 'created_at', 'job_en', 'experience_uz', 'experience_en', 'facebook', 'twitter', 'linkedin', 'pinterest', 'img'], 'safe'],
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
        $query = Mentors::find();

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
            'status' => $this->status,
        ]);

        if($this->created_at){
            $query
            ->andFilterWhere(['between', 'created_at', strtotime($this->created_at), strtotime($this->created_at)+24*3600]);  
        }

        $query->andFilterWhere(['like', 'fullname', $this->fullname])
            ->andFilterWhere(['like', 'job_uz', $this->job_uz])
            ->andFilterWhere(['like', 'job_en', $this->job_en])
            ->andFilterWhere(['like', 'experience_uz', $this->experience_uz])
            ->andFilterWhere(['like', 'experience_en', $this->experience_en])
            ->andFilterWhere(['like', 'facebook', $this->facebook])
            ->andFilterWhere(['like', 'twitter', $this->twitter])
            ->andFilterWhere(['like', 'linkedin', $this->linkedin])
            ->andFilterWhere(['like', 'pinterest', $this->pinterest])
            ->andFilterWhere(['like', 'img', $this->img]);

        return $dataProvider;
    }
}
