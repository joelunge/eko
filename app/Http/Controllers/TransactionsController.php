<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use H;

class TransactionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $transactions = App\Transaction::orderBy('datum', 'DESC')->get();

        return view('home', ['transactions' => $transactions]);
    }

    public function single(Request $request)
    {
        if ($request->id) {
            $transaction = App\Transaction::where('approved', NULL)
            ->where('action_required', NULL)
            ->find($request->id);
        } else {
            $transaction = App\Transaction::where('approved', NULL)
            ->where('action_required', NULL)
            ->orderBy('datum', 'ASC')
            ->first();
        }

        return view('single', ['transaction' => $transaction]);   
    }

    public function approve($id)
    {
        $transaction = App\Transaction::find($id);

        $transaction->approved = 1;

        $transaction->save();

        return redirect()->back();
    }

    public function actionRequired($id)
    {
        $transaction = App\Transaction::find($id);

        $transaction->action_required = 1;

        $transaction->save();

        return redirect()->back();
    }

    public function importCsv()
    {
        $transactions = \Csv::parseCsv(public_path() . '/jan.csv');

        $count = count($transactions) - 1;
        unset($transactions[$count]);

        // H::pr($transactions);


        return view('home', ['transactions' => $transactions]);
    }
}
