# Chmodinator

A small Bolt 4/5 extension to `chmod` files that need to be writabable for both 
the shell-user, as well as the webserver. Primarily for shared hosting, where 
you have less control over these matters.

## Installation:

```bash
composer require bobdenotter/chmodinator
```

Then, edit your Bolt's global `config.yaml`, to explicitly set the 
`canonical: `. This is needed, because the extensions needs to be able to fetch 
a link in the backend from the command line. 

You should also review the settings in `config/extensions/bobdenotter-chmodinator.yaml`,
to ensure you've set a new, unique key. 

To test if it's working, run `bin/console chmodinator:do`. After that, run it as 
you please. A common use case is to run it before and after deploying, to ensure 
the site works after deployment, but also so that the commandline user is 
allowed to clean up the files of old deploys.

Example output: 

![Example output](https://user-images.githubusercontent.com/1833361/122406205-f3eb9c00-cf80-11eb-87be-f5d8f82e5a8f.png)



Alternatively, you can just run it as a web-based request, by calling the URL 
`https://example.org/chmodinator/abc123456def`. Obviously, substitute the 
domain name and the key (`abc123456def`) for yours.

---

## Running PHPStan and Easy Codings Standard

First, make sure dependencies are installed:

```
COMPOSER_MEMORY_LIMIT=-1 composer update
```

And then run ECS:

```
vendor/bin/ecs check src
```
