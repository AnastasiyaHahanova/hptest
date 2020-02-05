# hptest
Для развертывания данного проекта понадобится установленный стек LEMP или LAMP

После скачивания проекта, зайдите в директорию и в терминале запустите команду
composer install

Создайте новую базу данных с помощью команды
php bin/console doctrine:database:create

Или подключите уже существующую в файле .env

Затем накатите миграции
php bin/console doctrine:migrations:migrate

Заполните базу данных с помощью команды
php bin/console doctrine:fixtures:load --append

Установите следующий пакет
yarn install

Выполните сборку проекта
yarn run dev
