# Acme ReferenceExtension

A small Bolt 4/5 extension to `chmod` files that need to be writabable for both the shell-user, as well as the webserver. Primarily for shared hosting, where you have less control over these matters.
Installation:

```bash
composer require bobdenotter/chmodinator
```


## Running PHPStan and Easy Codings Standard

First, make sure dependencies are installed:

```
COMPOSER_MEMORY_LIMIT=-1 composer update
```

And then run ECS:

```
vendor/bin/ecs check src
```
