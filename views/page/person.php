<?php
/**
 * Created by PhpStorm.
 * User: kirill
 * Date: 23.05.19
 * Time: 11:19
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<h1>Person</h1>

<ul>
    <li>
        <?php
        if(!empty($tester->img))
        {
            echo Html::img("/uploads/".$tester->img);
        } else {
            echo Html::img("/uploads/noimg.png");
        }?>

    </li>
    <li>
        <?php echo "ID: ";?>
        <?php echo $tester->id;?>
    </li>
    <li>
        <?php echo "Name :";?>
        <?php echo $tester->name;?>
    </li>
    <li>
        <?php echo "email: ";?>
        <?php echo $tester->email;?>
    </li>
    <li>
        <?php echo "Age: ";?>
        <?php echo $tester->age;?>
    </li>
    <li>
        <?php echo "Pet: ";?>
        <?php echo  $tester->name_of_pet;?>
    </li>

</ul>
<?= Html::a('Return', \yii\helpers\Url::to(['return']), ['class' => 'btn btn-success'])?>

