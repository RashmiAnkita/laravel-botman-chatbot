<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\BotmanModel;

class AdminModel extends Model
{
	function getcalculation($userId){           //6
    	$getalldata= BotmanModel::where('userid',$userId)->first(); 
        
                /*
                |============================|
                |=== Savings Q&A ============|
                |============================|
                */ 

                if($getalldata->save_income=='Daily'){
                    $new_save_income=100;
                }
                if($getalldata->save_income=='Weekly'){
                    $new_save_income=80;
                }
                if($getalldata->save_income=='Monthly'){
                    $new_save_income=50;
                }
                if($getalldata->save_income=='Bi annually'){
                    $new_save_income=40;
                }
                if($getalldata->save_income=='Annually'){
                    $new_save_income=20;
                }
                if($getalldata->save_income=='Not able to save at all'){
                    $new_save_income=0;
                }


                if($getalldata->total_income=="Much more than half of my income"){
                    $new_total_income=100;
                }
                if($getalldata->total_income=='Little more than half my income'){
                    $new_total_income=80;
                }
                if($getalldata->total_income=='About half of my income'){
                    $new_total_income=50;
                }
                if($getalldata->total_income=='Little less than half my income'){
                    $new_total_income=40;
                }
                if($getalldata->total_income=='Much less than half my income'){
                    $new_total_income=20;
                }
                if($getalldata->total_income=='Not able to save at all'){
                    $new_total_income=0;
                }


                if($getalldata->savings=="Saving was much more than spending"){
                    $new_savings=100;
                }
                if($getalldata->savings=='Saving was a little more than spending'){
                    $new_savings=80;
                }
                if($getalldata->savings=='Saving was about equal to spending'){
                    $new_savings=50;
                }
                if($getalldata->savings=='Saving was little less than spending'){
                    $new_savings=40;
                }
                if($getalldata->savings=='Saving was much less than spending'){
                    $new_savings=20;
                }
                if($getalldata->savings=='No savings at all'){
                    $new_savings=0;
                }

                /*
                |============================|
                |=== Spending Q&A ===========|
                |============================|
                */


                if($getalldata->spending_total_income=="Spending was much less than income"){
                    $new_spending_total_income=100;
                }
                if($getalldata->spending_total_income=='Spending was a little less than income'){
                    $new_spending_total_income=75;
                }
                if($getalldata->spending_total_income=='Spending about equal to income'){
                    $new_spending_total_income=50;
                }
                if($getalldata->spending_total_income=='Spending was little more than income'){
                    $new_spending_total_income=25;
                }
                if($getalldata->spending_total_income=='Spending was much more than income'){
                    $new_spending_total_income=0;
                }



                if($getalldata->bills=="Paid all bills on time"){
                    $new_bills=100;
                }
                if($getalldata->bills=='Paid most of our bills on time'){
                    $new_bills=75;
                }
                if($getalldata->bills=='Paid some of our bills on time'){
                    $new_bills=50;
                }
                if($getalldata->bills=='Paid very few bills on time'){
                    $new_bills=25;
                }
                if($getalldata->bills=='Barely paid any bill on time'){
                    $new_bills=0;
                }



                if($getalldata->expenditure=="Expenditure on essential goods is much higher than that on non-essential goods"){
                    $new_expenditure=100;
                }
                if($getalldata->expenditure=='Expenditure on essential goods is slightly higher than that on non-essential goods'){
                    $new_expenditure=75;
                }
                if($getalldata->expenditure=='Expenditure on essential goods is equal to that on non-essential goods'){
                    $new_expenditure=50;
                }
                if($getalldata->expenditure=='Expenditure on essential goods is slightly lower than that on non-essential goods'){
                    $new_expenditure=25;
                }
                if($getalldata->expenditure=='Expenditure on essential goods is much lower than that on non-essential goods'){
                    $new_expenditure=0;
                }


                /*
                |============================|
                |=== Borrowing Q&A ==========|
                |============================|
                */


                if($getalldata->financial=="Very easy"){
                    $new_financial=100;
                }
                if($getalldata->financial=='Moderately Easy'){
                    $new_financial=75;
                }
                if($getalldata->financial=='Indifferent (neither easy nor difficult)'){
                    $new_financial=50;
                }
                if($getalldata->financial=='Moderately difficult'){
                    $new_financial=25;
                }
                if($getalldata->financial=='Very difficult'){
                    $new_financial=0;
                }


                if($getalldata->institution=='Once a year'){
                    $new_institution=100;
                }
                if($getalldata->institution=='Once in 6 months'){
                    $new_institution=75;
                }
                if($getalldata->institution=='Once in 3 months'){
                    $new_institution=50;
                }
                if($getalldata->institution=='Every month'){
                    $new_institution=25;
                }
                if($getalldata->institution=="Never"){
                    $new_institution=0;
                }


                if($getalldata->repay=='Paid all EMIs on time'){
                    $new_repay=100;
                }
                if($getalldata->repay=='Paid most EMIs on time'){
                    $new_repay=75;
                }
                if($getalldata->repay=='Paid some EMIs on time'){
                    $new_repay=50;
                }
                if($getalldata->repay=='Barely paid any EMIs on time'){
                    $new_repay=25;
                }
                if($getalldata->repay=="Never had to pay EMI since I never borrowed money"){
                    $new_repay=0;
                }


                /*
                |============================|
                |=== Resilience Q&A =========|
                |============================|
                */

                if($getalldata->employment=="More than a year"){
                    $new_employment=100;
                }
                if($getalldata->employment=='6 months - 1 year'){
                    $new_employment=75;
                }
                if($getalldata->employment=='2-6 months'){
                    $new_employment=50;
                }
                if($getalldata->employment=='One month'){
                    $new_employment=25;
                }
                if($getalldata->employment=='Less than a week'){
                    $new_employment=0;
                }


                if($getalldata->emergency=="Very easy"){
                    $new_emergency=100;
                }
                if($getalldata->emergency=='Moderately Easy'){
                    $new_emergency=75;
                }
                if($getalldata->emergency=='Somewhat easy'){
                    $new_emergency=50;
                }
                if($getalldata->emergency=='Moderately difficult'){
                    $new_emergency=25;
                }
                if($getalldata->emergency=='Very difficult'){
                    $new_emergency=0;
                }



                if($getalldata->insurance=="Once a year"){
                    $new_insurance=100;
                }
                if($getalldata->insurance=='Once in 6 months'){
                    $new_insurance=75;
                }
                if($getalldata->insurance=='Once in 3 months'){
                    $new_insurance=50;
                }
                if($getalldata->insurance=='Every month'){
                    $new_insurance=25;
                }
                if($getalldata->insurance=='Never'){
                    $new_insurance=0;
                }


                /*
                |============================|
                |===== Planning Q&A =========|
                |============================|
                */



                if($getalldata->budget=='I have a formal budget that’s documented (e.g. spreadsheet, book or online tool) that calculates my outgoing expenses and the amount of money I need to allocate each week or month'){
                    $new_budget=75;
                }
                if($getalldata->budget=='I have a ‘mental’ budget – no documentation or spreadsheets, but I still keep track of my finances and spending'){
                    $new_budget=50;
                }
                if($getalldata->budget=='I keep a mental budget but do not track of all my finances and spending, only the major expenses'){
                    $new_budget=25;
                }
                if($getalldata->budget=='I do not work a budget at all and spend what I can afford at that time'){
                    $new_budget=0;
                }



                if($getalldata->finances=="I am actively planning for my financial future"){
                    $new_finances=100;
                }
                if($getalldata->finances=='I am primarily focused on my current finances today but and have started taking active steps towards planning my future finances'){
                    $new_finances=75;
                }
                if($getalldata->finances=='I’m starting to think about planning for my financial future but have not yet taken active steps towards this'){
                    $new_finances=50;
                }
                if($getalldata->finances=='I’m primarily focused on my finances today and haven’t put much thought into planning for my financial future'){
                    $new_finances=25;
                }
                if($getalldata->finances=='I have not put any thought into my planning for my financial future'){
                    $new_finances=0;
                }



                if($getalldata->goal=="Very often"){
                    $new_goal=100;
                }
                if($getalldata->goal=='Often'){
                    $new_goal=75;
                }
                if($getalldata->goal=='Sometimes'){
                    $new_goal=50;
                }
                if($getalldata->goal=='Not often'){
                    $new_goal=25;
                }
                if($getalldata->goal=='Never'){
                    $new_goal=0;
                }



                /*
                |============================|
                |=== Decision Making Q&A ====|
                |============================|
                */


                if($getalldata->ability=="I don’t consult others, I am fully confident to take decisions instantly"){
                    $new_ability=100;
                }
                if($getalldata->ability=='I don’t consult others, I am fully confident to take decisions but I delay my decisions to do some research/think about it/ to observe what others are doing'){
                    $new_ability=75;
                }
                if($getalldata->ability=='I make my financial decisions, but in consultation with others'){
                    $new_ability=50;
                }
                if($getalldata->ability=='I always need to consult others for guidance'){
                    $new_ability=25;
                }
                if($getalldata->ability=='I do not make financial decisions (someone else makes the decision)'){
                    $new_ability=0;
                }



                if($getalldata->instrument=="I am fully aware of these instruments and make all decisions independently"){
                    $new_instrument=100;
                }
                if($getalldata->instrument=='I consult with a financial expert before making any decisions regarding investing in these instruments'){
                    $new_instrument=75;
                }
                if($getalldata->instrument=='I make decisions regarding investing in these instruments in consultation with friends and family'){
                    $new_instrument=50;
                }
                if($getalldata->instrument=='I do not make these decisions. I rely on financial experts to make these decisions for me'){
                    $new_instrument=25;
                }
                if($getalldata->instrument=='I do not make these decisions. I rely on friends and family to make these decisions for me'){
                    $new_instrument=0;
                }



                if($getalldata->asset=="I am fully aware of these assets and make all decisions independently"){
                    $new_asset=100;
                }
                if($getalldata->asset=='I consult with a financial expert before making any decisions regarding investing in these assets'){
                    $new_asset=75;
                }
                if($getalldata->asset=='I make decisions regarding investing in these assets in consultation with friends and family'){
                    $new_asset=50;
                }
                if($getalldata->asset=='I do not make these decisions. I rely on financial experts to make these decisions for me'){
                    $new_asset=25;
                }
                if($getalldata->asset=='I do not make these decisions. I rely on friends and family to make these decisions for me'){
                    $new_asset=0;
                }

                /*
                |============================|
                |======= Calculations =======|
                |============================|
                */

                $total_savings = round(($new_save_income+$new_total_income+$new_savings)/3,2);

                $total_spending = round(($new_spending_total_income+$new_bills+$new_expenditure)/3,2);
                $total_borrowing = round(($new_financial+$new_institution+$new_repay)/3,2);
                $total_resilience = round(($new_employment+$new_emergency+$new_insurance)/3,2);
                $total_planning = round(($new_budget+$new_finances+$new_goal)/3,2);
                $total_decision_making = round(($new_ability+$new_instrument+$new_asset)/3,2);


                /*
                |============================|
                |====Total Final Score ======|
                |============================|
                */

                $final_score = round($total_savings+$total_spending+$total_borrowing+$total_resilience+$total_planning+$total_decision_making,2)/6;
		        return $final_score;
	}
		
	function getParticularCalculation($userId){           //6
    	$getalldata= BotmanModel::where('userid',$userId)->first(); 
        
                /*
                |============================|
                |=== Savings Q&A ============|
                |============================|
                */ 

                if($getalldata->save_income=='Daily'){
                    $new_save_income=100;
                }
                if($getalldata->save_income=='Weekly'){
                    $new_save_income=80;
                }
                if($getalldata->save_income=='Monthly'){
                    $new_save_income=50;
                }
                if($getalldata->save_income=='Bi annually'){
                    $new_save_income=40;
                }
                if($getalldata->save_income=='Annually'){
                    $new_save_income=20;
                }
                if($getalldata->save_income=='Not able to save at all'){
                    $new_save_income=0;
                }


                if($getalldata->total_income=="Much more than half of my income"){
                    $new_total_income=100;
                }
                if($getalldata->total_income=='Little more than half my income'){
                    $new_total_income=80;
                }
                if($getalldata->total_income=='About half of my income'){
                    $new_total_income=50;
                }
                if($getalldata->total_income=='Little less than half my income'){
                    $new_total_income=40;
                }
                if($getalldata->total_income=='Much less than half my income'){
                    $new_total_income=20;
                }
                if($getalldata->total_income=='Not able to save at all'){
                    $new_total_income=0;
                }


                if($getalldata->savings=="Saving was much more than spending"){
                    $new_savings=100;
                }
                if($getalldata->savings=='Saving was a little more than spending'){
                    $new_savings=80;
                }
                if($getalldata->savings=='Saving was about equal to spending'){
                    $new_savings=50;
                }
                if($getalldata->savings=='Saving was little less than spending'){
                    $new_savings=40;
                }
                if($getalldata->savings=='Saving was much less than spending'){
                    $new_savings=20;
                }
                if($getalldata->savings=='No savings at all'){
                    $new_savings=0;
                }

                /*
                |============================|
                |=== Spending Q&A ===========|
                |============================|
                */


                if($getalldata->spending_total_income=="Spending was much less than income"){
                    $new_spending_total_income=100;
                }
                if($getalldata->spending_total_income=='Spending was a little less than income'){
                    $new_spending_total_income=75;
                }
                if($getalldata->spending_total_income=='Spending about equal to income'){
                    $new_spending_total_income=50;
                }
                if($getalldata->spending_total_income=='Spending was little more than income'){
                    $new_spending_total_income=25;
                }
                if($getalldata->spending_total_income=='Spending was much more than income'){
                    $new_spending_total_income=0;
                }



                if($getalldata->bills=="Paid all bills on time"){
                    $new_bills=100;
                }
                if($getalldata->bills=='Paid most of our bills on time'){
                    $new_bills=75;
                }
                if($getalldata->bills=='Paid some of our bills on time'){
                    $new_bills=50;
                }
                if($getalldata->bills=='Paid very few bills on time'){
                    $new_bills=25;
                }
                if($getalldata->bills=='Barely paid any bill on time'){
                    $new_bills=0;
                }



                if($getalldata->expenditure=="Expenditure on essential goods is much higher than that on non-essential goods"){
                    $new_expenditure=100;
                }
                if($getalldata->expenditure=='Expenditure on essential goods is slightly higher than that on non-essential goods'){
                    $new_expenditure=75;
                }
                if($getalldata->expenditure=='Expenditure on essential goods is equal to that on non-essential goods'){
                    $new_expenditure=50;
                }
                if($getalldata->expenditure=='Expenditure on essential goods is slightly lower than that on non-essential goods'){
                    $new_expenditure=25;
                }
                if($getalldata->expenditure=='Expenditure on essential goods is much lower than that on non-essential goods'){
                    $new_expenditure=0;
                }


                /*
                |============================|
                |=== Borrowing Q&A ==========|
                |============================|
                */


                if($getalldata->financial=="Very easy"){
                    $new_financial=100;
                }
                if($getalldata->financial=='Moderately Easy'){
                    $new_financial=75;
                }
                if($getalldata->financial=='Indifferent (neither easy nor difficult)'){
                    $new_financial=50;
                }
                if($getalldata->financial=='Moderately difficult'){
                    $new_financial=25;
                }
                if($getalldata->financial=='Very difficult'){
                    $new_financial=0;
                }


                if($getalldata->institution=='Once a year'){
                    $new_institution=100;
                }
                if($getalldata->institution=='Once in 6 months'){
                    $new_institution=75;
                }
                if($getalldata->institution=='Once in 3 months'){
                    $new_institution=50;
                }
                if($getalldata->institution=='Every month'){
                    $new_institution=25;
                }
                if($getalldata->institution=="Never"){
                    $new_institution=0;
                }


                if($getalldata->repay=='Paid all EMIs on time'){
                    $new_repay=100;
                }
                if($getalldata->repay=='Paid most EMIs on time'){
                    $new_repay=75;
                }
                if($getalldata->repay=='Paid some EMIs on time'){
                    $new_repay=50;
                }
                if($getalldata->repay=='Barely paid any EMIs on time'){
                    $new_repay=25;
                }
                if($getalldata->repay=="Never had to pay EMI since I never borrowed money"){
                    $new_repay=0;
                }


                /*
                |============================|
                |=== Resilience Q&A =========|
                |============================|
                */

                if($getalldata->employment=="More than a year"){
                    $new_employment=100;
                }
                if($getalldata->employment=='6 months - 1 year'){
                    $new_employment=75;
                }
                if($getalldata->employment=='2-6 months'){
                    $new_employment=50;
                }
                if($getalldata->employment=='One month'){
                    $new_employment=25;
                }
                if($getalldata->employment=='Less than a week'){
                    $new_employment=0;
                }


                if($getalldata->emergency=="Very easy"){
                    $new_emergency=100;
                }
                if($getalldata->emergency=='Moderately Easy'){
                    $new_emergency=75;
                }
                if($getalldata->emergency=='Somewhat easy'){
                    $new_emergency=50;
                }
                if($getalldata->emergency=='Moderately difficult'){
                    $new_emergency=25;
                }
                if($getalldata->emergency=='Very difficult'){
                    $new_emergency=0;
                }



                if($getalldata->insurance=="Once a year"){
                    $new_insurance=100;
                }
                if($getalldata->insurance=='Once in 6 months'){
                    $new_insurance=75;
                }
                if($getalldata->insurance=='Once in 3 months'){
                    $new_insurance=50;
                }
                if($getalldata->insurance=='Every month'){
                    $new_insurance=25;
                }
                if($getalldata->insurance=='Never'){
                    $new_insurance=0;
                }


                /*
                |============================|
                |===== Planning Q&A =========|
                |============================|
                */



                if($getalldata->budget=='I have a formal budget that’s documented (e.g. spreadsheet, book or online tool) that calculates my outgoing expenses and the amount of money I need to allocate each week or month'){
                    $new_budget=75;
                }
                if($getalldata->budget=='I have a ‘mental’ budget – no documentation or spreadsheets, but I still keep track of my finances and spending'){
                    $new_budget=50;
                }
                if($getalldata->budget=='I keep a mental budget but do not track of all my finances and spending, only the major expenses'){
                    $new_budget=25;
                }
                if($getalldata->budget=='I do not work a budget at all and spend what I can afford at that time'){
                    $new_budget=0;
                }



                if($getalldata->finances=="I am actively planning for my financial future"){
                    $new_finances=100;
                }
                if($getalldata->finances=='I am primarily focused on my current finances today but and have started taking active steps towards planning my future finances'){
                    $new_finances=75;
                }
                if($getalldata->finances=='I’m starting to think about planning for my financial future but have not yet taken active steps towards this'){
                    $new_finances=50;
                }
                if($getalldata->finances=='I’m primarily focused on my finances today and haven’t put much thought into planning for my financial future'){
                    $new_finances=25;
                }
                if($getalldata->finances=='I have not put any thought into my planning for my financial future'){
                    $new_finances=0;
                }



                if($getalldata->goal=="Very often"){
                    $new_goal=100;
                }
                if($getalldata->goal=='Often'){
                    $new_goal=75;
                }
                if($getalldata->goal=='Sometimes'){
                    $new_goal=50;
                }
                if($getalldata->goal=='Not often'){
                    $new_goal=25;
                }
                if($getalldata->goal=='Never'){
                    $new_goal=0;
                }



                /*
                |============================|
                |=== Decision Making Q&A ====|
                |============================|
                */


                if($getalldata->ability=="I don’t consult others, I am fully confident to take decisions instantly"){
                    $new_ability=100;
                }
                if($getalldata->ability=='I don’t consult others, I am fully confident to take decisions but I delay my decisions to do some research/think about it/ to observe what others are doing'){
                    $new_ability=75;
                }
                if($getalldata->ability=='I make my financial decisions, but in consultation with others'){
                    $new_ability=50;
                }
                if($getalldata->ability=='I always need to consult others for guidance'){
                    $new_ability=25;
                }
                if($getalldata->ability=='I do not make financial decisions (someone else makes the decision)'){
                    $new_ability=0;
                }



                if($getalldata->instrument=="I am fully aware of these instruments and make all decisions independently"){
                    $new_instrument=100;
                }
                if($getalldata->instrument=='I consult with a financial expert before making any decisions regarding investing in these instruments'){
                    $new_instrument=75;
                }
                if($getalldata->instrument=='I make decisions regarding investing in these instruments in consultation with friends and family'){
                    $new_instrument=50;
                }
                if($getalldata->instrument=='I do not make these decisions. I rely on financial experts to make these decisions for me'){
                    $new_instrument=25;
                }
                if($getalldata->instrument=='I do not make these decisions. I rely on friends and family to make these decisions for me'){
                    $new_instrument=0;
                }



                if($getalldata->asset=="I am fully aware of these assets and make all decisions independently"){
                    $new_asset=100;
                }
                if($getalldata->asset=='I consult with a financial expert before making any decisions regarding investing in these assets'){
                    $new_asset=75;
                }
                if($getalldata->asset=='I make decisions regarding investing in these assets in consultation with friends and family'){
                    $new_asset=50;
                }
                if($getalldata->asset=='I do not make these decisions. I rely on financial experts to make these decisions for me'){
                    $new_asset=25;
                }
                if($getalldata->asset=='I do not make these decisions. I rely on friends and family to make these decisions for me'){
                    $new_asset=0;
                }

                /*
                |============================|
                |======= Calculations =======|
                |============================|
                */

                $total_savings = round(($new_save_income+$new_total_income+$new_savings)/3,2);

                $total_spending = round(($new_spending_total_income+$new_bills+$new_expenditure)/3,2);
                $total_borrowing = round(($new_financial+$new_institution+$new_repay)/3,2);
                $total_resilience = round(($new_employment+$new_emergency+$new_insurance)/3,2);
                $total_planning = round(($new_budget+$new_finances+$new_goal)/3,2);
                $total_decision_making = round(($new_ability+$new_instrument+$new_asset)/3,2);


                /*
                |============================|
                |====Total Final Score ======|
                |============================|
                */

                $final_score = round($total_savings+$total_spending+$total_borrowing+$total_resilience+$total_planning+$total_decision_making,2)/6;
		        
                $alldata=[
                    'total_savings'=>$total_savings,
                    'total_spending'=>$total_spending,
                    'total_borrowing'=>$total_borrowing,
                    'total_resilience'=>$total_resilience,
                    'total_planning'=>$total_planning,
                    'total_decision_making'=>$total_decision_making,
                    'final_score'=>$final_score,
                ];
                return $alldata;
	}
	

}