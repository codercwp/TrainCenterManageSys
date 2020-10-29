<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class LaboratoryLoan extends Model
{

    protected $table = "laboratory_loan";
    public $timestamps = true;
    protected $guarded = [];

    /**
     * 实验室借用申请表页面查看
     * @author ChenMiao <github.com/Yidaaa-u>
     * @param String $form_id
     * form_id 表单编号
     * @return array
     */
    Public static function cm_labBorDispalyInfo($form_id){
        try{
            $data=self::Join('form','form.form_id','laboratory_loan.form_id')
                ->Join('approve','form.form_id','approve.form_id')
                ->join('laboratory','laboratory_loan.laboratory_id','laboratory.laboratory_id')
                ->join('class','class.class_id','laboratory_loan.class_id')
                ->where('form.form_id',$form_id)
                ->where('form.type_id',1)
                ->whereIn('form.form_status',[6,11])
                ->select('laboratory_loan.created_at','laboratory.laboratory_name','laboratory_loan.laboratory_id',
                    'laboratory_loan.course_name','class.class_name','laboratory_loan.number','laboratory_loan.purpose',
                    'laboratory_loan.start_class','laboratory_loan.end_class','form.applicant_name','laboratory_loan.phone',
                    'approve.borrowing_department_name','approve.borrowing_manager_name','approve.center_director_name')
                ->get();
            return $data;
        }catch (\Exception $e){
            logError('获取实验室申请表信息错误',[$e->getMessage()]);
            return null;
        }
    }
}
