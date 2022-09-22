### Application can do.

- You as a teacher can create projects, where you can add number of groups with number of students.
- User can create, read and delete projects.
- User can add and delete students and assigned them to the groups.



### Stack:

- Docker
- Laravel 9x
- Bootstrap
- PHP 8

### How to launch it:

1. Deppending on your OS (win, Ubuntu, Mac) make your system ready to use (https://www.docker.com).

2. Clone this repo
```
   git clone https://github.com/Justinas-coder/group-students
```
3. Install PHP dependencies (reference: https://laravel.com/docs/9.x/sail#installing-composer-dependencies-for-existing-projects)
```
docker run --rm \
-u "$(id -u):$(id -g)" \
-v $(pwd):/var/www/html \
-w /var/www/html \
laravelsail/php81-composer:latest \
composer install --ignore-platform-reqs
```
4. Create .env file

```
   cp .env.example .env
```
5. Start containers

```
./vendor/bin/sail up -d
```
6. Generate app encryption key

```
./vendor/bin/sail artisan key:generate
```
7. Make migrations using CML command as bellow:

```
./vendor/bin/sail artisan migrate
```

8. Go to http://localhost/login  fill registration form and try it.

#### End




