<?php

namespace frontend\controllers;

use backend\models\Enroll;
use backend\models\Like;
use frontend\models\Courses;
use common\models\Comment;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
                'only' => ['logout', 'signup', 'enroll', 'like', 'form-save'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout', 'enroll', 'like', 'form-save'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                    'enroll'=>['post'],
                    'like'=>['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Courses models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query'=>Courses::find()->andWhere(['status'=>1])->orderBy(['id'=>SORT_DESC]),
            'pagination'=>[
                'pageSize'=>12
            ]
        ]);
        $this->setMeta($dataProvider->getModels());
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Courses model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $comment = new Comment();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'comment'=>$comment
        ]);
    }

    public function actionEnroll($id){
        $course = $this->findModel($id);
        $user_id = Yii::$app->user->identity->id;
        $user_exist = Enroll::findOne(['user_id'=>$user_id]);
        if(!$user_exist){
            $enroll = new Enroll();
            $enroll->user_id = $user_id;
            $enroll->course_id = $id;
            $enroll->save();
        }
        return $this->renderAjax('enroll', compact('course'));
    }

    public function actionLike($id){
        $c = $this->findModel($id);
        $user_id = Yii::$app->user->identity->id;
        $user_exist = $c->getLikes()->andWhere(['user_id'=>$user_id])->one();
        if(!$user_exist){
            $like = new Like();
            $like->user_id = $user_id;
            $like->course_id = $id;
            $like->save();
        }else{
            $user_exist->delete();
        }
        return $this->renderAjax('like_button', compact('c'));
    }

    /**
     * Finds the Courses model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Courses the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Courses::find()->andWhere(['id' => $id, 'status'=>1])->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionFormSave()
{
    $courseId = Yii::$app->request->post('Comment')['course_id'];
    $user_id = Yii::$app->user->identity->id;
    $user_exist = Comment::find()->andWhere(['user_id'=>$user_id, 'course_id'=>$courseId])->one();
    
    if($user_exist){
        $user_exist->delete();
    }

    $model = new Comment();
    if(Yii::$app->request->isAjax){
        
        Yii::$app->response->format = 'json';  
        if ($model->load(Yii::$app->request->post())) {
            $model->user_id =  $user_id;
            if ($model->validate() && $model->save()) {
                return [
                        'success' => true,
                ];
            } else {
                return [
                        'success' => false,
                ];
            }
        }
    }
}

protected function setMeta($models){
    foreach($models as $model){
        $this->view->registerMetaTag([
            'name'=>'keywords',
            'content'=>$model->toArray()['tag_'.Yii::$app->language]
        ]);
        $this->view->registerMetaTag([
            'name'=>'description',
            'content'=>$model->toArray()['description_'.Yii::$app->language]
        ]);
    }
}


}
