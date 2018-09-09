<?php

namespace App\Http\Controllers\Admin;

use App\Subscriber;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscriberController extends Controller
{
    
    public function index()
    {
    	$subscribers = Subscriber::all();
    	return view('admin.subscriber.index', compact('subscribers'));
    }

    public function destroy($subscriber)
    {
    	$subscriber = Subscriber::findOrFail($subscriber);
    	$subscriber->delete();
    	Toastr::success("Abonnement supprimé", 'Succes');
    	return redirect()->back();
    }
}
