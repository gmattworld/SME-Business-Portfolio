<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Service;

class PagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','about','services','contact']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $content = Page::where('name', 'home')->get();
        return view('pages.index')->with('content', $content);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pagelist()
    {
        $pages = Page::orderBy('created_at','desc')->paginate(10);
        return view('core.pages')->with('pages', $pages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = Page::find($id);
        return view('core.show')->with('page', $page);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
            'title' => 'required',
            'intro' => 'required',
            'content' => 'required'
        ]);

        $page = Page::find($id);
        $page->title = $request->input('title');
        $page->intro = $request->input('intro');
        $page->content = $request->input('content');
        $page->save();

        return redirect('/pagelist')->with('success','Page Information Updated!');
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

    public function about()
    {
        $content = Page::where('name', 'about')->get();
        return view('pages.about')->with('content', $content);
    }

    public function services()
    {
        // $params = array(
        //     'title' => 'Service', 
        //     'intro' => 'Welcome to my service page.',
        //     'services' => ['Web Design', 'SEO', 'Digital Marketting', 'Office Branding']
        // );
        $content = Page::where('name', 'services')->get();
        $services = Service::where('isActive', '1')->get();
        return view('pages.services')->with(['content'=> $content, 'services' => $services]);
    }

    public function contact()
    {
        $content = Page::where('name', 'contact')->get();
        return view('pages.contact')->with('content', $content);
    }
}
