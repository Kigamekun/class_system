<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\teacher;
use App\Models\admin;
class check_student_register
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        $id = Auth::id();

        if (is_null(admin::where('user_id',$id)->first())) {
                


        if (is_null(teacher::where('user_id',$id)->first())) {
                
            if(is_null(Student::where('user_id',$id)->first())){
                return redirect('/register_student');
            }
            else{
                return $next($request);
    
            }
        }
        else{
            return $next($request);

        }
    }
    else{
        return $next($request);

    }
        
        
    }
}
