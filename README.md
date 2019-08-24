# Command bus - Symfony bundle

Requires Symfony 4.3.*  
https://github.com/mmalessa/command-bus-bundle

Use it at your own risk.  

# Install
```sh
composer req mmalessa/command-bus-bundle
```

# Usage
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
```php
use Mmalessa\CommandBus\Command;
use Mmalessa\CommandBus\CommandTrait;

class ExampleCommand implements Command
{
    use CommandTrait;
    // [...]
}
```
```php
class ExampleCommandHandler
{
    public function handle(ExampleCommand $command)
    {
        // [...]
    }
}
```
See - README for the mmalessa/command-bus package.

## Inject command bus into Symfony command/controller
```php
use Mmalessa/CommandBus/CommandBus
public function __construct(CommandBus $commandBus)
// [...]
```

## Handle command
```php
$command = new TestCommand();
$this->commandBus->handle($command);
```
