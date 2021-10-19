<?php

namespace app\models;


use Yii;
use app\models\Admin;
use yii\helpers\Security;
use yii\base\NotSupportedExcetpion;


class Admin extends User implements \yii\web\IdentityInterface
{
    public $id; 
    public $username;
    public $authKey;
    public $accessToken;

   // public $loginType;

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
  
    
      
    /**
     * {@inheritdoc}
     */
      
  }
