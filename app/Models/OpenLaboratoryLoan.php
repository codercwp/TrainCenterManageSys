<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\OpenLaboratoryStudentList;

class OpenLaboratoryLoan extends Model
{
    protected $table = "open_laboratory_loan";
    public $timestamps = true;
    protected $guarded = [];

    /**
     * 回显开放实验室使用申请
     * @auther ZhongChun <github.com/RobbEr929>
     * @param $request
     * return [string]
     */
    public static function zc_reShowOpenSys($form_id)
    {
        try {
            $res1 = OpenLaboratoryLoan::join('form','open_laboratory_loan.form_id','form.form_id')
                ->select('open_laboratory_loan.*','form.applicant_name')
                ->where('open_laboratory_loan.form_id',$form_id)
                ->get();
            $res2 = OpenLaboratoryStudentList::where('form_id',$form_id)
                ->get();
            $res1['data1']=$res1;
            $res1['data2']=$res2;
            return $res1?
                $res1:
                false;
        } catch (\Exception $e) {
            logError('搜索错误', [$e->getMessage()]);
            return false;
        }
    }

    /**
     * 回显实验室借用申请
     * @auther ZhongChun <github.com/RobbEr929>
     * @param $request
     * return [string]
     */
    public static function zc_reShowSys($form_id)
    {
        try {
            $res = LaboratoryLoan::join('laboratory', 'laboratory_loan.laboratory_id', 'laboratory.laboratory_id')
                ->join('class', 'laboratory_loan.class_id', 'class.class_id')
                ->join('form','laboratory_loan.form_id','form.form_id')
                ->select('laboratory_loan.*', 'laboratory.laboratory_name', 'class.class_name','form.applicant_name')
                ->where('laboratory_loan.form_id',$form_id)
                ->get();
            return $res?
                $res:
                false;
        } catch (\Exception $e) {
            logError('搜索错误', [$e->getMessage()]);
            return false;
        }
    }
}
