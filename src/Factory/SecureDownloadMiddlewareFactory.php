<?php
declare(strict_types=1);

namespace Zestic\Download\Factory;

use Psr\Container\ContainerInterface;
use Zestic\Download\Middleware\SecureDownloadMiddleware;

final class SecureDownloadMiddlewareFactory
{
    public function __invoke(ContainerInterface $container): SecureDownloadMiddleware
    {
        $files = $container->get('secureDownloadsFiles');

        return new SecureDownloadMiddleware($files);
    }
}
