<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\UserJob;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use App\Events\UserAddsJobEvent;


class UserJobController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function create(Request $request) {    
        $user = Auth::user()->id;
        /**
         * FN isUserJobExist - we are trying to make sure that the user_job 
         *      is not equiped else we get an SQL error for duplicate
         */
        $userJobExist = self::isUserJobExist($request->job, $user);

        if(!$userJobExist) {
            DB::table('user_jobs')->insert([
                'job_id' => $request->job,
                'user_id' => $user
            ]);
        }

        /**
         * Query DB for the new set of user_jobs and return it
         */
        $equipedJobs = getUserEquipedJobs();

        return json_encode($equipedJobs);
    }

    public function destroy(Request $request) {
        $user = Auth::user()->id;
        /**
         * FN isUserJobExist - we are trying to make sure that the user_job 
         *      exist/equiped so we can destroy the record
         */
        $userJobExist = self::isUserJobExist($request->job, $user);

        if($userJobExist) {
            DB::table('user_jobs')->where([
                'user_id' => $user,
                'job_id' => $request->job
            ])->delete();
        }

        $equipedJobs = getUserEquipedJobs();

        return json_encode($equipedJobs);
    }

    /**
     * Fn checks if there's the same job_id that the user already equiped
     */
    public function isUserJobExist($request, $user) {
        
        /**
         * Query DB using the current job_id being added and the user_id
         */
        $user_job = DB::table('user_jobs')->where([
            ['job_id', '=', $request], 
            ['user_id', '=', $user]
        ])->get();

        return count($user_job)? true : false;
    }
}
