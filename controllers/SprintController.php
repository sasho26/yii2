<?php
/**
 * Created by PhpStorm.
 * User: tag19
 * Date: 10.04.2019
 * Time: 1:19 AM
 */

namespace app\controllers;


use app\models\NewSprintForm;
use app\models\Sprint;
use app\models\SprintSearch;
use app\models\Status;
use app\models\Task;
use Yii;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

class SprintController extends Controller
{
//    public function beforeAction($action) {
//        $this->enableCsrfValidation = false;
//        try {
//            return parent::beforeAction($action);
//        } catch (BadRequestHttpException $e) {
//        }
//    }

    public function actionIndex()
    {
        $new_sprint_model = new NewSprintForm();
        $searchModel = new SprintSearch();
        $this->layout = 'custom2';
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if (Yii::$app->request->isAjax) {
            $new_sprint_model->addNewSprint();
            return '';
        }
        return $this->render('index',['searchModel' => $searchModel, 'dataProvider' => $dataProvider, 'new_sprint_model' => $new_sprint_model]);
    }
    public function actionView($id)
    {

        $sprint = Sprint::findOne($id);
        $statuses = Status::find()->all();
        $tasks = Task::find()->where(['sprint_id' => $id])->all();

        if (Yii::$app->request->isAjax){

            $post = Yii::$app->request->post();
            $model = Task::findOne($post['idt']);
            $model->status_id = $post['idst'];
            if (!$model->save()) {
                var_dump($model->getErrors());
                die('error');
            }

        }
        return $this->render('view',['sprints' => $sprint, 'statuses'=> $statuses, 'tasks'=> $tasks, 'id'=>$id]);
    }
}