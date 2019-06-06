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
use yii\grid\GridView;
use yii\helpers\html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

$this->title = Yii::t('app', 'Sprints');
$this->params['breadcrumbs'][] = $this->title;
?> <h1><?= HTML::encode($this->title) ?></h1>

<?php Pjax::begin(); ?>
<?=GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'start_date:date',
        ['attribute'=>'Project',
            'header'=>'Project',
            'value' => function ($model) {
                $name = Project::findOne($model['project_id'])->getName();
                return $name;
            }
        ],

        ['class' => 'yii\grid\ActionColumn',
            'header'=>'actions',
            'headerOptions' => ['width' => '60'],
            'template' => '{view}',
            //'buttons'=>[
            //    'view'=>//function($url, $model){
            //        $customurl=Yii::$app->getUrlManager()->createUrl(['project/view','id'=>$model['id']]); //$model->id для AR
            //        return \yii\helpers\Html::a( '<span class="glyphicon glyphicon-eye-open"></span>', $customurl,
            //            ['title' => Yii::t('yii', 'View'), 'data-pjax' => '0']);
            //    },],
        ],
    ]]);
?>
<?php Pjax::end(); ?>
<?php
$this->registerJs("
    $('.ajax-button').click(function(){
        $.ajax({
            type: 'POST',
            data: $('#form-new-sprint').serializeArray(),
        });
	});
	");

?>

<div class="form-new-sprint-class">
    <h1>New Sprint</h1>
    <?php $form = ActiveForm::begin(['options' => ['id' => 'form-new-sprint']]); ?>
    <?=$form->field($new_sprint_model, 'start_date');?>
    <?=$form->field($new_sprint_model, 'project_id')->label("Project");?>
    <?=Html::button('Add new sprint', ['class' => 'btn btn-success ajax-button']);?>
    <?php ActiveForm::end()?>
</div>