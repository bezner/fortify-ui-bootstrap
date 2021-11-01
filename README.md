<p align="center"><img width="400" src="https://github.com/bezner/fortify-ui-bootstrap/raw/master/fortify-preset-image.png"></p>

# Introduction

**FortifyUI Bootstrap** is a Laravel Fortify UI preset, built with Bootstrap 5.

- [Requirements](#requirements)
- [Installation](#installation)

<a name="requirements"></a>
## Requirements

This package requires Laravel Fortify and FortifyUI. Installing [*FortifyUI*](https://github.com/zacksmash/fortify-ui) will automatically install and configure Laravel Fortify for you, so you may start there.

<a name="installation"></a>
## Installation

To get started, you'll need to install **FortifyUI Bootstrap** using Composer.

```bash
composer require bezner/fortify-ui-bootstrap
```

Next, you'll need to run the install command:

```bash
php artisan fortify:bootstrap
```

This command will publish **FortifyUI Bootstrap's** views and resources to your project.

The lsat step is to install node dependencies and compile the assets. You will achieve that by running:

```bash
npm install && npm run dev
```   

or

```bash
yarn install && yarn run dev
```

depending on the package manager of your choice. Happy development! 

## License

**FortifyUI Bootstrap** is open-sourced software licensed under the [MIT license](LICENSE.md).
