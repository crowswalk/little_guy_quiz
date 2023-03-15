<!doctype html>
<html>

<head>
    <style>
        body {
            margin: 0;
            font-family: Cambria;
            background-color: #dac296;
        }

        .hidden {
            display: none;
        }

        #quiz {
            margin: auto;
            padding: 1em;
            width: max-content;
            border-radius: 10px;
            background-color: #ece8e6;
        }

        h1 {
            margin: 0 0 1em 0;
            padding: .25em;
            text-align: center;
            background-color: #412b38;
            color: #fff9f1;
        }

        h2 {
            margin: 0;
            padding: 0 0 .2em 0;
            color: #412b38;
        }

        h4 {
            margin: 1em auto;
            text-align: center;
            font-size: 1.2em;
        }

        select {
            display: block;
            padding: 1em;
            font-size: 1em;
            outline: none;
            border: none;
        }

        .question {
            margin: 2em 1em;
            padding: 0 .5em .5em 1.2em;
            border-left: 10px solid #dac296;
        }

        input {
            margin: auto;
            margin-top: 2em;
            display: block;
            padding: .5em;
            border: none;
            border-radius: 4px;
            font-family: Cambria;
            font-size: 1.5em;
            background-color: #412b38;
            color: #fff9f1;
            transition: ease .2s;
        }

        input:hover,
        input:active {
            background-color: #74405f;
        }
    </style>
</head>

<body>
    <div id="container">
        <h1 id="header">Which Little Friend are You?</h1>

        <div id="quiz">
            <form action="process.php" method="POST">
                <div class="question">
                    <h2>How are you feeling right now?</h2>
                    <select name="emotion">
                        <option value="default" selected>Select an option...</option>
                        <option value="ok">Just OK</option>
                        <option value="limit">At my Limit</option>
                        <option value="good">Pretty Good</option>
                        <option value="grr">Grr</option>
                    </select>
                </div>
                <div class="question">
                    <h2>What is your favorite creature?</h2>
                    <select name="creature">
                        <option value="default" selected>Select an option...</option>
                        <option value="lizard">Lizard</option>
                        <option value="cat">Cat</option>
                        <option value="insect">Sea Insect</option>
                        <option value="orb">Orb</option>
                    </select>
                </div>
                <div class="question">
                    <h2>How would others describe you?</h2>
                    <select name="person">
                        <option value="default" selected>Select an option...</option>
                        <option value="cool">Very Cool</option>
                        <option value="funny">Funny</option>
                        <option value="chill">Easygoing</option>
                        <option value="crazy">A little crazy...</option>
                    </select>
                </div>
                <div class="question">
                    <h2>What would you like to consume?</h2>
                    <select name="consume">
                        <option value="default" selected>Select an option...</option>
                        <option value="bubble">Bubbles</option>
                        <option value="creatures">Other Creatures</option>
                        <option value="plankton">Plankton</option>
                        <option value="seeds">Seeds</option>
                    </select>
                </div>
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>

    <h4 id="errormsg">
        <?php
        if ($_GET['error']) {
            print "Please choose an answer for all questions.";
        }
        if ($_COOKIE['winner'] && $_COOKIE['winner'] != 'reset') {
            header('Location: results.php');
        }
        ?>
    </h4>
</body>

</html>