# Trucks-API

## Welcome
Welcome to the Trucks-API project.  This is a demo project to showcase my software development skill.  It is completely standalone, the only requirement is that you have a reasonably modern version of Docker installed and it can process version 2 or better of the docker compose file format.

## What does this project do?
To quote the challenge that prompted this project,
>Our team loves to eat. They are also a team that loves variety, so they also like to discover new places to eat.
>In fact, we have a particular affection for food trucks. One of the great things about Food Trucks in San Francisco is that the city releases a list of them as open data.

Using the latest open data from the city of San Francisco, the Trucks-API project exposes a simple public facing api that can be queried by location/address, type of cuisine or name.  It will return a JSON response, suitable for use in other applications.

## Technologies stack used in the project
This project uses the following:
* Laravel PHP Framework 11
* Ubuntu Linux 24.04
* PHP 8.3
* MariaDB 11.3
* Redis 7.2
* NGINX 1.24.0
* Docker
* Composer 2.7.6
* PHPStorm IDE

## Setup
1. Shut down any local services that may be running on port 80, as this will prevent requests from getting to the container.
2. Clone the trucks-api repository
3. Create a `.env` file (optional) in the `trucks-api` directory to safely override of of the applications settings.  Place one or more of these in the `.env` file.  The list below includes the defaults used
```shell
DB_NAME=trucks_db
DB_USER=trucks
DB_PASSWORD=trucks 
REDIS_PORT=6379
```

After cloning the repository, in the `trucks-api` directory, execute the following from the command line:

`docker compose up`

This will do the following:
* build the images (MariaDB, Redis and this project)
* Install composer
* Run `composer install --no-dev` to install all needed non-development packages including Laravel
* Configure the application
* Configure NGINX
* Start the MariaDB server
* Start the Redis server
* Start PHP-FPM
* Start NGINX

## How to use
There are currently three SPI endpoints configured:
1. `/api/v1/find/name`
2. `/api/v1/find/cuisine`
3. `/api/v1/find/location`

Each of these endpoints requires the `search` query parameter, as wildcard and empty/blank searches are not supported at this time.  An optional query parameter, `status` can also be used to filter by the license status.  The possible values for `status` are 
* approved
* expired
* requested
* suspend

if the `status` parameter is not included in the search, then `approved` will be used.

For example, to search for pizza, the url would be `http://localhost/api/v1/find/cuisine?search=pizza`.  If for some reason you wanted to search for food trucks that served pizza but their license has been suspended, append `&status=suspend`, which would make the complete url `http://localhost/api/v1/find/cuisine?search=pizza&status=suspend`.

If you wish to do search for a phrase, you will have to url encode the value.  For example, `italian%20hogie`.  Searches are not case sensitive and do not support any boolean operations such as `and` and `or`

## Possible future enhancements
* Support for boolean option in search terms
* Add authentication
* Add support for latitude and longitude coordinates and a search radius to only return food trucks within that radius when searching for a specific cuisine or food truck name
* When searching for a location, search for common abbreviations such as st for street and blvd for boulevard as well.
* Unit and functional tests

Thank you for coming and please turn out the lights when you leave :)
