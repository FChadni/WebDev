<?php
require 'format.inc.php';
require 'wumpus.inc.php';

$room = 1; //The room we are in.
$birds = 7; //Room with the birds
$wumps = 16; //Room with wumps
$arrows = 3;
$pits = array(3, 10, 13);    // Rooms with a bottomless pit

$cave = cave_array(); //get the cave

if(isset($_GET['r']) && isset($cave[$_GET['r']])) {
    // We have been passed a room number
    $room = $_GET['r'];
}

if(isset($_GET['a']) && isset($cave[$_GET['a']])) {
    // We have been passed a room number
    $arrows = $_GET['a'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>game page</title>
    <link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body>

<?php echo present_header("Stalking the Wumpus"); ?>

<div class ="article">
    <div class="image">
        <figure>
            <img src="./wumpus/cave.jpg" width="600" height="325" alt="picture of cave">
            <?php
            echo '<p>' . date("g:ia 1, F j, Y") . '</p>';
            // chnage to room 10, if in room with birts.
            if ($birds == $room){
                $room = 10;
            }
            ?>
            <p> You are in room <?php echo $room; ?> </p>
        </figure>
    </div>

    <?php

    //Make the "You hear birds!" message work
    if ($room == $cave[$birds][0] || $room == $cave[$birds][1] || $room == $cave[$birds][2]) {
    echo "<p>You hear birds!</p>";
    }
    //else if ($room == $cave[$birds][1]){
        //echo "<p>You hear birds!</p>";
    //}
    //else if ($room == $cave[$birds][2]){
        //echo "<p>You hear birds!</p>";
    //}
    else{
        echo "<p>&nbsp;</p>";
    }
    ?>

    <?php
    //make the "You feel a draft!" message work
    //if ($room == $cave[[pits array 1]][room] || $room == $cave[$pits[0]][1] || $room == $cave[$pits[0]][2]){
    if ($room == $cave[$pits[0]][0] || $room == $cave[$pits[0]][1] || $room == $cave[$pits[0]][2]
        || $room == $cave[$pits[1]][0] || $room == $cave[$pits[1]][1] || $room == $cave[$pits[1]][2]
        || $room == $cave[$pits[2]][0] || $room == $cave[$pits[2]][1] || $room == $cave[$pits[2]][2]) {
        echo "<p>You feel a draft!</p>";
    }
    else{
        echo "<p>&nbsp;</p>";
    }

    // if you enter room with pits, you die. rooms 3,10,13 and 16 with wumps
    if ($room == $pits[0] || $room == $pits[1] || $room == $pits[2] || $room == 16){
        header ("Location: lose.php");
        exit;
    }
    ?>

    <?php
    //make the "You smell a wumpus!" message work
    for ($i = 0; $i<=2; $i++){
        $room_away = $cave[16][$i];
        $new_room = $cave[$room_away];  //set as new room
        for ($j = 0; $j <= 2; $j++){
            $room_away2 = $new_room[$j];
            if ($room == $room_away2){
                echo "<p>You smell a wumpus!</p>";
            }
        }
        if ($room == $room_away){
            echo "<p>You smell a wumpus!</p>";
        }
    }
    // if you shoot into room 16 you win, you die in room 7=>10 so cannot win
    if (($room == 20 && $arrows == 16) || ($room == 17 && $arrows == 16 )){
        header("Location: win.php");
        exit;
    }
    ?>

    <div class="rooms">
        <div class="room">
            <p><img src="./wumpus/cave2.jpg" width="180" height="135" alt="picture of cave"></p>
            <p><a href="game.php?r=<?php echo $cave[$room][0]; ?>" ><?php echo $cave[$room][0]; ?></a></p>
            <p><a href="game.php?r=<?php echo $room; ?>&a=<?php echo $cave[$room][0]; ?>"> Shoot Arrow </a></p>
        </div>
        <div class="room">
            <p><img src="./wumpus/cave2.jpg" width="180" height="135" alt="picture of cave"></p>
            <p><a href="game.php?r=<?php echo $cave[$room][1]; ?>"> <?php echo $cave[$room][1]; ?> </a></p>
            <p><a href="game.php?r=<?php echo $room; ?>&a=<?php echo $cave[$room][1]; ?>"> Shoot Arrow </a></p>
        </div>
        <div class="room">
            <p><img src="./wumpus/cave2.jpg" width="180" height="135" alt="picture of cave"></p>
            <p><a href="game.php?r=<?php echo $cave[$room][2]; ?>"> <?php echo $cave[$room][2]; ?> </a></p>
            <p><a href="game.php?r=<?php echo $room; ?>&a=<?php echo $cave[$room][2]; ?>"> Shoot Arrow </a></p>
        </div>
    </div>
</div>
<footer>
    <p>You have 3 arrows remaining.</p>
</footer>
</body>
</html>