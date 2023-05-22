<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Models\Artical; 
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ArticalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articals = DB::table('articals')
        // ->join('books', 'notes.book_id', '=', 'books.id')
        ->join('users', 'articals.created_by_id', '=', 'users.id')
        ->select('articals.*', 'users.name as created_by')
        ->get();
        return view('artical.index', ['articals' => $articals]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('artical.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $artical_data = $request->validate([
            'title' => 'required',
            'detail' => 'required',
            'file_name' => 'nullable',
            'created_by_id' => 'nullable'
        ]);      
        if ($request->file('file_name')) 
        { 
            $imageName = $request->file_name->getClientOriginalName();      
            $request->file_name->move(public_path('images/artical'), $imageName);
            $artical_data['file_name'] = $imageName;

        } 
        $artical_data['created_by_id']=Auth::user()->id;
        Artical::create($artical_data);
 

        return redirect()->route('artical.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artical = Artical::where('id',$id)->first(); 
        // dd($artical);
        return view('artical.view', ['artical' => $artical]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Artical $artical)
    {  
        return view('artical.edit', compact('artical'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artical $artical)
    {

        $artical_data = $request->validate([
            'title' => 'required',
            'detail' => 'required',
            'file_name' => 'nullable',
            'old_image' => 'required',
            'created_by_id' => 'nullable',
            'created_by_role' => 'nullable'
        ]); 
        $imageName=$artical_data['old_image'];       
        if ($request->file('file_name') && !empty($request->file('file_name'))) 
        {
            $imageName = $request->file_name->getClientOriginalName();      
            $request->file_name->move(public_path('images/artical'), $imageName);
            $artical_data['file_name'] = $imageName;

        }
        $artical_data['created_by_id']=Auth::user()->id;
         
        $artical->update($artical_data);


          
 

        return redirect()->route('artical.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artical $artical)
    { 
        
        $artical->delete(); 

        return redirect()->route('artical.index');
    }
}
