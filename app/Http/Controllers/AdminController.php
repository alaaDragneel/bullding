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
      ->get()->toArray();
      // make the array that will have the empty nonth
      $array = [];
      if (isset($chartBuillding[0]['month'])) {
         for($i = 1; $i < $chartBuillding[0]['month']; $i++){
            // assain the array
            $array[] = 0;
         }
      }
      // merge the 2 arrays
      $new = array_merge($array, $chartBuillding);;
      // get the latest users
      $lastUser = $users->take('8')->orderBy('id', 'DESC')->get();
      // get the latest bulldings
      $lastBullidngs = $bullding->take('10')->orderBy('id', 'DESC')->get();
      // get the latest contact
      $lastContact = $contact->take('8')->orderBy('id', 'DESC')->get();
      return view('admin.home.index',
      compact(
         'activeBulldingCount', 'waitingBulldingCount', 'usersCount', 'contactCount', 'mapping', 'new', 'lastUser', 'lastBullidngs', 'lastContact'
         )
      );
   }

   public function showBulldingStatistics(Bullding $bullding)
   {
      $year = date('Y');
      // get the charts
      $chartBuillding = $bullding->select(DB::raw('COUNT(*) AS counting, month'))
      ->where('year', $year)
      ->groupBy('month')
      ->orderBy('month', 'ASC')
      ->get()
      ->toArray();
      // make the array that will have the empty nonth
      $array = [];
      if (isset($chartBuillding[0]['month'])) {
         for($i = 1; $i < $chartBuillding[0]['month']; $i++){
            // assain the array
            $array[] = 0;
         }
      }
      // merge the 2 arrays
      $new = array_merge($array, $chartBuillding);
      return view('admin.home.statistics', compact('year', 'new'));
   }

   public function showBulldingshowThisYear(Request $request, Bullding $bullding)
   {
      $year = $request->year;
      // get the charts
      $chartBuillding = $bullding->select(DB::raw('COUNT(*) AS counting, month'))
      ->where('year', $year)
      ->groupBy('month')
      ->orderBy('month', 'ASC')
      ->get()
      ->toArray();
      // make the array that will have the empty nonth
      $array = [];
      if (isset($chartBuillding[0]['month'])) {
         for($i = 1; $i < $chartBuillding[0]['month']; $i++){
            // assain the array
            $array[] = 0;
         }
      }
      // merge the 2 arrays
      $new = array_merge($array, $chartBuillding);
      return view('admin.home.statistics', compact('year', 'new'));
   }

}
