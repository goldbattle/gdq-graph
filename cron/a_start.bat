schtasks /create /tn "Cron Twitch" /tr "C:\twitch_stats\cron\cron_run.vbs" /sc minute /mo 1
