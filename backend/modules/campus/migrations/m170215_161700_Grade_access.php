<?php

use yii\db\Migration;

class m170215_161700_Grade_access extends Migration
{
    /**
     * @var array controller all actions
     */
    public $permisions = [
        "index" => [
            "name" => "campus_grade_index",
            "description" => "campus/grade/index"
        ],
        "view" => [
            "name" => "campus_grade_view",
            "description" => "campus/grade/view"
        ],
        "create" => [
            "name" => "campus_grade_create",
            "description" => "campus/grade/create"
        ],
        "update" => [
            "name" => "campus_grade_update",
            "description" => "campus/grade/update"
        ],
        "delete" => [
            "name" => "campus_grade_delete",
            "description" => "campus/grade/delete"
        ]
    ];
    
    /**
     * @var array roles and maping to actions/permisions
     */
    public $roles = [
        "CampusGradeFull" => [
            "index",
            "view",
            "create",
            "update",
            "delete"
        ],
        "CampusGradeView" => [
            "index",
            "view"
        ],
        "CampusGradeEdit" => [
            "update",
            "create",
            "delete"
        ]
    ];
    
    public function up()
    {
        
        $permisions = [];
        $auth = \Yii::$app->authManager;

        /**
         * create permisions for each controller action
         */
        foreach ($this->permisions as $action => $permission) {
            $permisions[$action] = $auth->createPermission($permission['name']);
            $permisions[$action]->description = $permission['description'];
            $auth->add($permisions[$action]);
        }

        /**
         *  create roles
         */
        foreach ($this->roles as $roleName => $actions) {
            $role = $auth->createRole($roleName);
            $auth->add($role);

            /**
             *  to role assign permissions
             */
            foreach ($actions as $action) {
                $auth->addChild($role, $permisions[$action]);
            }
        }
    }

    public function down() {
        $auth = Yii::$app->authManager;

        foreach ($this->roles as $roleName => $actions) {
            $role = $auth->createRole($roleName);
            $auth->remove($role);
        }

        foreach ($this->permisions as $permission) {
            $authItem = $auth->createPermission($permission['name']);
            $auth->remove($authItem);
        }
    }
}