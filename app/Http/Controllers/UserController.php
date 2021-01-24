<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Tags;
use App\Post;

class UserController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }
     public function viewcategory()
    {

        return view('category.category');
    }

    public function store_category(Request $request)
    {
       // dd($request->all());
         $txtid = $request->txtid;
         if($txtid == 0)
        {
        $this->validate($request, [
                   'title' => 'required|max:255',    


        ]);
    }
    else
    {
       $this->validate($request, [
            'title' => 'required|max:255'
            
        ]);  
    }

       if (Category::where('id', '=', $request->txtid)->exists()) 
       {
	   Category::where('id', $request->txtid)->update([
	   	'title' => $request->title,
	   	'description' => $request->description

	   ]);
	   }
	   else
	   {
	   	  $user = Category::create([
          	'title'=>$request->title,
          	'description'=>$request->description
          ]);
	   }

       
        
 return redirect('showcategory')
            ->with('success','Category saved successfully.');
       

        
    }
    public function show_category()
    {
        $category= Category::orderBy('title')->get();
      
        return view('category.showcategory',compact('category'));

    }

    public function edit_category($id)
    {
          
            $category= Category::where('id','=',$id)->first();
            
        return view('category.editcategory',compact('category'));
    }

      public function delete_category($id)
    {
          
            $category= Category::where('id','=',$id)->first();
            $category->delete();

            // dd($users);
        return redirect('showcategory');
    }

    // create tags

     public function viewtags()
    {

        return view('tags.createtags');
    }

    public function store_tags(Request $request)
    {
       // dd($request->all());
         $txtid = $request->txtid;
         if($txtid == 0)
        {
        $this->validate($request, [
                   'title' => 'required|max:255',    


        ]);
    }
    else
    {
       $this->validate($request, [
            'title' => 'required|max:255'
            
        ]);  
    }

       if (Tags::where('id', '=', $request->txtid)->exists()) 
       {
	   Tags::where('id', $request->txtid)->update([
	   	'title' => $request->title,
	   	'description' => $request->description

	   ]);
	   }
	   else
	   {
	   	  $user = Tags::create([
          	'title'=>$request->title,
          	'description'=>$request->description
          ]);
	   }

       
        
 return redirect('showtags')
            ->with('success','Tags saved successfully.');
       

        
    }
    public function show_tags()
    {
        $tags= Tags::orderBy('title')->get();
      
        return view('tags.showtags',compact('tags'));

    }

    public function edit_tags($id)
    {
          
            $tags= Tags::where('id','=',$id)->first();
            
        return view('tags.edittags',compact('tags'));
    }

      public function delete_tags($id)
    {
          
            $tags= Tags::where('id','=',$id)->first();
            $tags->delete();

            // dd($users);
        return redirect('showtags');
    }

    // blog code

      public function viewpost()
    {
    	$data['Objcategory'] = Category::orderBy('title','asc')->get();
    	$data['Objtags'] = Tags::orderBy('title','asc')->get();
        return view('post.createpost',$data);
    }

     public function store_posts(Request $request)
    {
       // dd($request->all());
    	  $this->validate($request, [
           'title' => 'required',  
                    'category' => 'required', 
                     'tags' => 'required',
                      'slug' => 'required',
                       'description' => 'required'
            
        ]);  
         $txtid = $request->txtid;
    

       if (Post::where('id', '=', $request->txtid)->exists()) 
       {
	   Post::where('id', $request->txtid)->update([
	   'title'=>$request->title,
      'slug'=>$request->slug,
          	'description'=>$request->description,
          	'category' => json_encode(request('category')),
          	'tags' => json_encode(request('tags'))
	   ]);
      $return['message']='Post saved successfully.';
	   }
	   else
	   {
      try
      {
	   	  $user = Post::create([
          	'title'=>$request->title,
            'slug'=>$request->slug,
          	'description'=>$request->description,
          	'category' => json_encode(request('category')),
          	'tags' => json_encode(request('tags'))
          ]);
          $return['msg']='success';
        $return['message']='Post saved successfully.';
      }
      catch(\Exception $ex)
      {
        $string = $ex->errorInfo[2]; 
        $search = "title"; 
            $position = strpos($string, $search, 0); 
            if($position != 0)
            {
              
              $return['message']='Title is duplicate field';
            }
return redirect('createpost')->with('danger',$return['message']);

        dd($ex);
      }
	   }

       
        
 return redirect('showposts')
            ->with('success',$return['message']);
       

        
    }

     public function show_posts()
    {
        $posts= Post::orderBy('title')->get();
        //dd($posts);
      foreach ($posts as $key => $value) {
      $category =	json_decode($value->category);
		$tags =	json_decode($value->tags);
     $value->category = Category::whereIn('id',$category)->get();
$value->tags = Tags::whereIn('id',$tags)->get();
$tagda[] = Tags::whereIn('id',$tags)->get();
 $tagcount = count($value->tags);
 // dd($tagcount);
 $tagsdata =[];
  $categorydata=[];
              foreach ($value->tags as $tkey => $tagsvalue) {
                 $ckey = $tkey+1;
                   if($ckey == 2)
                  {
        $value->posttagscount=$tagcount - $ckey;
                  }
               if($ckey <= 2)
            {
               $tagsdata[] = $tagsvalue;
            $value->tags = $tagsdata;
            }
            
              }

$categorycount = count($value->category);
               foreach ($value->category as $tkey => $categoryvalue) {
                 $ckey = $tkey+1;
                  if($ckey == 2)
                  {
                 
              $value->postcategorycount=$categorycount - $ckey;
              
                  }
                if($ckey <= 2)
            {
              
             
            $categorydata[] = $categoryvalue;
            $value->category = $categorydata;
             // $postcategorykey[]= $ckey;
          

            }
            else
            {
               
            }
              }

                   // dd($postcategorycount);

            }
              // dd($tagda);
            
     
      
    
        return view('post.showposts',compact('posts'));

    }

    public function viewpostdetails(Request $request)
    {

      $slug = $request->slug;

      $post =  Post::find($slug);
       $data['post'] =  Post::find($slug);
      $postcategory_id = json_decode($post->category);
       $posttags_id = json_decode($post->tags);
        $data['posttags'] = Tags::find($posttags_id);
       
        
      $data['postcategory'] = Category::find($postcategory_id);
     // dd($data);
      return view('post.postdetails',$data);

    }

    public function edit_posts($id)
    {
          $data['Objcategory'] = Category::orderBy('title','asc')->get();
      $data['Objtags'] = Tags::orderBy('title','asc')->get();
          $post =  Post::find($id);
       $data['post'] =  Post::find($id);
      $postcategory_id = json_decode($post->category);
       $posttags_id = json_decode($post->tags);
        $data['posttags'] = Tags::find($posttags_id);
       
        
      $data['postcategory'] = Category::find($postcategory_id);
       $data['postcategory_id'] = $postcategory_id;
       $data['posttags_id'] = $posttags_id;

     // dd($data);
      return view('post.editpost',$data);
            
       
    }

      public function delete_posts($id)
    {
          
            $post= Post::where('id','=',$id)->first();
            $post->delete();

            // dd($users);
        return redirect('showposts');
    }

}
