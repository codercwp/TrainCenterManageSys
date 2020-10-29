<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EquipmentBorrow extends Model
{
    protected $table = "equipment_borrow";
    public $timestamps = true;
    protected $guarded = [];

    /**
     * 实验室仪器借用申请表页面查看
     * @author ChenMiao <github.com/Yidaaa-u>
     * @param String $form_id
     * form_id 表单编号
     * @return array
     */
    Public static function cm_labEquipDisplayInfo($form_id){
        try {
            $data1=self::join('approve','equipment_borrow.form_id','approve.form_id')
                ->select('equipment_borrow.borrow_department',
                    'equipment_borrow.borrow_application',
                    'equipment_borrow.destine_start_time',
                    'equipment_borrow.destine_end_time',
                    'equipment_borrow.borrower_name',
                'equipment_borrow.borrower_phone',
                    'approve.borrowing_department_name',
                    'approve.borrowing_manager_name',
                'approve.center_director_name',
                    'approve.device_administrator_out_name',
                    'equipment_borrow.borrower_name',
                    'approve.updated_at',
                    'approve.reason',
                    'approve.device_administrator_acceptance_name',
                    'equipment_borrow.borrower_name')
                ->where('equipment_borrow.form_id',$form_id)
                ->get();
            $data2=self::join('equipment_borrow_checklist','equipment_borrow_checklist.form_id','equipment_borrow.form_id')
                ->join('equipment','equipment_borrow_checklist.equipment_id','equipment.equipment_id')
                ->select('equipment.equipment_name','equipment.model','equipment_borrow_checklist.equipment_number','equipment.annex')
                ->where('equipment_borrow.form_id',$form_id)
                ->get();
            $data['frominfo']=$data1;
            $data['equiplist']=$data2;
            return $data;
        }catch (\Exception $e){
            logError('获取实验室申请表信息错误',[$e->getMessage()]);
            return null;
        }
    }
}
