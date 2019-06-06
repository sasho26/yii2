<?php
/**
 * Created by PhpStorm.
 * User: tag19
 * Date: 16.04.2019
 * Time: 8:58 PM
 */
use app\models\Project;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;
$this->title = Yii::t('app', 'Sprint');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-profile">
    <h1><?= HTML::encode($this->title) ?></h1>

<?php
echo DetailView::widget([
    'model' => $sprints,
    'attributes' => [
        [
            'label' => 'ID',
            'value' => $sprints->id,
        ],
        [
            'label' => 'Start Date',
            'value' => $sprints->start_date,
            'format' => 'date',
        ],
    ],
]);
$url = Yii::$app->getUrlManager()->createUrl(['/task/create','id' => $id]);
?>
</div>
<div class="div-kanban-title">
    <?= Html::a('Create new Task', $url, ['class' => 'btn btn-success btn-add-task']) ?>
    <p>Kanban board</p>
</div>
<div class="table-container">
<?php foreach ($statuses as $status) { ?>
<div id="<?= $status->id?>" class="table div1" ondragover="allowDraw(event)" ondrop="drop(event, this)">
    <p class="status-name"><?=$status->name?></p>
    <?php foreach ($tasks as $task) {
            if ($task->status_id == $status->id) { ?>
            <div id="task<?=$task->id?>" class="draggable ui-widget-content" draggable="true" ondragstart="drag(event)">
                <p class="num"><?= $task->id?></p><?= Html::a( $task->name, ['task/view', 'id'=>$task->id], ['draggable' => "false"]) ?>
            </div>
        <?php
            }
        }
    ?>
</div>
<?php }

?>
</div>
    <script>
        var arr = [];
        function allowDraw(ev) {
            ev.preventDefault();
        }
        function drag(ev) {
            ev.dataTransfer.setData("text", ev.target.id);
        }
        function drop(ev, block) {
            ev.preventDefault();
            var data = ev.dataTransfer.getData("text");
            var content = block.id;
            $.ajax({
                url: window.location.href,
                   type: 'POST',
                data: {
                    idt: data.substr(4),
                    idst: content,
                },
                success: function (data) {
                  console.log(data)
               }
            });
            if (block.id === "4") {
                console.log('EGDGdg');
            }
            block.appendChild(document.getElementById(data));

        }

    </script>
<?php
//$js = <<< JS
//    $(function() {
//        $( ".dragble" ).draggable();
//    });
//JS;
//$this->registerJs($js);
?>