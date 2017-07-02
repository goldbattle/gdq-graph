<?php

// Set default timezone
date_default_timezone_set('UTC');

// Create variables
$channels = array('gamesdonequick');
$clientId = '8arsqvn5t4lo7mkhe3d0douj1dil3dw';

// Loop through each stream
foreach($channels as $streamer){

  // Get data from api
  $json_array = json_decode(file_get_contents('https://api.twitch.tv/kraken/streams/'.strtolower($streamer).'?client_id='.$clientId), true);
  // If we have data record it
  if ($json_array['stream'] != NULL) {

    // Create (connect to) SQLite database in file
    $file_db = new PDO('sqlite:'.dirname(__FILE__).'/../twitch.sqlite3');
    // Set errormode to exceptions
    $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Create table messages
    $file_db->exec("CREATE TABLE IF NOT EXISTS Entries (
                      id Integer PRIMARY KEY AUTOINCREMENT,
                      stream_name TEXT NOT NULL,
                      stream_name_display TEXT NOT NULL,
                      stream_status TEXT NOT NULL,
                      stream_game TEXT NOT NULL,
                      stream_views TEXT NOT NULL,
                      stream_followers TEXT NOT NULL,
                      stream_viewers TEXT NOT NULL,
                      date_created DATETIME DEFAULT (datetime('now','UTC')));");

    // Prepare INSERT statement to SQLite3 file db
    $insert = "INSERT INTO Entries (stream_name, stream_name_display, stream_status, stream_game,stream_views, stream_followers, stream_viewers) VALUES (:name, :display_name, :status, :game, :views, :followers, :viewers);";
    $stmt = $file_db->prepare($insert);

    // Streamer details
    // Bind parameters to statement variables
    $stmt->bindParam(':name', $json_array['stream']['channel']['name']);
    $stmt->bindParam(':display_name', $json_array['stream']['channel']['display_name']);
    $stmt->bindParam(':status', $json_array['stream']['channel']['status']);
    $stmt->bindParam(':game', $json_array['stream']['channel']['game']);
    $stmt->bindParam(':views', $json_array['stream']['channel']['views']);
    $stmt->bindParam(':followers', $json_array['stream']['channel']['followers']);
    $stmt->bindParam(':viewers', $json_array['stream']['viewers']);
    
    // Execute
    $result = $stmt->execute();

    // Print results
    if (!$result) {
      print "Error: ".$streamer."\n";
    } else {
      print "Inserted: ".$streamer."\n";
    }

    // Close the database
    //mysqli_close($db_connect);

  } else {
    print "Not Live: ".$streamer."\n";
  }
}
?>