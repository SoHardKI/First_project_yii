<?php
/**
 * Created by PhpStorm.
 * User: kirill
 * Date: 22.05.19
 * Time: 15:01
 */

namespace app\models;


use Imagine\Image\Box;
use yii\base\Model;
use yii\imagine\Image;

class PageForm extends Model
{
    public $id;
    public $name;
    public $email;
    public $age;
    public $name_of_pet;
    public $img;

    public function rules()
    {
        return [
            [['name', 'email','age','name_of_pet'], 'required'],
            [['age'],'integer'],
            [['img'], 'file', 'extensions' => 'png, jpg, jpeg, gif'],
            ['email', 'email'],
        ];
    }

    public static function upload($model)
    {
        if($model->validate()){
            if(!empty($model->img))
            {
                $model->img->saveAs("uploads/{$model->img->baseName}.{$model->img->extension}");

                PageForm::changeSize("uploads/{$model->img->basename}.{$model->img->extension}");
                $model->img ="{$model->img->basename}.{$model->img->extension}";
            } else
                $model->img = "";

        }else{
            return false;
        }
    }

    private static function changeSize($file)
    {
            $imagine = Image::getImagine();
            $imagine = $imagine->open($file);

            $sizes = getimagesize ( $file);
            /*
               [0] => 604
               [1] => 244
               [2] => 3
               [3] => width="604" height="244"
               [bits] => 8
               [mime] => image/png
            ) */
            $width = 100;
            //$height = round($sizes[1]*$width/$sizes[0]);
            $height = 100;
            $imagine = $imagine->resize(new Box($width, $height))->save($file, ['quality' => 60]);

    }



}