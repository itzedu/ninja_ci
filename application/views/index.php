<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Ninja Gold Gameinde</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Special+Elite' rel='stylesheet' type='text/css'>
</head>
<body>
    <div id="container">
	   <div id='header'>
            <h2>Your Gold:</h2>
            <p>
<?php       if (!empty($score))
            {
                echo $score;
            }
            else
            {
                echo "0";
            }   ?>
            </p>
            <form action='/games/destroy' method='post'>
                <input type="submit" name="reset" value="Reset Game">
            </form>
        </div>

        <div id="gamble">

            <div class="get-gold">
                <h2>Farm</h2>
                <p>(earns 10-20 golds)</p>
                <form action='/games/update' method="post">
                    <input type='submit' name='farm' value='Find Gold!'>
                </form>
            </div>

            <div class="get-gold">
                <h2>Cave</h2>
                <p>(earns 5-10 golds)</p>
                <form action='/games/update' method="post">
                    <input type='submit' name='cave' value='Find Gold!'>
                </form>
            </div>

            <div class="get-gold">
                <h2>House</h2>
                <p>(earns 2-5 golds)</p>
                <form action='/games/update' method="post">
                    <input type='submit' name='house' value='Find Gold!'>
                </form>
            </div>

            <div class="get-gold">
                <h2>Casino!</h2>
                <p>(earns/takes 0-50 golds)</p>
                <form action='/games/update' method="post">
                    <input type='submit' name='casino' value='Find Gold!'>
                </form>
            </div>

        </div>
        <div id='footer'>
            <h3>Activites</h3>
            <div id="Activities">
<?php
            if($activities)
            { 
                $reverse = array_reverse($activities);
                foreach($reverse as $activity)
                {  
                    if(strpos($activity, "Ouch") > 0 || strpos($activity, "out") > 0)
                    {  ?>
                        <p class="red"><?= $activity ?></p> 
<?php
                    }
                    else
                    {  ?>
                        <p class="green"><?= $activity ?></p>
<?php
                    }
                }  
            }  ?>
            </div>
        </div>
    </div>
</body>
