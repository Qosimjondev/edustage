<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Events;

/**
 * EventsSearch represents the model behind the search form of `common\models\Events`.
 */
class EventsSearch extends Events
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['title', 'content', 'event_date', 'start_time', 'end_time', 'place'], 'safe'],
        ];
    }

    // public function rules()
    // {
    //     return [
    //         ['title', 'string'],
    //     ];
    // }

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
        $query = Events::find();

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
        // $query->andFilterWhere([
        //     'id' => $this->id,
        //     'status' => $this->status,
        // ]);

        $query->orFilterWhere(['like', 'title', $this->title])
        ->orFilterWhere(['like', 'content', $this->title])
        ->orFilterWhere(['like', 'place', $this->title]);
        
            // ->andFilterWhere(['like', 'content', $this->content])
            // ->andFilterWhere(['like', 'event_date', $this->event_date])
            // ->andFilterWhere(['like', 'start_time', $this->start_time])
            // ->andFilterWhere(['like', 'end_time', $this->end_time])
            // ->andFilterWhere(['like', 'place', $this->place]);

        return $dataProvider;
    }
}
