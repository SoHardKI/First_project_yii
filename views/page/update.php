<?php
/**
 * Created by PhpStorm.
 * User: kirill
 * Date: 23.05.19
 * Time: 15:20
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>


<?php $form = ActiveForm::begin(); ?>

<ul>
    <li>
        <?php echo "Avatar: ";?>
        <?php
        if(!empty($tester->img))
        {
            echo Html::img("/uploads/".$tester->img);
        } else {
            echo Html::img("/uploads/noimg.png");
        }?>

        <?= $form->field($tester, 'img')->fileInput() ?>
    </li>

    <li>
        <?php echo "Default name : ";?>
        <?php echo $tester->name;?>
        <?= $form->field($tester, 'name') ?>
    </li>
    <li>
        <?php echo "Default email : ";?>
        <?php echo $tester->email;?>
        <?= $form->field($tester, 'email') ?>
    </li>
    <li>
        <?php echo "Default age : ";?>
        <?php echo $tester->age;?>
        <?= $form->field($tester, 'age') ?>
    </li>
    <li>
        <?php echo "Default pet : ";?>
        <?php echo $tester->name_of_pet;?>
        <?= $form->field($tester, 'name_of_pet') ?>
    </li>

</ul>

<?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
<?php ActiveForm::end(); ?>

<?= Html::a('Return', \yii\helpers\Url::to(['return']), ['class' => 'btn btn-success'])?>