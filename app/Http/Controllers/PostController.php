<?php

namespace App\Http\Controllers;

use App\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
  public function index() {
  $posts = Post::all();
  return view('posts', compact('posts'));
  }

  public function destroy($id)
  {
    $post = Post::findOrFail($id);
    $post -> delete();
    return response() -> json('deleted' . $id . ' post', 200);
  }

  public function update(Request $request, $id)
  {
    $post = Post::findOrFail($id);
    $post -> title = $request['title'];
    $post -> text = $request['text'];
    $post -> save();

    return response() -> json('update post w/id' . $id , 200);
  }

}
