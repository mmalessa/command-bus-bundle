# Command bus - Symfony bundle

Requires Symfony 4.3.*  
https://github.com/mmalessa/command-bus-bundle  
Use it at your own risk.  

# Install
```sh
composer req mmalessa/command-bus-bundle
```

# Example of use
## Register your handler(s)
```yaml
services:
    App\Application\CommandBus\TestCommandHandler:
        tags:
            - { name: mmalessa.command_handler }
```
The command class is automatically detected based on the type of parameter 
in the handler 'handle' method.

## Create command and handler
(See - README for the mmalessa/command-bus package.)

## Inject command bus into Symfony command/controller
```php
use Mmalessa/CommandBus/CommandBus
public function __construct(CommandBus $commandBus)
// [...]
```

## Handle command
```php
$command = TestCommand::create(1, 'Silifon');
$this->commandBus->handle($command);
```
