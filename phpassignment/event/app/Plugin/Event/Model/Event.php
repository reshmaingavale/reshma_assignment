<?php
/**
 * Created by JetBrains PhpStorm.
 * User: webonise
 * Date: 5/21/12
 * Time: 1:29 PM
 * To change this template use File | Settings | File Templates.
 */
class Event extends EventAppModel {
    public $name='Event';

    public $validate=array(
        'email' => array(
            'sendemails'=>array(
            'rule' => array('sendemails', true),
            'message' => 'Please supply a valid email address.',
            'requird' => 'Enter your email'
            ),
        ),

        'start_date' => array(
                        'startBeforeEnd' => array(
                                'rule' => array('startBeforeEnd', 'end_date' ),
                                'message' => 'The start time must be before the end time.'),
                        /*'futureDate' => array(
                                'rule' => array('futureDate', 'start_date'),
                                'message' => 'The start time can not be in the future.'),*/
                ),
        'end_date' => array(
            'comparison' => array('rule'=>array('field_comparison', '>',
                'start_date'), 'allowEmpty'=>true),
        )
    );
   // var $validate = array('email' => array('rule' => 'email'));
    function startBeforeEnd( $field=array(), $compare_field=null ) {
        foreach( $field as $key => $value ){
            $v1 = $value;
            $v2 = $this->data[$this->name][ $compare_field ];

            if($v1 > $v2) {
                return FALSE;
            } else {
                continue;
            }
        }
        return TRUE;
    }
    function futureDate($data, $field){
        if (strtotime($data[$field]) > time()){
            return FALSE;
        }
        return TRUE;
    }
    function field_comparison($check1, $operator, $field2) {

        //foreach($check1 as $key=>$value1) {
            $value2 = $this->data[$this->alias][$field2];
            if (!Validation::comparison($check1['end_date'], $operator, $value2))
                return false;
        //}
        return true;
    }
    function sendemails($field=array())
    {
        foreach( $field as $key => $value ){
            $v1 = $value;

            $arr_v1=explode(",",$v1);

           $count=count($arr_v1);
            if($count>1){
                for($i=0;$i<$count;$i++){
                    if (filter_var($arr_v1[$i], FILTER_VALIDATE_EMAIL)) {
                        //echo "This email address is considered valid.";die;
                        $val_count=$i+1;
                        if($val_count==$count){
                            return true;
                        }
                    }

                    else{
                        //echo "no";die;
                        return false;
                    }
                }

            }else{

                if (filter_var($v1, FILTER_VALIDATE_EMAIL)) {
                    //echo "This email address is considered valid.";die;
                    return TRUE;
                }
                else{
                    //echo "no";die;
                    return false;
                }
            }
        }
       // return TRUE;
    }
}
