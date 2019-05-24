<?php
/**
 * Created by PhpStorm.
 * User: kirill
 * Date: 22.05.19
 * Time: 15:06
 */

namespace app\controllers;
use http\Url;
use Imagine\Image\Box;
use Yii;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\data\Pagination;
use yii\imagine\Image;
use yii\web\Controller;
use app\models\PageForm;
use app\models\TestBase;
use yii\web\UploadedFile;


class PageController extends Controller
{

    public function actionReturn()
    {
        return $this->redirect(\yii\helpers\Url::to(['page/page-show']));
    }


    public function actionView($id)
    {
        $tester = TestBase::find()->where(['id' => $id])->one();

        if(isset($tester))
        {
            return $this->render('person',['tester' => $tester]);
        } else {
            return $this->redirect(\yii\helpers\Url::to(['page/page-show']));
        }


    }

    public function actionUpdate($id)
    {
        $tester = TestBase::find()->where(['id' => $id])->one();
        if(Yii::$app->request->isPost)
        {
            $tester->img = UploadedFile::getInstance($tester, 'img');
            PageForm::upload($tester);
            $tester->load(Yii::$app->request->post());
            $tester->save();
            return $this->redirect(['view','id' => $tester->id]);
        } else {
            return $this->render('update',['tester'=> $tester]);
        }
    }


    public function actionDelete($id)
    {
        $tester = TestBase::find()->where(['id' => $id])->one();
        $tester->delete();
        return $this->redirect(\yii\helpers\Url::to(['page/page-show']));
    }

    public function actionPageShow()
    {
        $dataProvider = new ActiveDataProvider(['query' => TestBase::find(),]);
//        $dataProvider = new ArrayDataProvider([
//            'allModels' => TestBase::find()->all(),
//        ]);
        $query = TestBase::find();

        $pagination = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $query->count(),
        ]);

        $testers = $query->orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('page-show',[
                'testers' => $testers,
                'pagination' => $pagination,
                'dataProvider' => $dataProvider
            ]);



    }



    public function actionCreate()
    {
        $model = new PageForm();

        //$files=\yii\helpers\FileHelper::findFiles('uploads/');

        if ($model->load(Yii::$app->request->post()) && $model->validate())
        {
            $tester = new TestBase();
            $tester->name = $model->name;
            $tester->email = $model->email;
            $tester->age = $model->age;
            $tester->name_of_pet = $model->name_of_pet;
            $model->img = UploadedFile::getInstance($model, 'img');
            PageForm::upload($model);
            $tester->img = $model->img;
            $tester->save();

            return $this->redirect(\yii\helpers\Url::to(['page/page-show']));

        }else {
            return $this->render('page',['model' => $model]);
        }

    }



}