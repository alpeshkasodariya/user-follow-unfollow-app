
# PHP Coding Assignment

It is an app that has users list with follow and unfollow users. It is fully functional REST API without any UI

The Actions is defined below:

- Create Users list
- Create API endpoints to follow and unfollow users.
- Create an API endpoint to be able to search followers by name.
- This API is for the list of followers screen, and the user can filter followers by name.

 
## Installation Instructions

- Run `composer install`
- Run `php artisan key:generate`
- Run `php artisan migrate`
- Run `php artisan db:seed`


Test Case unit can be run all or by filter.
```bash
./vendor/bin/phpunit
./vendor/bin/phpunit --filter UsersTest
./vendor/bin/phpunit --filter SearchTest
./vendor/bin/phpunit --filter FollowunfollowTest 
```
## Tables

This API uses 2 tables to operate, Users Table and follows Table 
 

## API Functions

No | URL | Type |  Parameters
-----| ------------| -- |---------
1 | http://127.0.0.1:8000/api/users | GET 
2 | http://127.0.0.1:8000/api/users/{user} | GET | 
3 | http://127.0.0.1:8000/api/users/{user}/follow | POST | followed_id: 2
4 | http://127.0.0.1:8000/api/users/{user}/unfollow | POST | followed_id: 2
5 | http://127.0.0.1:8000/api/search-followers/{name} | GET 

## API Documentation

- [Postman Collection](https://www.postman.com/collections/215bb2c44d701325e3fa)

## Function Information

- Create 'users' table and GET API to return users.
- Create backend logic including database architecture and API endpoints to follow and unfollow users. Users should be able to follow other users. 
- Create an API endpoint to be able to search followers by name. This API is for the list of followers screen, and the user can filter followers by name.  
