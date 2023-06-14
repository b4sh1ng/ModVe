key=$(openssl rand -hex 12 | base32)

qrencode -o ./2fakey/2fa_key.png "otpauth://totp/$1?secret=$key"
mysql --user=$2 --password=$3 <<sql
USE $4
UPDATE verw SET 2fakey='$key' WHERE loginid='$1'
sql