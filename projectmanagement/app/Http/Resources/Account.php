<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Account extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'account_id'=> $this -> account_id,
            'username' => $this -> username,
            'password' => $this -> password,
        ];
        // return parent::toArray($request);
    }
    public function with($request)
    {
        return [
            'version' => '1.0.0',
            'author_url' => url('http://projectmanagement.test'),
            'copyright' => '© EvoSoft Corporation 2019'
        ];
    }
}
