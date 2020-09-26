<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{
  public function index(){
    return view('home');
  }

  public function allBlogs() {
    $blogs = Blog::all();
    return response($blogs);
  }

  public function saveBlog(Request $request) {
    $this->validate($request, [
        'title' => 'required',
        'content' => 'required'
    ]);

    // dd($request);


         $blog = new Blog;
         $blog->title = $request->title;
         $blog->content = $request->content;
         $blog->save();

         // return response()->json(
         //     [
         //         'success' => true,
         //         'message' => 'Comment send successfully'
         //     ]
         // );

         return redirect('/')->with(['success' => 'Save blog success']);
  }

  // edit data blog
  public function editBlog($id)

  {
      $blog = Blog::find($id);
      return response()->json($blog);

  }

  public function updateBlog(Request $request, $id)
  {
    // dd($request);
    $blog = Blog::find($id);
    $blog->title = $request->title;
    $blog->content = $request->content;
    $blog->save();

    return redirect('/')->with(['success' => 'Save blog success']);
  }

  public function deleteBlog($id)

  {

      Blog::find($id)->delete();



      return response()->json(['success'=>'Blog deleted successfully.']);

  }

  // https://itsolutionstuff.com/post/laravel-6-ajax-crud-tutorialexample.html

}
