<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Profile;
use App\Http\Controllers\Controller;
use App\ProfileHistory;
use Carbon\Carbon;

class ProfileController extends Controller
{
    public function add() {
        return view('admin.profile.create'); 
    }
    
    public function create(Request $request) {
        $this->validate($request, Profile::$rules);

        $profile = new Profile;
        $form = $request->all();
        unset($form['_token']);
        // データベースに保存する
        $profile->fill($form);
        $profile->save();
        return redirect('/admin/profile/create');
    }
    public function edit(Request $request) {
        $profile = Profile::find($request->id);
      if (empty($profile)) {
        abort(404);    
      }
      
        return view('admin.profile.edit',['profile_form' =>$profile]);
    }
    public function update(Request $request) {
        $this->validate($request, Profile::$rules);
      
        $profile = Profile::find($request->id);
      
        $profile_form = $request->all();
    //   if (isset($profile_form['image'])) {
    //     $path = $request->file('image')->store('public/image');
    //     $news->image_path = basename($path);
    //     unset($news_form['image']);
    //   } elseif (isset($request->remove)) {
    //     $news->image_path = null;
    //     unset($news_form['remove']);
    //   }
    //   unset($news_form['_token']);

    
         $profile->fill($profile_form)->save();
        
        
         $history = new ProfileHistory;
         $history->profile_id = $profile->id;
         $history->edited_at = Carbon::now();
         $history->save();
         return redirect('/admin/profile/edit');
    }
}
