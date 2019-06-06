<?php
/**
 * Created by PhpStorm.
 * User: tag19
 * Date: 22.04.2019
 * Time: 8:55 PM
 */

namespace app\controllers;


use app\models\Task;
use app\models\TaskSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class TaskController extends Controller
{
    public function actionIndex()
    {
        $searchModel = new TaskSearch();
        $this->layout = 'custom2';
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index',['searchModel' => $searchModel, 'dataProvider' => $dataProvider]);
//
    }
    public function actionCreate($id)
    {
        $model = new Task();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'id' => $id,
        ]);
    }

    public function actionView($id)
    {
        $tasks = Task::findOne($id);
        return $this->render('view',['tasks'=> $tasks]);
    }

    protected function findModel($id)
    {
        if (($model = Status::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}