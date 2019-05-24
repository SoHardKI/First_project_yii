<?php
/**
 * Created by PhpStorm.
 * User: kirill
 * Date: 22.05.19
 * Time: 14:56
 */

use yii\bootstrap\ActiveForm;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
    <h1>Testers</h1>
    <?= Html::a('Create', \yii\helpers\Url::to(['create']), ['class' => 'btn btn-success'])?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        [
            'label' => 'Картинка',
            'format' => 'raw',
            'value' => function($data){
                if(!empty($data->img))
                {
                    return Html::img("/uploads/".$data->img);
                } else {
                    return Html::img("/uploads/noimg.png");
                }

            },
        ],
        'name',
        'email',
        'age',
        'name_of_pet',

        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {delete}',
            'visibleButtons' => [
                'view' => true,
                'update' => true,
                'delete' => function($model) { return true; },
            ],
            'buttons' => [
                'paid' => function ($model) {
                    return Html::a('View', \yii\helpers\Url::to(['view', 'id' => $model->id]), ['class' => 'btn btn-success']);
                },
                'confirm' => function ($model) {
                    return Html::a('Update', \yii\helpers\Url::to(['update','id'=> $model->id]), ['class' => 'btn btn-success']);
                },
                'clear' => function ($model) {
                    return Html::a('Delete', \yii\helpers\Url::to(['delete', 'id'=> $model->id]), ['class' => 'btn btn-success']);
                },
            ],
        ],
    ],
]); ?>


    <ul>

        <?php foreach ($testers as $tester): ?>
            <?php $form = ActiveForm::begin(); ?>

                <?php
                if(!empty($tester->img))
                {
                    echo Html::img("/uploads/".$tester->img);
                } else {
                    echo Html::img("/uploads/noimg.png");
                }

                ?>
                <?=  Html::encode("Id: {$tester->id} Name:  {$tester->name} Email: ({$tester->email}) Age: ({$tester->age}) Name of pet:  ({$tester->name_of_pet})") ?>
                <?= Html::a('View', \yii\helpers\Url::to(['view', 'id' => $tester->id]), ['class' => 'btn btn-success'])?>
                <?= Html::a('Update', \yii\helpers\Url::to(['update','id'=> $tester->id]), ['class' => 'btn btn-success'])?>
                <?= Html::a('Delete', \yii\helpers\Url::to(['delete', 'id'=> $tester->id]), ['class' => 'btn btn-success'])?>
                <hr>
            <?php ActiveForm::end(); ?>

        <?php endforeach; ?>
    </ul>

<?= LinkPager::widget(['pagination' => $pagination]) ?>