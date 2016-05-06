# Forever

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Laravel][ico-laravel]](link-laravel)
[![Total Downloads][ico-downloads]][link-downloads]

Forever broadcasting.

## Install

#### NPM
Add the required Nodejs Packages.

``` bash
npm install --save forever ioredis socket.io
```

#### Via Composer
Require the `multimedia-street/forever` package in your composer.json and update your dependencies.

``` bash
$ composer require multimedia-street/forever
```

#### Add Service Provider
Include the Service Provider to your `config/app.php` in providers array

``` php
Mmstreet\Forever\ServiceProvider::class,
```

#### Optional Publish Configuration
You can publish the configuration.

``` bash
$ php artisan vendor:publish --provider="Mmstreet\Forever\ServiceProvider"
```

This will create `config/forever.php`.

###### `port`
Port number for forever listen. Default `3000`

###### `channel`
Channel of the forever. This will be added on `broadcastOn()` array of your events, if your events implements the interface `ShouldBroadcast`. Default `global`.


## Commands

#### Example usage
``` bash
$ php artisan forever:start
```

##### `forever:generate`
Generate a `forever.js` file to your base app.

##### `forever:start`
Start the forever service. This also generate a `forever.js`

##### `forever:stop` `[-c|--clear]`
Stop the forever service. Option `--clear` will also delete the logs afterwards, this is only calling the `forever:clear`

##### `forever:clear`
Clear the forever logs.


## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email :author_email instead of using the issue tracker.

## Credits

- [Jay Are Galinada][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/multimedia-street/forever.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/multimedia-street/forever/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/multimedia-street/forever.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/multimedia-street/forever.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/multimedia-street/forever.svg?style=flat-square
[ico-laravel]: http://img.shields.io/badge/Laravel-~5.1-orange.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/multimedia-street/forever
[link-travis]: https://travis-ci.org/multimedia-street/forever
[link-scrutinizer]: https://scrutinizer-ci.com/g/multimedia-street/forever/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/multimedia-street/forever
[link-downloads]: https://packagist.org/packages/multimedia-street/forever
[link-author]: https://github.com/jayaregalinada
[link-contributors]: ../../contributors
