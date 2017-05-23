<?php

namespace frontend\models\wedu\resources;

use Yii;
use frontend\models\base\SignIn as BaseSignIn;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "sign_in".
 */
class SignIn extends BaseSignIn
{

public function behaviors()
    {
        return ArrayHelper::merge(
            parent::behaviors(),
            [
                # custom behaviors
            ]
        );
    }

    public function rules()
    {
        return ArrayHelper::merge(
             parent::rules(),
             [
                  # custom validation rules
             ]
        );
    }

    public function batch_add($params){
       $data = [];
       if(empty($params)){
           $data['error'][] = '数据不能为空';
        }
        foreach ($params['SignIn'] as $key => $value) {
            $model = new $this;
            $value['school_id'] = $params['school_id'];
            $value['course_id'] = $params['course_id'];
            $value['grade_id'] = $params['grade_id'];
            $model->load($value,'');
            $model->save();
            if($model->getErrors()){
              $data['error'][$key] = $model->getErrors();
            }else{
              $data['message'][$key] = $model;
            }
        }
        return $data;
    }

    public function details($id){
      $model = self::find()
        ->where(['signin_id'=>$id])
        ->with([
          'courseOrder'=>function($model){
              $model->select(['SUM(total_course + presented_course) as course_count','created_at'])
              ->orderBy(['created_at'=>'SORT_DESC']);
          },
          'signIns'=>function($model){
              $model->select(["count(signin_id) as above_course"]);
          },
          'grade'=>function($model){
            $model->select(['grade_name']);
          },
          'school'=>function($model){
              $model->select(['school_title']);
          },
          'user'=>function($model){
             $model->select(['username','id','realname','phone_number']);
             $model->with('userProfile');
        }])
        ->asArray()->one();
        $data = [];
        if($model){
           $data = [
              'signin_id'     => (int)$model['signin_id'],
              'school_id'     => (int)$model['school_id'],
              'school_title'  => $model['school']['school_title'],
              'grade_id'      => (int)$model['grade_id'],
              'grade_name'    => $model['grade']['grade_name'],
              'course_id'     => (int)$model['course_id'],
              'student_id'    => (int)$model['student_id'],
              'realname'      => $model['user']['realname'],
              'username'      => $model['user']['username'],
              'gender'        => $model['user']['userProfile']['gender'],
              'course_count'  => (int)$model['courseOrder']['course_count'],
              'above_course'  => (int)$model['signIns']['above_course'],
              'remaining_courses'=> (int)$model['courseOrder']['course_count'] -(int)$model['signIns']['above_course'],
              'created_at'    => $model['courseOrder']['created_at'],
              'phone_number'  => $model['user']['phone_number'],
          ];
        }
        return $data;
    }

}
