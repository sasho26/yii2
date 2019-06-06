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

class NewProjectForm extends Model
{
    public $name;
    public $project_image;

    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'project_image' => 'Image'
        ];
    }
    public function rules() {
        return [
            [['name', 'project_image'], 'required'],
            ['name', 'string', 'length' => [3, 40]],
        ];
    }
    public function addNewProject() {
        $project = new Project();
        $post = Yii::$app->request->post();
        $project->setName($post['NewProjectForm']['name']);
        $project->setImage($post['NewProjectForm']['project_image']);
        $project->setUserId(Yii::$app->user->identity->getId());
        var_dump(Yii::$app->user->identity->getId());
        //$project->setImage('/images/users/default/default_image_avatar.png');
        return $project->save();
    }

}