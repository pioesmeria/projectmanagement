<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Account;
use App\Http\Resources\Account as AccountResource;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // GET ACCOUNTS
        $accounts= Account::paginate(10);
        return AccountResource::collection($accounts); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //STORE ACCOUNT
        $account = $request->isMethod('put') ? Account::findOrFail($request->account_id) : new Account;

        $account->user_id = $request->input('user_id');
        $account->username = $request->input('username');
        $account->password = $request->input('password');
        
        if ($account->save()) {
            return new AccountResource($account);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($account_id)
    {
        //GET ACCOUNT
        $account= Account::findOrFail($account_id);

        return new AccountResource($account);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $account_id)
    {
        $account = Account::findOrFail($account_id);
        $account->update($request->all());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($account_id)
    {
        // DELETE ACCOUNT
        $account= Account::findOrFail($account_id);

        if ($account->delete()) {
            return new AccountResource($account);
        }
    }
}
