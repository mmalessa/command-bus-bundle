# Command bus - Symfony bundle

Requires Symfony 4.3.*  
https://github.com/mmalessa/commandbus-bundle

Very early test version.  
Use it at your own risk.  

# Install
```sh
composer req mmalessa/commandbus-bundle
```
In `config/bundles.php` add:
```php
    Mmalessa\CommandBusBundle\CommandBusBundle::class => ['all' => true],
```
