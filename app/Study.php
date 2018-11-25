<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
/**
 * 
 */
class Study extends Model
{
    protected $table = 'study'; // 绑定表信息

    protected $primaryKey = 'id'; // 设置主键

    //允许使用批量计算的字段信息
    protected $fillable =['name','age']; //设置允许使用create批量增加的字段。

    //不允许使用批量计算的字段信息
    protected $guarded =[]; //设置不允许使用create批量增加的字段。




    public $timestamps = true; // 自动维护时间戳

    protected function getDateFormat(){   // 自动格式化时间戳
    	return time();
    }
    // 取消自动格式化时间戳
    protected function asDateTime($val){
    	return $val;
    }

}




?>