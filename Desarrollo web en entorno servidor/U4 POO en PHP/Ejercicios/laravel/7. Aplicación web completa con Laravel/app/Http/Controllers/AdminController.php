<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        if ($file = $request->file('image_name')) {
            $file_name = $file->getClientOriginalName();
            $file->move('images', $file_name);
            $image = Image::create(['name' => $file_name]);
            $input['image_id'] = $image->id;
        }
        
        $input['password'] = Hash::make($request->password);
        User::create($input);

        return redirect('/admin/users');
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
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
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
        $user = User::findOrFail($id);
        $input = $request->all();

        if ($file = $request->file('image_name')) {
            if (!empty($user->image->name)) {
                File::delete(public_path("images/{$user->image->name}"));
            }
            $file_name = $file->getClientOriginalName();
            $file->move('images', $file_name);
            $image = Image::create(['name' => $file_name]);
            $input['image_id'] = $image->id;
        }

        Session::flash('user_edited', __('flash.user_edited', ['name' => $user->name]));
        $user->update($input);

        return redirect('admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if (!empty($user->image->name)) {
            File::delete(public_path("images/{$user->image->name}"));
        }

        $user->delete();

        return redirect('admin/users');
    }
}
