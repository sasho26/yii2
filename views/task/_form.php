<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Status */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="status-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'name')->textInput() ?>
    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'start_date')->widget(
        \yii\widgets\MaskedInput::className(), [
            'mask' => "1-2-y h:s",
            'clientOptions' => [
                'alias' => 'datetime',
                "placeholder" => "dd-mm-yyyy hh:mm",
                "separator" => "-"
            ]
        ]
    ); ?>
    <?= $form->field($model, 'estimate_date')->widget(
        \yii\widgets\MaskedInput::className(), [
            'mask' => "h",
            'clientOptions' => [
                'alias' => 'datetime',
                "placeholder" => "hh",
                "separator" => "-"
            ]
        ]
    ); ?>
    <?= $form->field($model, 'used_time')->textInput() ?>
    <?= $form->field($model, 'status_id')->dropDownList([
        '1' => 'To do',
        '2' => 'In progress',
        '3' => 'To verify',
        '4' => 'Done',

    ]);?>
    <?= $form->field($model, 'priority_id')->dropDownList([
    '1' => 'High',
    '2' => 'Major',
    '3' => 'Medium',
    '4' => 'Low',
    '5' => 'Minor',
    
]);?>
    <?= $form->field($model, 'sprint_id')->textInput((['readonly' => true, 'value' => $id]))?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
