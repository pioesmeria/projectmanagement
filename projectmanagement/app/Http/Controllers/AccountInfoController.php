<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\AccountInfo;
use App\Http\Resources\AccountInfo as AccountInfoResource;

class AccountInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //GET ACCOUNT INFOS
        $accountinfos= AccountInfo::paginate(10);
        return AccountInfoResource::collection($accountinfos); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ///STORE ACCOUNT INFOS
        $accountinfo = $request->isMethod('put') ? AccountInfo::findOrFail($request->accountinfo_id) : new AccountInfo;

        $accountinfo->firstName = $request->input('firstName');
        $accountinfo->lastName = $request->input('lastName');
        $accountinfo->email = $request->input('email');
        
        if ($accountinfo->save()) {
            return new AccountInfoResource($accountinfo);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($accountinfo_id)
    {
        //GET ACCOUNT
        $accountinfo= AccountInfo::findOrFail($accountinfo_id);

        return new AccountInfoResource($accountinfo);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // DELETE ACCOUNT
        $account= AccountInfo::findOrFail($account_id);

        if ($account->delete()) {
            return new AccountResource($account);
        }
    }
}
