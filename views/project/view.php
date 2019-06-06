<?php
/**
 * Created by PhpStorm.
 * User: tag19
 * Date: 10.04.2019
 * Time: 12:56 AM
 */

use app\models\Project;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;
$this->title = Yii::t('app', 'Project');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="user-profile">

    <h1><?= HTML::encode($this->title) ?></h1>

<?php
echo DetailView::widget([
    'model' => $project,
    'attributes' => [
        [
            'label' => 'name',
            'value' => $project->name,
        ],
        [
            'label' => 'image',
            'value' => $project->project_image,
            'format' => ['image',['width'=>'100','height'=>'100']],
        ],
    ],
]);
?>
<h1> Project sprints</h1>
<?php
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
               'attribute'=>'id',
               'format' => 'integer',
               'header'=>'ID',

            ],
            [
                'attribute'=>'start_date',
                'format' => 'date',
                'header'=>'Start Date',

            ],
        ],
    ]);
?>

</div>
