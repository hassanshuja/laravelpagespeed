<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use Mail;
class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendEmails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends Emails To Users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $users=DB::table('fe_users')->where('uid',3)->groupBy('username')->limit(1)->get();
        $data=DB::table('newsletters')->where('is_current',1)->first();
        $count=DB::table('newsletters')->where('is_current',1)->count();
        if($count==0){
            return "Do not send";
        }
        $offer1=DB::table('offer')
            ->where('offer.uid',$data->offer_1)
            ->leftJoin('tx_realurl_uniqalias','value_id','offer.uid')
            ->select('offer.*','value_alias')
            ->orderBy('tx_realurl_uniqalias.uid','desc')
            ->limit(1)
            ->get();
        $offer2=DB::table('offer')
            ->where('offer.uid',$data->offer_2)
            ->leftJoin('tx_realurl_uniqalias','value_id','offer.uid')
            ->select('offer.*','value_alias')
            ->orderBy('tx_realurl_uniqalias.uid','desc')
            ->limit(1)
            ->get();
        if(count($offer1)==0 || count($offer2)==0){
            return "Do not send";
        }   
        $ids=[]; 
        foreach($users as $u){
            array_push($ids,$u->username);
            Mail::send('newsletters/newsletter',['data'=>$data,'offer1'=>$offer1,'offer2'=>$offer2,'email'=>$u->username,'key'=>$u->password],function($message) use ($data){
                $message->to('besnik.cani95@gmail.com', 'Meinweekend')->subject($data->newsletter_title);
                $message->from('info@meinweekend.ch','Meinweekend');
            });
        }
        $update=DB::table('fe_users')->whereIn('username',$ids)->update(['send_newsletter'=>0]);

    }
}
