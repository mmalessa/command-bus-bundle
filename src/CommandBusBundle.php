<?php

namespace Mmalessa\CommandBusBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class CommandBusBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(
            new RegisterCommandBusCompilerPas(
                \Mmalessa\CommandBus\CommandBus::class,
                'mmalessa.command_handler'
            )
        );

    }
}
