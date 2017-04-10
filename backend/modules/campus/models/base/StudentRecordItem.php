<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace backend\modules\campus\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base-model class for table "student_record_item".
 *
 * @property integer $student_record_item_id
 * @property integer $student_record_title_id
 * @property integer $student_record_id
 * @property string $body
 * @property integer $status
 * @property integer $sort
 * @property integer $updated_at
 * @property integer $created_at
 * @property string $aliasModel
 */
abstract class StudentRecordItem extends \yii\db\ActiveRecord
{


     /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        //return \Yii::$app->modules['campus']->get('campus');
        return Yii::$app->get('campus');
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student_record_item';
    }


    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_record_title_id', 'student_record_id', 'body'], 'required'],
            [['student_record_title_id', 'student_record_id', 'status', 'sort'], 'integer'],
            [['body'], 'string', 'max' => 1024]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'student_record_item_id' => Yii::t('common', '自增ID'),
            'student_record_title_id' => Yii::t('common', '标题ID'),
            'student_record_id' => Yii::t('common', '学员档案ID'),
            'body' => Yii::t('common', '学员档案条目描述'),
            'status' => Yii::t('common', '1：正常；0标记删除；2待审核；'),
            'sort' => Yii::t('common', '默认与排序'),
            'updated_at' => Yii::t('common', 'Updated At'),
            'created_at' => Yii::t('common', 'Created At'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return array_merge(parent::attributeHints(), [
            'student_record_item_id' => Yii::t('common', '自增ID'),
            'student_record_title_id' => Yii::t('common', '标题ID'),
            'student_record_id' => Yii::t('common', '学员档案ID'),
            'body' => Yii::t('common', '学员档案条目描述'),
            'status' => Yii::t('common', '1：正常；0标记删除；2待审核；'),
            'sort' => Yii::t('common', '默认与排序'),
        ]);
    }


    
    /**
     * @inheritdoc
     * @return \backend\modules\campus\models\query\StudentRecordItemQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\modules\campus\models\query\StudentRecordItemQuery(get_called_class());
    }


}
