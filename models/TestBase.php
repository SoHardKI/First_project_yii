<?php
/**
 * Created by PhpStorm.
 * User: kirill
 * Date: 22.05.19
 * Time: 15:12
 */

namespace app\models;
use yii\db\ActiveRecord;

class TestBase extends ActiveRecord
{
    public static function tableName()
    {
        return 'testbase';
    }
    public function rules()
    {
        return [
            [['name', 'email','age','name_of_pet'], 'required'],
            [['age'],'integer'],
            ['email', 'email'],
        ];
    }
}