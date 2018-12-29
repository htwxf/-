<?php
namespace backend\common;

use Yii;

class Common
{

    
    /**
     * 筛选函数
     * screen
     * @param mixed $type 
     * @param mixed $type_value 
     * @return mixed 
     */
    public static function screen($type, $type_value)
    {
        $dropDownList = [
            //合同状态
            'contract_status' => [
                '1' => '未确认',
                '2' => '采购方已确认',
                '3' => '服务商已确认',
                '4' => '执行中[双方已确认]',
                '5' => '已完成',
                '6' => '已评价',
            ],
            

        ];

        return array_key_exists($type, $dropDownList) ? $dropDownList[$type][$type_value] : '';
    }




 




}
