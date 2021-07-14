# Symfony API Platform with Pole-Emploi API

## Install

Create `.env.local` file from template `.env` file

`composer install`

`php bin/console doctrine:database:create`

`php bin/console doctrine:schema:update --force`

`php bin/console doctrine:fixtures:load`

## Launch

`symfony serve --no-tls`
