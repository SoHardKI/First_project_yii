<?php
/**
 * Created by PhpStorm.
 * User: kirill
 * Date: 22.05.19
 * Time: 13:06
 */
use yii\helpers\Html;
?>
<p>Вы ввели следующую информацию:</p>

<ul>
    <li><label>Name</label>: <?= Html::encode($model->name) ?></li>
    <li><label>Email</label>: <?= Html::encode($model->email) ?></li>
</ul>