<?php

namespace App\Http\Controllers;

use App\Mail\mailCheck;
use App\Models\loginMails;
use App\Models\mailOtps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Models\department;
use App\Models\batch;
use App\Models\college;
use App\Imports\studentImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\course;
use App\Models\studentCourseAllocate;

class AdminLoginController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function loginDashboard(Request $request)
    {
        $credentials = $request->only('username','password');
        $datas = loginMails::where('username', $request->username)
                            ->where('password', $request->password)->first();
        if ($datas) {
            if ($datas->user_type === 'admin') {
                Auth::login($datas);
                return redirect('admin/dashboard');
            } elseif ($datas->user_type === 'users') {
                Auth::login($datas);
                return redirect('user/userDashboard');
            } else {
                return redirect()->route('login')->with('error', 'Invalid user type.');
            }
        } else {
            return redirect()->route('login')->with('error', 'Invalid credentials. Please try again.');
        }
        }


    public function signin()
    {
        return view('admin.signin');
    }
    public function mailStore(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = loginMails::create([
            'username' => $request->username,
            'password' => $request->password,
            'user_type' => 'admin',
        ]);

        if ($user) {
            return redirect('login')->with('success', 'User created successfully.');
        } else {
            return redirect('signin')->with('error', 'Failed to create user.');
        }
    }

    public function forgot()
    {
        return view('admin.forgot');
    }

    public function generateAndSendOtp(Request $request)
    {
        $request->validate([
            'username' => 'required',
        ]);

        $email = $request->input('username');
        $user = loginMails::where('username', $email)->first();
        if ($user) {
            $otp = mt_rand(100000, 999999);

            mailOtps::create([
                'username' => $email,
                'otp' => $otp,
            ]);

            Mail::to($email)->send(new mailCheck($otp));

            return view('admin.otp', compact('email'));
        } else {

            return redirect()->route('forgot')->with('error', 'Invalid Mail');
        }
    }

    public function otp()
    {
        return view('admin.otp');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required',
        ]);
        $otp = $request->input('otp');
        $otpEntry = mailOtps::where('otp', $otp)->latest()->first();
        if ($otpEntry) {
            return view('admin/newpass');
        } else {
            return redirect()->route('otp')->with('error', 'Invalid otp');
        }
    }

    public function newpass()
    {
        return view('admin.newpass');
    }

    public function updatePassword(Request $request)
    {
        $email = $request->input('username');
        $newPassword = $request->input('password');
        $user = loginMails::where('username', $email)->first();
        if ($user) {
            $user->password = $newPassword;
            $user->save();

            return view('admin/login');
        } else {
            return redirect()->route('login')->with('error', 'Invalid mail');
        }
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function showData()
    {
        $data = loginMails::with('department','college','batch')->where('user_type', 'users')->get();
        return view('admin.dashboard', ['data' => $data]);
    }

    public function userDashboard()
    {
        $user = Auth::user();
        $departmentId = $user->department_id;
        $collegId = $user->college_id;
        $batchId = $user->batch_id;
        $courseId = $user->course_id;

        $datas = studentCourseAllocate::with(['department','college', 'batch','course'])
            ->where('department_id',$departmentId)
            ->where('college_id',$collegId)
            ->where('batch_id',$batchId)->get();

        return view('user.userDashboard', compact('datas'));
    }

    //logout
    public function logout(Request $request)
    {
        Auth::logout();

        $response = redirect()->route('login');
        $response->header('Cache-Control', 'no-cache, no-store, must-revalidate');
        $response->header('Pragma', 'no-cache');
        $response->header('Expires', '0');

        return $response;
    }

    // displaying the data in particular individual blade
    public function department()
    {
        $departments = department::all();
        return view('dashboard.department', ['departments' => $departments]);
    }

    public function college()
    {
        $colleges = college::all();
        return view('dashboard.college', ['colleges' => $colleges]);
    }

    public function batch()
    {
        $batches = batch::all();
        return view('dashboard.batch', ['batches' => $batches]);
    }

    public function student()
    {
        return view('dashboard.student');
    }

    public function course()
    {
        return view('dashboard.course');
    }

    // editing the data in the dashboard
    public function editDashboardData($id)
    {
        $data = loginMails::findOrFail($id);
        $departments = Department::all();
        $colleges = college::all();
        $batches = batch::all();
        return view('edit.editDashboardData', compact('data', 'departments', 'colleges', 'batches'));
    }

    public function updateData(Request $request, $id)
    {
        $record = loginMails::findOrFail($id);
        $record->update([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'department_id' => $request->input('department_id'),
            'college_id' => $request->input('college_id'),
            'batch_id' => $request->input('batch_id'),
            'DOB' => $request->input('DOB'),
            'phone_number' => $request->input('phone_number')
        ]);
        $record->save();

        return redirect()->route('dashboard')->with('success', 'Data updated successfully');
    }

    public function deleteDashboardData($id)
    {
        $data = loginMails::findOrFail($id);
        $data->delete();

        return redirect()->route('dashboard');
    }

    // edit , update and delete the data in particular individual blade
    public function editDepartment($id)
    {
        $department = department::find($id);
        return view('edit.editDepartment', compact('department'));
    }

    public function updateDepartment(Request $request, $id)
    {
        $department = department::find($id);
        $department->department = $request->input('department');
        $department->save();

        return redirect()->route('department')->with('success', 'Department updated successfully');
    }

    public function deleteDepartment($id)
    {
        $department = department::findOrFail($id);
        $department->delete();

        return redirect()->route('department');
    }

    // college
    public function editCollege($id)
    {
        $college = college::find($id);
        return view('edit.editCollege', compact('college'));
    }
    public function updateCollege(Request $request, $id)
    {
        $college = college::find($id);
        $college->college = $request->input('college');
        $college->save();

        return redirect()->route('college');
    }
    public function deleteCollege($id)
    {
        $college = college::findOrFail($id);
        $college->delete();

        return redirect()->route('college');
    }

    // Batch
    public function editBatch($id)
    {
        $batch = batch::find($id);

        return view('edit.editBatch',compact('batch'));
    }
    public function updateBatch(Request $request, $id)
    {
        $batch = batch::find($id);
        $batch->batch = $request->input('batch');
        $batch->save();

        return redirect()->route('batch');
    }
    public function deleteBatch($id)
    {
        $batch = batch::findOrFail($id);
        $batch->delete();

        return redirect()->route('batch');
    }

    // Course
    public function editCourse($id)
    {
        $course = course::find($id);

        return view('edit.editCourse',compact('course'));
    }
    public function updateCourse(Request $request, $id)
    {
        $course = course::find($id);
        $course->course = $request->input('course');
        $course->save();

        return redirect()->route('course');
    }
    public function deleteCourse($id){
        $course = course::findOrFail($id);
        $course->delete();

        return redirect()->route('course');
    }

    // Functions of adding data of Students

    // Adding the Department
    public function addDepartment()
    {
        return view('add.addDepartment');
    }
    public function getDepartment(Request $request) // getting the department
    {
        $request->validate([
            'department' => 'required',
        ]);
        $department = new department();
        $department -> department = $request->get('department');
        $department->save();
        $departments  = department::all();

        return redirect('department')->with('departments', $departments);
    }

    // Adding the College
    public function addCollege()
    {
        return view('add.addCollege');
    }
    public function getCollege(Request $request)    // getting the College
    {
        $request->validate([
            'college' => 'required',
        ]);
        $college = new college();
        $college -> college = $request->get('college');
        $college->save();
        $colleges  = college::all();

        return redirect('college')->with('colleges',$colleges);
    }

    // Adding the Batch
    public function addBatch()
    {
        $batches = batch::all();
        return view('add.addBatch');
    }
    public function getBatch(Request $request)  //  getting the batch
    {
        $request->validate([
            'batch' => 'required',
        ]);
        $batch = new batch();
        $batch -> batch = $request->get('batch');
        $batch->save();
        $batches  = batch::all();

        return redirect('batch')->with('batches',$batches);
    }

    // Adding the Course
    public function addCourse()
    {
        $course = course::all();

        return view('add.addCourse', ['courses' => $course]);
    }
    public function getCourse(Request $request) //  getting the batch
    {
        $request->validate([
            'course' => 'required',
        ]);
        $course = new course();
        $course -> course = $request->get('course');
        $course->save();
        $courses  = course::all();

        return redirect('course')->with('courses',$courses);
    }

    // Dependency dropdown for students
    public function show()
    {
        $departments = department::all();
        $colleges = college::all();
        $batches = batch::all();

        return view('dashboard.student', ['departments' => $departments, 'colleges' => $colleges, 'batches' => $batches]);
    }

    // Excel sheet
    public function uploadExcel(request $request)
    {
        // dd($request->import_file);
        $department = $request->input('department');
        $college = $request->input('college');
        $batch = $request->input('batch');
        Excel::import(new studentImport($department,$college,$batch), $request->import_file);
        // dd($request);
        return redirect()->back()->with('status', 'Imported Successfully');
    }

    // Storing the data which are selected in the course Allocate blade
    public function courseGenerate(Request $request)
    {
        $validatedData = $request->validate([
            'department' => 'required',
            'college' => 'required',
            'batch' => 'required',
            'Course' => 'required',
        ]);

        $department_id = $request->input('department');
        $college_id = $request->input('college');
        $batch_id = $request->input('batch');
        $course_id = $request->input('Course');

        studentCourseAllocate::create([
            'department_id' => $department_id,
            'college_id' => $college_id,
            'batch_id' => $batch_id,
            'course_id' => $course_id,
        ]);

        return redirect()->route('course');
    }

    // Dependancy dropdown for Courses
    public function showCourse()
    {
        $departments = department::all();
        $colleges = college::all();
        $batches = batch::all();
        $courses = course::all();

        return view('dashboard.course', ['departments' => $departments, 'colleges' => $colleges, 'batches' => $batches, 'courses' => $courses]);
    }

    // viewing, editing and deleting the course allocated to the department, course, batch
    public function viewCourse()
    {
        $data = studentCourseAllocate::with('department','college','batch','course')->get();

        return view('display.viewCourse', ['data' => $data]);
    }

    public function editCourseAllocate($id)
    {
        $data = studentCourseAllocate::findOrFail($id);
        $departments = Department::all();
        $colleges = college::all();
        $batches = batch::all();
        $courses = course::all();
        view('edit.editCourseAllocate', compact('data', 'departments', 'colleges', 'batches', 'courses'));
    }

    public function updateCourseAllocate(Request $request, $id)
    {
        $record = studentCourseAllocate::findOrFail($id);
        $record->update([
            'department_id' => $request->input('department_id'),
            'college_id' => $request->input('college_id'),
            'batch_id' => $request->input('batch_id'),
            'course_id' => $request->input('course_id'),
        ]);
        $record->save();

        return redirect()->route('dashboard')->with('success', 'Data updated successfully');
    }

    public function deleteCourseAllocated($id)
    {
        $data = studentCourseAllocate::findOrFail($id);
        $data->delete();

        return redirect()->route('viewCourse');
    }
}

