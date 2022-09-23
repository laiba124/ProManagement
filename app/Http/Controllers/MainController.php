<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Project;
use App\Models\Task;

use App\Models\Project_User;
use App\Models\TaskUser;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use LengthException;

use function PHPUnit\Framework\returnSelf;

// use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class MainController extends Controller
{
    function login()
    {
        return view('auth.login');
    }
    function register()
    {
        return view('auth.register');
    }
    function save(Request $request)
    {

        // Validate requests
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:12'
        ]);

        // //Insert data into database
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->status = $request->status;

        $save = $user->save();

        if ($save) {
            return back()->with('success', 'New User has been successfuly added to database');
        } else {
            return back()->with('fail', 'Something went wrong, try again later');
        }
    }

    function check(Request $request)
    {
        // Validate requests
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12'
        ]);
        $userInfo = User::where('email', '=', $request->email)->first();
   //     $status = User::find('email');
   //   echo   $status ->status;
      $test= User::where('status', '=', "Blocked");//->first();
         if ($userInfo->status != 'Blocked')
         {
             if (!$userInfo) {
                return back()->with('fail', 'We do not recognize your email address');
            } else {
                //check password
                if ((Hash::check($request->password, $userInfo->password)) || ($request->password = $userInfo->password)) {

                    $request->session()->put('LoggedUser', $userInfo->id);
                    return redirect('/adminDashboard/home');
                } else {
                    return back()->with('message', 'Incorrect password');
                }
            }
        
    }
    else{
        return back()->with('blocked', 'You are blocked. Kindly contact admin to activate your account');


    }
    }

        function dashboard()
        {
            $user = User::all();
            $project = Project::all();
            $task = Task::all();
            $users = count($user);
            $projects = count($project);
            $tasks = count($task);
            $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
            return view('admin.home')
                ->with($data)
                ->with('projects', $projects)
                ->with('tasks', $tasks)
                ->with('users', $users);
        }
        function logout()
        {
            if (session()->has('LoggedUser')) {
                session()->pull('LoggedUser');
                return redirect('/')->with('success', 'You have been logged out!');
            }
        }
        function showusers()
        {
            $user_records = User::all();
            return view("admin.users", ['user_records' => $user_records]);
        }

        function home()
        {
            return view('admin.home'); //, $data);

        }
        function viewProfile($id)
        {
            return view('admin.profile')->with('user_records', User::find($id));
        }

        function showproject()
        {
            return view('admin.projects'); //, $data);

        }

        function updateData($id)
        {
            return view('admin.updateform')->with('user_records', User::find($id));
        }

        function update(Request $request)
        {
            $user_records = User::find($request->id);
            $user_records->name = $request->name;
            $user_records->email = $request->email;
            $user_records->status = $request->status;
            $user_records->role = $request->role;
            $user_records->save();
            return redirect()->back()->with('message', 'RECORD UPDATED SUCCESSFULLY');
            $save = $user_records->save();
            if ($save) {
                return back()->with('success', ' User has been successfuly updated');
            } else {
                return back()->with('fail', 'Something went wrong, try again later');
            }
        }
        function deleteData($id)
        {
            user::destroy($id);
            return redirect()->back()->with('message', 'RECORD DELETED SUCCESSFULLY');
        }

        //---------------------Projects---------------------------------
        function addProject()
        {
            return view("admin.projectForm");
        }
        function addingProject(Request $request)
        {
            $project = new Project();
            $project->title = $request->title;
            $project->description = $request->description;
            $project->status = $request->status;

            $save = $project->save();

            if ($save) {
                return back()->with('success', 'New Project has been successfuly added to database');
            } else {
                return back()->with('fail', 'Something went wrong, try again later');
            }
        }
        function showProjects()
        {
            $projects = Project::all();
            return view("admin.projects", ['projects' => $projects]);
        }
        function updateProject($id)
        {
            $projects = Project::find($id);
            return view("admin.projectUpdateForm", ['projects' => $projects]);
        }
        function updatingProject(Request $request)
        {

            $projects = Project::find($request->id);
            $projects->title = $request->title;
            $projects->description = $request->description;
            $projects->status = $request->status;
            $projects->save();
            return redirect()->back()->with('message', 'RECORD UPDATED SUCCESSFULLY');
        }
      public function viewproject($id)
        {
            $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];

            $user_records = User::all();
            return view('admin.project')
                ->with('projects', Project::find($id))
                ->with(['users_records' => $user_records])
                ->with($data);
        }
    



    public function deleteProject($id)
    {
        $projects = Project::all();

        Project::destroy($id);
        return redirect("adminDashboard/projects")
            ->with(['projects' => $projects])
            ->with('message', 'RECORD DELETED SUCCESSFULLY');
    }
    public function assignProject(Request $request, $id)
    {
        $selected = $request->input('selected_users');
        if ($selected) {
            $count = count($selected);

            $project = Project::find($id);
            for ($i = 0; $i < $count; $i++) {
                $users = user::find([$selected[$i]]);
                $project->users()->syncWithoutDetaching($users);
            }

            return redirect()->back()->with('pass', 'PROJECT ASSIGNED SUCCESSFULLY');
        } else {
            return redirect()->back()->with('fail', 'NO USER SELECTED!!!');
        }
    }

    public function showAssign($id)
    {
        $user = User::find($id);
        return view('admin.viewAssigns')
            ->with(['user' => $user]);
    }
    public function viewMembers($id)
    {
        $project = Project::find($id);
        return view('admin.viewMembers')
            ->with(['project' => $project]);
    }
    //--------------------------Tasks---------------------------------

    public function tasks()
    {
        $tasks = Task::all();
        return view("admin.tasks", ['tasks' => $tasks]);
    }

    public function taskForm()
    {

        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        $project = Project::all();

        return view('admin.taskForm')
            ->with($data)
            ->with(['project' => $project]);
    }

    public function addTask(Request $request, $id)
    {

        $data = User::where('id', '=', session('LoggedUser'))->first();
        $project = Project::find($request->project);
        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->status = $request->status;
        $task->type = $request->type;
        $task->created_by =  $data['id'];
        $project->tasks()->save($task);
        return back()->with('message', 'Task Added Successfully');
    }




    function viewTask($id)
    {
        $user_records = User::all();
        $project = Project::all();
        $test = Task::find($id);
        $user = User::find($test->created_by);
        $pro = Project::find($test->project_id);
        $created_by = $user->name;
        $project_title = $pro->title;

        return view('layout.taskcomment')
            ->with('task', $test)
            ->with(['projects' => $project])
            ->with('project_title', $project_title)
            ->with(['users_records' => $user_records])
            ->with('created_by', $created_by);
    }
    function time($id)
    {
        $user_records = User::all();
        $test = Task::find($id);
        $user = User::find($test->created_by);
        $pro = Project::find($test->project_id);
        $created_by = $user->name;
        $project_title = $pro->title;

        return view('admin.task')
            ->with('task', $test)
            ->with('project_title', $project_title)
            ->with(['users_records' => $user_records])
            ->with('created_by', $created_by);
    }
    public function deleteTask($id)
    {
        Task::destroy($id);
        return redirect('adminDashboard/tasks')->with('pass', 'TASK DELETED SUCCESSFULLY');
    }

    public function editTaskForm($id)
    {
        $task = Task::find($id);
        $project = Project::all();

        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];

        return view("admin.taskUpdateForm", ['task' => $task])
            ->with($data)
            ->with(['project' => $project]);
    }

    public function assignTask(Request $request, $id)
    {
        $selected = $request->input('selected_users');
        if ($selected) {
            $count = count($selected);

            $task = Task::find($id);
            for ($i = 0; $i < $count; $i++) {
                $users = user::find([$selected[$i]]);
                $task->users()->syncWithoutDetaching($users);
            }

            return redirect()->back()->with('pass', 'TASK ASSIGNED SUCCESSFULLY');
        } else {
            return redirect()->back()->with('fail', 'NO USER SELECTED!!!');
        }
    }

    public function updateTask(Request $request)
    {
        $data = User::where('id', '=', session('LoggedUser'))->first();
        $project = Project::find($request->project);
        $task = Task::find($request->id);
        $task->title = $request->title;
        $task->description = $request->description;
        $task->status = $request->status;
        $task->type = $request->type;
        $task->created_by =  $data['id'];
        $project->tasks()->save($task);
        return back()->with('message', 'Task updated Successfully');
    }
    public function viewTaskMembers($id)
    {
        $task = Task::find($id);

        return view('admin.viewTaskMembers')
            ->with(['task' => $task]);
    }

    public function  comments($id)
    {
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];

        $user_records = User::all();
        $project = Project::all();
        $test = Task::find($id);
        $user = User::find($test->created_by);
        $pro = Project::find($test->project_id);
        $created_by = $user->name;
        $project_title = $pro->title;
        return view('admin.Comments')
            ->with('task', $test)
            ->with(['projects' => $project])
            ->with('project_title', $project_title)
            ->with(['users_records' => $user_records])
            ->with($data)
            ->with('created_by', $created_by);
    }


    public function addComment(Request $request, $Task_id)
    {

        $comment = new Comment();
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment =  $request->comment;
        $comment->userid =  $request->userid;
        $comment->task_id = $Task_id;
        $save = $comment->save();

        return back()->with('message', '✔ Comment Added Successfully');
    }
    public function deleteComment($id)
    {

        $test = Comment::find($id);
        $data = User::where('id', '=', session('LoggedUser'))->first();
        if ($data->id == $test->userid) {
            Comment::destroy($id);
            return redirect()->back()->with('msg', 'Comment Deleted');
        } else {
            return redirect()->back()->with('msg', 'You can not delete the comment');
        }
    }
    public function viewProjectTask($id)
    {
        $project = $id;
        $task = Task::find($id);
        $tasks = Task::all();
        $projects = Project::all();
        return view('admin.viewProjectTask')
            ->with('project', $project)
            ->with('projects', $projects)

            ->with('task', $task)
            ->with('tasks', $tasks);
    }
}
