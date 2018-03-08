<?php

namespace App\Http\Controllers;

use App\User;
use Auth;

use Illuminate\Http\Request;

use Notification;
use App\Cluster;

use App\Invitation;
use App\Notifications\InvitationSent;



class RequestsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function getIndex()
    {
        return view('test');
    }
    

    // Creates a request and notification entry in DB
    public function store(Request $request){

        $member = explode(' | ', $request->input('2'));
       
        $message ='';


        if(sizeOf($member) != 3){
            $message = 'Please enter/select valid details';
        }

        else{

            $invitations = Invitation::where('receiver_id', '=', $member[0])->where('status', '=', 'sent')->get();
            if(count($invitations)>=1){
                foreach($invitations as $invitation){

                    if($invitation->sender_id == Auth::user()->id){
                        $message = 'A request has already been sent to '.$member[1].'. Awaiting response.';
                    }

                    else{

                        $members = User::where('cluster_id', '=', Auth::user()->cluster->id)->get();
                        
                        if(count($members)<=5){

                            //For creating the request in the database
                            $invitation = new Invitation();  
                            $invitation->sender_id = Auth::user()->id;
                            $invitation->receiver_id = (int)$member[0];
                            $invitation->status = 'sent';
                            $invitation->save();

                            
                            //For creating a notification
                            $cluster = Cluster::find(Auth::user()->cluster->id);
                            $sender = User::find(Auth::user()->id);
                            $receiver = User::find((int)$member[0]);
                            User::find((int)$member[0])->notify(new InvitationSent($invitation, $cluster, $sender, $receiver));


                            $message = 'Request has been sent successfully to '.$member[1];

                        } 
                        else{
                            $message = 'Sorry, your cluster is full!';  
                        }
                    }
                }
            }
            
            else if(Invitation::where('receiver_id', '=', $member[0])->where('status', '=', 'accepted')->exists()){

                $message = $member[1].' already belongs to another cluster.';

            }
            else{

                $members = User::where('cluster_id', '=', Auth::user()->cluster->id)->get();
                
                if(count($members)<=5){

                    //For creating the request in the database
                    $invitation = new Invitation();  
                    $invitation->sender_id = Auth::user()->id;
                    $invitation->receiver_id = (int)$member[0];
                    $invitation->status = 'sent';
                    $invitation->save();

                    
                    //For creating a notification
                    $cluster = Cluster::find(Auth::user()->cluster->id);
                    $sender = User::find(Auth::user()->id);
                    $receiver = User::find((int)$member[0]);
                    User::find((int)$member[0])->notify(new InvitationSent($invitation, $cluster, $sender, $receiver));


                    $message = 'Request has been sent successfully to '.$member[1];

                } 
                else{
                    $message = 'Sorry, your cluster is full!';  
                }
            }
        }

        $messages =  array(
            'member2' => $message,
        );

        return view('cluster.summary')->with($messages);

        
    }

}
