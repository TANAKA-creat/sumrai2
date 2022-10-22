<?php

namespace App\Http\Controllers;

// samurai山下先生の指導で下記1行CreditServiceを追記する
use App\Http\Services\CreditService;
use Illuminate\Http\Request;
use App\Models\Detail;


class DetailController extends Controller
{

    //index
    public function index() {

         $datetime = Detail::all();
         $details = Detail::all();

         // samurai山下先生の指導で下記2行追記する
         $datetime_credit = CreditService::getDatetime();
         $credits = CreditService::getCredit();


        return view('index')
         ->with(['datetime'=>$datetime])
         ->with(['details'=> $details])
         // samurai山下先生の指導で下記2行追記する
         ->with(['datetime_credit'=> $datetime_credit])
         ->with(['credits'=>$credits]);
    }

    //show
    public function show() {

        $datetime = Detail::all();
        $details = Detail::all();

        return view('details.show')
         ->with(['datetime' => $datetime])
         ->with(['details'=> $details]);
    }

     //create
     public function create() {

        return view('details.create');
    }

    //store
    public function store(Request $request) {

        $request->validate([
            'datetime' => 'required',
            'customer' => 'required',
            'rmb' => 'required',
            'usd' => 'required',
        ],[
            'datetime.required' => '記録日を記入してください',
            'customer.required' => '顧客名を記入してください',
            'rmb.required' => '人民元(rmb)ない場合は0を記録してください',
            'usd.required' => '米ドル(usd)ない場合は0を記録してください',
        ]);

        $details = new Detail();
        $details->datetime = $request->datetime;
        $details->customer = $request->customer;
        $details->rmb = $request->rmb;
        $details->usd = $request->usd;
        $details->save();

        return redirect()
         ->route('details.index');

    }
}
