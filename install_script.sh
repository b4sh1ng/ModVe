$ echo "Dies ist ein Installationsskript für ein Modulverwaltungssystem."
$ read -p "Bitte gib dein Myql Nutzernamen ein: " db_login
$ read -ps "Bitte gib dein Mysql Passwort ein: " db_pass
mysql --user=$db_login --password=$db_pass --verbose < base_database.sql

$ echo "Datenbank wurde eingespielt!\nStandartnutzer mit Passwort wurde mit erstellt!\nDie Logindaten für diesen Nutzer sind aus der Dokumentation zu entnehmen."
