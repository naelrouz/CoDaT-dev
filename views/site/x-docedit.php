<?php

/* @var $this yii\web\View */

//use yii\grid\GridView;
$this->title = 'Контроль поручений';

?>


<?php foreach ($incoming as $incoming) { ?>
    <tr class="">
        <td><b><a href="<?= Yii::$app->urlManager->createUrl(['site/user', 'id'=>$incoming->id])?>"><?=$incoming->id?></a></b></td>
        <td><?=$incoming->type?></td>
        <td><?=$incoming->incoming_number?></td>
        <td><?=$incoming->incoming_date?></td>
        <td><?=$incoming->outgoing_date?></td>
        <td><?=$incoming->outgoing_number?></td>
        <td><?=$incoming->description?></td>
        <td><?=$incoming->sender?></td>
        <td><?=$incoming->addresser?></td>
    
    </tr>
<?php } ?>
    
</table>
</div>