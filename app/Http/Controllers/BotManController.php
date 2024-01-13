<?php

namespace App\Http\Controllers;
   
use App\Conversations\OnboardingConversation;
// use BotMan\BotMan\BotMan;
// use Illuminate\Http\Request;
// use BotMan\BotMan\Messages\Incoming\Answer;
// use App\Models\BotmanModel;
// use Illuminate\Support\Facades\DB;
use App\Models\AdminModel;
use PDF;
class BotManController extends Controller
{
    public function handle()
    {
        $botman = app('botman');

        $AdminModel = new AdminModel();         //1
        $onboardingConversation = new OnboardingConversation($AdminModel); //2
        
        
        $botman->startConversation($onboardingConversation);

        $botman->hears('{message}', function($botman, $message) use ($onboardingConversation) {
            if (strtolower($message) == 'y' || strtolower($message) == 'yes') {
            $onboardingConversation->askName(); 
            }
            else{
                $botman->reply('Exiting conversation.');
                $botman->stopConversation();
            } 
    });        

    $botman->listen();
    }

    
}
