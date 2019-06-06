<?php
/**
 * Created by PhpStorm.
 * User: tag19
 * Date: 10.04.2019
 * Time: 1:18 AM
 */
use app\models\Sprint;
use app\models\SprintSearch;
use app\models\Project;
use app\models\Status;
use yii\grid\GridView;
use yii\helpers\html;
$this->title = Yii::t('app', 'Tasks');
$this->params['breadcrumbs'][] = $this->title;
?> <h1><?= HTML::encode($this->title) ?></h1>
<?php
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id:integer',
        'name:text',
        'description:text',
        'start_date:date',
        'estimate_date:date',
        'used_time:date',
        ['attribute' => 'Status',
        'format'=> 'raw',
        'value'=> function ($model) {
                        $name = Status::findOne($model['status_id'])->getName();
                        return $name;
                    }
        ]
    ],
]);

//echo GridView::widget([
//    'dataProvider' => $dataProvider,
//    'columns' => [
//        'id:integer',
//        ['attribute'=>Project::findOne(0),
//            'header'=>'project',
//            'value' => function ($model) {
//                $name = Project::findOne($model['project_id'])->getName();
//                return $name;
//            }
//        ],
//
//        ['class' => 'yii\grid\ActionColumn',
//            'header'=>'actions',
//            'headerOptions' => ['width' => '60'],
            //'buttons'=>[
            //    'view'=>//function($url, $model){
            //        $customurl=Yii::$app->getUrlManager()->createUrl(['project/view','id'=>$model['id']]); //$model->id для AR
            //        return \yii\helpers\Html::a( '<span class="glyphicon glyphicon-eye-open"></span>', $customurl,
            //            ['title' => Yii::t('yii', 'View'), 'data-pjax' => '0']);
            //    },],
//        ],
//    ]]);
?>