<div align="center">
  <img src="public/images/Banner.png">
</div>

-----------------

## About Perch

**Perch** seeks to expand research opportunities to undergraduates at the University of Michigan by providing a virtual network between research faculty and students.

## Installation

1. Install [composer](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx)
2. Move to project directory and install project dependencies using the following command:
    ```shell
    composer install
    ```
    alternatively, if you don't have composer installed globally:
    ```shell
    php composer.phar install
    ```
3. Copy and rename `.env.example` to `.env`:
    ```shell
    cp .env.example .env
    ```
4. Generate application key:
    ```shell
    php artisan key:generate
    ```
    
## Learn more
 * [Facebook](https://www.facebook.com/groups/319938491783428/)
 * [Perch Website](http://perch.umich.edu)