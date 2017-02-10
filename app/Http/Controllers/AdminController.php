<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\Bullding;
use App\Contact;

class AdminController extends Controller
{
    public function getAdminIndex(User $users, Bullding $bullding, Contact $contact)
    {
      // get the Users count
      $usersCount = $users->count();
      // get the messages count
      $contactCount = $contact->count();
      // get the active bullding count
      $activeBulldingCount = countAllBulldingAppendToStatus(1);
      // get the waiting bullding count
      $waitingBulldingCount = countAllBulldingAppendToStatus(0);


      return view('admin.home.index', compact('activeBulldingCount', 'waitingBulldingCount', 'usersCount', 'contactCount'));
    }
}
