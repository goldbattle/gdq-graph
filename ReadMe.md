# gdq-graph

This repository has a few different parts to it.
The goal is to track stats during the week long Games Done Quick events.
The cron folder has a cron job that can be run to log information into a sqlite database.
This database is then opened on the website to generate a plot.


## Libraries Used

* https://github.com/plotly/plotly.js
* https://github.com/kripken/sql.js/