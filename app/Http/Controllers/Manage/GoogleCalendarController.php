<?php

namespace App\Http\Controllers\Manage;

use Carbon\Carbon;
use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;
use Google_Service_Calendar_EventDateTime;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoogleCalendarController extends Controller
{
    protected $client;

    public function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //   https://accounts.google.com/signin/oauth/oauthchooseaccount?client_id=668486990036-0p186432aeqvi1cnm27ftng7hqap3pgr.apps.googleusercontent.com&as=-79d53ea2fdcb621b&destination=http%3A%2F%2Fkvn.dev&approval_state=!ChRNNUhBLU5FcTNfOVMzeksyNWV1OBIfdzd4Z1VaRVg1ejhZd0Q4c01wTnQ0WVlYakxhYjVCVQ%E2%88%99AHw7d_cAAAAAWa3LNB6QZzWKz5Yl7OrOOF3kCXKJ9bPb&xsrfsig=AHgIfE8QpEFynVM8XM7749eE-KzxuKdXuw&flowName=GeneralOAuthFlow
    public function index(Request $request)
    {
      session_start();

      $client = new Google_Client();
      $client->setAuthConfig('client_credentials.json');
      $client->addScope(Google_Service_Calendar::CALENDAR);
      $guzzleClient = new \GuzzleHttp\Client(array('curl' => array(CURLOPT_SSL_VERIFYPEER => false)));
      $client->setHttpClient($guzzleClient);
// dd($client);
      if ($request->session()->exists('access_token'))  {
          $sessionToken = $request->session()->get('access_token');
          $client->setAccessToken($sessionToken);
          $service = new Google_Service_Calendar($client);
          $calendarId = 'v4splud4t53abmnefsq3j7u1sk@group.calendar.google.com';

          $optParams = array(
            'maxResults' => 10,
            'orderBy' => 'startTime',
            'singleEvents' => TRUE,
            'timeMin' => date('c'),

          );
          $results = $service->events->listEvents($calendarId, $optParams);
          if (count($results->getItems()) == 0) {
            print "No upcoming events found.\n";
          } else {
            print "Upcoming events:\n";
            foreach ($results->getItems() as $event) {
              $start = $event->start->dateTime;
              if (empty($start)) {
                $start = $event->start->date;
              }
              printf("%s (%s)\n", $event->getSummary(), $start);
            }
          }
          return $results->getItems();
      } else {
// dd($client);
          return redirect()->route('calendar.oauthCallback');
      }
    }

    public function oauth(Request $request)
    {
        session_start();
        $rurl = action('Manage\GoogleCalendarController@oauth');

        $client = new Google_Client();
        $client->setAuthConfig('client_credentials.json');
        $client->setRedirectUri($rurl);
        $client->addScope(Google_Service_Calendar::CALENDAR);

        $guzzleClient = new \GuzzleHttp\Client(array('curl' => array(CURLOPT_SSL_VERIFYPEER => false)));
        $client->setHttpClient($guzzleClient);
        // $auth_url = $client->createAuthUrl();
// $auth_url = "https://accounts.google.com/signin/oauth/oauthchooseaccount?client_id=668486990036-0p186432aeqvi1cnm27ftng7hqap3pgr.apps.googleusercontent.com&as=-79d53ea2fdcb621b&destination=http%3A%2F%2Fkvn.dev&approval_state=!ChRNNUhBLU5FcTNfOVMzeksyNWV1OBIfdzd4Z1VaRVg1ejhZd0Q4c01wTnQ0WVlYakxhYjVCVQ%E2%88%99AHw7d_cAAAAAWa3LNB6QZzWKz5Yl7OrOOF3kCXKJ9bPb&xsrfsig=AHgIfE8QpEFynVM8XM7749eE-KzxuKdXuw&flowName=GeneralOAuthFlow";

// dd($auth_url);

        if (!isset($_GET['code'])) {
            $auth_url = $client->createAuthUrl();
            $filtered_url = filter_var($auth_url, FILTER_SANITIZE_URL);
            // dd($filtered_url);
            return redirect($filtered_url);

        } else {
            $client->authenticate($_GET['code']);
            $access_token = $client->getAccessToken();
            $request->session()->put('access_token', $access_token);
            // dd($access_token);
            // $_SESSION['access_token'] = $client->getAccessToken();
            return redirect()->route('calendar.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.googlecalendar.createEvent');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      session_start();
      $startDateTime = $request->start_date;
      $endDateTime = $request->end_date;
      if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
          $client->setAccessToken($_SESSION['access_token']);
          $service = new Google_Service_Calendar($this->client);
          $calendarId = 'primary';
          $event = new Google_Service_Calendar_Event([
              'summary' => $request->title,
              'description' => $request->description,
              'start' => ['dateTime' => $startDateTime],
              'end' => ['dateTime' => $endDateTime],
              'reminders' => ['useDefault' => true],
          ]);
          $results = $service->events->insert($calendarId, $event);
          if (!$results) {
              return response()->json(['status' => 'error', 'message' => 'Something went wrong']);
          }
          return response()->json(['status' => 'success', 'message' => 'Event Created']);
      } else {
          return redirect()->route('calendar.index');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      session_start();
      if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
          $this->client->setAccessToken($_SESSION['access_token']);
          $service = new Google_Service_Calendar($this->client);
          $event = $service->events->get('primary', $eventId);
          if (!$event) {
              return response()->json(['status' => 'error', 'message' => 'Something went wrong']);
          }
          return response()->json(['status' => 'success', 'data' => $event]);
      } else {
          return redirect()->route('calendar.index');
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      session_start();
      if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
          $this->client->setAccessToken($_SESSION['access_token']);
          $service = new Google_Service_Calendar($this->client);
          $startDateTime = Carbon::parse($request->start_date)->toRfc3339String();
          $eventDuration = 30; //minutes
          if ($request->has('end_date')) {
              $endDateTime = Carbon::parse($request->end_date)->toRfc3339String();
          } else {
              $endDateTime = Carbon::parse($request->start_date)->addMinutes($eventDuration)->toRfc3339String();
          }
          // retrieve the event from the API.
          $event = $service->events->get('primary', $eventId);
          $event->setSummary($request->title);
          $event->setDescription($request->description);
          //start time
          $start = new Google_Service_Calendar_EventDateTime();
          $start->setDateTime($startDateTime);
          $event->setStart($start);
          //end time
          $end = new Google_Service_Calendar_EventDateTime();
          $end->setDateTime($endDateTime);
          $event->setEnd($end);
          $updatedEvent = $service->events->update('primary', $event->getId(), $event);
          if (!$updatedEvent) {
              return response()->json(['status' => 'error', 'message' => 'Something went wrong']);
          }
          return response()->json(['status' => 'success', 'data' => $updatedEvent]);
      } else {
          return redirect()->route('calendar.index');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      session_start();
      if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
          $this->client->setAccessToken($_SESSION['access_token']);
          $service = new Google_Service_Calendar($this->client);
          $service->events->delete('primary', $eventId);
      } else {
          return redirect()->route('calendar.index');
      }
    }
}
