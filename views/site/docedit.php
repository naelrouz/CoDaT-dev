<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \yii\jui\DatePicker;
//use yii\widgets\ActiveForm;

$request = Yii::$app->request;
$id = $request->get('id');
?>
<!--<p><?'Текущий статус: './/$status_message;?></p>-->
<!--<?$incoming->id?>-->
<div class="container">
    
    
<?php foreach ($incoming as $incoming){}?>
   
    
<?php 
$form = ActiveForm::begin(['options' => 
    [
    'class' => 'form-horizontal',
    'action' => '/site/docform',
    'enctype' => 'multipart/form-data'     
    ]
]); 
 ?>
 
                    <?= $form->field($docform, 'id')
                        ->textInput(['value' => $incoming->id])
                        ->label('id')
                    ?>
                    <?= $form->field($docform, 'type')
//                       ->dropdownList(
//                        ProductCategory::find()->select(['category_name', 'id'])->indexBy('id')->column(),
//                        ['prompt'=>'Select Category']
//                        )
                        ->textInput(['value' => $incoming->type])
                        ->label('Тип документа')
                    ?>
                    <?= $form->field($docform, 'incoming_number')
                        ->textInput(['value' => $incoming->incoming_number])
                        ->label('Входящий номер')
                    ?>

                    <?= $form->field($docform, 'incoming_date')
                        ->label('Входящая дата')
                        ->widget(DatePicker::classname(), [
                            //'clientOptions' => ['defaultDate' => date('Y-m-d')],
                            'language' => 'ru',
                            'dateFormat' => 'yyyy-MM-dd',])
                        ?>
                    <?= $form->field($docform, 'outgoing_number')
                        ->textInput(['value' => $incoming->outgoing_number])
                        ->label('Исходящий номер')
                    ?>
                    <?= $form->field($docform, 'outgoing_date')
                        ->label('Исходящая дата')
                        ->widget(DatePicker::classname(), 
                            [
                            'value'  => $incoming->outgoing_date,
                            'language' => 'ru',
                            'dateFormat' => 'yyyy-MM-dd',
                            ])
                    ?>
                     <?= $form->field($docform, 'sender')
                        ->textInput(['value' => $incoming->sender])
                        ->label('Отправитель')
                    ?>
                     <?= $form->field($docform, 'addresser')
                        ->textInput(['value' => $incoming->addresser])
                        ->label('Адресат')
                    ?>
                    <?= $form->field($docform, 'description')->textArea(['rows' => 6,'value' => $incoming->description])
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

