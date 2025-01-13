<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeightLog;
use App\Models\WeightTarget;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterWeightRequest;

class WeightController extends Controller
{
    public function weight(){
        return view('auth.register_step2');
    }

    public function storeWeight(RegisterWeightRequest $request){
        $createdAt=now();
        $formattedDate=$createdAt->format('Y/m/d');
        $userId=Auth::id();
        WeightLog::create([
            'user_id'=>$userId,
            'date'=>$formattedDate,
            'weight'=>$request->weight
        ]);
        WeightTarget::create([
            'user_id'=>$userId,
            'target_weight'=>$request->target_weight
        ]);
        return redirect('/weight_logs');
    }

    public function admin(){
        return view('admin');
    }
}
