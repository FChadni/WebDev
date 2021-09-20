<?php
require 'lib/codebreaker.inc.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="codebreaker.css" type="text/css" rel="stylesheet"/>
    <title>Codebreaker</title>
</head>
<body>
<form id="gameform" method="post" action="post/codebreaker.php">
    <fieldset>
        <h1><?php echo $codebreaker->getUser() ?>'s Codebreaker</h1>
        <h2>Encoded:</h2>
        <p class="code"><?php echo $codebreaker->getEncoded() ?></p>
        <h2>Decoded:</h2>
        <p class="code"><?php echo $codebreaker->getDecodedCode() ?></p>
        <table class="game">
            <tr>
                <td>A:<?php echo $codebreaker->getDecodeList()['A']?> <input type="checkbox" name="A" value="letter"></td>
                <td>F:<?php echo $codebreaker->getDecodeList()['F']?> <input type="checkbox" name="F"></td>
                <td>K:<?php echo $codebreaker->getDecodeList()['K']?> <input type="checkbox" name="K"></td>
                <td>P:<?php echo $codebreaker->getDecodeList()['P']?> <input type="checkbox" name="P"></td>
                <td>U:<?php echo $codebreaker->getDecodeList()['U']?> <input type="checkbox" name="U"></td>
                <td>Z:<?php echo $codebreaker->getDecodeList()['Z']?> <input type="checkbox" name="Z"></td>
            </tr>
            <tr>
                <td>B:<?php echo $codebreaker->getDecodeList()['B']?> <input type="checkbox" name="B"></td>
                <td>G:<?php echo $codebreaker->getDecodeList()['G']?> <input type="checkbox" name="G"></td>
                <td>L:<?php echo $codebreaker->getDecodeList()['L']?> <input type="checkbox" name="L"></td>
                <td>Q:<?php echo $codebreaker->getDecodeList()['Q']?> <input type="checkbox" name="Q"></td>
                <td>V:<?php echo $codebreaker->getDecodeList()['V']?> <input type="checkbox" name="V"></td>
            </tr>
            <tr>
                <td>C:<?php echo $codebreaker->getDecodeList()['C']?> <input type="checkbox" name="C"></td>
                <td>H:<?php echo $codebreaker->getDecodeList()['H']?> <input type="checkbox" name="H"></td>
                <td>M:<?php echo $codebreaker->getDecodeList()['M']?> <input type="checkbox" name="M"></td>
                <td>R:<?php echo $codebreaker->getDecodeList()['R']?> <input type="checkbox" name="R"></td>
                <td>W:<?php echo $codebreaker->getDecodeList()['W']?> <input type="checkbox" name="W"></td>
            </tr>
            <tr>
                <td>D:<?php echo $codebreaker->getDecodeList()['D']?> <input type="checkbox" name="D"></td>
                <td>I:<?php echo $codebreaker->getDecodeList()['I']?> <input type="checkbox" name="I"></td>
                <td>N:<?php echo $codebreaker->getDecodeList()['N']?> <input type="checkbox" name="N"></td>
                <td>S:<?php echo $codebreaker->getDecodeList()['S']?> <input type="checkbox" name="S"></td>
                <td>X:<?php echo $codebreaker->getDecodeList()['X']?> <input type="checkbox" name="X"></td>
            </tr>
            <tr>
                <td>E:<?php echo $codebreaker->getDecodeList()['E']?> <input type="checkbox" name="E"></td>
                <td>J:<?php echo $codebreaker->getDecodeList()['J']?> <input type="checkbox" name="J"></td>
                <td>O:<?php echo $codebreaker->getDecodeList()['O']?> <input type="checkbox" name="O"></td>
                <td>T:<?php echo $codebreaker->getDecodeList()['T']?> <input type="checkbox" name="T"></td>
                <td>Y:<?php echo $codebreaker->getDecodeList()['Y']?> <input type="checkbox" name="Y"></td>
            </tr>
        </table>
    <p><input type="submit" name="shuffle" value="Swap/Shuffle">
      <input type="submit" name="giveup" value="Give Up!">
      <input type="submit" name="newgame" value="New Game">
    </p>

    <p><input type="submit" name="exit" value="Exit"></p>
  </fieldset>
</form>
<p class="solution"><?php echo $codebreaker->getPlaintext() ?></p></body>
</html>