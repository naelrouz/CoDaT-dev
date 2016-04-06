<?php

/* @var $this yii\web\View */

use yii\grid\GridView;
$this->title = 'Контроль поручений';

?>

<div class="x-table_gf">
<table class="table table-bordered">
    <tr>
            <th>Статус</th>
            <th>Вид документа</th>
            <th>Входящий № документа</th>
            <th>Дата регистрации документа</th>
            <th>Исходящий №</th>
            <th>Исходящая дата</th>
            <th>Отправитель</th>
            <th>Краткое содержание документа</th>
            <th>Кому адресован</th>
            <th>Действия</th>
            <th colspan="5">Поручения</th>
            </tr>
<?php foreach ($incoming as $incoming) { ?>
    <tr class="table-hover">
        <td><b><a href="<?= Yii::$app->urlManager->createUrl(['site/user', 'name'=>$incoming->id])?>"><?=$incoming->id?></a></b></td>
        <td><?=$incoming->type?></td>
        <td><?=$incoming->incoming_number?></td>
        <td><?=$incoming->incoming_date?></td>
        <td><?=$incoming->outgoing_date?></td>
        <td><?=$incoming->outgoing_number?></td>
        <td><?=$incoming->description?></td>
        <td><?=$incoming->sender?></td>
        <td><?=$incoming->addresser?></td>
        <td>
            <b><a href="<?= Yii::$app->urlManager->createUrl(['site/user', 'name'=>$incoming->id])?>">Изменить</a></b>
            <b><a href="<?= Yii::$app->urlManager->createUrl(['site/user', 'name'=>$incoming->id])?>">+Поручение</a></b>
        </td>
        <td>
            <table class="table x-table-bordered">
                <tr>
                    <th>Исполнитель</th>
                    <th>Поручение</th>
                    <th>Срок исполнения</th>
                    <th>Срок напоминания</th>
                    <th>Действия</th>
                </tr>
                
                <?php
                $tasks = $incoming->tasks;
                foreach ($tasks as $tasks) { ?>
                <tr>
                    <td><?=$tasks->executor?></td>
                    <td><?=$tasks->description?></td>
                    <td><?=$tasks->control_date?></td>
                    <td><?=$tasks->deadline?></td>
                    <td>
                        <b><a href="<?= Yii::$app->urlManager->createUrl(['site/user', 'name'=>$incoming->id])?>">Изменить</a></b>
                        <b><a href="<?= Yii::$app->urlManager->createUrl(['site/user', 'name'=>$incoming->id])?>">+Поручение</a></b>
                    </td>
                </tr>
            
                <?php } ?>
            </table>
        </td>
    </tr>
<?php } ?>
    
</table>
</div>

<?php
echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
 
            'id',
            'type:ntext',
//            'name:ntext',
//            'url:ntext',
//            'category_image:ntext',
            // 'created_at',
            // 'updated_at',
 
            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); 
?>