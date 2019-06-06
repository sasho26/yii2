<?php
/**
 * Created by PhpStorm.
 * User: tag19
 * Date: 12.03.2019
 * Time: 8:13 PM
 */

namespace app\controllers;

use app\models\NewProjectForm;
use app\models\ProjectSearch;
use app\models\Sprint;
use app\models\SprintSearch;
use Yii;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Project;


class ProjectController extends AppController
{
    public function actionIndex()
    {
        $new_project_model = new NewProjectForm();

        $projects = Project::find()->all();
        $this->view->title = 'Projects';
        $this->layout = 'custom';
        $searchModel = new ProjectSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if (Yii::$app->request->isAjax){
            $new_project_model->addNewProject();
            return $this->renderAjax('index', ['searchModel' => $searchModel, 'dataProvider' => $dataProvider, 'new_project_model' => $new_project_model]);
        }
        return $this->render('index', ['searchModel' => $searchModel, 'dataProvider' => $dataProvider, 'projects' => $projects, 'new_project_model' => $new_project_model]);
    }
    public function actionView($id)
    {
        $project = Project::findOne($id);
        //$sprints = Sprint::findBySql("SELECT id, start_date, project_id FROM Sprint WHERE project_id=".$id);
        $searchModel = new SprintSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(["project_id" => $id]);
        $this->layout = 'custom';
        return $this->render('view',[
            'project'=>$project, 'dataProvider'=>$dataProvider
        ]);
    }
}