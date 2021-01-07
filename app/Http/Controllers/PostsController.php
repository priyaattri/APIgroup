<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Spatie\ArrayToXml\ArrayToXml;

class PostsController extends Controller
{
     //used for the API route to show the posts
    public function show($id=null){
        if(isset($id)){
        //Get one post
        $post = Post::where('post_id', '=',$id)->get();
        return $post;
        }else{
        //Get all posts
        $posts = Post::all();
        return $posts;
        }
    }

    //API index
    public function index(){

        if(!auth()->user()->tokenCan('read_posts')){
            abort(403,"Unauthorised Access. Token Error");
        }
        $posts = $this->show();
        //return view('allPosts', compact('posts'));
        return $posts;
    }

    public function get_all_xml(){

        if(!auth()->user()->tokenCan('read_posts')){
            abort(403,"Unauthorised Access. Token Error");
        }      
        $posts = $this->show()->toArray();
        $posts_list = array('posts'=>$posts);
        //echo "<pre>";print_r($posts_list);die;
        //return view('allPosts', compact('posts'));
        $posts_xml = ArrayToXml::convert($posts_list);
        return $posts_xml;
    }

    //API store funtion-POST request
    public function store(Request $request){
        $post = Post::create($request->all());
        if($request->wantsJson()){
            return $this->index();
        }else{
            return redirect('dashboard');
        }
    }

    //API update function
    public function update(Request $request, $id){

        if(!auth()->user()->tokenCan('update_posts')){
            abort(403,"Unauthorised Access. Token Error");
        }
        $post = Post::where('post_id', '=',$id)->firstOrFail();
        $post->update($request->all());
        return $post;
    }

    public function destroy($id){

        if(!auth()->user()->tokenCan('update_posts')){
            abort(403,"Unauthorised Access. Token Error");
        }
        $post = Post::where('post_id', '=',$id)->firstOrFail();
        return $post->destroy($id);
    }

    //Create token for authentication
    public function create_token(){
        $user = Auth::user();
        $token = $user->createToken('developer-access',['create_posts','read_posts','update_posts']);

        echo $token->plainTextToken;
    }

    //

   public function addPost()
    {
    	return view('addPost');
    }

    public function storePost(Request $request){
    	$text = $request->text;
    	$image = $request->file('file');
    	$imageName = time().'.'.$image->extension();
    	$image->move(public_path('images'),$imageName);

    	$post = new Post();
    	$post->caption = $text;
    	$post->postImage= $imageName;
    	$post->save();
    	return back()->with('post_added','New Post has been added');
    }

    public function posts(){
    	$posts = Post::all();
    	return view('allPosts',compact('posts'));
    }

    public function editPost($post_id){

    	$post = Post::find($post_id);
    	return view('editPost',compact('post'));
    }
    
    public function updatePost(Request $request){
    	$text = $request->text;
    	$image = $request->file('file');
    	$imageName = time().'.'.$image->extension();
    	$image->move(public_path('images'),$imageName);

    	$post = Post::find($request->post_id);
    	$post->caption = $text;
    	$post->postImage = $imageName;
    	$post->save();

    	return back()->with('post_updated', 'Post updated successfully!');
    }
    public function deletePost($post_id){
    	$post = Post::find($post_id);
    	unlink(public_path('images').'/'.$post->postImage);
    	$post->delete();
    	return back()->with('post_deleted', 'Post deleted successfully!');
    }
}
