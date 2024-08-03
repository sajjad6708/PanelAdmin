<?php
namespace App\Actions\Email;

use App\Models\Email;
use Illuminate\Http\Request;

class StoreAction{
   public function execute(Request $request) {
    $data = $request->all() ;
    
    Email::create($data) ;

   }
}