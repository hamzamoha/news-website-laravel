<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->wantsJson()){
            $per_page = intval(request()->input("per_page", 20));
            return response()->json(Post::orderBy('id', 'desc')->paginate($per_page,["id","title","categories","status","created_at"]));
        }
    }
    public function index_category()
    {
        return view("news.index_category")->with("category", request("category"));
    }
    public function index_tag()
    {
        return view("news.index_tag")->with("tag", request("tag"));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post->status = "draft";
        $post->title = $request->input("title", "");
        $post->content = $request->input("content", "");
        $post->tags = $request->input("tags", "");
        $post->categories = $request->input("categories", "");
        $post->video = $request->input("video", 0);
        $post->user_id = auth()->id();
        $post->image = "";
        $slug = Str::slug($post->title);
        if(Post::where("slug", $slug)->exists()){
            $i = 1;
            while(Post::where("slug", "$slug-$i")->exists()) $i++;
        }
        $post->slug = "$slug-$i";
        if($request->hasFile("image")){
            $old_image = $post->image;
            $image = $request->file("image");
            try {
                $image->move(public_path("images/uploads/news-$post->id.".$image->getClientOriginalExtension()));
                exec("ffmpeg -y -i ".public_path("images/uploads/news-$post->slug.".$image->getClientOriginalExtension())." ".public_path("images/uploads/news-$post->slug.jpg"));
                $post->image = "/images/uploads/news-$post->id.".$image->getClientOriginalExtension();
                if($old_image!=$post->image && is_file(public_path($old_image)))
                    try {
                        unlink(public_path($old_image));
                    }
                    catch (\Throwable $t) {}
            }
            catch (\Throwable $e){}
        }
        else if($request->has("image")&&$request->input("image")=="delete"){
            if(is_file(public_path($post->image)))
                try {
                    unlink(public_path($post->image));
                    $post->image = "";
                }
                catch(\Throwable $e){}
        }
        $post->save();
        return response()->json([
            "status"=> "success",
            "post"=> $post,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        if(request()->wantsJson()) return response()->json(Post::find($id));
        return view("news.show", [
            "post" => Post::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function publish(Post $post){
        $post->status = "publish";
        $post->save();
    }
    public function toDraft(Post $post){
        $post->status = "draft";
        $post->save();
    }
    public function update(Request $request, $id)
    {
        if(($post = Post::find($id)) && ($post->user_id == auth()->id()));
        else return response()->json([]);
        if($request->has("title"))
            $post->title = $request->input("title")?$request->input("title"):"";
        if($request->has("content"))
            $post->content = $request->input("content")?$request->input("content"):"";
        if($request->has("tags"))
            $post->tags = $request->input("tags")?$request->input("tags"):"";
        if($request->has("categories"))
            $post->categories = $request->input("categories")?$request->input("categories"):"";
        if($request->has("video"))
            $post->video = $request->input("video");
        if($request->has("status") && ($request->input("status")=="publish" || $request->input("status")=="draft")) 
            $post->status = $request->input("status");
        if($request->hasFile("image")){
            $old_image = $post->image;
            $image = $request->file("image");
            try {
                $image->move(public_path("images/uploads/"), "news-$post->slug.".$image->getClientOriginalExtension());
                exec("ffmpeg -y -i ".public_path("images/uploads/news-$post->slug.".$image->getClientOriginalExtension())." ".public_path("images/uploads/news-$post->slug.jpg"));
                $post->image = "/images/uploads/news-$post->slug.jpg";
                if($old_image!=$post->image && is_file(public_path($old_image)))
                    unlink(public_path($old_image));
            }
            catch (\Throwable $e){}
        }
        else if($request->has("image")&&$request->input("image")=="delete"){
            if(is_file(public_path($post->image)))
                try {
                    unlink(public_path($post->image));
                    $post->image = "";
                }
                catch(\Throwable $t){}
        }
        $slug = Str::slug($post->title);
        $i = 1;
        if(Post::where("slug", $slug)->where("id", "<>", $id)->exists()){
            while(Post::where("slug", "$slug-$i")->exists()) $i++;
            $slug = "$slug-$i";
        }
        $post->slug = "$slug";
        $post->save();
        $this->rename_image($post);
        return response()->json([
            "status"=> "success",
            "post"=> $post
        ]);
    }
    private function rename_image(Post $post){
        if(is_file(public_path($post->image))){
            if($post->image!="/images/uploads/news-$post->slug.jpg"){
                try {
                    rename(public_path($post->image), "/images/uploads/news-$post->slug.jpg");
                } catch (\Throwable $t) {}
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if($post && $post->user_id == auth()->id()){
            if(is_file(public_path($post->image))){
                unlink(public_path($post->image));
            }
            $post->delete();
        }
        return response()->json(["status" => "delete"]);
    }
}
