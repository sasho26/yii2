<?php
use yii\helpers\Html;
/**
 * Created by PhpStorm.
 * User: tag19
 * Date: 01.05.2019
 * Time: 7:59 PM
 */
$this->title = 'Create Task';
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="roles-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model, 'id'=> $id
    ]) ?>

</div>