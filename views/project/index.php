<?php
/**
 * Created by PhpStorm.
 * User: tag19
 * Date: 12.03.2019
 * Time: 8:26 PM
 */
//\app\controllers\debug($model);
use app\models\Project;
use app\models\ProjectSearch;
use app\models\User;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\widgets\Pjax;

$this->title = Yii::t('app', 'Projects');
$this->params['breadcrumbs'][] = $this->title;
?>
<h1> Projects </h1>
<?php Pjax::begin(); ?>
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'name:ntext',
            ['attribute'=>'user_id',
                'header'=>'creator',
                'value' => function ($model) {
                    $name = User::findOne(Yii::$app->user->identity->getId())->getName();
                    return $name;
                }
            ],
            ['class'=>\yii\grid\DataColumn::className(),
                'attribute'=>'project_image',
                'format'=>'image',
                'header'=> 'icon',
                'headerOptions' => ['width' => '20'],],

            ['class' => 'yii\grid\ActionColumn',
                'header'=>'actions',
                'headerOptions' => ['width' => '60'],
                'buttons'=>[
                'view'=>function($url, $model){
                $customurl=Yii::$app->getUrlManager()->createUrl(['project/view','id'=>$model['id']]); //$model->id для AR
                return \yii\helpers\Html::a( '<span class="glyphicon glyphicon-eye-open"></span>', $customurl,
                    ['title' => Yii::t('yii', 'View'), 'data-pjax' => '0']);
                },
                'update'=>function($url, $model){
                $customurl=Yii::$app->getUrlManager()->createUrl(['task/index','id' => $model['id']]); //$model->id для AR
                return \yii\helpers\Html::a( '<span class="glyphicon glyphicon-copy"></span>', $customurl,
                ['title' => Yii::t('yii', 'Tasks'), 'data-pjax' => '0']);
                },],

            ],
    ]]);
?>
<?php Pjax::end(); ?>


<?php
$this->registerJs("
    $('.ajax-button').click(function(){
        $.ajax({
            url: window.location.href,
            type: 'POST',
            data: $('.form-new-project-class #form-new-project').serializeArray(),
            success: function () {

            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                console.log('error');
            }
        });
        return false;
	});
	");

?>

<div class="form-new-project-class">
    <h1>New Project</h1>
<?php $form = ActiveForm::begin(['options' => ['id' => 'form-new-project']]); ?>
<?=$form->field($new_project_model, 'name')->label("Name");?>
<?=$form->field($new_project_model, 'project_image')->label("Image");?>
<?=Html::button('Add new project', ['class' => 'btn btn-success ajax-button']);?>
<?php ActiveForm::end()?>
</div>

