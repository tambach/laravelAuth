<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getList(Request $request)
    {
        $id =  $request->id;

        $data = $this->getUsers($id);

        if($id==1)
            return view('candidates', ["data"=>$data]);
        else
            return view('employees', ["data"=>$data, "message"=>""]);
    }

    /**
     * @param $id
     * @return \Illuminate\Support\Collection
     */
    public function getUsers($id)
    {
        return DB::table('users')
            ->where('role_id','=', $id)
            ->orderByDesc('created_at')
            ->limit(100)
            ->get();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function qualifyCandidate(Request $request)
    {
        $curr_date = date("Y-m-d H:i:s");
        $id =  $request->id;
        $response = DB::table('users')
            ->where('id', $id)
            ->update(['role_id' => 2, 'updated_at' => $curr_date]);

        $data = $this->getUsers(2);

        return view('employees', ["data"=>$data, "message" => "New employee successfully added in the list"]);
    }
}
