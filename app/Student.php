<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	protected $table = 'student';

	const SEX_UI = 10;//未知
	const SEX_BOY = 20;//男
	const SEX_GRIL = 30;//女


	protected $fillable = ['name','age','sex'];
	public $timestamps = true;
	protected function getDateFormat(){
		return time();
	}
	protected function asDateTime($val){
		return $val;
	}
	public function sex($ind =null){
		$arr =[
			self::SEX_UI =>'未知',
			self::SEX_BOY =>'男',
			self::SEX_GRIL =>'女',
		];
		if($ind !== null){
			return array_key_exists($ind, $arr) ? $arr[$ind] :$arr[self::SEX_UI];
		}

		return $arr;
	}

}
?>