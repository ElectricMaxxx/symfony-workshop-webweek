# Block 2 – Dependency Injection

## Start it

```bash
composer create-project symfony/skeleton dependency-injection
cd dependency-injection
composer req server --dev
composer require symfony/twig-bundle
composer require --dev symfony/phpunit-bridge
composer req validation
composer req annotation

# run tests
php vendor/bin/simple-phpunit
```