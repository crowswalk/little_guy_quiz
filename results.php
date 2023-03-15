<!doctype html>
<html>

<head>
    <style>
        body {
            margin: 0;
            font-family: Cambria;
            background-color: #dac296;
        }

        #pic {
            margin: auto;
            display: block;
            width: 60%;
            border: 2px solid #412b38;
        }

        #bio {
            margin-top: 0;
            margin-bottom: 1em;
            padding: .5em;
        }

        #container {
            width: 80%;
            max-width: 500px;
            margin: auto;
        }

        #results {
            margin: auto;
            padding: 1em;
            width: 100%;
            border-radius: 10px;
            background-color: #ece8e6;
        }

        #scoreChart {
            display: block;
        }

        #total {
            display: block;
            margin: .5em auto auto auto;
            width: max-content;
        }

        .bar {
            height: 25px;
            background-color: green;
        }

        h1 {
            margin: 0 0 1em 0;
            padding: .25em;
            text-align: center;
            background-color: #412b38;
            color: #fff9f1;
        }

        h2 {
            margin: auto;
            padding: .25em;
            text-align: center;
            color: #412b38;
        }

        h4 {
            margin: .5em 0 .2em 0;
            font-size: 1.2em;
        }

        #again {
            margin: auto;
            margin-top: .5em;
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

        #again:hover,
        #again:active {
            background-color: #74405f;
        }
    </style>
</head>

<body>
    <h1 id="header">Which Little Friend are You?</h1>
    <div id="container">
        <div id="results">
            <?php
            $path = getcwd().'/data/results.txt';
            $alldata = file_get_contents($path);
            $allnames = explode("\n", $alldata);

            $total = -1;
            $gort = 0;
            $popcat = 0;
            $bulbasaur = 0;
            $kirby = 0;
            
            foreach ($allnames as $name) {
                $total++;

                if($name == "gort") {
                    $gort++;
                } else if ($name == "popcat") {
                    $popcat++;
                } else if ($name == "bulbasaur") {
                    $bulbasaur++;
                } else if ($name == "kirby") {
                    $kirby++;
                }
            }
            ?>

            <div id="character">
                <img id="pic" src="none">
                <h2 id="name"></h2>
                <p id="bio"></p>
            </div>

            <div id="scoreChart">
                <h4>Gort (<span id="gortpct"></span>%)</h4>
                <div id="gortchart" class="bar" style="background-color:#725c8b"></div>
                <h4>Popcat (<span id="poppct"></span>%)</h4>
                <div id="popchart" class="bar" style="background-color:#835b44"></div>
                <h4>Bulbasaur (<span id="bulbpct"></span>%)</h4>
                <div id="bulbchart" class="bar" style="background-color:#6da059"></div>
                <h4>Kirby (<span id="kirbypct"></span>%)</h4>
                <div id="kirbychart" class="bar" style="background-color:#c36a81"></div>
            </div>
            <h4 id="total"></h4>
            <button id="again" onclick='reset()'>Take Again?</button>
        </div>
    </div>

    <?php
    $winner = $_COOKIE['winner'];
    if($winner == 'reset') {
        header('Location: index.php');
    }
    $gortPercent = $gort / $total * 100;
    $popPercent = $popcat / $total * 100;
    $bulbPercent = $bulbasaur / $total * 100;
    $kirbyPercent = $kirby / $total * 100;

        print "<script>";
        print "let gortNum = ". $gortPercent . "; ";
        print "let popcatNum = ". $popPercent . "; ";
        print "let bulbasaurNum = ". $bulbPercent . "; ";
        print "let kirbyNum = ". $kirbyPercent . "; ";
        print "let total = ".$total . "; ";
        print "let result = '".$winner . "'; ";

        print "document.getElementById('gortchart').style.width = gortNum + '%';";
        print "document.getElementById('popchart').style.width = popcatNum + '%';";
        print "document.getElementById('bulbchart').style.width = bulbasaurNum + '%';";
        print "document.getElementById('kirbychart').style.width = kirbyNum + '%';";

        print "document.getElementById('gortpct').innerText = parseFloat(gortNum).toFixed(1);";
        print "document.getElementById('poppct').innerText = parseFloat(popcatNum).toFixed(1);";
        print "document.getElementById('bulbpct').innerText = parseFloat(bulbasaurNum).toFixed(1);";
        print "document.getElementById('kirbypct').innerText = parseFloat(kirbyNum).toFixed(1);";

        print "document.getElementById('total').innerText = total + ' total participants';";
        
        print "let charName, portraitImg, description;";

        if ($winner == "gort") {
            print "charName = 'Gort';";
            print "portraitImg = 'images/gort.jpg';";
            print "description = 'You are a sea-dwelling isopod who is a little wild, and possibly wanted for murder.';";

        } else if ($winner == "popcat") {
            print "charName = 'Popcat';";
            print "portraitImg = 'images/popcat.jpg';";
            print "description = 'You are a fun-loving cat with a large mouth that makes very good popping sounds.';";

        } else if ($winner == "bulbasaur") {
            print "charName = 'Bulbasaur';";
            print "portraitImg = 'images/bulbasaur.jpg';";
            print "description = 'You are a cool lizard that gets stressed a lot. No need to worry so much, one day you will blossom.';";

        } else if ($winner == "kirby") {
            print "charName = 'Kirby';";
            print "portraitImg = 'images/kirby.jpg';";
            print "description = 'You are a cute orb that loves to consume friends. They help you fly higher.';";
        }

        print "document.getElementById('name').innerText = 'Nice job you got ' + charName + '!';";
        print "document.getElementById('pic').src = portraitImg;";
        print "document.getElementById('bio').innerText = description;";

        print "</script>";
    ?>

    <script>
        function reset() {
            document.cookie = "winner=reset";
            window.location.href = 'index.php';
        }
    </script>

</body>

</html>