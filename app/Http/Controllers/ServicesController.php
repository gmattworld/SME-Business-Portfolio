<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Service;

class ServicesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::orderBy('created_at','desc')->paginate(10);
        return view('services.index')->with('services', $services);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'intro' => 'required',
            'description' => 'required',
            'service_img' => 'image|nullable|max:1999'
        ]);

        //Handle File Upload
        if($request->hasFile('service_img')){
            $fileNameWithExt = $request->file('service_img')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('service_img')->getClientOriginalExtension();
            $fileNameToStore = $fileName. '_' .time(). '.' . $ext;
            $path = $request->file('service_img')->storeAs('public/service_img', $fileNameToStore);
        } else {
            $fileNameToStore = 'noImage.jpg';
        }

        $service = new Service;
        $service->name = $request->input('name');
        $service->intro = $request->input('intro');
        $service->description = $request->input('description');
        $service->user_id = auth()->user()->id;
        $service->img_url = $fileNameToStore;
        $service->isActive = true;
        $service->save();

        return redirect('/core/services')->with('success','Service Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::find($id);
        return view('services.show')->with('service', $service);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::find($id);

        if(auth()->user()->id !== $service->user_id){
            return redirect('/core/services/'.$id)->with('error','Unauthorized Page');
        }

        return view('services.edit')->with('service', $service);
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
        $this->validate($request,[
            'name' => 'required',
            'intro' => 'required',
            'description' => 'required',
            'service_img' => 'image|nullable|max:1999'
        ]);

        //Handle File Upload
        if($request->hasFile('service_img')){
            $fileNameWithExt = $request->file('service_img')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('service_img')->getClientOriginalExtension();
            $fileNameToStore = $fileName. '_' .time(). '.' . $ext;
            $path = $request->file('service_img')->storeAs('public/service_img', $fileNameToStore);
        }

        $service = Service::find($id);
        $service->name = $request->input('name');
        $service->intro = $request->input('intro');
        $service->description = $request->input('description');
        if($request->hasFile('service_img')){
            if($service->img_url !== 'noImage.jpg'){
                Storage::delete(['public/service_img/'.$service->img_url]);
            }
            $service->img_url = $fileNameToStore;
        }
        $service->save();

        return redirect('/core/services')->with('success','Service Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::Find($id);

        if(auth()->user()->id !== $service->user_id){
            return redirect('/core/services/'.$id)->with('error','Unauthorized Page');
        }

        if($service->img_url !== 'noImage.jpg'){
            Storage::delete(['public/service_img/'.$service->img_url]);
        }


        $service->delete();
        return redirect('/core/services')->with('success', 'Service Deleted!');
    }
}
