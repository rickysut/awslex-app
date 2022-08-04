# Setup Guide

Clone this repo
```console
$ git clone https://github.com/fardiansyah/amazon-lex-app.git
```

Run these commands inside application directory.

```console
$ composer install
$ cp .env.example .env
```

Open .env file and set AWS and Larasocket configuration.
```text
AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1

LARASOCKET_TOKEN=
```
Set database connection settings
```text
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```
Back to application directory, and run these commands.

```console
$ php artisan key:generate
$ php artisan migrate --seed
```

Build JS files

```console
$ npm install
$ npm run prod
```