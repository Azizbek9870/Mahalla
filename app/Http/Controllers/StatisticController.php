<?php

namespace App\Http\Controllers;

use App\Models\PeopleStatus;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    public function index(){
        $people = DB::table('people_status')
            ->groupBy('status_id')
            ->select('status_id', DB::raw('count(status_id) as count'))
            ->get('count','status_id');
        $people = json_decode($people, true);
        $status = Status::all();
        $status_array = [];
        foreach ($status as $val)
            $status_array[$val['status']] = 0;
        foreach ($status as $val)
        foreach ($people as $value)
            if ($val['id']==$value['status_id'])
            $status_array[$val['status']] = $value['count'];
        $labels = [];
        $values = [];
        foreach ($status_array as $key => $value)
        {
            array_push($labels, $key);
            array_push($values, $value);
        }
//        dd($labels, $values);
//        $labels = [1,2,3,4];
        return view('index', compact('labels','values'));
    }
}
