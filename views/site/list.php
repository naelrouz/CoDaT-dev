<?php

/* @var $this yii\web\View */

use yii\grid\GridView;
$this->title = 'Контроль поручений';

?>
<div class="table_gf">
<?php
echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'id',
                'label'=>'Порядковый №'
            ],
             [
                'attribute'=>'type',
                'label'=>'Вид документа'
            ],
             [
                'attribute'=>'incoming_number',
                'label'=>'Порядковый'
            ],
             [
                'attribute'=>'incoming_date',
                'label'=>'Порядковый'
            ],
             [
                'attribute'=>'outgoing_date',
                'label'=>'Порядковый'
            ],
             [
                'attribute'=>'outgoing_number',
                'label'=>'Порядковый'
            ],
             [
                'attribute'=>'description',
                'label'=>'Порядковый'
            ],
             [
                'attribute'=>'sender',
                'label'=>'Порядковый'
            ],
             [
                'attribute'=>'addresser',
                'label'=>'Порядковый'
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'Действия', 
                'headerOptions' => ['width' => '80'],
                'template' => '{view} {update} {delete}{link}',
            ],
//             [
//                'attribute'=>' ',
//                'label'=>'Действия'
//            ],
//             [
//                'attribute'=>' ',
//                'label'=>'Поручения'
//            ]
           
//            'name:ntext',
//            'url:ntext',
//            'category_image:ntext',
            // 'created_at',
            // 'updated_at',
 
            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); 
?>
</div>