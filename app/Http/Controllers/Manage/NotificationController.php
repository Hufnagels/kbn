<?php
namespace App\Http\Controllers\Manage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Session;
use Auth;

class NotificationController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::findOrFail(Auth::user()->id);
        $notifications = $user->notifications;
        $notificationsCount = count($notifications);
        $onlyTrashed = FALSE;
        //dd($notifications[0]->data);
        return view('manage.notifications.index',compact('notifications','notificationsCount','onlyTrashed'));
    }
}
