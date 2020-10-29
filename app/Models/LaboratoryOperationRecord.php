<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaboratoryOperationRecord extends Model
{
    protected $table = "laboratory_operation_records";
    public $timestamps = true;
    protected $guarded = [];







    /**
     * 获取所有实验室运行记录信息
     * @author tangshengyou <TangSYc.github>
     * @return $data
     */
    public static function tsy_getLabOperationRecords($lab_id){
        try{
            $data = self::where('laboratory_id',$lab_id)
                ->select("*")
                ->orderby("created_at")
                ->get();
            return $data;
        }catch(Exception $e){
            logError("获取失败",[$e->getMessage()]);
            return null;
        }
    }

    /**
     * 获取所有实验室运行记录信息
     * @author tangshengyou <TangSYc.github>
     * @return $data
     */
    public static function tsy_getLab(){
        try{
            $data = self::select("*")
                ->orderby("created_at")
                ->get();
            return $data;
        }catch(Exception $e){
            logError("获取失败",[$e->getMessage()]);
            return null;
        }
    }




}
