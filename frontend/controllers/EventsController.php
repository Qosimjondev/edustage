<?php

namespace frontend\controllers;

use frontend\models\Events;
use Yii;
use yii\data\ActiveDataProvider;

class EventsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        
        $query = Events::find()->andWhere(['status'=>1]);
        
        $dataProvider = new ActiveDataProvider([
            'query'=>$query,
            'pagination'=>[
                'pageSize'=>5,
            ],
            'sort'=>[
                'defaultOrder' => ['id' => SORT_DESC]
            ]

            ]);
        return $this->render('index', [
            'dataProvider'=>$dataProvider,
        ]);
    }

    public function actionView($id)
    {

        $event = Events::findOne($id);
        $event->views +=1;
        $event->update(); 
        $events = Events::find()->andWhere(['status'=>1])->andWhere(['!=', 'id', $id])->asArray()->orderBy(['id'=>SORT_DESC])->limit(6)->all();
        return $this->render('view', compact('event', 'events'));
    }

}
