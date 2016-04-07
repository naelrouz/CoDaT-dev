<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;
use yii\db\ActiveRecord;
use app\models\Tasks;

/**
 * Description of Incoming
 *
 * @author IVNovoselov
 */
class Doctypes extends ActiveRecord
{  
    public function getTasks()
    {
        return $this->hasMany(Tasks::className(), ['document_id' => 'id']);
    }

}
