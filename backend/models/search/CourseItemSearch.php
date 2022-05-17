<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\CourseItem;

/**
 * CourseItemSearch represents the model behind the search form of `backend\models\CourseItem`.
 */
class CourseItemSearch extends CourseItem
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'course_id'], 'integer'],
            [['title_uz', 'description_uz', 'created_at', 'updated_at', 'tag_uz', 'title_en', 'description_en', 'tag_en', 'video_link'], 'safe'],
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
        $query = CourseItem::find();

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
            'course_id' => $this->course_id,
        ]);

        if($this->created_at){
            $query
            ->andFilterWhere(['between', 'created_at', strtotime($this->created_at), strtotime($this->created_at)+24*3600]);  
        }

        $query->andFilterWhere(['like', 'title_uz', $this->title_uz])
            ->andFilterWhere(['like', 'description_uz', $this->description_uz])
            // ->andFilterWhere(['between', 'updated_at', strtotime($this->updated_at), strtotime($this->updated_at)+24*3600])
            ->andFilterWhere(['like', 'tag_uz', $this->tag_uz])
            ->andFilterWhere(['like', 'title_en', $this->title_en])
            ->andFilterWhere(['like', 'description_en', $this->description_en])
            ->andFilterWhere(['like', 'tag_en', $this->tag_en])
            ->andFilterWhere(['like', 'video_link', $this->video_link]);

        return $dataProvider;
        
    }
}
