# Reun Media PHP app template

A starter template for PHP projects.

## Getting started

### Create project

This template is not published to Packagist, so use the command below to create
a new project.

```sh
composer create-project reun/php-app-template myapp --repository="{\"url\": \"https://github.com/Reun-Media/php-app-template\", \"type\": \"vcs\"}" --stability=dev --remove-vcs
```

### Install latest versions of dependencies

```sh
cd myapp
pnpm update
composer update
```

`update` is used instead of `install` to update lockfiles to latest versions of
dependencies.

Run `composer outdated -D` and `pnpm outdated` periodically to check for
outdated packages. If there are new major releases of packages out, feel free to
[submit a pull request](https://github.com/Reun-Media/php-app-template/pulls).

### Start development servers

```sh
pnpm dev
composer dev
```

You must run `pnpm dev` before `composer dev` if you want to use the dev server.
You can also run `pnpm build` instead of starting a dev server. See
[`reun/twig-utilities`
documentation](https://github.com/Reun-Media/twig-utilities/blob/master/docs/ViteAsset.md#vite-dev-server-detection)
for more info.

## Additional information

### `composer.json` package type

The default type for package in `composer.json` is `project`. Remove it or
change to `library` if creating a library.

## Additional setup tasks

- [ ] Change badges to point to your package in Packagist or remove them
- [ ] Add `LICENSE`

---

> [!TIP]
>
> After initial setup, remove the section above and replace README with the
> template below.

<details>

  <summary>Show README template</summary>
  
  # My Project
  
  [![Supported PHP Version](https://img.shields.io/packagist/dependency-v/reun/mypackage/PHP?logo=PHP&logoColor=777BB3&color=777BB3)](https://www.php.net/supported-versions.php)
  [![Packagist Version](https://img.shields.io/packagist/v/reun/mypackage)](https://packagist.org/packages/reun/mypackage)
  
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
</details>
