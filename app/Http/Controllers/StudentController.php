<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\admin;
use App\Models\teacher;
use App\Models\User;
use App\Models\classes;
use App\Models\course;
use App\Models\task;
use App\Models\answer_task;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Response;
use Illuminate\Support\Facades\Storage;
use Exception;
use File;
use ZipArchive;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('app');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }



    
    public function profile(Request $request)
    {
        $sekarang = date('d-m-Y');
        $user = Auth::id();
        $sekarang = explode('-',$sekarang);
        $hari = cal_days_in_month(CAL_GREGORIAN,$sekarang[1],$sekarang[2]);
        
        try{
            $id = Auth::id();
            if ($profile = teacher::where('user_id',$id)->first() or $profile = student::where('user_id',$id)->first() or $profile = admin::where('user_id',$id)->first()) {
                $user = User::where('id',$id)->first();
                if($user->role == 1){
                    $str = explode(',',$profile->specialist);
                    $str2 = explode(',',$profile->teach);
                    
                    return view('profile',['profile'=>$profile,'user'=>$user,'course'=>$str,'class'=>$str2,'hari'=>$hari,'bulan'=>$sekarang[1],'tahun'=>$sekarang[2]]);
                }
                return view('profile',['profile'=>$profile,'user'=>$user,'hari'=>$hari,'bulan'=>$sekarang[1],'tahun'=>$sekarang[2]]);
            }
            else {
                return view('profilenull');
            }
        }catch(Exception $e){
            echo "you have error kapten" + $e;
        }
    }
    public function learning(Request $request)
    {
        $id = Auth::id();
        $user = teacher::where('user_id',$id)->first();
        
        // eloquent
        // $user = User::find($id)->teachers;

        $class = explode(',',$user->teach);
        return view('class',['class'=>$class]);
    
    }

    public function details_kelas(Request $request,classes $classes)
    {
        $solve = [];
        $core = explode(',',$classes->course_class);
        $id = Auth::id();
        $my = teacher::where('user_id',$id)->first();

        // eloquent
        // $my = User::find($id)->teachers;

        $my = explode(',',$my->specialist);
        foreach($my as $m){
            if(in_array($m,$core)){
                $solve[] = $m;
            }

        }
        $student = Student::where('kelas',$classes->id)->get();
        return view('details_class',['student'=>$student,'course'=>$solve,'kelas'=>$classes->id]);
    }

    public function task(Request $request,classes $classes,course $course)
    {
        try{
            $task = task::where('for_class',$classes->id)->where('course',$course->id)->get();
            // dd($task);
            return view('task',['task'=>$task,'kelas'=>$classes->id,'course'=>$course->id]);
        }catch(Exception $e){

        }
    }
    public function teachers_data(Request $request)
    {
        $teachers = teacher::all();
        $class = classes::all();
        $mapel = course::all();
        return view('teachers_data',['teachers'=>$teachers,'class'=>$class,'mapel'=>$mapel]);
    }

    public function task_view(Request $request){
        $id = Auth::id();
        $profile = Student::where('user_id',$id)->first();
        $class = explode(',',classes::where('id',$profile->kelas)->first()->course_class);

        return view('task_student',['class'=>$class]);
    }
    public function tugas_mapel(Request $request,course $course)
    {
        $id = Auth::id();
        $user = User::where('id',$id)->first();
        $profile = Student::where('user_id',$id)->first();
        $tugas = task::where('course',$course->id)->where('for_class',$profile->kelas)->get();
        $tch = '';
        $guruall = teacher::all();
        foreach ($guruall as $guru) {
            $kelas = explode(',',$guru->teach);
            $mapel = explode(',',$guru->specialist);
            if (in_array($course->id,$mapel) and in_array($profile->kelas,$kelas)){
                $tch = $guru;
            }
            
        }

        return view('tugas_mapel',['tugas'=>$tugas,'nama'=>$user->name,'teacher'=>$tch]);
    }
    public function class_data(Request $request)
    {
        $class = classes::all();
        return view('class_list',['class'=>$class]);
    }
    public function class_fill(Request $request,classes $classes)
    {
        $student = Student::where('kelas',$classes->id)->get();
        return view('student_data',['student'=>$student]);
    }
    public function user_data()
    {
        $users = User::all();
        return view('users_data',['users'=>$users]);
    }
    public function create_task(Request $request)
    {
        $this->validate($request,[
            'judul'=>'required',
            'kelas'=> 'required',
            'course'=> 'required',
            'tanggal'=> 'required',
            'file'=> 'file|mimes:pdf,png,jpeg',
        ]);

        $file = $request->file('file');
        $nama_file = time()."_".$file->getClientOriginalName();
        $upload_to = 'file';
        $tgl = explode('/',$request->tanggal);
        $solve = $tgl[2].'-'.$tgl[0].'-'.$tgl[1];
      
		$file->move($upload_to,$nama_file);

        task::create([
            'judul'=>$request->judul,
            'course'=>$request->course,
            'for_class'=>$request->kelas,
            'file'=>$nama_file,
            'deadline'=>$solve
        ]);
        return response()->json(['success'=>'Article added successfully']);
        // return redirect()->back()->with('status', 'your message,here');
            
    }
    public function answer_task(Request $request)
    {
        $id = Auth::id();
        $user = User::where('id',$id)->first(); 
        $this->validate($request,[
            'tugas'=>'required',
            'file'=> 'file|mimes:pdf,png,jpeg',
        ]);

        $file = $request->file('file');
        $nama_file = time()."_".$file->getClientOriginalName();
        $upload_to = 'answer';
        $file->move($upload_to,$nama_file);


        answer_task::create([
            'nama'=>$user->name,
            'tugas_id'=>$request->tugas,
            'file'=>$nama_file

        ]);
        return redirect()->back()->with('status', 'your message,here');
          

    }
    public function lihat_tugas(Request $request,task $task)
    {
        $tugas = answer_task::where('tugas_id',$task->id)->get();
        return view('tugas_view',['tugas'=>$tugas]);
    }
    public function download(Request $request,$file,$def)
    {
        
        $solve = explode('.',$file);
        
    if ($file == ''){

        return redirect()->back()->with('status','no such file for this task');           
}
else {
    if ($def == 'ans') {
        $file= public_path(). "/answer".'/'.$file;
        
    }
    elseif ($def == 'task') {
        $file= public_path(). "/file".'/'.$file;
        
    }
    
    switch ($solve[count($solve)-1]) {
        case "jpeg" or "jpg":
            $headers = array('Content-Type: image/jpeg');
            break;
        case "doc":
            $headers = array('Content-Type: application/msword');
            break;
        case "png":
            $headers = array('Content-Type: image/png');
          break;
        case "pdf":
            $headers = array('Content-Type: application/pdf');
            break;
        case "docx":
            $headers = array('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
            break;
      } 
   
    return Response::download($file, 'file'.'.'.$solve[count($solve)-1], $headers);
    }
}

public function create_student(Request $request)
{
    // dd($request->kelas );
        $id = Auth::id();
        student::create([
            'user_id'=>$id,
            'nama'=>$request->nama,
             'kelas'=>$request->kelas
        ]);

        return redirect('home')->with('status','no such file for this task');
}

public function coba(Request $request)
{
    $phone = teacher::find(1)->user;
    dd($phone);
    
}
public function download_zip($def)

{
    unlink(public_path().'/'.'file.zip');
    fopen(public_path().'/'.'file.zip', "x");
    
    $solve = [];
    foreach (answer_task::where('tugas_id',$def)->get() as $isi ) {
        $solve[] = $isi->file;
    }
   $zip = new ZipArchive();
   $filename = 'file.zip';
   if($zip->open(public_path($filename),ZipArchive::CREATE == TRUE)){
       $file = File::files(public_path('answer'));
       foreach($file as $key => $value ){
           $namafile = explode('/',$value);
           if(in_array($namafile[count($namafile)-1],$solve)){
            //    echo "ini valuenya lho".$value.'<br>';
               $relativeName = basename($value);
               $zip->addFile($value,$relativeName);

           }
       }
       $zip->close();
   }
   return response()->download(public_path($filename));

}

public function absen(Request $request)
{
    $sekarang = date('d-m-Y');
    $user = Auth::id();
    $sekarang = explode('-',$sekarang);
    $hari = cal_days_in_month(CAL_GREGORIAN,$sekarang[1],$sekarang[2]);
    return view('absen',['hari'=>$hari,'bulan'=>$sekarang[1],'tahun'=>$sekarang[2],'user'=>$user]);
}

}   