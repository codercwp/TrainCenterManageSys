<?php

namespace App\Models;

use App\Http\Requests\SupAdmin\labBorDispalyInfoRequest;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $table = "form";
    public $timestamps = true;
    protected $guarded = [];
    /**
     * 实验室借用申请表页面展示
     * @author ChenMiao <github.com/Yidaaa-u>
     * @return array
     */
    Public static function cm_labBorDisplay(){
        try{
            $data=self::select('form_id','applicant_name','updated_at')
                ->where('type_id',1)
                ->whereIn('form_status',[2,4,6,8,11])
                ->get();
            return $data;
        }catch (\Exception $e){
            logError('实验室借用申请表展示错误',[$e->getMessage()]);
            return null;
        }
    }

    /**
     * 实验室借用申请表页面搜索
     * @author ChenMiao <github.com/Yidaaa-u>
     * @param String $form_id
     * form_id 表单编号
     * @return array
     */
    Public static function cm_labBorSelect($form_id){
        try{
            $data0=self::select('form_id','applicant_name','updated_at')
                ->where('type_id',1)
                ->whereIn('form_status',[2,4,6,8,11])
                ->Where('form_id','like','%'.$form_id.'%')
                ->get();
            $data1=self::select('form_id','applicant_name','updated_at')
                ->where('type_id',1)
                ->whereIn('form_status',[2,4,6,8,11])
                ->where('applicant_name','like','%'.$form_id.'%')
                ->get();
            $data['data1']=$data0;
            $data['data2']=$data1;
            return $data;
        }catch (\Exception $e){
            logError('实验室借用申请表搜索展示错误',[$e->getMessage()]);
            return null;
        }
    }

    /**
     * 开放实验室使用申请表页面展示
     * @author ChenMiao <github.com/Yidaaa-u>
     * @return array
     */
    Public static function cm_labOpenDisplay(){
        try{
            $data=self::select('form_id','applicant_name','updated_at')
                ->where('type_id',2)
                ->whereIn('form_status',[2,4,6,8,11])
                ->get();
            return $data;
        }catch (\Exception $e){
            logError('开放实验室使用申请表展示错误',[$e->getMessage()]);
            return null;
        }
    }

    /**
     * 开放实验室使用申请表页面搜索
     * @author ChenMiao <github.com/Yidaaa-u>
     * @param String $form_id
     * form_id 表单编号
     * @return array
     */
    Public static function cm_labOpenSelect($form_id){
        try{
            $data0=self::select('form_id','applicant_name','updated_at')
                ->where('type_id',2)
                ->whereIn('form_status',[2,4,6,8,11])
                ->Where('form_id','like','%'.$form_id.'%')
                ->get();
            $data1=self::select('form_id','applicant_name','updated_at')
                ->where('type_id',2)
                ->whereIn('form_status',[2,4,6,8,11])
                ->where('applicant_name','like','%'.$form_id.'%')
                ->get();
            $data['data1']=$data0;
            $data['data2']=$data1;
            return $data;
        }catch (\Exception $e){
            logError('开放实验室使用申请表搜索展示错误',[$e->getMessage()]);
            return null;
        }
    }

    /**
     * 实验室仪器借用申请表页面展示
     * @author ChenMiao <github.com/Yidaaa-u>
     * @return array
     */
    Public static function cm_labEquipDisplay(){
        try{
            $data=self::select('form_id','applicant_name','updated_at')
                ->where('type_id',3)
                ->whereIn('form_status',[2,4,6,8,11])
                ->get();
            return $data;
        }catch (\Exception $e){
            logError('实验室仪器借用申请表展示错误',[$e->getMessage()]);
            return null;
        }
    }

    /**
     * 实验室仪器借用申请表页面搜索
     * @author ChenMiao <github.com/Yidaaa-u>
     * @param String $form_id
     * form_id 表单编号
     * @return array
     */
    Public static function cm_labEquipSelect($form_id){
        try{
            $data0=self::select('form_id','applicant_name','updated_at')
                ->where('type_id',3)
                ->whereIn('form_status',[2,4,6,8,11])
                ->Where('form_id','like','%'.$form_id.'%')
                ->get();
            $data1=self::select('form_id','applicant_name','updated_at')
                ->where('type_id',3)
                ->whereIn('form_status',[2,4,6,8,11])
                ->where('applicant_name','like','%'.$form_id.'%')
                ->get();
            $data['data1']=$data0;
            $data['data2']=$data1;
            return $data;
        }catch (\Exception $e){
            logError('实验室仪器借用申请表搜索展示错误',[$e->getMessage()]);
            return null;
        }
    }

    /**
     * 期末教学记录检查表页面展示
     * @author ChenMiao <github.com/Yidaaa-u>
     * @return array
     */
    Public static function cm_teaRecordDisplay(){
        try{
            $data=self::select('form_id','applicant_name','updated_at')
                ->where('type_id',4)
                ->whereIn('form_status',[2,4,6,8,11])
                ->get();
            return $data;
        }catch (\Exception $e){
            logError('期末教学记录检查表展示错误',[$e->getMessage()]);
            return null;
        }
    }

    /**
     * 期末教学记录检查表页面搜索
     * @author ChenMiao <github.com/Yidaaa-u>
     * @param String $form_id
     * form_id 表单编号
     * @return array
     */
    Public static function cm_teaRecordSelect($form_id){
        try{
            $data0=self::select('form_id','applicant_name','created_at')
                ->where('type_id',4)
                ->whereIn('form_status',[2,4,6,8,11])
                ->Where('form_id','like','%'.$form_id.'%')
                ->get();
            $data1=self::select('form_id','applicant_name','created_at')
                ->where('type_id',4)
                ->whereIn('form_status',[2,4,6,8,11])
                ->where('applicant_name','like','%'.$form_id.'%')
                ->get();
            $data['data1']=$data0;
            $data['data2']=$data1;
            return $data;
        }catch (\Exception $e){
            logError('期末教学记录检查表页面搜索展示错误',[$e->getMessage()]);
            return null;
        }
    }

    /**
     * 期末教学记录检查表页面查看(记录人，记录人编号)
     * @author ChenMiao <github.com/Yidaaa-u>
     * @param String $form_id
     * form_id 表单编号
     * @return array
     */
    Public static function cmm_teaRecordDisplayInfo($form_id){
        try {
            $data=self::select('applicant_name','form_id')
                ->where('form_id',$form_id)
                ->get();
            return $data;
        }catch (\Exception $e){
            logError('期末教学记录检查表页面查看记录人，记录编号错误',[$e->getMessage()]);
            return null;
        }
    }

}
