<?php
namespace Mmalessa\CommandBusBundle;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class RegisterCommandBusCompilerPas implements CompilerPassInterface
{
    private $busService;
    private $serviceTag;

    public function __construct(string $busService, string $serviceTag)
    {
        $this->busService          = $busService;
        $this->serviceTag          = $serviceTag;
    }

    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition($this->busService) && !$container->hasAlias($this->busService)) {
            return;
        }
        $busServiceDefinition = $container->findDefinition($this->busService);
        foreach ($container->findTaggedServiceIds($this->serviceTag) as $serviceId => $serviceAttributes) {
            $serviceDefinition = $container->getDefinition($serviceId);
            $handlerClassName = $container->getParameterBag()->resolveValue($serviceDefinition->getClass());
            $busServiceDefinition->addMethodCall('subscribe', [new Reference($handlerClassName)]);
        }
    }
}
