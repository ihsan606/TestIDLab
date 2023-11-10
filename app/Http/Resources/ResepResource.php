<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ResepResource extends JsonResource
{
    public $data;
    public $message;
    public $status;

     public function __construct($resource, $message, $status=true)
     {
         // Ensure you call the parent constructor
         parent::__construct($resource);
         $this->resource = $resource;
 
         $this->message = $message;
         $this->status = $status;
     }

    
    public function toArray(Request $request): array
    {
        return [
            'data'=> $this->resource,
            'success' => $this->status,
            'message' => $this->message,
        ];
    }
}
