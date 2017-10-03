# php-mailhog-client

PHP-Client for the Mailhog-API (v2) based on [HTTPlug](https://github.com/php-http/httplug)

[![Build Status](https://travis-ci.org/mohrekopp/php-mailhog-client.svg?branch=master)](https://travis-ci.org/mohrekopp/php-mailhog-client)


## Installation

```
composer require mohrekopp/php-mailhog-client
```

Since HTTPlug is just an abstraction, you have to install a client or an adapter,
e.g. CURL-client:

```
composer require php-http/curl-client
```
    
Or Guzzle6-adapter:

```
composer require php-http/guzzle6-adapter
``` 

    
## Usage

```php
<?php 
require_once 'vendor/autoload.php';

use Mohrekopp\MailHogClient\MailHogClient;
use Mohrekopp\MailHogClient\SearchCriteria;

# Instantiate client
$client = new MailHogClient('http://localhost:8025');

# Retrieve all messages
$messages = $client->getMessages();

# Iterate over messages
foreach ($messages as $message) {
    $message->getBody();
    $message->getSubject();
}   

# Search for messages based on subject or body content
$criteria = SearchCriteria::createContainingCriteria('Content for searching');

$messages = $client->searchMessages($criteria);

# Search for messages sent *from* bob@example.com
$criteria = SearchCriteria::createSentByCriteria('bob@example.com');
$client->searchMessages($criteria);

# Search for messages sent *to* alice@example.com
$criteria = SearchCriteria::createSentToCriteria('alice@example.com');
$client->searchMessages($criteria);
```

## Tests

### Run Unit-Tests

    composer run test-unit
    
### Run Functional-Tests

1. You have to install a HTTPlug-Client:

```
composer require php-http/curl-client
```

2. Copy the .env.dist file and start a docker-container for Mailhog:

```
cp .env.dist .env
docker-compose up -d
```

3. Seed Mailhog with testdata and run tests

```
composer run test-seed-mailhog
composer run test-functional
```

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.