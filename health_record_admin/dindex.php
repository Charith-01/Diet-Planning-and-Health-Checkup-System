<html>
    <head>
    <style>
        h1 {
                text-align: center;
                color: #2c6fbb;
                margin-top: 20px;
                margin-bottom: 20px;
            }
        .question {

        }
        .constainer{
                max-width: 600px;
                margin: 0px auto;
                padding: 20px;
                border: 2px solid #ccc;
                border-radius: 10px;
                background-color: #f9f9f9;
            }
            .buttons input[type="submit"] {
            background-color: red;
        }.buttons {
            text-align: center;
            }
            .buttons input {
            margin: 5px;
            margin-top:30px;
            margin-bottom:0px;
            padding-bottom: 0px;
            padding: 7px 12px;
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>

    </head>

    <body>
    <h1>Delete Health Checkup Record</h1>
        <div class="constainer">
            <form method="post" action="delete.php">
            <div class="question">
                <label for="username"> Enter  user name  :</label>
                <input type="text"  name="uname" >
            </div>

            <div class="buttons">
            <input type="submit" value="Delete Data">
            </div>
        </div>

        </form>
    </body>
</html>