<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;
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
      // get the mapping
      $mapping = $bullding->select('langtuide', 'latitiute', 'name')->get();
      // get the charts
      $chartBuillding = $bullding->select(DB::raw('COUNT(*) AS counting, month'))
                        ->where('year', date('Y'))
                        ->groupBy('month')
                        ->orderBy('month', 'ASC')
                        ->get();
      // get the latest users
      $lastUser = $users->take('8')->orderBy('id', 'DESC')->get();
      // get the latest bulldings
      $lastBullidngs = $bullding->take('10')->orderBy('id', 'DESC')->get();
      // get the latest contact
      $lastContact = $contact->take('8')->orderBy('id', 'DESC')->get();
      return view('admin.home.index',
            compact(
               'activeBulldingCount', 'waitingBulldingCount', 'usersCount', 'contactCount', 'mapping', 'chartBuillding', 'lastUser', 'lastBullidngs', 'lastContact'
            )
         );
    }
}
