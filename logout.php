<?php
    include('reusables/functions.php');
    session_destroy();
    header('Location: index.php');