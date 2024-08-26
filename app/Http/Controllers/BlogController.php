<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use File;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $blog = Post::with('category')->paginate(5);
      
        return view('index',compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $categories=Category::all();
        $this->authorize('create',Post::class);
       // Gate::authorize('create_post');
        return view('create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
            'title'=>'required|max:233',
            'category_id'=>'required',
            'description'=>'required'
        ]);
        $fileName = time().'_'.$request->image->getClientOriginalName();
        $filePath = $request->image->storeAs('public/uploads', $fileName);

      


        $post= new Post();
        $post->image = 'uploads/'.$fileName;
       
        $post->title=$request->title;
        $post->category_id=$request->category_id;
        $post->description=$request->description;
        $post->save();
        return redirect()->route('blogs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
       $blog=Post::findorFail($id);
       return view('show',compact('blog')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

       // Gate::authorize('edit',$id);
        $post=Post::findorFail($id);
        $this->authorize('edit',$post);
       // dd($post);
        $categories=Category::all();
        return view('edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        $post=Post::findorFail($id);

        $request->validate([
            
            'title'=>'required|max:233',
            'category_id'=>'required',
            'description'=>'required'
        ]);


        if($request->hasFile('image')) {

            $request->validate([
                'image' => 'required|image'
            ]);
        
            $fileName = time().'_'.$request->image->getClientOriginalName();
            $filePath = $request->image->storeAs('public/uploads', $fileName); 

             File::delete(public_path($post->image));

            $post->image = 'uploads/'.$fileName;;
        }
        

        $post->title = $request->title;
        $post->description = $request->description;
        $post->category_id = $request->category_id;

        $post->save();

        return redirect()->route('blogs.index');
       


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $blog=POST::findorFail($id);
        $blog->delete();
        return redirect()->route('blogs.index');
    }

    // public function unavailable() {
    //     return  view('unavailable');
    // }
}
