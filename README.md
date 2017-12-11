#Saint-hubert


**Table of contents**

[TOC]

##Description


Saint-hubert is a web application based on Laravel to manage a hunting club. This app was created to answer the needs of a specific French hunting club and is only available in French for now.
In this version you are able to :  

 - Add/modify/remove/view hunters (Club's Members) and
 - Add/modify/remove/view lessors (People leasing land to the club)
 - Generate various pdf files needed for the club's management
 - Add user (As admin)
 - Modify your password

Your are more than welcome to use and modify it as you please.

## Information
* The default admin account is :
	* Username: root
	* Pasword: toor
* The default user account is :
	* Unsername: user
	* Password: user

This accounts will be created during the seeding of the database.

## Installing


> **Prerequisites:**

> - [Laravel]
> - [Composer]
> - [Node.js]

* Create your .env file at the app's root (Look at the .env.example file or go to [Laravel]'s website)
* Create your database. Tables will be created later by the app.
* Open a terminal in app's root
* Run `composer install` to install dependencies
* Run `npm install`
* Run `php artisan migrate` to create the tables
* Run `php artisan db:seed` This command will create default user and demo's data. If you want to change the users or doesn't want to have demo's data, feel free to modify the "[database/seeds/DatabaseSeeder.php](https://github.com/malain96/saint-hubert/blob/master/database/seeds/DatabaseSeeder.php)" file.

## Demo

[![Demo](https://image.ibb.co/c2oXkG/Capture.png)](https://youtu.be/8Po_Fg9foGc)

## License

[MIT](https://github.com/malain96/saint-hubert/blob/master/LICENSE.md)

  [Laravel]: https://laravel.com/
  [Composer]: https://getcomposer.org/
  [Node.js]: https://nodejs.org/en/
