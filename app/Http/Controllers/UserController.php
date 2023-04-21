<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegisterDetail;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $show_details = RegisterDetail::all();
        return view('show', compact('show_details'));
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
        $request->validate([


            'password' => [
                'required',
                'string',
                'min:6',             // must be at least 6 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
            ],
            'username' => 'required | alpha',
            'email'    => 'required | email | unique:laravel_task',
            // 'password' => 'required | min:6 |regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
            'password_confirm' => 'required | same:password',
            'image'    => 'required | mimes:png,jpg | max:2048',
            'gender'   => 'required',
            'dob'      => 'required',
            'degree'   => 'required',

        ]);
        // dd($request->dob);

        // $format_date = Carbon::createFromFormat('Y-m-d', $request->dob)
        //     ->format('d-m-Y');

        $user_details           = new RegisterDetail();
        $user_details->name     = $request->username;
        $user_details->email    = $request->email;
        $user_details->password = $request->password;
        $user_details->gender   = $request->gender;
        $user_details->dob      = $request->dob;
        $user_details->degree   = $request->degree;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/students/', $filename);
            $user_details->image = $filename;
        }
        $user_details->save();
        return redirect()->route('show_details')->with('success', 'User Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $find_user = RegisterDetail::find($id);
        if ($find_user) {
            return view('edit', compact('find_user'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([


            'password' => [
                'required',
                'string',
                'min:6',             // must be at least 10 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
            ],
            'username' => 'required | alpha',
            'email'    => 'required | email',
            'image'    => 'required | mimes:png,jpg | max:2048',
            'gender'   => 'required',
            'dob'      => 'required',
            'degree'   => 'required',

        ]);

        $update_user = RegisterDetail::find($id);
        $update_user->name      =  $request->username;
        $update_user->email     =  $request->email;
        $update_user->password  = $request->password;
        $update_user->gender    = $request->gender;
        $update_user->DOB       = $request->dob;
        $update_user->degree    = $request->degree;



        if ($request->hasfile('image')) {
            $destination = 'uploads/students/'.$update_user->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'. $extension;
            $file->move('uploads/students/',$filename);
            $update_user->image = $filename;
        }

        $update_user->update();
        return redirect()->route('show_details')->with('status','Student Image Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_details = RegisterDetail::find($id);

        $destination = public_path('uploads/students/' . $user_details->image);
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $user_details->delete();
        return redirect()->back()->with('sucess', 'User Delete Successfully');
    }
}
