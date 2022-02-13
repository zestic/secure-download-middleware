# Secure Download Middleware

### Set your route
```php
    $app->get('/download', [
        Zestic\Download\Middleware\SecureDownloadMiddleware::class,
    ]);
```
### Configure
Add to your `config/config.php` file
```php
$aggregator = new ConfigAggregator([
    \Zestic\Download\ConfigProvider::class,
];
```

### Configure flysystem
You can set up the configuration in the .env file
In .env
```bash
FILES_SECUREDOWNLOADS_URL=https://amb-customer-signatures.s3.us-east-2.amazonaws.com

FLYSYSTEM_SECUREDOWNLOADS_ADAPTER=AwsS3V3
FLYSYSTEM_SECUREDOWNLOADS_BUCKET=bucket
FLYSYSTEM_SECUREDOWNLOADS_ENDPOINT=https://us-east-1.aws.com
FLYSYSTEM_SECUREDOWNLOADS_KEY=
FLYSYSTEM_SECUREDOWNLOADS_REGION=us-east-1
FLYSYSTEM_SECUREDOWNLOADS_SECRET=
FLYSYSTEM_SECUREDOWNLOADS_VISIBILITY=public
```

### Run MySQL mutation

### usage
save ( file, permissions)

download (file) checks permissions
