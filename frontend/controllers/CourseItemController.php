<?php

namespace frontend\controllers;

use backend\models\Enroll;
use frontend\models\CourseItem;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

/**
 * CoursesController implements the CRUD actions for Courses model.
 */
class CoursesController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout', 'signup', 'index'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout', 'index'],
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

    /**
     * Lists all Courses models.
     *
     * @return string
     */
    public function actionIndex($courseId, $id = 1)
    {
        $userId = Yii::$app->user->identity->id;
        $user = Enroll::findOne(['user_id' => $userId, 'course_id' => $courseId]);
        if ($user) {
            $courseItem = $this->findModel($courseId)->andWhere(['id' => $id])->one();
            $courseItems = $this->findModel($courseId)->andWhere(['!=', 'id', $id])->all();
            return $this->render('index', compact('courseItem', 'courseItems'));
        }else{
            return new ForbiddenHttpException('Bu kursdan ro\'yhatdan o\'tilmagan!');
        }
    }


    /**
     * Finds the Courses model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Courses the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($courseId)
    {
        if (($model = CourseItem::find()->andWhere(['status' => 1, 'course_id' => $courseId])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
