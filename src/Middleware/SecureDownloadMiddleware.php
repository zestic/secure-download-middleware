<?php
declare(strict_types=1);

namespace Zestic\Download\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zestic\Flysystem\Files;

final class SecureDownloadMiddleware implements MiddlewareInterface
{
    public function __construct(
        private Files $files,
    ) {}

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $filename = $request->getAttribute('filename');
        if (!$this->files->fileExists($filename)) {
            return $handler->handle($request, $handler);
        }
        $fileSize = $this->files->getFileSize($filename);
        $mimeType = $this->files->getMimeType($filename);
        $stream = $this->files->readStream($filename);

        header("Content-type: $mimeType");
        header("Content-Disposition: attachment; filename=\"{$filename}\"");
        header("Content-length: $fileSize");

        while (!feof($stream)) {
            $buffer = fread($stream, 2048);
            echo $buffer;
        }
        exit;
    }
}
