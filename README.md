# Libredesk

## What is Libredesk


Libredesk is a final year project developed by Joe Edwards for his 3rd year at DMU
this readme is designed to help with configuration and set up of this application

## Prerequsites

* A Mac Or linux machine
* A windows machine with a web server and PHP intergration ( Not recommended )
* PHP installed and accessible in your path
* A local web server (Nginx recommended)

## Installing Libredesk

1. First clone this project into a folder and point your webserver at the public directory
1. Rename env.example to .env and fill in your database connection details and google connection details as required in the file
1. Run These commands on the top level of the directory

```bash
$ php artisan key:generate
$ php artisan migrate
$ php artisan storage:link
$ php artisan up
$ npm run dev # Not required per say but will make the site look good
```
> If any of these commands fail there is probably an error in your setup
4. To quickly run the web app without running a whole server you can use:
```bash
$ php artisan serve
```
> This will generate a webserver from the command line

5. The server is now configured and can be ran from your webserver or by accessing localhost:8080 if using artisan
