<?php

namespace App\Models;

use http\Exception;
use Illuminate\Database\Eloquent\Model;

class Laboratory extends Model
{
    protected $table = "laboratory";
    public $timestamps = true;
    protected $guarded = [];


    /**
     * @return |null
     * z展示实验室表信息
     */
    public static function dc_getFormInfo(){
        try {
            $data = self::paginate(5);
            return $data;
        }catch (\Exception $e){
            logError('获取实验室表信息错误',$e->getMessage());
            return null;
        }


    }

    /**‘
     * @param $data
     * @return |null
     * 添加场地
     */
    public static function dc_addInfo($data){
        try {
            $data = self::create([
                'laboratory_name' => $data['laboratory_name'],
                'place' => $data['place'],
                'type' => $data['type']
            ]);
            return $data;
        }catch (\Exception $e){
            logError('添加场地失败',$e->getMessage());
            return null;
        }

    }

    /**
     * @param $data
     * @return |null
     * 搜索场地
     */
    public static function dc_selectInfo($data){
        try {
            $data['laboratory_name']?
                $rs = self::where('laboratory_name','like','%'.$data['name'].'%')
                    ->paginate(5):
                $rs = self::paginate(5);
            return $rs;

        }catch (\Exception $e){
            logError('搜索场地信息失败',$e->getMessage());
            return null;
        }
    }

    /**
     * @param $data
     * @return |null
     * 回显
     */
    public static function dc_getInfoByID($data){
        try {
            $rs = self::where('laboratory_id',$data['laboratory_id'])
                        ->get();
            return $rs;

        }catch (\Exception $e){
            logError('获取回显信息失败',$e->getMessage());
            return null;
        }
    }

    /**
     * @param $data
     * @return |null
     * 修改信息
     */
    public static function dc_exitInfo($data){
        try {
            $rs = self::where('laboratory_id',$data['laboratory_id'])
                ->update([
                    'laboratory_name' => $data['laboratory_name'],
                    'place' => $data['place'],
                    'type' => $data['type']
                ]);
            return $rs;
        }catch (\Exception $e){
            logError('修改信息失败',$e->getMessage());
            return null;
        }
    }

    /**
     * @param $data
     * @return |null
     * 删除场地
     */
    public static function dc_rmInfo($data){
        try {
            $rs = self::where('laboratory_id',$data['laboratory_id'])
                ->delete();
            return $rs;
        }catch (\Exception $e){
            LogError('删除失败',$e->getMessage());
            return null;
        }
    }


    /**
     * @author tangshengyou <TangSYc.github>
     * @return $DATA 实验室信息
     */
    public static function tsy_select(){
        try{
            $data = self::select("laboratory_name")
                ->get();
            return $data;
        }catch(Exception $e){
            logError("查找失败",[$e->getMessage()]);
            return null;
        }
    }
    /**
     * 根据实验室名字查找实验室id
     * @author tangshengyou <TangSYc.github>
     * @param $lab_name
     * @return $DATA 实验室信息
     */
    public static function tsy_selectByName($lab_name){
        try{
            $data = self::where("laboratory_name",$lab_name)
                ->select("laboratory_id")
                ->first();
            return $data;
        }catch(Exception $e){
            logError("查找失败",[$e->getMessage()]);
            return null;
        }
    }
    public static function tsy_selectAll(){
        try{
            $data = self::select("laboratory_id")
                ->get();
            return $data;
        }catch(Exception $e){
            logError("查找失败",[$e->getMessage()]);
            return null;
        }
    }

}
