CREATE TABLE twitch_stats.Entries (
  id INT AUTO_INCREMENT NOT NULL,
  stream_name VARCHAR(255) NOT NULL,
  stream_name_display VARCHAR(255) NOT NULL,
  stream_status VARCHAR(255) NOT NULL,
  stream_game VARCHAR(255) NOT NULL,
  stream_views VARCHAR(255) NOT NULL,
  stream_followers VARCHAR(255) NOT NULL,
  stream_viewers VARCHAR(255) NOT NULL,
  date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY(id)
);