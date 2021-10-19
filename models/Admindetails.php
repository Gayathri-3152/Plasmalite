<?php

namespace app\models;

use Yii;

//use app\models\LoginForm;
//use app\models\User;

/**
 * This is the model class for table "admindetails".
 *
 * @property int $adminId
 * @property string $orgName
 * @property string $userName
 * @property string $password
 * @property string $phoneNo
 * @property string $emailId
 * @property string $city
 * @property string $state
 * @property int $isActive
 * @property string $createdTime
 *
 * @property Userdetails[] $userdetails
 */
class Admindetails extends \yii\db\ActiveRecord 

{
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admindetails';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['orgName', 'userName', 'password', 'phoneNo', 'emailId', 'city', 'state'], 'required'],
            [['isActive'], 'integer'],
            [['createdTime'], 'safe'],
            [['orgName', 'password'], 'string', 'max' => 100],
            [['userName'], 'string', 'max' => 40,'min'=>8],
            [['phoneNo'], 'string', 'max' => 10,'min'=>10],
            [['emailId', 'city'], 'string', 'max' => 30],
            [['state'], 'string', 'max' => 25],
            [['userName'], 'unique'],
            [['phoneNo'], 'unique'],
            [['emailId'], 'unique'],
            [['isActive'], 'default', 'value' => 1],
            ['emailId', 'email'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'adminId' => 'Admin ID',
            'orgName' => 'Org Name',
            'userName' => 'User Name',
            'password' => 'Password',
            'phoneNo' => 'Phone No',
            'emailId' => 'Email ID',
            'city' => 'City',
            'state' => 'State',
            'isActive' => 'Is Active',
            'createdTime' => 'Created Time',
        ];
    }

    /**
     * Gets query for [[Userdetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserdetails()
    {
        return $this->hasMany(Userdetails::className(), ['adminId' => 'adminId']);
    }
   
    }
