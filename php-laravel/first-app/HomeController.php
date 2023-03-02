<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(Request $request){
        //echo "Hello";
        //$std_name = 'Surawut';
        $search = $request->get('search');
        $stds = Student::
        whereRaw(
            'concat(first_name,"",last_name) like "%'.$search.'%"'
        )
            ->orWhere('std_ID',$search)
            ->get();//select form Student
        return view('home',compact('stds'));
    }
    public function create(){
        return view('create');
    }
    public function store(Request $request){
        //dd($request->all());
        $request->validate(
            [
                'first_name'=>['required','string','max:255'],
                'last_name'=>['required','string','max:255'],
                'std_ID'=>['required','string','max:255'],
                'avatar'=>['required','image','mimes:jpg,png,jpeg,gif','max:2048'],
            ]
            ,
            [
                'first_name.required'=>'กรอกชื่อด้วยนะจ๊ะ',
                'std_ID.required'=>'กรอกเลขด้วยนะจ๊ะ',
                'last_name.required'=>'กรอกนามสกุลด้วยนะจ๊ะ',
                'avatar.required'=>'เลือกรูปด้วยนะจ๊ะ',
            ]
        );
        $avatar_name = time().'_'.$request->file('avatar')->getClientOriginalName();
        $request->file('avatar')->move(public_path('uploads'),$avatar_name);

        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $std_ID = $request->input('std_ID');

        $new_student = new Student;
        $new_student->first_name = $first_name;
        $new_student->last_name = $last_name;
        $new_student->avatar = $avatar_name;
        $new_student->std_ID = $std_ID;
        $new_student->save();

        return redirect()->route('home')->with('success','save');
    }
    public function edit($id){
        //find($id);
        //where('custom');
        $std = Student::find($id);
        return View('edit',compact('std'));
    }
    public function update(Request $request,$id){
        //$std = Student::find($id);
        $request->validate(
            [
                'first_name'=>['required','string','max:255'],
                'last_name'=>['required','string','max:255'],
                'std_ID'=>['required','string','max:255'],
            ]
            ,
            [
                'first_name.required'=>'กรอกชื่อด้วยนะจ๊ะ',
                'std_ID.required'=>'กรอกเลขด้วยนะจ๊ะ',
                'last_name.required'=>'กรอกนามสกุลด้วยนะจ๊ะ',
            ]
        );
        if ($request->has('avatar')){
            $avatar_name = time().'_'.$request->file('avatar')->getClientOriginalName();
            $request->file('avatar')->move(public_path('uploads'),$avatar_name);
        }

        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $std_ID = $request->input('std_ID');

        $old_student = Student::find($id);
        $old_student->first_name = $first_name;
        $old_student->last_name = $last_name;
        if($request->has('avatar')){
            $old_student->avatar = $avatar_name;
        }
        $old_student->std_ID = $std_ID;
        $old_student->save();
        //dd($request->all());
        return redirect()->route('home',['id'=>$id])->with('success','save');
    }

    public function delete($id){
        $std = Student::find($id)->delete();
        return redirect()->route('home')->with('success','delete');
    }

}
