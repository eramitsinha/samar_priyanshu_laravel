<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    function register(Request $request)
    {

        if($request->submit=="Register") // button click - post
        {
           $input = $request->all(); // fetch all


            // validation rules
            $request->validate([
                    'n1' => 'alpha|min:4|max:30|required',
                    'e1' => 'email|required',
                    'p1' => 'alpha_num|min:8|required',
                    'm1' => 'numeric|required'
            ]);
            // encrypt password
            $p1 = Hash::make($request->p1);

            // object
            $obj = new User();
            $obj->name = htmlspecialchars($request->n1);
            $obj->email = $request->e1;
            $obj->password = $p1;
            $obj->mobile = $request->m1;
            $obj->save(); // insert

            $message = "Registration Success";
            return view("register",compact('message'));



        }
        else
        {
            return view("register"); // get
        }
    }

    function display()
    {
        $k = User::paginate(3);
        return view("display",compact('k'));
    }

    function delete($id)
    {
        // delete - Modelname::find($id)->delete();
        User::find($id)->delete();
        return redirect("display");
    }

    function login()
    {
        return view("login");
    }

    function login_check(Request $request)
    {
        $e1 = $request->e1;
        $p1 = $request->p1;

        $k = Auth::attempt(['email'=>$e1, 'password'=>$p1]);

        if($k)
        {
            return redirect("dashboard");
        }
        else
        {
            echo "Invalid Login. Try again!!";
        }
    }

    function dashboard()
    {
        return view("dashboard");
    }

    function logout()
    {
        Auth::logout();
        return redirect("login");
    }

    function upload()
    {
        return view("upload");
    }

    function upload_file(Request $request)
    {
        // rename
        $k = uniqid(). '.' . $request->f1->extension();

        echo $k;

        // use move()
        $request->f1->move(public_path('uploads/'),$k);


        echo "File has been uploaded";


    }

    function contact(Request $request)
    {
        if($request->submit=="Send")
        {
            // fetch
            $sname = $request->sname;
            $scourse = $request->scourse;
            $smessage = $request->smessage;

            // send email - Mail::raw()
            /*
                Mail::raw('BODY',function($variable){
                    $variable->sender('Sender Email','Sender Name');
                    $variable->to('Recepeint Email','Name');
                    $variable->subject('Subject')
                });

            */

            $body = "
                Student Name - $sname
                Course Interested - $scourse
                Message - $smessage
            ";
            Mail::raw($body,function($k){
                $k->sender("dummy@gmail.com","Dummy");
                $k->to("dummy@gmal.com","Dummy");
                $k->subject("New Student Inquiry");
            });

            echo "Thanks. We will contact you soon";
        }
        else
        {
            return view("contact");
        }
    }

}
