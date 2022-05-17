<?php

namespace frontend\modules\admin\controllers;

use frontend\models\CourseItem;
use frontend\models\Courses;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class SiteController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'view'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    public function actionIndex()
    {
        $courses = Courses::find()->andWhere(['status'=>1])->orderBy(['id'=>SORT_DESC])->asArray()->all();
        
        return $this->render('index', [
        'courses'=>$courses
    ]);
    }

    public function actionView($id, $item=1){
        $courseItem = CourseItem::find()->andWhere(['status'=>1, 'course_id'=>$id, 'id'=>$item])->asArray()->one();
        $courseItems = CourseItem::find()->andWhere(['status'=>1, 'course_id'=>$id])->andWhere(['!=', 'id', $item])->asArray()->all();
        return $this->render('view', compact('courseItem', 'courseItems'));
    }
}
