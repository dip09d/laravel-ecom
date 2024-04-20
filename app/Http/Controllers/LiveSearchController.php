<?php
 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
class LiveSearchController extends Controller
{
 
    function action(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '') {
                $data = DB::table('products')
                    ->where('title', 'like', '%'.$query.'%')
                    ->orWhere('desc', 'like', '%'.$query.'%')
                    ->orWhere('quantity', 'like', '%'.$query.'%')
                    ->orderBy('id', 'desc')
                    ->get();
                    
            } else {
                $data = DB::table('products')
                    ->orderBy('id', 'desc')
                    ->get();
            }
             
            // $total_row = $data->count();
            // if($total_row > 0){
            //     foreach($data as $row) {
            //         $output=$row;
            // }
            // $data = array(
            //     'table_data'  => $output,
            //     'total_data'  => $total_row
            // );
            // echo json_encode($data);
            foreach($data as $row){
                return json_encode($row);
            }
        }
    }
}