<?php 
require_once('../Private/functions.php');
require_once('../Assets/header.php');

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta author="">
	<title>Browse events</title>
</head>
<body>
    

    <div id="searchevent">
    <form method="POST" action="process_data.php">
        <label>Choose an option</label>
        <select class="browser-default" name="sort_method">
            <option value="" disabled>Browse among events</option>
            <option value="1">See events sorted by alphabetically</option>
            <option value="2">See events sorted by event ID</option>
        </select><br />
    	
            <button type="submit" name="action" style='background-color:rgb(53, 86, 148); color:white;position:absolute;right:315px;top:70px;'>Sök</button>
    </div>
    <br/>

    <footer>
	</footer>
</body>
</html>