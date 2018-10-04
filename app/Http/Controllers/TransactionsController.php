<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use H;
use Auth;

class TransactionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $transactionsActionRequired = App\Transaction::orderBy('datum', 'DESC')
            ->where('approved', '=', 0)
            ->where('user_id', Auth::id())
            ->get();

        $transactionsApproved = App\Transaction::orderBy('datum', 'DESC')
            ->where('approved', '=', 1)
            ->where('user_id', Auth::id())
            ->get();

        $transactionsAll = App\Transaction::orderBy('datum', 'DESC')
            ->where('user_id', Auth::id())
            ->get();

        return view('home', [
            'transactionsActionRequired' => $transactionsActionRequired,
            'transactionsApproved' => $transactionsApproved,
            'transactionsAll' => $transactionsAll,
        ]);

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

        $words = $transaction->transaktion;
        $words = str_replace('Kortköp', '', $words);
        $words = explode(' ', $words);

        $relatedTransactions = [];
        foreach ($words as $word) {
            if ($word) {
                $relatedTransactions[$word] = App\Transaction::where('transaktion', 'like', '%'.$word.'%')
                    ->orderBy('datum', 'DESC')->get();
            }
        }

        return view('single', [
            'transaction' => $transaction,
            'relatedTransactions' => $relatedTransactions,
        ]);   
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

        $transaction->approved = 0;

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
