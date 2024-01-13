<?php
namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use App\Models\BotmanModel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\AdminModel;

class OnboardingConversation extends Conversation
{
    protected $AdminModel;                              // 3
    //4
    public function __construct(AdminModel $AdminModel) {

        $this->AdminModel = $AdminModel;	            //$this->any_name = constructor passed variable which is definedin controller 

    }

    public function run()
    {
            
    }

    public function askName()
    {
        $this->ask('Hello! What is your name?', function(Answer $answer) {
            $name = $answer->getText();
            $this->say('Nice to meet you '.$name.' !');

            $userId = $this->bot->getUser()->getId();                  // get userId that browser return
            BotmanModel::create([                                   // Put your Model name here
                'userid'=>$userId,
                'name'=>$name,                                          // database name = created variable name
            ]);

             $this->askAge();
        });
    }

    public function askAge()
    {
            $this->ask('What is your age?', function(Answer $answer) {
            $age = $answer->getText();

            $userId = $this->bot->getUser()->getId();
            $getdata=BotmanModel::where('userId',$userId)->first();

            if(!empty($getdata)){
                $agedata=[
                        'age'=>$age,
                ];
                BotmanModel::where('userId',$userId)->update($agedata);
           }
            
            $this->askGender();
        });
    }

    public function askGender()
    {
            $this->ask('Mention your gender <br> A. Male <br> B. Female <br> C. Others', function(Answer $answer) {
            $gender = $answer->getText();

            if(strtolower($gender)=='a'|| strtolower($gender)=='Male'){
                $getgender= 'Male';
            }
            if(strtolower($gender)=='b' || strtolower($gender)=='female'){
                $getgender= 'Female';
            }
            if(strtolower($gender)=='c' || strtolower($gender) =='others'){
                $getgender= 'Others';
            }


            $userId = $this->bot->getUser()->getId();
            $getdata=BotmanModel::where('userId',$userId)->first();

            if(!empty($getdata)){
                $genderdata=[
                        'gender'=>$getgender,
                ];
                BotmanModel::where('userId',$userId)->update($genderdata);
            }
            $this->askSaveIncome();
        });
    }



    public function askSaveIncome()
    {
            $this->ask('In the past 12 months how often were you able to save a part of your income ? <br> A. Daily <br> B. Weekly <br> C. Monthly <br> D. Bi annually <br> E. Annually <br> F. Not able to save at all ', function(Answer $answer) {
            $save_income = $answer->getText();

            $userId=$this->bot->getUser()->getId();
            $getdata=BotmanModel::where('userId',$userId)->first();


            if(strtolower($save_income)=='a'|| strtolower($save_income)=='Daily'){
                $getsource_of_income= 'Daily';
            }
            if(strtolower($save_income)=='b' || strtolower($save_income)=='Weekly'){
                $getmonthly_income= 'Weekly';
            }
            if(strtolower($save_income)=='c' || strtolower($save_income) =='Monthly'){
                $getsource_of_income= 'Monthly';
            }
            if(strtolower($save_income)=='d'|| strtolower($save_income)=='Bi annually'){
                $getsource_of_income= 'Bi annually';
            }
            if(strtolower($save_income)=='e' || strtolower($save_income)=='Annually'){
                $getsource_of_income= 'Annually';
            }
            if(strtolower($save_income)=='f' || strtolower($save_income)=='Not able to save at all'){
                $getsource_of_income= 'Not able to save at all';
            }


            if(!empty($getdata)){
                $save_incomedata=[
                        'save_income'=>$getsource_of_income,
                ];
                BotmanModel::where('userId',$userId)->update($save_incomedata);
            }
            
            
            $this->askTotalIncome();
    });
    }

    public function askTotalIncome()
    {
            $this->ask('In the past 12 months how much of your total income were you able to save? <br> A. Much more than half of my income <br> B. Little more than half my income <br> C. About half of my income <br> D. Little less than half my income <br> E. Much less than half my income <br> F. Not able to save at all', function(Answer $answer) {
            $total_income = $answer->getText();

            $userId=$this->bot->getUser()->getId();
            $getdata=BotmanModel::where('userId',$userId)->first();

            if(strtolower($total_income)=='a'|| strtolower($total_income)=='Much more than half of my income'){
                $gettotal_income= 'Much more than half of my income';
            }
            if(strtolower($total_income)=='b' || strtolower($total_income)=='Little more than half my income'){
                $gettotal_income= 'Little more than half my income';
            }
            if(strtolower($total_income)=='c' || strtolower($total_income) =='About half of my income'){
                $gettotal_income= 'About half of my income';
            }
            if(strtolower($total_income)=='d'|| strtolower($total_income)=='Little less than half my income'){
                $gettotal_income= 'Little less than half my income';
            }
            if(strtolower($total_income)=='e' || strtolower($total_income)=='Much less than half my income'){
                $gettotal_income= 'Much less than half my income';
            }
            if(strtolower($total_income)=='f' || strtolower($total_income)=='Not able to save at all'){
                $gettotal_income= 'Not able to save at all';
            }

            if(!empty($getdata)){
                $total_incomedata=[
                        'total_income'=>$gettotal_income,
                ];
                BotmanModel::where('userId',$userId)->update($total_incomedata);
            }
            
            
            $this->askSavings();
    });
    }
    

    public function askSavings()
    {
            $this->ask('Which of the following statements best describes your total savings compared to your total spending in the past 12 months ? <br> A. Saving was much more than spending <br> B. Saving was a little more than spending <br> C. Saving was little less than spending <br> D. No savings at all <br> E. Saving was about equal to spending <br> F. Saving was little less than spending ', function(Answer $answer) {
            $savings = $answer->getText();

            $userId=$this->bot->getUser()->getId();
            $getdata=BotmanModel::where('userId',$userId)->first();

            if(strtolower($savings)=='a'|| strtolower($savings)=='Saving was much more than spending'){
                $getsavings= 'Saving was much more than spending';
            }
            if(strtolower($savings)=='b' || strtolower($savings)=='Saving was a little more than spending'){
                $getsavings= 'Saving was a little more than spending';
            }
            if(strtolower($savings)=='c' || strtolower($savings) =='Saving was little less than spending'){
                $getsavings= 'Saving was little less than spending';
            }
            if(strtolower($savings)=='d'|| strtolower($savings)=='No savings at all'){
                $getsavings= 'No savings at all';
            }
            if(strtolower($savings)=='e' || strtolower($savings)=='Saving was about equal to spending'){
                $getsavings= 'Saving was about equal to spending';
            }
            if(strtolower($savings)=='f' || strtolower($savings)=='Saving was little less than spending ?'){
                $getsavings= 'Saving was little less than spending';
            }


            if(!empty($getdata)){
                $savingsdata=[
                        'savings'=>$getsavings,
                ];
                BotmanModel::where('userId',$userId)->update($savingsdata);
            }
            
            
            $this->askSpendingTotalIncome();
    });
    }
    

    public function askSpendingTotalIncome()
    {
            $this->ask('Which of the following statements best describes your total spending compared to your total income in the past 12 months ? <br> A. Spending was much less than income <br> B. Spending was a little less than income <br> C. Spending is about equal to income <br> D. Spending was little more than income <br> E. Spending was much more than income ', function(Answer $answer) {
            $spending_total_income = $answer->getText();

            $userId=$this->bot->getUser()->getId();
            $getdata=BotmanModel::where('userId',$userId)->first();

            if(strtolower($spending_total_income)=='a'|| strtolower($spending_total_income)=='Spending was much less than income'){
                $getspending_total_income= 'Spending was much less than income';
            }
            if(strtolower($spending_total_income)=='b' || strtolower($spending_total_income)=='Spending was a little less than income'){
                $getspending_total_income= 'Spending was a little less than income';
            }
            if(strtolower($spending_total_income)=='c' || strtolower($spending_total_income) =='Spending is about equal to income'){
                $getspending_total_income= 'Spending is about equal to income';
            }
            if(strtolower($spending_total_income)=='d'|| strtolower($spending_total_income)=='Spending was little more than income'){
                $getspending_total_income= 'Spending was little more than income';
            }
            if(strtolower($spending_total_income)=='e' || strtolower($spending_total_income)=='Spending was much more than income'){
                $getspending_total_income= 'Spending was much more than income';
            }

            if(!empty($getdata)){
                $spending_total_incomedata=[
                        'spending_total_income'=>$getspending_total_income,
                ];
                BotmanModel::where('userId',$userId)->update($spending_total_incomedata);
            }
            
            $this->askBills();
    });
    }
    
    public function askBills()
    {
            $this->ask('Which of the following statements best describes how you were able to pay your bills (rent,utilities, education, etc) over the last 12 months? (In case you live with your family, please choose the appropriate scenario for your household) <br> A. Paid all bills on time <br> B. Paid most of our bills on time <br> C. Paid some of our bills on time <br> D. Paid very few bills on time <br> E. Barely paid any bill on time ', function(Answer $answer) {
            $bills = $answer->getText();

            if(strtolower($bills)=='a'|| strtolower($bills)=='Paid all bills on time'){
                $getbills= 'Paid all bills on time';
            }
            if(strtolower($bills)=='b' || strtolower($bills)=='Paid most of our bills on time'){
                $getbills= 'Paid most of our bills on time';
            }
            if(strtolower($bills)=='c' || strtolower($bills) =='Paid some of our bills on time'){
                $getbills= 'Paid some of our bills on time';
            }
            if(strtolower($bills)=='d'|| strtolower($bills)=='Paid very few bills on time'){
                $getbills= 'Paid very few bills on time';
            }
            if(strtolower($bills)=='e' || strtolower($bills)=='Barely paid any bill on time'){
                $getbills= 'Barely paid any bill on time';
            }

            $userId=$this->bot->getUser()->getId();
            $getdata=BotmanModel::where('userId',$userId)->first();

            if(!empty($getdata)){
                $billsdata=[
                        'bills'=>$getbills,
                ];
                BotmanModel::where('userId',$userId)->update($billsdata);
            }
            
            $this->askExpenditure();
    });
    }
    
    public function askExpenditure()
    {
            $this->ask('Which of the following statements describe your expenditure pattern in purchasing essential (for example food, groceries, education, medicine etc.) and non-essential commodities (for example, entertainment, luxury items etc.) <br> A. Expenditure on essential goods is much higher than that on non-essential goods <br> B. Expenditure on essential goods is slightly higher than that on non-essential goods <br> C. Expenditure on essential goods is equal to that on non-essential goods <br> D. Expenditure on essential goods is slightly lower than that on non-essential goods <br> E. Expenditure on essential goods is much lower than that on non-essential goods ', function(Answer $answer) {
            $expenditure = $answer->getText();

            $userId=$this->bot->getUser()->getId();
            $getdata=BotmanModel::where('userId',$userId)->first();

            if(strtolower($expenditure)=='a'|| strtolower($expenditure)=='Expenditure on essential goods is much higher than that on non-essential goods'){
                $getexpenditure= 'Expenditure on essential goods is much higher than that on non-essential goods';
            }
            if(strtolower($expenditure)=='b' || strtolower($expenditure)=='Expenditure on essential goods is slightly higher than that on non-essential goods'){
                $getexpenditure= 'Expenditure on essential goods is slightly higher than that on non-essential goods';
            }
            if(strtolower($expenditure)=='c' || strtolower($expenditure) =='Expenditure on essential goods is equal to that on non-essential goods'){
                $getexpenditure= 'Expenditure on essential goods is equal to that on non-essential goods';
            }
            if(strtolower($expenditure)=='d'|| strtolower($expenditure)=='Expenditure on essential goods is slightly lower than that on non-essential goods'){
                $getexpenditure= 'Expenditure on essential goods is slightly lower than that on non-essential goods';
            }
            if(strtolower($expenditure)=='e' || strtolower($expenditure)=='Expenditure on essential goods is much lower than that on non-essential goods'){
                $getexpenditure= 'Expenditure on essential goods is much lower than that on non-essential goods';
            }

            if(!empty($getdata)){
                $expendituredata=[
                        'expenditure'=>$getexpenditure,
                ];
                BotmanModel::where('userId',$userId)->update($expendituredata);
            }
            
            $this->askFinancial();
    });
    }
    

    public function askFinancial()
    {
            $this->ask('How easy or difficult is it for you to get a loan from a formal financial institution ? <br> A. Very easy <br> B. Moderately Easy <br> C. Indifferent (neither easy nor difficult) <br> D. Moderately difficult <br> E. Very difficult ', function(Answer $answer) {
            $financial = $answer->getText();

            $userId=$this->bot->getUser()->getId();
            $getdata=BotmanModel::where('userId',$userId)->first();

            if(strtolower($financial)=='a'|| strtolower($financial)=='Very easy'){
                $getfinancial= 'Very easy';
            }
            if(strtolower($financial)=='b' || strtolower($financial)=='Moderately easy'){
                $getfinancial= 'Moderately easy';
            }
            if(strtolower($financial)=='c' || strtolower($financial) =='Indifferent (neither easy nor difficult)'){
                $getfinancial= 'Indifferent (neither easy nor difficult)';
            }
            if(strtolower($financial)=='d'|| strtolower($financial)=='Moderately difficult'){
                $getfinancial= 'Moderately difficult';
            }
            if(strtolower($financial)=='e' || strtolower($financial)=='Very difficult'){
                $getfinancial= 'Very difficult';
            }


            if(!empty($getdata)){
                $financialdata=[
                        'financial'=>$getfinancial,
                ];
                BotmanModel::where('userId',$userId)->update($financialdata);
            }
            
            $this->askInstitution();
    });
    }
    
    public function askInstitution()
    {
            $this->ask('In the past 12 months how frequently did you have to borrow money from a financial institution or family ? <br> A. Once a year <br> B. Once in 6 months <br> C. Once in 3 months <br> D. Every month <br> E. Never ', function(Answer $answer) {
            $institution = $answer->getText();

            $userId=$this->bot->getUser()->getId();
            $getdata=BotmanModel::where('userId',$userId)->first();

            if(strtolower($institution)=='a'|| strtolower($institution)=='Once a year'){
                $getinstitution= 'Once a year';
            }
            if(strtolower($institution)=='b' || strtolower($institution)=='Once in 6 months'){
                $getinstitution = 'Once in 6 months';
            }
            if(strtolower($institution)=='c' || strtolower($institution) =='Once in 3 months'){
                $getinstitution= 'Once in 3 months';
            }
            if(strtolower($institution)=='d'|| strtolower($institution)=='Every month'){
                $getinstitution= 'Every month';
            }
            if(strtolower($institution)=='e' || strtolower($institution)=='Never'){
                $getinstitution= 'Never';
            }

            if(!empty($getdata)){
                $institutiondata=[
                        'institution'=>$getinstitution,
                ];
                BotmanModel::where('userId',$userId)->update($institutiondata);
            }
            
            $this->askRepay();
    });
    }

    public function askRepay()
    {
            $this->ask('Considering the amount borrowed over the last 12 months, how frequently could you repay the EMIs ? <br> A. Paid all EMIs on time <br> B. Paid most EMIs on time <br> C. Paid some EMIs on time <br> D. Barely paid any EMIs on time <br> E. Never had to pay EMI since I never borrowed money ', function(Answer $answer) {
            $repay = $answer->getText();

            $userId=$this->bot->getUser()->getId();
            $getdata=BotmanModel::where('userId',$userId)->first();

            if(strtolower($repay)=='a'|| strtolower($repay)=='Paid all EMIs on time'){
                $getrepay= 'Paid all EMIs on time';
            }
            if(strtolower($repay)=='b' || strtolower($repay)=='Paid most EMIs on time'){
                $getrepay = 'Paid most EMIs on time';
            }
            if(strtolower($repay)=='c' || strtolower($repay) =='Paid some EMIs on time'){
                $getrepay= 'Paid some EMIs on time';
            }
            if(strtolower($repay)=='d'|| strtolower($repay)=='Barely paid any EMIs on time'){
                $getrepay= 'Barely paid any EMIs on time';
            }
            if(strtolower($repay)=='e' || strtolower($repay)=='Never had to pay EMI since I never borrowed money'){
                $getrepay= 'Never had to pay EMI since I never borrowed money';
            }


            if(!empty($getdata)){
                $repaydata=[
                        'repay'=>$getrepay,
                ];
                BotmanModel::where('userId',$userId)->update($repaydata);
            }
            
            $this->askEmployment();
    });
    }
    
    public function askEmployment()
    {
            $this->ask('If you lose employment, how many days can you sustain with the money you have saved ? <br> A. More than a year <br> B. 6 months - 1 year <br> C. 2-6 months <br> D. One month <br> E. Less than a week ', function(Answer $answer) {
            $employment = $answer->getText();


            $userId=$this->bot->getUser()->getId();
            $getdata=BotmanModel::where('userId',$userId)->first();

            if(strtolower($employment)=='a'|| strtolower($employment)=='More than a year'){
                $getemployment= 'More than a year';
            }
            if(strtolower($employment)=='b' || strtolower($employment)=='6 months - 1 yeare'){
                $getemployment = '6 months - 1 year';
            }
            if(strtolower($employment)=='c' || strtolower($employment) =='2-6 months'){
                $getemployment= '2-6 months';
            }
            if(strtolower($employment)=='d'|| strtolower($employment)=='One month'){
                $getemployment= 'One month';
            }
            if(strtolower($employment)=='e' || strtolower($employment)=='Less than a week'){
                $getemployment= 'Less than a week';
            }

            if(!empty($getdata)){
                $employmentdata=[
                        'employment'=>$getemployment,
                ];
                BotmanModel::where('userId',$userId)->update($employmentdata);
            }
            
            
            $this->askEmergency();
    });
    }
    
    public function askEmergency()
    {
            $this->ask('How easy or difficult will it be for you to raise money in case of an emergency ? <br> A. Very easy <br> B. Moderately Easy <br> C. Somewhat easy <br> D. Moderately difficult <br> E. Very difficult ', function(Answer $answer) {
            $emergency = $answer->getText();

            $userId=$this->bot->getUser()->getId();
            $getdata=BotmanModel::where('userId',$userId)->first();

            if(strtolower($emergency)=='a'|| strtolower($emergency)=='Very easy'){
                $getemergency= 'Very easy';
            }
            if(strtolower($emergency)=='b' || strtolower($emergency)=='Moderately easy'){
                $getemergency = 'Moderately easy';
            }
            if(strtolower($emergency)=='c' || strtolower($emergency) =='Somewhat easy'){
                $getemergency= 'Somewhat easy';
            }
            if(strtolower($emergency)=='d'|| strtolower($emergency)=='Moderately difficult'){
                $getemergency= 'Moderately difficult';
            }
            if(strtolower($emergency)=='e' || strtolower($emergency)=='Very difficult'){
                $getemergency= 'Very difficult';
            }

            if(!empty($getdata)){
                $emergencydata=[
                        'emergency'=>$getemergency,
                ];
                BotmanModel::where('userId',$userId)->update($emergencydata);
            }
            
            $this->askInsurance();
    });
    }

    public function askInsurance()
    {
            $this->ask('How frequently have you invested in insurance policies or long term saving schemes in the past 12 months (all kinds of insurance like - health and non-health/ life and non-life) ? <br> A. Once a year <br> B. Once in 6 months <br> C. Once in 3 months <br> D. Every month <br> E. Never ', function(Answer $answer) {
            $insurance = $answer->getText();

            $userId=$this->bot->getUser()->getId();
            $getdata=BotmanModel::where('userId',$userId)->first();

            if(strtolower($insurance)=='a'|| strtolower($insurance)=='Once a year'){
                $getinsurance= 'Once a year';
            }
            if(strtolower($insurance)=='b' || strtolower($insurance)=='Once in 6 months'){
                $getinsurance = 'Once in 6 months';
            }
            if(strtolower($insurance)=='c' || strtolower($insurance) =='Once in 3 months'){
                $getinsurance= 'Once in 3 months';
            }
            if(strtolower($insurance)=='d'|| strtolower($insurance)=='Every month'){
                $getinsurance= 'Every month';
            }
            if(strtolower($insurance)=='e' || strtolower($insurance)=='Never'){
                $getinsurance= 'Never';
            }


            if(!empty($getdata)){
                $insurancedata=[
                        'insurance'=>$getinsurance,
                ];
                BotmanModel::where('userId',$userId)->update($insurancedata);
            }
            
            $this->askBudget();
    });
    }
    
    public function askBudget()
    {
            $this->ask('Which of the following best describes your current approach to budgeting ? <br> A. I have a formal budget that’s documented (e.g. spreadsheet, book or online tool) that calculates my outgoing expenses and the amount of money I need to allocate each week or month <br> B. I have a ‘mental’ budget – no documentation or spreadsheets, but I still keep track of my finances and spending <br> C. I keep a mental budget but do not track of all my finances and spending, only the major expenses <br> D. I do not work a budget at all and spend what I can afford at that time', function(Answer $answer) {
            $budget = $answer->getText();

            $userId=$this->bot->getUser()->getId();
            $getdata=BotmanModel::where('userId',$userId)->first();

            if(strtolower($budget)=='a'|| strtolower($budget)=='I have a formal budget that’s documented (e.g. spreadsheet, book or online tool) that calculates my outgoing expenses and the amount of money I need to allocate each week or month'){
                $getbudget= 'I have a formal budget that’s documented (e.g. spreadsheet, book or online tool) that calculates my outgoing expenses and the amount of money I need to allocate each week or month';
            }
            if(strtolower($budget)=='b' || strtolower($budget)=='I have a ‘mental’ budget – no documentation or spreadsheets, but I still keep track of my finances and spending'){
                $getbudget = 'I have a ‘mental’ budget – no documentation or spreadsheets, but I still keep track of my finances and spending';
            }
            if(strtolower($budget)=='c' || strtolower($budget) =='I keep a mental budget but do not track of all my finances and spending, only the major expenses'){
                $getbudget= 'I keep a mental budget but do not track of all my finances and spending, only the major expenses';
            }
            if(strtolower($budget)=='d'|| strtolower($budget)=='I do not work a budget at all and spend what I can afford at that time'){
                $getbudget= 'I do not work a budget at all and spend what I can afford at that time';
            }

            if(!empty($getdata)){
                $budgetdata=[
                        'budget'=>$getbudget,
                ];
                BotmanModel::where('userId',$userId)->update($budgetdata);
            }
            
            $this->askFinances();
    });
    }
    
    public function askFinances()
    {
            $this->ask('Which of the following statements best describes you in relation to your finances ? <br> A. I am actively planning for my financial future <br> B. I am primarily focused on my current finances today but and have started taking active steps towards planning my future finances <br> C. I’m starting to think about planning for my financial future but have not yet taken active steps towards this <br> D. I’m primarily focused on my finances today and haven’t put much thought into planning for my financial future <br> E. I have not put any thought into my planning for my financial future', function(Answer $answer) {
            $finances = $answer->getText();

            $userId=$this->bot->getUser()->getId();
            $getdata=BotmanModel::where('userId',$userId)->first();


            if(strtolower($finances)=='a'|| strtolower($finances)=='I am actively planning for my financial future'){
                $getfinances= 'I am actively planning for my financial future';
            }
            if(strtolower($finances)=='b' || strtolower($finances)=='I am primarily focused on my current finances today but and have started taking active steps towards planning my future finances'){
                $getfinances = 'I am primarily focused on my current finances today but and have started taking active steps towards planning my future finances';
            }
            if(strtolower($finances)=='c' || strtolower($finances) =='I’m starting to think about planning for my financial future but have not yet taken active steps towards this'){
                $getfinances= 'I’m starting to think about planning for my financial future but have not yet taken active steps towards this';
            }
            if(strtolower($finances)=='d'|| strtolower($finances)=='I’m primarily focused on my finances today and haven’t put much thought into planning for my financial future'){
                $getfinances= 'I’m primarily focused on my finances today and haven’t put much thought into planning for my financial future';
            }
            if(strtolower($finances)=='e'|| strtolower($finances)=='I have not put any thought into my planning for my financial future'){
                $getfinances= 'I have not put any thought into my planning for my financial future';
            }



            if(!empty($getdata)){
                $financesdata=[
                        'finances'=>$getfinances,
                ];
                BotmanModel::where('userId',$userId)->update($financesdata);
            }
            
            $this->askGoal();
    });
    }


    public function askGoal()
    {
            $this->ask('In the past 12 months how often have you invested to achieve a short term financial goal (FDs, RDs, mutual funds, stocks, etc ? <br> A. Very often <br> B. Often <br> C. Sometimes <br> D. Not often <br> E. Never', function(Answer $answer) {
            $goal = $answer->getText();

            if(strtolower($goal)=='a'|| strtolower($goal)=='Very often'){
                $getgoal= 'Very often';
            }
            if(strtolower($goal)=='b'|| strtolower($goal)=='Often'){
                $getgoal= 'Often';
            }
            if(strtolower($goal)=='c'|| strtolower($goal)=='Sometimes'){
                $getgoal= 'Sometimes';
            }
            if(strtolower($goal)=='d'|| strtolower($goal)=='Not often'){
                $getgoal= 'Not often';
            }
            if(strtolower($goal)=='e'|| strtolower($goal)=='Never'){
                $getgoal= 'Never';
            }

            $userId=$this->bot->getUser()->getId();
            $getdata=BotmanModel::where('userId',$userId)->first();

            if(!empty($getdata)){
                $goaldata=[
                        'goal'=>$getgoal,
                ];
                BotmanModel::where('userId',$userId)->update($goaldata);
            }
            
            $this->askAbility();
    });
    }
    
    public function askAbility()
    {
            $this->ask('What best describes your financial decision making ability ? <br> A. I don’t consult others, I am fully confident to take decisions instantly <br> B. I don’t consult others, I am fully confident to take decisions but I delay my decisions to do some research/think about it/ to observe what others are doing <br> C. I make my financial decisions, but in consultation with others <br> D. I always need to consult others for guidance <br> E. I do not make financial decisions (someone else makes the decision)', function(Answer $answer) {
            $ability = $answer->getText();


            $userId=$this->bot->getUser()->getId();
            $getdata=BotmanModel::where('userId',$userId)->first();

            if(strtolower($ability)=='a'|| strtolower($ability)=='I don’t consult others, I am fully confident to take decisions instantly'){
                $getability= 'I don’t consult others, I am fully confident to take decisions instantly';
            }
            if(strtolower($ability)=='b'|| strtolower($ability)=='I don’t consult others, I am fully confident to take decisions but I delay my decisions to do some research/think about it/ to observe what others are doing'){
                $getability= 'I don’t consult others, I am fully confident to take decisions but I delay my decisions to do some research/think about it/ to observe what others are doing';
            }
            if(strtolower($ability)=='c'|| strtolower($ability)=='I make my financial decisions, but in consultation with others'){
                $getability= 'I make my financial decisions, but in consultation with others';
            }
            if(strtolower($ability)=='d'|| strtolower($ability)=='I always need to consult others for guidance'){
                $getability= 'I always need to consult others for guidance';
            }
            if(strtolower($ability)=='e'|| strtolower($ability)=='I do not make financial decisions (someone else makes the decision)'){
                $getability= 'I do not make financial decisions (someone else makes the decision)';
            }



            if(!empty($getdata)){
                $abilitydata=[
                        'ability'=>$getability,
                ];
                BotmanModel::where('userId',$userId)->update($abilitydata);
            }

            
            $this->askInstrument();
    });
    }
    
    public function askInstrument()
    {
            $this->ask('While deciding on investing in an instrument (Mutual funds/FD/RD), which of the statements would best describe you ? <br> A. I am fully aware of these instruments and make all decisions independently <br> B. I consult with a financial expert before making any decisions regarding investing in these instruments <br> C. I make decisions regarding investing in these instruments in consultation with friends and family <br> D. I do not make these decisions. I rely on financial experts to make these decisions for me <br> E. I do not make these decisions. I rely on friends and family to make these decisions for me', function(Answer $answer) {
            $instrument = $answer->getText();

            $userId=$this->bot->getUser()->getId();
            $getdata=BotmanModel::where('userId',$userId)->first();


            if(strtolower($instrument)=='a'|| strtolower($instrument)=='I am fully aware of these instruments and make all decisions independently'){
                $getinstrument= 'I am fully aware of these instruments and make all decisions independently';
            }
            if(strtolower($instrument)=='b'|| strtolower($instrument)=='I consult with a financial expert before making any decisions regarding investing in these instruments'){
                $getinstrument= 'I consult with a financial expert before making any decisions regarding investing in these instruments';
            }
            if(strtolower($instrument)=='c'|| strtolower($instrument)=='I make decisions regarding investing in these instruments in consultation with friends and family'){
                $getinstrument= 'I make decisions regarding investing in these instruments in consultation with friends and family';
            }
            if(strtolower($instrument)=='d'|| strtolower($instrument)=='I do not make these decisions. I rely on financial experts to make these decisions for me'){
                $getinstrument= 'I do not make these decisions. I rely on financial experts to make these decisions for me';
            }
            if(strtolower($instrument)=='e'|| strtolower($instrument)=='I do not make these decisions. I rely on friends and family to make these decisions for me'){
                $getinstrument= 'I do not make these decisions. I rely on friends and family to make these decisions for me';
            }


            if(!empty($getdata)){
                $instrumentdata=[
                        'instrument'=>$getinstrument,
                ];
                BotmanModel::where('userId',$userId)->update($instrumentdata);
            }
            
            $this->askAsset();
    });
    }
    
    public function askAsset()
    {
            $this->ask('While deciding on investing in an asset (house/land), which of the statements would best describe you ? <br> A. I am fully aware of these assets and make all decisions independently <br> B. I am fully aware of these assets and make all decisions independently <br> C. I make decisions regarding investing in these assets in consultation with friends and family <br> D. I do not make these decisions. I rely on financial experts to make these decisions for me <br> E. I do not make these decisions. I rely on friends and family to make these decisions for me. I rely on friends and family to make these decisions for me', function(Answer $answer) {
            $asset = $answer->getText();
            
            $userId=$this->bot->getUser()->getId();
            $getdata=BotmanModel::where('userId',$userId)->first();


            if(strtolower($asset)=='a'|| strtolower($asset)=='I am fully aware of these assets and make all decisions independently'){
                $getasset= 'I am fully aware of these assets and make all decisions independently';
            }
            if(strtolower($asset)=='b'|| strtolower($asset)=='I am fully aware of these assets and make all decisions independently'){
                $getasset= 'I am fully aware of these assets and make all decisions independentlys';
            }
            if(strtolower($asset)=='c'|| strtolower($asset)=='I make decisions regarding investing in these assets in consultation with friends and family'){
                $getasset= 'I make decisions regarding investing in these assets in consultation with friends and family';
            }
            if(strtolower($asset)=='d'|| strtolower($asset)=='I do not make these decisions. I rely on financial experts to make these decisions for me'){
                $getasset= 'I do not make these decisions. I rely on financial experts to make these decisions for me';
            }
            if(strtolower($asset)=='e'|| strtolower($asset)=='I do not make these decisions. I rely on friends and family to make these decisions for me. I rely on friends and family to make these decisions for me'){
                $getasset= 'I do not make these decisions. I rely on friends and family to make these decisions for me. I rely on friends and family to make these decisions for meme';
            }

            if(!empty($getdata)){
                $assetdata=[
                        'asset'=>$getasset,
                ];
                BotmanModel::where('userId',$userId)->update($assetdata);
            }
            
            $this->say('Thanks for answering all the above questions.');
            $this->askScoreCard();
    });
    }

    public function askScoreCard()
    {
                /*
                |============================|
                |=== Scorecard Questions ====|
                |============================|
                */

                 $userId = $this->bot->getUser()->getId();          
                 
                // $getalldata= BotmanModel::where('userid',$userId)->first();
                $final_score= $this->AdminModel->getcalculation($userId);           //5

                
                $this->say('Here is your scorecard data '.$final_score);
                
                if(round($final_score, 0) > 0 && round($final_score, 0) <= 39 ){
                    $this->say("Accoring to the survey evaluation, you are 'Financially Vulnerable' ");
                }
                elseif(round($final_score, 0) > 39 && round($final_score, 0) <= 79 ){
                    $this->say("Accoring to the survey evaluation, you are 'Financially Coping' ");    
                }else{
                    $this->say("Accoring to the survey evaluation, you are 'Financially Healthy' "); 
                }

                $this->askEmail();   

                // returns multiple variables at a time
                // $this->detail_score=$final_score;
                
                // $all_data_details=[
                //     'savings'=>$total_savings,
                //     'spending'=>$total_spending,
                //     'borrowing'=>$total_borrowing,
                //     'resilience'=>$total_resilience,
                //     'planning'=>$total_planning,
                //     'decision_making'=>$total_decision_making,
                // ];
                //$this->askPDF($all_data_details);
               // return $final_score;
    }


    public function askEmail(){
        $this->ask('Kindly enter your email id or phone number if you want more detailed information or you can simply end the survey by saying "No" ', function(Answer $answer) {
            $emailPattern = '/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/';
            $phonePattern = '/^\d{7}$/';

            $email = $answer->getText();

            $userId = $this->bot->getUser()->getId();
            //$getdata = BotmanModel::where('userid', $userId)->first();

            switch ($email) {
                case 'n':
                case 'N':
                case 'No':
                case 'NO':
                case 'no':
                case 'nO':
                case 'na':
                case 'NA':
                case 'Na':
                case 'nA':
                    $this->say('Thanks for participating in the survey!');
                    break;

                default:
                    if (preg_match($emailPattern, $email)) {
                        $emaildata = [
                            'email' => $email
                        ];
                        BotmanModel::where('userid',$userId)->update($emaildata);
                        
                        $this->say('Thanks for confirmation.');
                        $this->askCountry();

                    } 
                    elseif (preg_match($phonePattern, $email)) {
                        $phonedata = [
                            'phone' => $email
                        ];
                        BotmanModel::where('userid',$userId)->update($phonedata);

                        $this->say('Thanks for confirmation.');
                        $this->askCountry();
                    } 
                    else {
                        $this->say('Invalid phone number or email details. Please enter valid phone number or email id.');
                        $this->askEmail();
                    }
            } 
         }); 
    }

    public function askCountry()
    {
            $this->ask('Which country do you live in ?', function(Answer $answer) {
            $country = $answer->getText();

            $userId=$this->bot->getUser()->getId();
            $getdata=BotmanModel::where('userId',$userId)->first();

            if(!empty($getdata)){
                $countrydata=[
                        'country'=>$country,
                ];
                BotmanModel::where('userId',$userId)->update($countrydata);
            }
            
            $this->askRegion();
        });
    }

    public function askRegion()
    {
            $this->ask('Which region do you live in ?', function(Answer $answer) {
            $region = $answer->getText();

            $userId=$this->bot->getUser()->getId();
            $getdata=BotmanModel::where('userId',$userId)->first();
            if(!empty($getdata)){
                $regiondata=[
                        'region'=>$region,
                ];
                BotmanModel::where('userId',$userId)->update($regiondata);
            }
            
            $this->askState();
    });
    }

    public function askState()
    {
            $this->ask('What state or union territory do you live in ?', function(Answer $answer) {
            $state = $answer->getText();

            $userId=$this->bot->getUser()->getId();
            $getdata=BotmanModel::where('userId',$userId)->first();
            if(!empty($getdata)){
                $statedata=[
                        'state'=>$state,
                ];
                BotmanModel::where('userId',$userId)->update($statedata);
            }
            
            $this->askPlace();
    });
    }

    public function askPlace()
    {
            $this->ask('Which of the following best describes the place where you live now ? <br> A. A large city <br> B. A suburb near a large city <br> C. small city or town <br> D. rural or remote community <br> E. Prefer not to say ', function(Answer $answer) {
            $place = $answer->getText();

            if(strtolower($place)=='a'|| strtolower($place)=='A large city'){
                $getplace= 'A large city';
            }
            if(strtolower($place)=='b' || strtolower($place)=='A suburb near a large city'){
                $getplace= 'A suburb near a large city';
            }
            if(strtolower($place)=='c' || strtolower($place) =='small city or town'){
                $getplace= 'small city or town';
            }
            if(strtolower($place)=='d'|| strtolower($place)=='rural or remote community'){
                $getplace= 'rural or remote community';
            }
            if(strtolower($place)=='e' || strtolower($place)=='Prefer not to say'){
                $getplace= 'Prefer not to say';
            }


            $userId=$this->bot->getUser()->getId();
            $getdata=BotmanModel::where('userId',$userId)->first();
            if(!empty($getdata)){
                $placedata=[
                        'place'=>$getplace,
                ];  
                BotmanModel::where('userId',$userId)->update($placedata);
            }
            
            $this->askEducation();
    });
    }

    public function askEducation()
    {
            $this->ask('What is the highest degree or level of education you have completed ? <br> A. Not Literate <br> B. Vocational Training <br> C. Literate without formal education <br> D. Primary Education <br> E. High School F. Undergraduate <br> G. Graduate and above ', function(Answer $answer) {
            $education = $answer->getText();

            if(strtolower($education)=='a'|| strtolower($education)=='Not Literate'){
                $geteducation= 'Not Literate';
            }
            if(strtolower($education)=='b' || strtolower($education)=='Vocational Training'){
                $geteducation= 'Vocational Training';
            }
            if(strtolower($education)=='c' || strtolower($education) =='Literate without formal education'){
                $geteducation= 'Literate without formal education';
            }
            if(strtolower($education)=='d'|| strtolower($education)=='Primary Education'){
                $geteducation= 'Primary Education';
            }
            if(strtolower($education)=='e' || strtolower($education)=='High School'){
                $geteducation= 'High School';
            }
            if(strtolower($education)=='f' || strtolower($education) =='Undergraduate'){
                $geteducation= 'Undergraduate';
            }
            if(strtolower($education)=='g'|| strtolower($education)=='Graduate and above '){
                $geteducation= 'Graduate and above';
            }

            $userId=$this->bot->getUser()->getId();
            $getdata=BotmanModel::where('userId',$userId)->first();

            if(!empty($getdata)){
                $educationdata=[
                        'education'=>$geteducation,
                ];
                BotmanModel::where('userId',$userId)->update($educationdata);
            }
            
            $this->askOccupation();
    });
    }

    public function askOccupation()
    {
            $this->ask('Please select which option best describes your current occupational status ? <br> A. Employed <br> B. Self employed <br> C. Unemployed <br> D. Retired <br> E. Student  <br> F. Others Specify', function(Answer $answer) {
            $occupation = $answer->getText();

            if(strtolower($occupation)=='a'|| strtolower($occupation)=='Employed'){
                $getoccupation= 'Employed';
            }
            if(strtolower($occupation)=='b' || strtolower($occupation)=='Self employed'){
                $getoccupation= 'Self employed';
            }
            if(strtolower($occupation)=='c' || strtolower($occupation) =='Unemployed '){
                $getoccupation= 'Unemployed ';
            }
            if(strtolower($occupation)=='d'|| strtolower($occupation)=='Retired '){
                $getoccupation= 'Retired';
            }
            if(strtolower($occupation)=='e' || strtolower($occupation)=='Student'){
                $getoccupation= 'Student';
            }
            if(strtolower($occupation)=='f' || strtolower($occupation) =='Others Specify'){
                $getoccupation= 'Others Specify';
            }


            $userId=$this->bot->getUser()->getId();
            $getdata=BotmanModel::where('userId',$userId)->first();

            if(!empty($getdata)){
                $occupationdata=[
                        'occupation'=>$getoccupation,
                ];
                BotmanModel::where('userId',$userId)->update($occupationdata);
            }
            
            $this->askWork();
    });
    }

    public function askWork()
    {
            $this->ask('Which sector describes your current largest scope of work ? <br> A. Technology/IT <br> B. Finance/Accounting/Banking <br> C. Healthcare/Medical <br> D. Education <br> E. Real Estate <br> F. Retail/E-Commerce <br> G. Hospitality/Tourism
            <br> H. Manufacturing/Engineering <br> I. Government/Public Sector <br> J. Media/Entertainment <br> K. Professional Services <br> L. Non-Profit/Charity <br> M.Agriculture <br> N. Food production <br> O. Transportation/Logistics <br> P. Multiple <br> Q. Others', function(Answer $answer) {
            $work = $answer->getText();


            if(strtolower($work)=='a'|| strtolower($work)=='Technology/IT'){
                $getwork= 'Technology/IT';
            }
            if(strtolower($work)=='b' || strtolower($work)=='Finance/Accounting/Banking'){
                $getwork= 'Finance/Accounting/Banking';
            }
            if(strtolower($work)=='c' || strtolower($work) =='Healthcare/Medical'){
                $getwork= 'Healthcare/Medical ';
            }
            if(strtolower($work)=='d'|| strtolower($work)=='Education'){
                $getwork= 'Education';
            }
            if(strtolower($work)=='e' || strtolower($work)=='Real Estate'){
                $getwork= 'Real Estate';
            }
            if(strtolower($work)=='f' || strtolower($work) =='Retail/E-Commerce'){
                $getwork= 'Retail/E-Commerce';
            }
            if(strtolower($work)=='g'|| strtolower($work)=='Hospitality/Tourism'){
                $getwork= 'Hospitality/Tourism';
            }
            if(strtolower($work)=='h' || strtolower($work)=='Manufacturing/Engineering'){
                $getwork= 'Manufacturing/Engineering';
            }
            if(strtolower($work)=='i' || strtolower($work) =='Government/Public Sector'){
                $getwork= 'Government/Public Sector ';
            }
            if(strtolower($work)=='j'|| strtolower($work)=='Media/Entertainment'){
                $getwork= 'Media/Entertainment';
            }
            if(strtolower($work)=='k' || strtolower($work)=='Professional Services'){
                $getoccupation= 'Professional Services';
            }
            if(strtolower($work)=='l' || strtolower($work) =='Non-Profit/Charity'){
                $getwork= 'Non-Profit/Charity';
            }
            if(strtolower($work)=='m'|| strtolower($work)=='Agriculture'){
                $getwork= 'Agriculture';
            }
            if(strtolower($work)=='n' || strtolower($work)=='Food production'){
                $getwork= 'Food production';
            }
            if(strtolower($work)=='o' || strtolower($work) =='Transportation/Logistics'){
                $getwork= 'Transportation/Logistics ';
            }
            if(strtolower($work)=='p'|| strtolower($work)=='Multiple '){
                $getwork= 'Multiple';
            }
            if(strtolower($work)=='q' || strtolower($work)=='Others'){
                $getwork= 'Others';
            }



            $userId=$this->bot->getUser()->getId();
            $getdata=BotmanModel::where('userId',$userId)->first();

            if(!empty($getdata)){
                $workdata=[
                        'work'=>$getwork,
                ];
                BotmanModel::where('userId',$userId)->update($workdata);
            }
            
            $this->askMarital();
    });
    }

    public function askMarital()
    {
            $this->ask('Please mention  your current marital status :  <br> A. Married <br> B. Divorced <br> C. Unmarried <br> D. Separated <br> E. Widower/widow ', function(Answer $answer) {
            $marital= $answer->getText();

            if(strtolower($marital)=='a'|| strtolower($marital)=='Married'){
                $getmarital= 'Married';
            }
            if(strtolower($marital)=='b' || strtolower($marital)=='Divorced'){
                $getmarital= 'Divorced';
            }
            if(strtolower($marital)=='c' || strtolower($marital) =='Unmarried'){
                $getmarital= 'Unmarried';
            }
            if(strtolower($marital)=='d'|| strtolower($marital)=='Separated'){
                $getmarital= 'Separated';
            }
            if(strtolower($marital)=='e' || strtolower($marital)=='Widower/widow'){
                $getmarital= 'Widower/widow';
            }

            $userId=$this->bot->getUser()->getId();
            $getdata=BotmanModel::where('userId',$userId)->first();

            if(!empty($getdata)){
                $maritaldata=[
                        'marital'=>$getmarital,
                ];
                BotmanModel::where('userId',$userId)->update($maritaldata);
            }
            
            $this->askChildren();
    });
    }

    public function askChildren()
    {
            $this->ask('Mention the number of children you have : <br> A. None <br> B. 1 <br> C. 2 <br> D. 3 <br> E. 4 <br> F. 5 or more <br> G. Prefer not to say ', function(Answer $answer) {
            $children = $answer->getText();

            if(strtolower($children)=='a'|| strtolower($children)=='None'){
                $getchildren= 'None';
            }
            if(strtolower($children)=='b' || strtolower($children)=='1'){
                $getchildren= '1';
            }
            if(strtolower($children)=='c' || strtolower($children) =='2'){
                $getchildren= '2';
            }
            if(strtolower($children)=='d'|| strtolower($children)=='3'){
                $getchildren= '3';
            }
            if(strtolower($children)=='e' || strtolower($children)=='4'){
                $getchildren= '4';
            }
            if(strtolower($children)=='f' || strtolower($children) =='5 or more'){
                $getchildren= '5 or more';
            }
            if(strtolower($children)=='g'|| strtolower($children)=='Prefer not to say'){
                $getchildren= 'Prefer not to say';
            }


            $userId=$this->bot->getUser()->getId();
            $getdata=BotmanModel::where('userId',$userId)->first();

            if(!empty($getdata)){
                $childrendata=[
                        'children'=>$getchildren,
                ];
                BotmanModel::where('userId',$userId)->update($childrendata);
            }
            
            $this->askMembers();
    });
    }

    public function askMembers()
    {
            $this->ask('Excluding you, how many members are there in the household ? <br> (Please count any partner, children, family, relatives, roommates etc.- all members staying under one roof and sharing food from the same kitchen) <br> A. 0 <br> B. 1 <br> C. 2 <br> D. 3 <br> E. 4 <br> F. 5 <br> G. 6 or more', function(Answer $answer) {
            $members = $answer->getText();

            if(strtolower($members)=='a'|| strtolower($members)=='0'){
                $getmembers= '0';
            }
            if(strtolower($members)=='b' || strtolower($members)=='1'){
                $getmembers= '1';
            }
            if(strtolower($members)=='c' || strtolower($members) =='2'){
                $getmembers= '2';
            }
            if(strtolower($members)=='d'|| strtolower($members)=='3'){
                $getmembers= '3';
            }
            if(strtolower($members)=='e' || strtolower($members)=='4'){
                $getmembers= '4';
            }
            if(strtolower($members)=='f' || strtolower($members) =='5'){
                $getmembers= '5';
            }
            if(strtolower($members)=='g'|| strtolower($members)=='6 or more'){
                $getmembers= '6 or more';
            }
            
            
            $userId=$this->bot->getUser()->getId();
            $getdata=BotmanModel::where('userId',$userId)->first();

            if(!empty($getdata)){
                $membersdata=[
                        'members'=>$getmembers,
                ];
                BotmanModel::where('userId',$userId)->update($membersdata);
            }


            $this->askExperience();
    });
    }

    public function askExperience()
    {
            $this->ask('How long have you been working ? <br> A. Less than 6 months <br> B. 6 months -1 year <br> C. 1-5 years <br> D. 5-10 years <br> E. More than 10 years ', function(Answer $answer) {
            $experience = $answer->getText();

            $userId=$this->bot->getUser()->getId();
            $getdata=BotmanModel::where('userId',$userId)->first();


            if(strtolower($experience)=='a'|| strtolower($experience)=='Less than 6 months'){
                $getexperience= 'Less than 6 months';
            }
            if(strtolower($experience)=='b' || strtolower($experience)=='6 months -1 year'){
                $getexperience= '6 months -1 year';
            }
            if(strtolower($experience)=='c' || strtolower($experience) =='1-5 years'){
                $getexperience= '1-5 years';
            }
            if(strtolower($experience)=='d'|| strtolower($experience)=='5-10 years'){
                $getexperience= '5-10 years';
            }
            if(strtolower($experience)=='e' || strtolower($experience)=='More than 10 years'){
                $getexperience= 'More than 10 years';
            }



            if(!empty($getdata)){
                $experiencedata=[
                        'experience'=>$getexperience,
                ];
                BotmanModel::where('userId',$userId)->update($experiencedata);
            }
            
            $this->askJob();
    });
    }

    public function askJob()
    {
            $this->ask('What is the nature of your current job ? <br> A. Full Time <br> B. Part Time  ', function(Answer $answer) {
            $job = $answer->getText();


            $userId=$this->bot->getUser()->getId();
            $getdata=BotmanModel::where('userId',$userId)->first();

            if(strtolower($job)=='a'|| strtolower($job)=='Full Time'){
                $getjob= 'Full Time';
            }
            if(strtolower($job)=='b' || strtolower($job)=='Part Time'){
                $getjob= 'Part Time';
            }

            if(!empty($getdata)){
                $jobdata=[
                        'job'=>$getjob,
                ];
                BotmanModel::where('userId',$userId)->update($jobdata);
            }
            
            $this->askIncome();
    });
    }

    public function askIncome()
    {
            $this->ask('What frequency do you generate income from your occupation ? <br> A. Daily <br> B. Weekly <br> C. Once in 15 days <br> D. Monthly <br> E. Once in 3 months <br> F. Annually  ', function(Answer $answer) {
            $income = $answer->getText();

            $userId=$this->bot->getUser()->getId();
            $getdata=BotmanModel::where('userId',$userId)->first();

            if(strtolower($income)=='a'|| strtolower($income)=='Daily'){
                $getincome= 'Daily';
            }
            if(strtolower($income)=='b' || strtolower($income)=='Weekly'){
                $getincome= 'Weekly';
            }
            if(strtolower($income)=='c' || strtolower($income) =='Once in 15 days'){
                $getincome= 'Once in 15 days';
            }
            if(strtolower($income)=='d'|| strtolower($income)=='Monthly'){
                $getincome= 'Monthly';
            }
            if(strtolower($income)=='e' || strtolower($income)=='Once in 3 months'){
                $getincome= 'Once in 3 months';
            }
            if(strtolower($income)=='f' || strtolower($income)=='Annually'){
                $getincome= 'Annually';
            }


            if(!empty($getdata)){
                $incomedata=[
                        'income'=>$getincome,
                ];
                BotmanModel::where('userId',$userId)->update($incomedata);
            }
            
            
            $this->askMonthlyIncome();
    });
    }

    public function askMonthlyIncome()
    {
        $this->ask('What is your average monthly income ? <br> A. Less than 10000 INR <br> B. 11000-20000 INR <br> C. 21000-30000 INR <br> D. 31000-40000 <br> E. 41000-50000 INR <br> F. 51000-60000 INR <br> G. 61000-70000 INR <br> H. 71000-80000 INR <br> I. 81000-90000 INR <br> J. 91000-100000 INR <br> K. More than 100000 INR ', function(Answer $answer) {
                $monthly_income = $answer->getText();    

            $userId=$this->bot->getUser()->getId();
            $getdata=BotmanModel::where('userId',$userId)->first();

            if(strtolower($monthly_income)=='a'|| strtolower($monthly_income)=='Less than 10000 INR'){
                $getmonthly_income= 'Less than 10000 INR';
            }
            if(strtolower($monthly_income)=='b' || strtolower($monthly_income)=='11000-20000 INR'){
                $getmonthly_income= '11000-20000 INR';
            }
            if(strtolower($monthly_income)=='c' || strtolower($monthly_income) =='21000-30000 INR'){
                $getmonthly_income= '21000-30000 INR';
            }
            if(strtolower($monthly_income)=='d'|| strtolower($monthly_income)=='31000-40000 INR'){
                $getmonthly_income= '31000-40000 INR';
            }
            if(strtolower($monthly_income)=='e' || strtolower($monthly_income)=='41000-50000 INR'){
                $getmonthly_income= '41000-50000 INR';
            }
            if(strtolower($monthly_income)=='f' || strtolower($monthly_income)=='51000-60000 INR'){
                $getmonthly_income= '51000-60000 INR';
            }
            if(strtolower($monthly_income)=='g' || strtolower($monthly_income) =='61000-70000 INR'){
                $getmonthly_income= '61000-70000 INR';
            }
            if(strtolower($monthly_income)=='h'|| strtolower($monthly_income)=='71000-80000 INR'){
                $getmonthly_income= '71000-80000 INR';
            }
            if(strtolower($monthly_income)=='i' || strtolower($monthly_income)=='81000-90000 INR'){
                $getmonthly_income= '81000-90000 INR';
            }
            if(strtolower($monthly_income)=='j' || strtolower($monthly_income)=='91000-100000 INR'){
                $getmonthly_income= '91000-100000 INR';
            }
            if(strtolower($monthly_income)=='k' || strtolower($monthly_income)=='More than 100000 INR'){
                $getmonthly_income= 'More than 100000 INR';
            }


            if(!empty($getdata)){
                $monthly_incomedata=[
                        'monthly_income'=>$getmonthly_income,
                ];
                BotmanModel::where('userId',$userId)->update($monthly_incomedata);
            }
                    
            $this->askSourceOfIncome();
         });
    }

    public function askSourceOfIncome(){

        $this->ask('Do you have a secondary /additional source of income ?<br> A. Yes, through investments or rental property <br> B. Occasionally, through freelance or part-time work <br> C. Yes, through a side business or online venture <br> D. Yes, through a part-time job <br> E. Yes, through gig-based platforms like ride-sharing, food delivery, or task services. <br> F. Others <br> G. No, I don’t have any secondary source of Income <br> H. Prefer not to answer  ', function(Answer $answer) {
            $source_of_income = $answer->getText();


            if(strtolower($source_of_income)=='a'|| strtolower($source_of_income)=='Yes, through investments or rental property'){
                $getsource_of_income= 'Yes, through investments or rental property';
            }
            if(strtolower($source_of_income)=='b' || strtolower($source_of_income)=='Occasionally, through freelance or part-time work'){
                $getsource_of_income= 'Occasionally, through freelance or part-time work';
            }
            if(strtolower($source_of_income)=='c' || strtolower($source_of_income) =='Yes, through a side business or online venture'){
                $getsource_of_income= 'Yes, through a side business or online venture';
            }
            if(strtolower($source_of_income)=='d'|| strtolower($source_of_income)=='Yes, through a part-time job'){
                $getsource_of_income= 'Yes, through a part-time job';
            }
            if(strtolower($source_of_income)=='e' || strtolower($source_of_income)=='Yes, through gig-based platforms like ride-sharing, food delivery, or task services.'){
                $getsource_of_income= 'Yes, through gig-based platforms like ride-sharing, food delivery, or task services.';
            }
            if(strtolower($source_of_income)=='f' || strtolower($source_of_income)=='Others'){
                $getsource_of_income= 'Others';
            }
            if(strtolower($source_of_income)=='g' || strtolower($source_of_income) =='No, I don’t have any secondary source of Income'){
                $getsource_of_income= 'No, I don’t have any secondary source of Income';
            }
            if(strtolower($source_of_income)=='h'|| strtolower($source_of_income)=='Prefer not to answer'){
                $getsource_of_income= 'Prefer not to answer';
            }


            $userId=$this->bot->getUser()->getId();
            $getdata=BotmanModel::where('userId',$userId)->first();

            if(!empty($getdata)){
                $source_of_incomedata=[
                        'source_of_income'=>$getsource_of_income,
                ];
                BotmanModel::where('userId',$userId)->update($source_of_incomedata);
            }
            $this->askHousehold();
        });
    }

    public function askHousehold()
    {
            $this->ask('Are you the only earning member in your household? <br> A. Yes <br> B. No <br> C. Prefer not to say ', function(Answer $answer) {
            $household = $answer->getText();

            if(strtolower($household)=='a'|| strtolower($household)=='Yes'){
                $gethousehold= 'Yes';
            }
            if(strtolower($household)=='b' || strtolower($household)=='No'){
                $gethousehold= 'No';
            }
            if(strtolower($household)=='c' || strtolower($household) =='Prefer not to say'){
                $gethousehold= 'Prefer not to say';
            }


            $userId=$this->bot->getUser()->getId();
            $getdata=BotmanModel::where('userId',$userId)->first();


            if(!empty($getdata)){
                $householddata=[
                        'household'=>$gethousehold,
                ];
                BotmanModel::where('userId',$userId)->update($householddata);
            }
            $this->say('Thanks for your valuable inputs, kindly check your inbox for detailed information');
            
            $this->askPdf();
         });
    }


     /*
        |============================|
        |=== Spending Q&A ===========|
        |============================|
    */



    public function askPDF() {
        $userId = $this->bot->getUser()->getId();
        // for total score of the scorecard
        $final_score = $this->AdminModel->getcalculation($userId);
        // for total score of the each section of the scorecard
        $final_particular_score= $this->AdminModel->getParticularCalculation($userId);      
        $finalscore1 = $final_particular_score['total_savings'];
        $finalscore2 = $final_particular_score['total_spending'];
        $finalscore3 = $final_particular_score['total_borrowing'];
        $finalscore4 = $final_particular_score['total_resilience'];
        $finalscore5 = $final_particular_score['total_planning'];
        $finalscore6 = $final_particular_score['total_decision_making'];

        //dd($finalscore1,$finalscore2,$finalscore3,$finalscore4,$finalscore5.$finalscore6);
    
        if ($final_score) {
            // Generate a unique name for the PDF (e.g., timestamp + user ID)
            $pdfName = 'detailed-scorecard-' . time() . '-' . $userId . '.pdf';
    
            // Define the path to save the PDF
            $pdfPath = public_path('uploads/' . $pdfName);
    
            $pdf = PDF::loadView('myPDF', compact('final_score','finalscore1','finalscore2','finalscore3','finalscore4','finalscore5','finalscore6'));
    
            // Generate the PDF and get the binary content
            $pdfContent = $pdf->output();
    
            // Save the PDF to the specified path
            file_put_contents($pdfPath, $pdfContent);
    
            // Send the PDF link on the chat
            $this->say('Here is your detailed PDF report. <br> You can download it from the following link:');
            $this->say(url('uploads/' . $pdfName));
        } else {
            $this->say('Unable to generate the PDF.Kindly check your details');
        }
    }
    

}

