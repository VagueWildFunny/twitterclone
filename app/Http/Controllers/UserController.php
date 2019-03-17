<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Image;
use Redirect;
use File;
use App\User;
use DB;
use Storage;
class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::get();

        return view('index')
            ->with('users', $users);
    }


    public function profile()
    {
        return view('profile', array('user' => Auth::user()));
    }

    public function update_avatar(Request $request) 
    {
        $user = User::find(Auth::user()->id);
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();

            if ($user->avatar !== 'default.png') {
                $file = 'uploads/avatar/' . $user->avatar;

                if (File::exists($file)) {
                     
                     unlink($file);

                    
                }

            }
            Image::make($avatar)->fit(300, 300)->save('uploads/avatar/' . $filename); 
            $user = Auth::user(); 
            $user->avatar = $filename; 
            $user->save();

            
            }
            return Redirect::back();
    }  

    public function show($slug)
    {
        $user = User::where('slug', $slug)
        ->firstOrFail();
    
        return view('show')
            ->with('user', $user);
    }


    public function edit($id) 
    {   
        
        $user = User::findOrFail($id);

        if($user = Auth::user()){
            return view('edit')
                ->with('user', $user);
                
                
        }
        
        return Redirect::to('index');
    
       
      
    }


    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            // logica
            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->slug = $request->slug;
            $user->save();

            DB::commit();

            return Redirect::to('profile');
        }
        catch(Exception $e) {
            // later
            DB::rollback();
            dd($e->getMessage());
        }

    }

    public function destroy($id)
    {
        //
        $user = User::findOrFail($id);
        $image_path = 'uploads/avatar/'.$user->avatar;

        File::delete($image_path);
        
        $user->delete();
        
        return redirect('index');
    }
        


    
}


