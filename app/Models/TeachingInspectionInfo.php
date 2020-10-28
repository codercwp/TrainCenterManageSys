<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeachingInspectionInfo extends Model
{
    protected $table = "teaching_inspection_info";
    public $timestamps = true;
    protected $guarded = [];

    /**
     * 期末教学记录检查表页面查看
     * @author ChenMiao <github.com/Yidaaa-u>
     * @param String $form_id
     * form_id 表单编号
     * @return array
     */
    public static function cm_teaRecordDisplayInfo($form_id){
        try {
            $data1=self::join('laboratory','teaching_inspection_info.laboratory_id','laboratory.laboratory_id')
                ->select('teaching_inspection_info.laboratory_id',
                    'laboratory.laboratory_name',
                    'teaching_inspection_info.class_name',
                    'teaching_inspection_info.teacher',
                    'teaching_inspection_info.teach_operating_condition',
                    'teaching_inspection_info.operating_condition',
                    'teaching_inspection_info.remark')
                ->where('teaching_inspection_info.form_id',$form_id)
                ->get();
            $data2=Form::cmm_teaRecordDisplayInfo($form_id);
            $data['data1']=$data1;
            $data['data2']=$data2;
            return $data;
        }catch (\Exception $e){
            logError('获取开放实验室申请表信息错误',[$e->getMessage()]);
            return null;
        }
    }
}
