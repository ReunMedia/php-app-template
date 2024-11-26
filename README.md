# Reun Media PHP app template

A starter template for PHP projects.

## Getting started

### Create project

This template is not published to Packagist, so use the command below to create
a new project.

```sh
composer create-project reun/php-app-template myapp --repository="{\"url\": \"https://github.com/Reun-Media/php-app-template\", \"type\": \"vcs\"}" --stability=dev --remove-vcs
```

### Install dependencies

```sh
cd myapp
pnpm install
```

### Check for outdated packages

```sh
composer outdated -D
pnpm outdated
```

> [!TIP]
>
> If there are new major releases of packages out, submit a pull request.

### Start development servers

```sh
composer dev
pnpm dev
```

> [!TIP]
> After initial setup, remove the section above and replace README with the
> template below the line.

---

# My Project

Short description of the project.

## Installation

```sh
composer require myorg/mypackage
```

## Configuration

Add configuration steps here.

## Usage

Describe how to use the package.

## Development

This repository includes a [dev container](https://containers.dev/) that can be
used to launch a development environment.

Run tests:

```sh
composer test
```

Start dev server:

```sh
composer dev
```

Run PHP CS Fixer and PHPStan:

```sh
composer lint
```
