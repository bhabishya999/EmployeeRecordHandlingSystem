<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Project setup

To setup this project first download latest version of docker,php and composer whose download links are mentioned below:  

Docker: https://docs.docker.com/get-docker/\
PHP: https://www.php.net/downloads.php  
Composer: https://getcomposer.org/download/  

After downloading docker,php and composer clone remote repository
```
git@github.com:IntroCept/Talent-Management.git.
```
Succeeding git clone,copy contents of .env.example file into .env file which should be created in the root of the project folder and replace  
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=employeehandlingsystem
DB_USERNAME=root
DB_PASSWORD=
```
with 
```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=talent
DB_USERNAME=root
DB_PASSWORD=root
```
and change APP_URL value to
 ```
http://talent.local/
```
in .env file.  

Moving forward for Mac OS or Linux operationg system hosts file can be setup by running  

```
Sudo nano \etc\hosts
```

command in the termainal which will open hosts file and add  
```
127.0.1.1 talent.local  
```  
inside hosts file and save it.  

After that run following commands in terminal one after another which are mentioned below,  

```bash
docker compose build
docker compose up -d
docker compose exec php bash

# Inside the php container:
composer install
php artisan key:generate
php artisan migrate
php artisan db:seed
```
Incase of Windows operating system hosts file can be set up by running Notepad as a administrator. After running notepad as a administrator   
```
select option->File->Open->system32->drivers->etc
```  
folder. If you see hosts file in etc folder then everything is ok but if you don't see any hosts file in etc folder then type `/hosts` in the path section after
```
C:\Windows\System32\drivers\etc  
```
 where hosts file will get opened in notepad and add 
 ```
 127.0.1.1 talent.local
 ```
 
 inside hosts file and save it.  

So, at last for frontend developer run,
```
npm install
npm run dev
```
in the new terminal and type `talent.local/` to run the project.

And for backend developer run,
```
npm install
```
in the new terminal and do same as above.


