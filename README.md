1) Создать папку для сайта. /var/www/election, например
2) cd /var/www/election
2) git init
3) git remote add origin https://github.com/npyatak/election
4) git pull origin master
5) php init (0 - developer для тестового сервера. 1 - production для боевого)
6) composer update. Только сначала установить composer надо
7) Создать базу данных и прописать ее в конфиге: /common/config/main-local.php
8) php yii migrate