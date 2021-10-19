<?php

namespace app\models;


use Yii;
use yii\helpers\Security;
use yii\base\NotSupportedExcetpion;


class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $id; 
    public $username;
    public $authKey;
    public $accessToken;
   // public $loginType;

    public static function tableName()
    {
     
        return 'userdetails';
     
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        //if($this->loginType =='User'){
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
 //   }

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
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }
     
     /**
     * {@inheritdoc}
     */
    
    public static function findIdentityByAccessToken($token, $type = null)
    {
       
        
        return self::findOne(['accessToken'=>$token]);
    }
   
    
     /**
     * @param string $username
     * @return static|null
     */
    
    
    public static function findByUsername($username)
    {
       
       // $identity = static::findOne(['userName' => $username]);

        return static::findOne(['userName'=>$username]);
    }

    /**
     * {@inheritdoc}
     */
    
    public function getId()
    {
        return $this->getPrimaryKey();
    }
     /**
     * {@inheritdoc}
     */
   
    public function getAuthKey()
    {
        return $this->authKey;
    }
     /**
     * {@inheritdoc}
     */
   
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }
    /**
     * Generates "remember me" authentication key
     */
     /**
     * {@inheritdoc}
     */
   
    public function generateAuthKey()
    {
        $this->auth_key = Security::generateRandomKey();
    }
   
    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    
    public function validatePassword($password)
    {
       
        return $this->password === crypt($password,'salt')&& $this->isActive;
      // return $this->password === $password;
       
    }
    
  }
