# Secure Download Middleware

### Set your route
```php

    $app->get('/download', [
        Zestic\Download\SecureDownloadMiddleware::class,
    ]);
```

### Configure flysystem


### Run MySQL mutation

### usage
save ( file, permissions)

download (file) checks permissionse
