<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function test()
    {
        $tables = DB::connection()->getDoctrineSchemaManager()->listTableNames();
        $data = [];
        foreach($tables as $tb){
            $count = DB::table($tb)->count();
            array_push($data, $tb. ": " . $count);
        }
        return $data;

        $data = DB::table("journalarticle")->first();
        $datacomani = DB::table("company")->first();
        return [$data, $datacomani];
                return view('prophuongnam.dichvu', [
          

        ]);
    }

}
