<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class BlogController extends Controller
{
    //
    function show(){
        // $blogs = DB::table('blogs')->orderBy('id','ASC')->get();
        //Using Eloquent ORM
        $blogs = Blog::all();
        return view('admin_side')->with(compact('blogs'));
    }
    function showuser(){
        // $blogs = DB::table('blogs')->orderBy('id','ASC')->get();
        //Using Eloquent ORM
        $blogs = Blog::all();
        return view('list')->with(compact('blogs'));
    }
    function addBlog(){
        return view('add');
    }
    function saveBlog(Request $request){
        $validator = Validator::make($request->all(),[
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        if($validator->passes()){
            //Insert in DB
            // echo "Validated";
            $blog = new Blog;
            $blog->title = $request->title;
            $blog->content = $request->content;
            $blog->save();

            $request->session()->flash('msg','Blog saved succesfully');
            return redirect('blogs');
        }else{
            return redirect('blogs/add')->withErrors($validator)->withInput();
            //return with error
        }
    }

    function editBlog($id,Request $request){
        //Fetch record from database
        $blog = Blog::where('id',$id)->first();
        if(!$blog){
            $request->session()->flash('errorMsg','Record not found');
            return redirect('blogs');
        }
        return view('edit')->with(compact('blog'));
    }

    function updateBlog($id,Request $request){
        $validator = Validator::make($request->all(),[
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        if($validator->passes()){
            //Insert in DB
            // echo "Validated";
            $blog = Blog::find($id);
            $blog->title = $request->title;
            $blog->content = $request->content;
            $blog->save();

            $request->session()->flash('msg','Blog updated succesfully');
            return redirect('blogs');
        }else{
            return redirect('blogs/edit/'.$id)->withErrors($validator)->withInput();
            //return with error
        }
    }

    function deleteBlog($id, Request $request){
        $blog = Blog::where('id',$id)->first();
        if(!$blog){
            $request->session()->flash('errorMsg','Record not found.');
            return redirect('blogs');
        }

        Blog::where('id',$id)->delete();
        $request->session()->flash('msg','Record has been deleted successfully');
        return redirect('blogs');
    }
}
