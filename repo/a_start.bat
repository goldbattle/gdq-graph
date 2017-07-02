schtasks /create /tn "Cron Repo" /tr "C:\twitch_stats\repo\cron_run.vbs" /sc minute /mo 10
