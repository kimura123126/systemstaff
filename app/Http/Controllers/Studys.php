<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Study;
use Session;

class Studys extends Controller 
{
		 public function  info(){

		  // $s = DB::select('select * from study');
		  // dd($s);

		 	// $s =DB::insert('insert into study(name,age) values(?,?)',['kong',18]);
		 	// var_dump($s);	

		 	// $s =DB::update('update study set age=? where name = ?',[22,'kong']);
		 	// var_dump($s);
		  $s = DB::delete('delete from study where id > ?',[2]);
		  dd($s);
		 }
		 public function  query(){
		 		// $ee =DB::table('study')->insert(
		 		// 	['name'=>'kong','age'=>15]
		 		// );
		 		// dd($ee);
		 	  // 获取自增的id
				// $ee =DB::table('study')->insertGetId(
		 	// 		['name'=>'kong','age'=>15]
		 	// 	);
		 	// 	dd($ee);
	   //      $ee =DB::table('study')->where('id',5)->update(['age'=>100]);
		 	// dd($ee);
//              默认设置每个子增一age字段。
		 	// $ee =DB::table('study')->increment('age');
		 	// dd($ee);

		 	//默认设置每个子增 3 age字段。
		 	// $ee =DB::table('study')->increment('age',3);

 			//默认设置每个自减 3 age字段。
		 	// $ee =DB::table('study')->decrement('age',3);

			//默认设置每个自增的同时修改其他字段
		 	// $ee =DB::table('study')->decrement('age',3,['name'=>"ksh"]);


		 	// 使用查询构造器进行删除数据
		 	// $ee = DB::table('study')->where('id','>=',5)->delete();
            // 清空数据表，删除表数据不删除表结构 不返回任何数据
            // $ee = DB::table('study')->truncate();

    			 // $ee =DB::table('study')->insert([
		 		// 	['name'=>'kong','age'=>15],
		 		// 	['name'=>'kong1','age'=>15],
		 		// 	['name'=>'kong2','age'=>15],
		 		// 	['name'=>'kong3','age'=>15]
		 		// ]);
		 	// get 获取表的所有数据
        	// $ee = DB::table('study')->get();
		 	//获取表的第一个数据
		 	// $ee = DB::table('study')->first();
			//获取查询表第一个数据
		 	// $ee = DB::table('study')->orderBy('id','desc')->first();
		 	// 给where增加多个条件
		 	// $ee = DB::table('study')->whereRaw('id >= ? and age > ？'[10 ,20])->get();
		 	// pluck() 返回查询制定的字段
		 	// $ee = DB::table('study')->whereRaw('id >= ? and age > ?',[10,10])->pluck('name');
	         // lists() 返回查询制定的字段并且能指定某个键做下标
		 	// $ee = DB::table('study')->whereRaw('id >= ? and age > ?',[10,10])->pluck('name');
		 	// $ee = DB::table('study')->whereRaw('id >= ? and age > ?',[10,10])->pluck('name','id');
		 	//select();可以设置指定要查询的字段
		 	// $ee = DB::table('study')->whereRaw('id >= ? and age > ?',[10,10])->select('name','id')->get();


		 	// 分页显示  好像有问题
		 	// $ee = DB::table('study')->chunk(100, function($studs){
		 	// 	var_dump($studs);
		 	// return  false;  // 只查询了一次
		 	// });



		 	// 查询构造器中的聚合函数
		 	// count()  max() min() avg() sum()
             // 返回age中最大的值。
            // $ee = DB::table('study')->max('age');

 			// 返回age中最小的值。
            // $ee = DB::table('study')->min('age');
           // 返回age中平均的值。
            // $ee = DB::table('study')->avg('age');

            // 返回age的合。
            // $ee = DB::table('study')->sum('age');
		 	// 查询出所有的数据信息
            // $ee = Study::all();
			// $ee = Study::get();
		 	// find();查询出指定的数据
		 	// $ee = Study::find(10);

		 	//findOrFail 根据主键查找，如果找不到就报错
		 	// $ee  = Study::findOrFail(100);
		 	// 获取第一条数据
		 	// $ee = Study::where('id','>','10')->orderBy('age','desc')->first();

  			// chunk 分页显示信息
  			// echo "<pre>";
  		 //    Study::chunk(2,function($ss){
  			// 	var_dump($ss);
  			// });
		 	// 查询构造器的聚合函数
		 	// 获取数据库中的查询的总数
		 	// $ee = Study::count();
			// 查询最大值
			// $ee = Study::where('id','>',12)->max('age');

			// $ee = new Study();
			// $ee->name = 'kkk';
			// $ee->age = 222;
		 //    $e = $ee->save();
		 // 	dd($e);

             //手动格式时间
		 	// $study = Study::find(18);
		 	// echo date('Y-m-d H:i:s',$study->created_at);

		 // $ee =  Study::Creat(
		 // 		['name' => 'imooc','age'=>155]
		 // 	);
		 // dd($ee);

     //先查找如果有查询出来数据，如果没有直接创建一条数据
		 // $ee =  Study::firstOrCreate(
		 // 		['name' => 'imooc' ]
		 // 	);
		 // dd($ee);

// 如果数据库中有值进行查找，如果没有值创建新的实例，想保存使用save();
 // $ee =  Study::firstOrNew(
	// 	 		['name' => 'imoocss' ]
	// 	 	);
 
 // 通过模型进行更新数据
		 	// $ee = Study::find(20);
		 	// $ee->name = 'kitty';
		 	// $ee->save();

		 	// $ee = Study::where('id','>',17)->update(
		 	// 	['age'=>44]
		 	// );
// 通过模型进行删除数据
		 	// $ee =  Study::find(18);
		 	// $bool = $ee->delete();
        // $ee = Study::destroy(18,19); 按照主键删除
		// $ee = Study::destroy([18,19]);
		 // $ee = Study::where('id','>',17)->delete();
		 dd($ee);
		 }


public function request1(Request $request){
	// 获取里面的值。
     echo  $request->input('name','未知');
    // 检测url 中是否有该参数
     // if($request->has('name')){
     // 	echo $request->input('name');
     // }else{
     //     echo "无该参数信息";
     // }
    // 获取所有的参数数值
     // $request ->all();
     // 获取请求的类型
     echo $request ->method();
      // if($request->isMethod('GET')){   GET  POST 
      // 		echo "YES";
      // }else{
      // 		echo "NO";
      // }
     // 判断是否是ajax请求
     // $request->ajax();
    //  判断是否是student下面的一个方法。
     // $res = $request->is('studet/*')
    //  获取当前url数据
     // $request->url();


}

	public function session1(Request $request){
		// session 设置与获取信息
 		//  $request ->session()->put('key1','value1');
		// echo $request ->session()->get('key1');
		// session 的第二种使用
		 // session()->put('key2','value2');
		 //  echo session()->get('key2');
		// 没有试验成功 存储和获取session
		// Session::put('key3','value3');
		// echo  Session::get('key3');
        // 
  		//  Session::put(['key4'=>'value4']);
		// echo Session::get('key4','default');
           // session 能直接获取一个数组
		// Session::push('student','sean');
		// Session::push('student','imooc');
		//  Session::get('student','default');
		// session 中的pull 主要是提出一次数据，第二次再取回出现default
		// Session::pull('student','default');
		// 取出session中所有的数值
		// Session::all();
		// 检测session是否存在
		// Session::has('key1'); 检测session是否存在
		// 删除制定的key Session::forget('key3');
		// 删除所有的session Session::flush();

		//暂存数据
		// Session::flash('key-flash','val-flash');
	 	// Session::get('key-flash');
	}

	public function session2(Request $request){
       return Session::get('message','暂无数据');
		
	}
		public function response(Request $request){
        //  $data = [
        //  	'errCode'=>0,
        //  	'errMsg'=>'success',
        //  	'data'=>'saen',
        //  ];
        // return response()->json($data);
//      重定向
//		return redirect('session2');
        // 重定向携带数据使用session获取。
		 // return redirect('session2')->with('message','测试数据你');
			// 使用action 来进行数据的跳转。action 
		// return  redirect()->action('Studys@session2')
		//      ->with('message','我是传递的数据');
			// 可以使用路由的别名 route();
 			
			// return  redirect()->route('session2')
		 //     ->with('message','我是传递的数据');
   	    // 返回上一个应用
		// redirect()->back();
		// controller 之Middleware
	    // 中间件的作用：Laravel 中间件提供一个方便的机制来过滤进入应用程序的HTTP请求。
	}
	public function activity1 (){
	     return "活动快要开始了11。";
	}
	public function activity2 (){
	     return "活动快要开始了222。";
	}
	public function activity3 (){
	     return "活动快要开始了333。";
	}
	// 如果只有方法中只有一个参数，可以再方法中添加request进行操作，不影响一个参数的问题。	
	// Composer 是PHP的一个依赖管理工具。不是一个包管理器，它涉及packages 和libraries



}

 



?>