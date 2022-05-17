<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Courses;

/**
 * CoursesSearch represents the model behind the search form of `backend\models\Courses`.
 */
class CoursesSearch extends Courses
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'mentor_id', 'status', 'category_id'], 'integer'],
            [['title_uz', 'description_uz', 'tag_uz', 'title_en', 'created_at', 'description_en', 'tag_en', 'poster'], 'safe'],
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
        $query = Courses::find();

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
            'mentor_id' => $this->mentor_id,
            'status' => $this->status,
            'category_id' => $this->category_id,
        ]);

        if($this->created_at){
            $query
            ->andFilterWhere(['between', 'created_at', strtotime($this->created_at), strtotime($this->created_at)+24*3600]);  
        }

        $query->andFilterWhere(['like', 'title_uz', $this->title_uz])
            ->andFilterWhere(['like', 'description_uz', $this->description_uz])
            ->andFilterWhere(['like', 'tag_uz', $this->tag_uz])
            ->andFilterWhere(['like', 'title_en', $this->title_en])
            ->andFilterWhere(['like', 'description_en', $this->description_en])
            ->andFilterWhere(['like', 'tag_en', $this->tag_en])
            ->andFilterWhere(['like', 'poster', $this->poster]);

        return $dataProvider;
    }
}
