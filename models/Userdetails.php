<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "userdetails".
 *
 * @property int $userId
 * @property int $adminId
 * @property string $name
 * @property string $userName
 * @property string $password
 * @property string $emailId
 * @property string $bloodGroup
 * @property string $phoneNo
 * @property string $dob
 * @property string $state
 * @property string $city
 * @property int $eligibility
 * @property int $willingness
 * @property int $isActive
 * @property string $createdTime
 *
 * @property Admindetails $admin
 * @property Requestdetails[] $requestdetails
 */
class Userdetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'userdetails';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['adminId', 'name', 'userName', 'password', 'emailId', 'bloodGroup', 'phoneNo', 'dob', 'state', 'city', 'eligibility', 'willingness'], 'required'],
            [['adminId', 'eligibility', 'willingness', 'isActive'], 'integer'],
            [['bloodGroup'], 'string'],
            [['dob', 'createdTime'], 'safe'],
            [['userName'], 'string', 'max' => 40,'min'=>8],
            [['name', ], 'string', 'max' => 40],
            [['password'], 'string', 'max' => 100],
            [['emailId', 'city'], 'string', 'max' => 30],
            [['phoneNo'], 'string', 'max' => 10, 'min'=>10],
            [['state'], 'string', 'max' => 25],
            [['phoneNo'], 'unique'],
            [['emailId'], 'unique'],
            ['emailId', 'email'],
            [['isActive'], 'default', 'value' => 1],
            [['adminId'], 'exist', 'skipOnError' => true, 'targetClass' => Admindetails::className(), 'targetAttribute' => ['adminId' => 'adminId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'userId' => 'User ID',
            'adminId' => 'Admin ID',
            'name' => 'Name',
            'userName' => 'User Name',
            'password' => 'Password',
            'emailId' => 'Email ID',
            'bloodGroup' => 'Blood Group',
            'phoneNo' => 'Phone No',
            'dob' => 'Dob',
            'state' => 'State',
            'city' => 'City',
            'eligibility' => 'Eligibility',
            'willingness' => 'Willingness',
            'isActive' => 'Is Active',
            'createdTime' => 'Created Time',
        ];
    }

    /**
     * Gets query for [[Admin]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAdmin()
    {
        return $this->hasOne(Admindetails::className(), ['adminId' => 'adminId']);
    }

    /**
     * Gets query for [[Requestdetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRequestdetails()
    {
        return $this->hasMany(Requestdetails::className(), ['requestedBy' => 'userId']);
    }
}
