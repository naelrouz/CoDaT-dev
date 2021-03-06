<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \yii\jui\DatePicker;
//use yii\widgets\ActiveForm;
?>
<!--<p><?'Текущий статус: './/$status_message;?></p>-->
<div class="container">
<?php 
$form = ActiveForm::begin(['options' => 
    [
    'class' => 'form-horizontal',
    'action' => '/site/docform',
    'enctype' => 'multipart/form-data'     
    ]
]); 
 ?>
                    <?= $form->field($docform, 'type')
//                       ->dropdownList(
//                        ProductCategory::find()->select(['category_name', 'id'])->indexBy('id')->column(),
//                        ['prompt'=>'Select Category']
//                        )
                        ->textInput(['value' => 'Письмо'])
                        ->label('Тип документа')
                    ?>
                    <?= $form->field($docform, 'incoming_number')
                        ->label('Входящий номер')
                    ?>

                    <?= $form->field($docform, 'incoming_date')
                        ->label('Входящая дата')
                        ->widget(DatePicker::classname(), [
                            'language' => 'ru',
                            'dateFormat' => 'yyyy-MM-dd',])
                        ?>
                    <?= $form->field($docform, 'outgoing_number')
                        ->label('Исходящий номер')
                    ?>
                    <?= $form->field($docform, 'outgoing_date')
                        ->label('Исходящая дата')
                        ->widget(DatePicker::classname(), 
                            [
                            'language' => 'ru',
                            'dateFormat' => 'yyyy-MM-dd',
                            'class' => 'date'
                            ])
                    ?>
                     <?= $form->field($docform, 'sender')->textInput()
                        ->label('Отправитель')
                    ?>
                     <?= $form->field($docform, 'addresser')
                        ->label('Адресат')
                    ?>
                    <?= $form->field($docform, 'description')->textArea(['rows' => 6])
                        ->label('Краткое содержание документа')
                    ?>

                    <div class="form-group">
                        <?= Html::submitButton('Сохранить',
                                ['class' => 'btn btn-primary', 'name' => 'contact-button']
                                )
                        ?>
                    </div>

                <?php ActiveForm::end(); ?>
</div>