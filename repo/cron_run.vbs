Dim WinScriptHost
Set WinScriptHost = CreateObject("WScript.Shell")
WinScriptHost.Run "C:\php-7.0.12\php.exe C:\twitch_stats\repo\repo.php", 0
Set WinScriptHost = Nothing