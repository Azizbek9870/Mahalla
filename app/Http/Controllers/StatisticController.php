<?php

namespace App\Http\Controllers;

use App\Models\PeopleStatus;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    public function index(){
        $year = date("Y", strtotime(now()));
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


        $live_peoples = DB::table('people')
//            ->where("dead_date", 0)
            ->select('birthdate')
            ->get('birthdate');
        $live_peoples = json_decode($live_peoples, true);
        $dead_peoples = DB::table('people')
            ->where("dead_date", '!=', "NULL")
            ->select('dead_date')
            ->get('dead_date');
        $dead_peoples = json_decode($dead_peoples, true);
        $dates = [];
        foreach ($live_peoples as $item){
            array_push($dates, intval(date('Y',strtotime($item['birthdate']))));
        }
        foreach ($dead_peoples as $item){
            array_push($dates, intval($item['dead_date']));
        }
        if (count($dates) > 0)
        $min_date = min($dates);
        else $min_date = 2000;
        $live_date = [];
        for($i=$min_date; $i<=$year; $i++){
            $live_date[$i] = 0;
        }
        foreach ($live_peoples as $item){
            $live_date[date('Y', strtotime($item['birthdate']))]++;
        }
        $live_values = [0];
        $live_labels = [0];
        foreach ($live_date as $key => $item){
            array_push($live_labels, $key);
            array_push($live_values, $item);
        }

        $dead_date = [];
        for($i=$min_date; $i<=$year; $i++){
            $dead_date[$i] = 0;
        }

        foreach ($dead_peoples as $item){
            $dead_date[$item['dead_date']]++;
        }
        $dead_values = [0];
        $dead_labels = [0];
        foreach ($dead_date as $key => $item){
            array_push($dead_labels, $key);
            array_push($dead_values, $item);
        }
//        $max_live = max($live_values);
//        $max_dead = max($dead_values);
//        if ($max_dead > $max_live){
//            array_push($live_values, $max_dead+1);
//            array_push($dead_values, $max_dead+1);
//        }
//        else {
//            array_push($live_values, $max_live+1);
//            array_push($dead_values, $max_live+1);
//        }
//        array_push($live_labels, "");
//        array_push($dead_labels, "");
        return view('index', compact('labels','values', 'dead_values','dead_labels','live_labels','live_values'));
    }
}
