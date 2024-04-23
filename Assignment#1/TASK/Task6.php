<?php
    
    $htmlText = '<p>This text is <b>bold</b> and <i>italic</i>.</p>';

    $simpleText = strip_tags($htmlText);

    echo $simpleText;
?>
