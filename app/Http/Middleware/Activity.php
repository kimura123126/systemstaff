<?php
namespace App\Http\Middleware;
use Closure;
/**
 *  
 */
class Activity {
	// 前置操作
	public function handle($request,Closure $next){
		if(time() < strtotime('2018-11-25')){
			echo "我是后置操作";
			return redirect('activity1');	
		}
		return $next($request);
	}
	// 后置操作
		// public function handle($request,Closure $next){
		//  $respone = $nex($request);
		//  echo ('$respone');
		//  echo "我是后置操作";
		// return $next($request);
	}
 

?>