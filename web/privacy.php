<?php

    // django templating https://github.com/speedmax/h2o-php
    require 'h2o/h2o.php';
    $h2o = new h2o('templates/privacy.html');
    echo $h2o->render(array('name'=>'blah'));

?> 
