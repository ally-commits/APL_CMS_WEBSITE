<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use Redirect; 
use PaytmWallet;

class PlayerController extends Controller
{ 
    public function payment(Request $request)
    {
        $data = $request->all();
        $request->validate([
            'name' => ['required', 'string'],  
            'image' => ['required'], 
            'category' => ['required', 'string'], 
            'phoneNumber' => ['required', 'integer',"unique:players"], 
            'class' => ['required', 'string'], 
        ]);  
        $image = $request->file('image');
        $imageName = time().'.'.$data['image']->getClientOriginalExtension();
        $image->move('images/players', $imageName);

        $player = Player::create([ 
            'name' => $data['name'], 
            'image' => 'images/players/'.$imageName, 
            'category' => $data['category'], 
            'phoneNumber' => $data['phoneNumber'], 
            'transactionId' => 0, 
            'class' => $data['class'],  
        ]); 
        $payment = PaytmWallet::with('receive');
        $payment->prepare([
          'order' => $player->id,
          'user' => $player->id,
          'mobile_number' => $player->phoneNumber,
          'email' => "temp@gmail.com",
          'amount' => 100,
          'callback_url' => url('payment/status')
        ]);
        return $payment->receive();
    } 

    public function paymentCallback()
    {
        $transaction = PaytmWallet::with('receive');
 
        $response = $transaction->response();
 
        if($transaction->isSuccessful()){
            Player::where('id',$response['ORDERID'])->update(['registred'=> true, 'transactionId'=>$response['TXNID']]);
            
            return Redirect::route("welcome")->with("message","Succesfully Registred.. Your Player Number is" . $response['ORDERID']);
        } else if($transaction->isFailed()){
            $player = Player::find($response['ORDERID']);
            $player->delete(); 
            return Redirect::route("playerRegister")->with("failed","Resgitration Failed . Try Again");
        }
    }    
}
