<!DOCTYPE html>
<html>
    <head>
        <style>
            h1 {
                text-align: center;
                color: #2c6fbb;
                margin-top: 0px;
                margin-bottom: 10px;
            }
            .constainer{
                max-width: 600px;
                margin: 0px auto;
                padding: 20px;
                border: 2px solid #ccc;
                border-radius: 10px;
                background-color: #f9f9f9;
            }
            .healthicon {
                display:block;
                margin: 0 auto;
                width: 60px;
                length: auto;
            }
            
            .question {
            margin-bottom: 10px;
            }
            .question1 {
                
                margin-bottom: 6px;
                margin-right: 12px;
                font-size:20px;
            }
            .topic1 {
                margin: 10px;
                padding-top: 17px;
                font-size:18px;
                font-weight: bold;
                font-family: Arial, Helvetica, sans-serif;
                color: blue;
            }
            .q1{
                padding-right: 2px;
            }
            .buttons {
            text-align: center;
            }
            .buttons input {
            margin: 5px;
            padding: 5px 10px;
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 5px;
        }
        .buttons input[type="submit"] {
            background-color: blue;
        }
        .buttons input[type="reset"] {
            background-color:red;
        }

        </style>

    </head>
    <body>
        <div class="img1">
        <img src="../health_record_admin/form1.jpeg" class="healthicon">
        </div>
        <h1>Comprehensive Health Checkup</h1>
        <div class="constainer">
            
                <form method="post" action="insertt.php">
                <div class="question1">
                    <label for="username"> Enter your user name  :</label>
                    <input type="text" id="blood-pressure" name="username">
                </div>
                <div class="topic1">Medical History</div>
                <div class="question">
                    <label >01. When was the last full body check-up?</label>
                    <input type="date" id="checkup-date" name="date">
                </div>
                <div class="question">
                    <label>02. Have you had any surgeries?</label>
                    <input type="radio" id="surgery-yes" name="surgery" value="Yes">
                    <label for="surgery-yes">Yes</label>
                    <input type="radio" id="surgery-no" name="surgery" value="No" >
                    <label for="surgery-no">No</label>
                </div>
                <div class="question">
                    <label>03. Do you have any allergies?</label>
                    <input type="radio" id="allergies-yes" name="allergies" value="Yes">
                    <label for="allergies-yes">Yes</label>
                    <input type="radio" id="allergies-no" name="allergies" value="No" >
                    <label for="allergies-no">No</label>
                </div>

                <div class="topic1">Life Style</div>
                <div class="question">
                    <label>04. Do you smoke?</label>
                    <input type="radio" id="smoke-yes" name="smoke" value="Yes">
                    <label for="smoke-yes">Yes</label>
                    <input type="radio" id="smoke-no" name="smoke" value="No" >
                    <label for="smoke-no">No</label>
                </div>
                <div class="question">
                    <label>05. Do you consume alcohol?</label>
                    <input type="radio" id="alcohol-yes" name="alcohol" value="Yes">
                    <label for="alcohol-yes">Yes</label>
                    <input type="radio" id="alcohol-no" name="alcohol" value="No" >
                    <label for="alcohol-no">No</label>
                </div>
                
                <div class="topic1">Physical Health</div>
                <div class="question">
                    <label>06. Do you have any issues with your vision?</label>
                    <input type="radio" id="vision-yes" name="vision" value="Yes">
                    <label for="vision-yes">Yes</label>
                    <input type="radio" id="vision-no" name="vision" value="No" >
                    <label for="vision-no">No</label>
                </div>
    
                <div class="question">
                    <label>07. Do you experience frequent headaches or migraines?</label>
                    <input type="radio" id="headaches-yes" name="headaches" value="Yes">
                    <label for="headaches-yes">Yes</label>
                    <input type="radio" id="headaches-no" name="headaches" value="No" >
                    <label for="headaches-no">No</label>
                </div>

                <div class="topic1">Fill</div>
                <div class="question">
                    <label for="glucose-level">08. Your glucose level:</label>
                    <input type="text" id="glucose-level" name="glucose">
                </div>
    
                <div class="question">
                    <label for="cholesterol-level">09. Your cholesterol level :</label>
                    <input type="text" id="cholesterol-level" name="cholesterol">
                </div>
    
                <div class="question">
                    <label for="blood-pressure">10. Your blood pressure :</label>
                    <input type="text" id="blood-pressure" name="pressure">
                </div>

                <div class="buttons">
                   <input type="reset" value="Reset">
                    <input type="submit" value=" Submit ">
                    
                </div>
            </form>

            
        </div>
    </body>
</html>