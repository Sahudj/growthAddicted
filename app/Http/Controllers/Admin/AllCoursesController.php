<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Packages;
use App\Models\Courses;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Vimeo\Laravel\Facades\Vimeo;
use DB;
class AllCoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $sql = "select `main_folder_name`, package_id, group_concat(sub_folder_name SEPARATOR ' , ') as sub_folder_name from `main_course` group by package_id";
        $courses = DB::select($sql);

        return view('admin.courses.list', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $packages = Packages::select('id', 'name')->get();
        return view('admin.courses.add', compact('packages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        if(count($request->foldername) > 0){
            $getlength = count($request->foldername);
            for($i = 0; $i < $getlength; $i++){
                DB::table('main_course')->insert([
                    'package_id'=> $request->packageId,
                    'main_folder_name'=> $request->mainFolderName,
                    'main_folder_id'=> $request->mainFolderId,
                    'sub_folder_name' => $request->foldername[$i],
                    'sub_folder_id'=>  $request->folderId[$i],
                ]);
            }
        }
        return redirect('admin/all-courses')->with('message', 'Details Saved Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $packages = Packages::select('id', 'name')->get();
        $getDetails = DB::table('main_course')->where('package_id', $id)->get();
        return view('admin.courses.edit', compact('packages', 'getDetails'));
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
     
        if(count($request->foldername) > 0){
            $getlength = count($request->foldername);
            for($i = 0; $i < $getlength; $i++){
                DB::table('main_course')->updateOrInsert(
                    ['id' => $request->subfolders[$i]],
                    [
                    'package_id'=> $request->packageId,
                    'main_folder_name'=> $request->mainFolderName,
                    'main_folder_id'=> $request->mainFolderId,
                    'sub_folder_name' => $request->foldername[$i],
                    'sub_folder_id'=>  $request->folderId[$i],
                    ]
                );
            }
        }
        return redirect('admin/all-courses')->with('message', 'Details Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function addVideos(Request $request){
        $insert = DB::table('gulmetVideo')->insert([ 'folder_id' => $request->folderId , 'assets_id' => $request->videoId]);
        return redirect('admin/all-courses/'.$request->courseId.'/edit')->with('message', 'Details Updated Successfully!');
    }
}
