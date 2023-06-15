#!/bin/bash

echo "Dies ist ein Installationsskript für ein Modulverwaltungssystem."
read -p "Bitte gib deinen MySQL Nutzernamen ein: " db_login
echo -n "Bitte gib dein MySQL Passwort ein: "
read -s db_pass
echo

mysql --user="$db_login" --password="$db_pass" --verbose < base_database.sql || exit 1

echo "Datenbank wurde eingespielt!"
echo "Standardnutzer mit Passwort wurde erstellt!"
echo "Die Logindaten fuer diesen Nutzer sind der Dokumentation zu entnehmen."
