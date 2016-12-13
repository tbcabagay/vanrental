<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%testimonial}}".
 *
 * @property integer $id
 * @property string $email
 * @property string $name
 * @property string $organization
 * @property string $content
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Testimonial extends \yii\db\ActiveRecord
{
    const SCENARIO_INSERT = 'insert';
    const SCENARIO_TOGGLE_STATUS = 'toggle_status';

    const STATUS_NEW = 5;
    const STATUS_APPROVE = 10;
    const STATUS_DELETE = 15;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%testimonial}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'name', 'organization', 'content', 'status', 'created_at', 'updated_at'], 'required'],
            [['content'], 'string'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['email'], 'string', 'max' => 255],
            [['name'], 'string', 'max' => 150],
            [['organization'], 'string', 'max' => 100],
            [['email'], 'email'],
            [['email', 'name', 'organization', 'content'], 'trim'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'email' => Yii::t('app', 'Email'),
            'name' => Yii::t('app', 'Name'),
            'organization' => Yii::t('app', 'Organization'),
            'content' => Yii::t('app', 'Content'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_INSERT] = ['email', 'name', 'organization', 'content'];
        $scenarios[self::SCENARIO_TOGGLE_STATUS] = ['status'];
        return $scenarios;
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'updated_at',
                ],
            ],
        ];
    }

    public function approve()
    {
        $this->setAttribute('status', self::STATUS_APPROVE);
        $this->scenario = self::SCENARIO_TOGGLE_STATUS;
        return $this->save();
    }

    public static function getCount()
    {
        return static::find()->count();
    }
}
