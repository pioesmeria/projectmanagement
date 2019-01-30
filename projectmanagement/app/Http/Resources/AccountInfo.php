<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AccountInfo extends JsonResource
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
            'accountinfo_id'=> $this -> accountinfo_id,
            'firstName' => $this -> firstName,
            'lastName' => $this -> lastName,
            'email' => $this -> email
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
