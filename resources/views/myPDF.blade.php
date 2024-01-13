<!DOCTYPE html>
<html>
<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');
        tr, td, p {
            font-family: 'Poppins', sans-serif;
        }
        p {
            font-size: 16px;
        }

        :root{
                    --savings: $finalscore1;
                    --borrowing: $finalscore2;
                    --spendings: $finalscore3;
                    --resilience: $finalscore4;
                    --planning: $finalscore5;
                    --decisionmaking: $finalscore6;
        }
    </style>
   
</head>
<body>
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body" style="width: 600px; max-width: 600px; margin: auto;">
        <tr>
            <td>
                <div>
                    <img style="width: 100px;" src="" alt="">
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <p style="color: #1435A2; text-align: center; font-size: 64px; font-weight: 700; margin-bottom: 0px;">Thank You</p>
            </td>
        </tr>
        <tr>
            <td>
                <div style="position: relative; top: 48px; text-align: center;">
                @if($final_score <= 40)
                    <img id="financial-vulnerable" style="width: 90%; margin: auto;" src="" alt="">
                @elseif($final_score >= 41 && $final_score <= 80)
                    <img id="financial-coping" style="width: 90%; margin: auto;" src="" alt="">
                @elseif($final_score >= 81 && $final_score <= 100)
                    <img id="financial-healthy" style="width: 90%; margin: auto;" src="" alt="">
                @endif
            </div>
            </td>
        </tr>
        <tr>
            <td style="background: #E8EDFF; padding: 120px 0 40px;">
                <div style="background: #fff; padding: 60px 40px;">
                    <p>Here are some different areas of your financial life that make up your overall financial health: Let’s take a closer look at each. Those with great financial health pay attention to their credit. Good credit gives you the ability to borrow when you want or need to.</p>
                    <br>
                    <p>Here are some different areas of your financial life that make up your overall financial health: Let’s take a closer look at each. Those with great financial health pay attention to their credit. Good credit gives you the ability to borrow when you want or need to. Here are some different areas of your financial life that make up your overall financial health: Let’s take a closer look at each. Those with great financial health pay attention to their credit. Good credit gives you the ability to borrow when you want or need to.</p>
                </div>
                <div style="display: flex; width: 100%; justify-content: center; align-items: center; position: relative; top: 92px;">
                    <div class="line-border line-border1" style=" width:100%; height: 4px;  background: rgb(20, 53, 162); background: linear-gradient(90deg, rgba(20, 53, 162, 1) 90%, rgba(255, 255, 255, 1) 90%);"></div>
                        <div class="circel-parsenteg" style="padding-left: 10px; padding-top: 15px; transform:translate(225%,0); width: 105px; height: 105px; flex-shrink: 0; background: #1435A2; border-radius: 50%; display: flex; justify-content: center; align-items: center; color: #fff; font-size: 36px; font-weight: 700;">
                            <span style="position:relative; top:23px; left:15px;">{{$final_score}}%</span>
                        </div>
                    <div class="line-border line-border2" style="width:100%; height: 4px;  background: rgb(20, 53, 162); background: linear-gradient(270deg, rgba(20, 53, 162, 1) 90%, rgba(255, 255, 255, 1) 90%);"></div>
                </div>
            </td>
        </tr>
        <tr>
            <td style="padding-top: 110px;">
                <div style="border-radius: 8px 8px 0px 0px; background: #EFEFF4; width: 100%; height: 40px;">
                    <div style="background: #1435A2; width: var(--savings); height: 55px; position: relative; top: -25px; display: flex; align-items: center;">
                        <p class="" style="padding-left: 10px; padding-top: 15px; color: #FFF; font-size: 16px; font-weight: 700;">Savings</p>
                        <span class="progress-bar-load" style="padding-left: 10px; padding-top: 10px; position: absolute; right: -21px; width: 30px; height: 30px; background: rgba(255, 255, 255, 0.80); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #1435A2; font-size: 13px; font-weight: 700; top:10px;">{{$finalscore1}}</span>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td style="padding-top: 30px;">
                <h2>Feedback</h2>
                <p>This message was sent to you by . If you didn't create this account, contact </p>
            </td>
        </tr>
        <tr>
            <td style="padding-top: 30px;">
                <h2>Solution</h2>
                <p>This message was sent to you by . If you didn't create this account, contact </p>
            </td>
        </tr>
        <tr>
        <tr>
            <td style="padding-top: 110px;">
                <div style="border-radius: 8px 8px 0px 0px; background: #EFEFF4; width: 100%; height: 40px;">
                    <div style="background: #1435A2; width: var(--borrowing); height: 55px; position: relative; top: -25px; display: flex; align-items: center;">
                        <p class="" style="padding-left: 10px; padding-top: 15px; color: #FFF; font-size: 16px; font-weight: 700;">Borrowing</p>
                        <span class="progress-bar-load" style="padding-left: 10px; padding-top: 10px; position: absolute; right: -21px; width: 30px; height: 30px; background: rgba(255, 255, 255, 0.80); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #1435A2; font-size: 13px; font-weight: 700; top:10px;">{{$finalscore2}}</span>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td style="padding-top: 30px;">
                <h2>Feedback</h2>
                <p>This message was sent to you by . If you didn't create this account, contact </p>
            </td>
        </tr>
        <tr>
            <td style="padding-top: 30px;">
                <h2>Solution</h2>
                <p>This message was sent to you by . If you didn't create this account, contact </p>
            </td>
        </tr>
        <tr>
            <td style="padding-top: 110px;">
            <div style="border-radius: 8px 8px 0px 0px; background: #EFEFF4; width: 100%; height: 40px;">
                    <div style="background: #1435A2; width: var(--spendings); height: 55px; position: relative; top: -25px; display: flex; align-items: center;">
                        <p class="" style="padding-left: 10px; padding-top: 15px; color: #FFF; font-size: 16px; font-weight: 700;">Spendings</p>
                        <span class="progress-bar-load" style="padding-left: 10px; padding-top: 10px; position: absolute; right: -21px; width: 30px; height: 30px; background: rgba(255, 255, 255, 0.80); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #1435A2; font-size: 13px; font-weight: 700; top:10px;">{{$finalscore3}}</span>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td style="padding-top: 30px;">
                <h2>Feedback</h2>
                <p>This message was sent to you by . If you didn't create this account, contact </p>
            </td>
        </tr>
        <tr>
            <td style="padding-top: 30px;">
                <h2>Solution</h2>
                <p>This message was sent to you by . If you didn't create this account, contact </p>
            </td>
        </tr>
        <tr>
           
        <div style="border-radius: 8px 8px 0px 0px; background: #EFEFF4; width: 100%; height: 40px;">

                    <div style="background: #1435A2; width: var(--resilience); height: 55px; position: relative; top: -25px; display: flex; align-items: center;">
                        <p class="" style="padding-left: 10px; padding-top: 15px; color: #FFF; font-size: 16px; font-weight: 700;">Resilience</p>
                        <span class="progress-bar-load" style="padding-left: 10px; padding-top: 10px; position: absolute; right: -21px; width: 30px; height: 30px; background: rgba(255, 255, 255, 0.80); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #1435A2; font-size: 13px; font-weight: 700; top:10px;">{{$finalscore4}}</span>
                    </div>
                </div>
        </tr>
        <tr>
            <td style="padding-top: 30px;">
                <h2>Feedback</h2>
                <p>This message was sent to you by . If you didn't create this account, contact </p>
            </td>
        </tr>
        <tr>
            <td style="padding-top: 30px;">
                <h2>Solution</h2>
                <p>This message was sent to you by . If you didn't create this account, contact </p>
            </td>
        </tr>
        <tr>
 
            <td style="padding-top: 110px;">
                <div style="border-radius: 8px 8px 0px 0px; background: #EFEFF4; width: 100%; height: 40px;">
                    <div style="background: #1435A2; width: var(--planning); height: 55px; position: relative; top: -25px; display: flex; align-items: center;">
                        <p class="" style="padding-left: 10px; padding-top: 15px; color: #FFF; font-size: 16px; font-weight: 700;">Planning</p>
                        <span class="progress-bar-load" style="padding-left: 10px; padding-top: 10px; position: absolute; right: -21px; width: 30px; height: 30px; background: rgba(255, 255, 255, 0.80); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #1435A2; font-size: 13px; font-weight: 700; top:10px;">{{$finalscore5}}</span>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td style="padding-top: 30px;">
                <h2>Feedback</h2>
                <p>This message was sent to you by . If you didn't create this account, contact </p>
            </td>
        </tr>
        <tr>
            <td style="padding-top: 30px;">
                <h2>Solution</h2>
                <p>This message was sent to you by . If you didn't create this account, contact </p>
            </td>
        </tr>
        <tr>
            <td style="padding-top: 110px;">
            <div style="border-radius: 8px 8px 0px 0px; background: #EFEFF4; width: 100%; height: 40px;">
                    <div style="background: #1435A2; width: var(--decisionmaking); height: 55px; position: relative; top: -25px; display: flex; align-items: center;">
                        <p class="" style="padding-left: 10px; padding-top: 15px; color: #FFF; font-size: 16px; font-weight: 700;">Decision Making</p>
                        <span class="progress-bar-load" style="padding-left: 10px; padding-top: 10px; position: absolute; right: -21px; width: 30px; height: 30px; background: rgba(255, 255, 255, 0.80); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #1435A2; font-size: 13px; font-weight: 700; top:10px;">{{$finalscore6}}</span>
                    </div>
                </div>
                
            </td>
        </tr>
        <tr>
            <td style="padding-top: 30px;">
                <h2>Feedback</h2>
                <p>This message was sent to you by . If you didn't create this account, contact </p>
            </td>
        </tr>
        <tr>
            <td style="padding-top: 30px;">
                <h2>Solution</h2>
                <p>This message was sent to you by . If you didn't create this account, contact </p>
            </td>
        </tr>

        <tr>
            <td style="padding: 80px 0;">
                <h2>Best Regards,</h2>
                <h2>Team .com</h2>
                <p>This message was sent to you by .If you didn’t create this account, contact  <a href="#" style="color: #000;">support</a>.</p>
            </td>
        </tr>
        <!-- You can continue adding more sections here -->
    </table>
    

<script>
let financialVulnerable = $final_score;

// if (financialVulnerable <= 40) {
//     document.getElementById("financial-vulnerable").style.display = "block";
//     document.getElementById("financial-coping").style.display = "none";
//     document.getElementById("financial-healthy").style.display = "none";
// } else if (financialVulnerable >= 41 && financialVulnerable <= 80) {
//     document.getElementById("financial-vulnerable").style.display = "none";
//     document.getElementById("financial-healthy").style.display = "none";
//     document.getElementById("financial-coping").style.display = "block";
// } 
// else if (financialVulnerable >= 81 && financialVulnerable <= 100) {
//     document.getElementById("financial-vulnerable").style.display = "none";
//     document.getElementById("financial-coping").style.display = "none";
//     document.getElementById("financial-healthy").style.display = "block";
// }
    
</script> 

