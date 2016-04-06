<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;
use Yii;
use yii\base\Model;
/**
 * Description of DocumentForm
 *
 * @author IVNovoselov
 */
class DocumentForm extends Model{
    public $type;
    public $incoming_number;
    public $incoming_date;
    public $outgoing_date;
    public $outgoing_number;
    public $description;
    public $sender;
    public $addresser;
    
    public function rules()
    {
        return [ 
            [
                [   // Перечень полей. Все поля должны быть заполнены.
                'type',
                'incoming_number',
                'incoming_date',
                'outgoing_date',
                'outgoing_number',
                'description',
                'sender',
                'addresser'
                ], 'required','message'=>'Все поля должны быть заполнены'],
            // email has to be a valid email address
            //['email', 'email'],
            
        ];
    }
}
