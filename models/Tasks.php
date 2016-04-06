<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;
use yii\db\ActiveRecord;
use app\models\Incoming;

/**
 * Description of Tasks
 *
 * @author IVNovoselov
 */
class Tasks extends ActiveRecord
{
    public function getIncoming()
    {
        return $this->hasOne(Incoming::className(), ['id' => 'document_id']);
    }
}
