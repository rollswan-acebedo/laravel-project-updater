# laravel-project-updater

PHP Library used to update laravel project automatically upon receiving Git events.

## Installation

Requirements:

- Composer 2
- PHP 7.2

```bash
composer require rollswan/laravel-project-updater
```

Configure the following from your `.env` file 
- `WEBHOOK_URL`
- `WEBHOOK_HTTP_HEADER`
- `WEBHOOK_TOKEN_KEY`

## Usage

Method `POST`
```
https://domain.com/updater
```

## Acknowledgements
Inspired by senpai https://github.com/liamdemafelix