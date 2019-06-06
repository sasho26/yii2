<?php
/**
 * Created by PhpStorm.
 * User: tag19
 * Date: 24.04.2019
 * Time: 7:50 PM
 */

namespace app\models;


use Yii;
use yii\base\Model;

class NewSprintForm extends Model
{
    public $start_date;
    public $project_id;

    public function attributeLabels()
    {
        return [
            'start_date' => 'Date',
            'project_id' => 'Project'
        ];
    }
    public function rules() {
        return [
            [['start_date'], 'safe'],
            ['project_id', 'integer']
        ];
    }
    public function addNewSprint() {
        $sprint = new Sprint();
        $post = Yii::$app->request->post();
        $sprint->setStartDate($post['NewSprintForm']['start_date']);
        $sprint->setProjectId($post['NewSprintForm']['project_id']);

        //$project->setImage('/images/users/default/default_image_avatar.png');
        if (!$sprint->save()) {
            var_dump($sprint->getErrors());
            die('Error');
        }
        return '';
    }

}