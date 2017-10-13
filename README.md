<div align="center">
  <img src="http://umich.edu/~perchres/assets/LOGO.svg" width='200px'>
</div>

-----------------

## About Perch

**Perch** seeks to expand research opportunities to undergraduates at the University of Michigan by providing a virtual network between research faculty and students.

## Installation

1. Get [composer](https://getcomposer.org/download/)
2. Install project dependencies using composer:
    ```shell
    php composer.phar install
    ```
3. Copy and rename `.env.example` to `.env`:
    ```shell
    cp .env.example .env
    ```
4. Configure application parameters in `.env` file
5. Generate application key:
    ```shell
    php artisan key:generate
    ```
6. Run migrations and seed the database
	```shell
	php artisan migrate:refresh --seed
	```
    
## Learn more
 * [Facebook](https://www.facebook.com/groups/319938491783428/)
 * [Perch Website](http://umich.edu/~perchres)
 * [Current Demo](http://perch.us-east-1.elasticbeanstalk.com)
