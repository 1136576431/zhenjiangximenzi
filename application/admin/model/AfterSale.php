<?php

namespace app\admin\model;

use think\Model;

class AfterSale extends Model
{
    // 表名
    protected $name = 'after_sale';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = 'updatetime';
    
    // 追加属性
    protected $append = [
        'state_text'
    ];
    

    protected static function init()
    {
        self::afterInsert(function ($row) {
            $row->save(['weigh' => $row['id']]);
        });
    }

    
    public function getStatelist()
    {
        return ['0' => __('State 0'),'1' => __('State 1'),'2' => __('State 2')];
    }     


    public function getStateTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['state'];
        $list = $this->getStateList();
        return isset($list[$value]) ? $list[$value] : '';
    }




}
