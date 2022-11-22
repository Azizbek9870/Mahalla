<?php

namespace App\Http\Controllers;

use App\Models\People;
use App\Models\PeopleStatus;
use App\Models\Status;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peoples=People::where('dead_date',0)->get();
        return  view('people.index',compact('peoples'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status=Status::all();
        return view('people.create',compact('status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $peoples= $request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'fathername'=>'required',
            'birthdate'=>'required',
            'passport'=>'required'
        ]);
        $show=People::create($peoples);

        foreach ($request['status'] as $q) {
    $status=new PeopleStatus();
    $status->people_id = $show['id'];
    $status->status_id=$q;
$status->save();
        }
//        dd($status);

        return redirect(route('people.index'))->with('success', 'People success');

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
        $status=Status::all();
        $people=People::find($id);
        $peoplestatus=PeopleStatus::where('people_id',$id)->get();
    $array=[];
            foreach ($peoplestatus as $q)
        {
        $array[$q['status_id']]=$q['status_id'];

        }

    return view('people.edit',compact('status','people','array'));

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
        $peoples= $request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'fathername'=>'required',
            'birthdate'=>'required',
            'passport'=>'required'
        ]);
        $show=People::find($id);
        $show->firstname=$request['firstname'];
        $show->lastname=$request['lastname'];
        $show->fathername=$request['fathername'];
        $show->birthdate=$request['birthdate'];
        $show->passport=$request['passport'];
        $show->save();

        foreach ($request->status as $k=>$q) {
            $statuss=PeopleStatus::where('people_id',$show['id'])->delete();

            $status=new PeopleStatus();
            $status->people_id= $show->id;
            $status->status_id=$q;
//            dd($status);
            $status->save();
        }
        return redirect(route('people.index'))->with('success', 'People edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $year = date("Y", strtotime(now()));
        $people=People::find($id);
        $people_s=PeopleStatus::where('people_id',$id)->delete();
        $people['dead_date'] = $year;
        $people->save();
        return  redirect(route('people.index'))->with('success','People delete');
    }
}
