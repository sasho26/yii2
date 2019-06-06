<?php
/**
 * Created by PhpStorm.
 * User: tag19
 * Date: 25.04.2019
 * Time: 12:54 AM
 */
use yii\helpers\Html;
use yii\widgets\DetailView;
$this->title = Yii::t('app', 'Task');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-profile">
    <h1><?= HTML::encode($this->title) ?></h1>
    <?php
    echo DetailView::widget([
        'model' => $tasks,
        'attributes' => [
            [
                'label' => 'Name',
                'value' => $tasks->name,
            ],
            [
                'label' => 'Description',
                'value' => $tasks->description,
            ],
            [
                'label' => 'Start date',
                'value' => $tasks->start_date,
            ],
            [
                'label' => 'Estimate date',
                'value' => $tasks->estimate_date,
            ],
        ],
    ]);
    ?>
</div>