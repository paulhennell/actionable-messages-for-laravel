# Adding Outlook Actionable Messages to Laravel email notifications and mails

[![Latest Version on Packagist](https://img.shields.io/packagist/v/paulhennell/actionable-messages-for-laravel.svg?style=flat-square)](https://packagist.org/packages/paulhennell/actionable-messages-for-laravel)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/paulhennell/actionable-messages-for-laravel/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/paulhennell/actionable-messages-for-laravel/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/paulhennell/actionable-messages-for-laravel/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/paulhennell/actionable-messages-for-laravel/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/paulhennell/actionable-messages-for-laravel.svg?style=flat-square)](https://packagist.org/packages/paulhennell/actionable-messages-for-laravel)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require paulhennell/actionable-messages-for-laravel
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="actionable-messages-for-laravel-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="actionable-messages-for-laravel-config"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$actionableMessages = new PaulHennell\ActionableMessages();
echo $actionableMessages->echoPhrase('Hello, PaulHennell!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Paul Hennell](https://github.com/paulhennell)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
