<?php

namespace App\Http\Controllers\Admin;

use App\Video;
use App\Category;
use App\Discount;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use function Sodium\compare;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('isadmin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $video = Video::all();
        return view('admin.video.index',compact('video'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = Category::all()->pluck('name','id');
        return view('admin/video/create',compact('cat'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
       
        $this->validate(request(),[
            'title' => 'required|max:250',
            'type' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,png,bmp',
            'path' => 'required|mimes:avi,mp4,.mov,wmv',
            'price' => 'required',
        ]);

        $file = $request->file('image');
        if ($request->hasFile('image'))
        {
            $imageUrl = $this->uploadImage($file);
        }
        $file1 = $request->file('path');
        if ($request->hasFile('path'))
        {
            $sourceUrl = $this->uploadSource($file1);
        }
       $video = Video::create(array_merge($request->all(),['image' => $imageUrl],['path' => $sourceUrl]));
        $video->categories()->sync(request('category_id'));
        return redirect('admin/video/create');
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
        $video = Video::find($id);
        $categories = Category::all();
       return view('admin.video.edit',compact('video','categories'));
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
        $video = Video::findorfail($id);
       $file = $request->file('image');
        if ($request->hasFile('image'))
        {
            $imageUrl = $this->uploadImage($file);
        }
        else {
            $imageUrl = $request->image;
        }
        $file1 = $request->file('path');
        if ($request->hasFile('path'))
        {
            $sourceUrl = $this->uploadSource($file1);
        }
        else {
            $sourceUrl = $request->path;
        }
       $video->update(array_merge($request->all(),['image' => $imageUrl],['path' => $sourceUrl]));
       $video->categories()->sync($request->category_id);
       return redirect('admin/video');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::find($id);
        $video->delete();
        $video->categories()->detach();
        return redirect('admin/video');
    }

    private function uploadImage($file)
    {
        $imagePath = "\upload\images";
        $filename = time().'.'. $file->getClientOriginalName();
        $file = $file->move(public_path($imagePath),$filename);
        return $filename;
    }

    private function uploadSource($file1)
    {
       
        $sourcePath = "\upload\sources";
        $filename1 =  time().'.'.$file1->getClientOriginalName();
        $file1 = $file1->move(public_path($sourcePath),$filename1);
        return $filename1;
    }


}
