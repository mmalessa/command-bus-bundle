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

    public static function create(int $id, string $name)
    {
        return new self(
            [
                'id' => $id,
                'name' => $name
            ]
        );
    }

    public function id()
    {
        return $this->payload['id'];
    }

    public function name()
    {
        return $this->payload['name'];
    }
}
```

```php
class ExampleCommandHandler
{
    public function handle(TestCommand $command): void
        {
            echo "Handle TestCommand\n";
            printf("ID: %s\n", $command->id());
            printf("Name: %s\n", $command->name());
            var_dump($command->payload());
        }
}
```
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
