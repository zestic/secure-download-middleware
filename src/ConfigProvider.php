<?php
declare(strict_types=1);

namespace Zestic\Download;

use Zestic\Download\Factory\SecureDownloadMiddlewareFactory;
use Zestic\Download\Middleware\SecureDownloadMiddleware;

final class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => $this->getDependencies(),
            'files'        => [
                'securedownloads' => [
                    'flysystem' => 'secureDownloadsStorage',
                ],
            ],
        ];
    }

    public function getDependencies(): array
    {
        return [
            'factories' => [
                SecureDownloadMiddleware::class => SecureDownloadMiddlewareFactory::class,
                'secureDownloadsFiles'   => new \Zestic\Flysystem\Factory\FilesFactory('securedownloads'),
                'secureDownloadsStorage' => new \Zestic\Flysystem\Factory\FilesystemFactory('securedownloads'),
            ],
        ];
    }
}
