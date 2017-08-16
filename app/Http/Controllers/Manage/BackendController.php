<?php
/* ez nem kell */

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BackendController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
}
