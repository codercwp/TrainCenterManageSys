<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpenLaboratoryLoan extends Model
{
    protected $table = "open_laboratory_loan";
    public $timestamps = true;
    protected $guarded = [];

    /**
     * 开放实验室使用申请表页面查看
     * @author ChenMiao <github.com/Yidaaa-u>
     * @param String $form_id
     * form_id 表单编号
     * @return array
     */
    public static function cm_labOpenDisplayInfo($form_id){
     try{
         $data0=self::join('form','form.form_id','open_laboratory_loan.form_id')
             ->select('open_laboratory_loan.reason_use','open_laboratory_loan.porject_name',
                 'open_laboratory_loan.start_time','open_laboratory_loan.end_time',
                 'form.applicant_name','open_laboratory_loan.created_at')
             ->where('open_laboratory_loan.form_id',$form_id)
             ->get();

         $data1=self::join('open_laboratory_student_list','open_laboratory_loan.form_id','open_laboratory_student_list.form_id')
             ->select('open_laboratory_student_list.student_name','open_laboratory_student_list.student_id',
                 'open_laboratory_student_list.phone','open_laboratory_student_list.work')
             ->where('open_laboratory_student_list.form_id',$form_id)
             ->get();
         $data['forminfo']=$data0;
         $data['stulist']=$data1;
         return $data;
       }catch (\Exception $e){
         logError('获取开放实验室申请表信息错误',[$e->getMessage()]);
         return null;
        }
    }
}
