<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Student;
class StudentController extends Controller
{
	
	public function index() {
		 $students = Student::paginate(20);
		 return view('student.index',['students'=>$students]);
	}
	public function create(Request $request){
		$student =new Student();
		if($request->isMethod('post')){
			
			$data = $request->input('Student');
			if(Student::create($data)){
				// 使用create的收需要使用到批量赋值。需要在模型中进行设置。protected $fillable = ['name','age','sex'];
				return redirect('student/index');
			}else{
				return redirect()->back();
			}
		}
		return view('student.create',[
			'student'=>$student
		]);
	}

	public function save(Request $request){

		$da = $request->input('Student');
		// 第一中验证机制
		// $this->validate($request,[
		// 	'Student.name' =>'required|min:2|max:20',
		// 	'Student.age'=>'required|integer',
		// 	'Student.sex'=>'required|integer',
		// ],[
		// 	'required'=>':attribute 为必填项',
		// 	'min' =>':attribute 最小长度不符合',
		// 	'max' =>':attribute 最大长度不符合',
		// 	'integer' =>':attribute 必须为整形'
		// ],[
		// 	'Student.name'=>'姓名',
		// 	'Student.age'=>'年龄',
		// 	'Student.sex'=>'性别',
		// ]);
// 第二种验证机制.
		$validate = \Validator::make($request->input(),[
			'Student.name' =>'required|min:2|max:20',
				'Student.age'=>'required|integer',
				'Student.sex'=>'required|integer',
			],[
				'required'=>':attribute 为必填项',
				'min' =>':attribute 最小长度不符合',
				'max' =>':attribute 最大长度不符合',
				'integer' =>':attribute 必须为整形'
			],[
				'Student.name'=>'姓名',
				'Student.age'=>'年龄',
				'Student.sex'=>'性别',
			]);
			if($validate ->fails()){
				return redirect()->back()->withErrors($validate)->withInput();
			}
		$student =new Student();
		$student->name = $da['name'];
		$student->age = $da['age'];
		$student->sex = $da['sex'];
		if($student->save()){
			return redirect('student/index')->with('seccess','添加成功');
		}else{
			return redirect()->back();
		}
	}
public function update(Request $request, $id){
	$student = Student::find($id);
	if($request->isMethod('post')){
		$data = $request->input('Student');
		$this->validate($request,[
			'Student.name' =>'required|min:2|max:20',
			'Student.age'=>'required|integer',
			'Student.sex'=>'required|integer',
		],[
			'required'=>':attribute 为必填项',
			'min' =>':attribute 最小长度不符合',
			'max' =>':attribute 最大长度不符合',
			'integer' =>':attribute 必须为整形'
		],[
			'Student.name'=>'姓名',
			'Student.age'=>'年龄',
			'Student.sex'=>'性别',
		]);

		$student->name = $data['name'];
		$student->age = $data['age'];
		$student->sex = $data['sex'];
		if($student->save()){
            return redirect('student/index')->with('seccess','修改成功-'.$id);
		}
	}
	return view('student.update',[
		'student'=>$student
	]);
}

public function details($id){
	$student = Student::find($id);
	return view('student.details',[
		'student' =>$student
	]);
}
public function delect($id){
	 
	$student = Student::find($id);
    if($student->delete()){
    	return 	redirect('student/index')->with('seccess','删除成功-'.$id);
    }else{
       return 	redirect('student/index')->with('error','删除失败-'.$id);
    }
 
}




}

?>