<?php
namespace App\Http\Middleware;
use Closure;
/**
 *  
 */
class Student {
	// 前置操作
	public function handle($request,Closure $next){
	 
		return $next($request);
	}
	 
	}
 

?>