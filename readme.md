# Learning Laravel Application
A basic intoductory laravel project.

## Setup and develop

### Per development environment settings

#### Using docker and shipped docker images
Copy the `.env.example` into `.laravel.env` if you want to use the shipped docker images. In any other case copy it into `.env`, in this case is NOT recommended to use the `docker-compose`, because the root `.env` used by laravel is mapped as a volume. 

In this case as well you should open a shell with the `develop` docker-compose service via the command:

```
 docker-compose exec -u www-data develop /bin/bash
```

#### Local use
Copy the `.env.example` file into `.env`. Inn this case is assumed that php and any required webserver is installed locally to your machine for example solutions such as `XAMPP` ot installed `LAMP` and `LEMP` stack. For cli environment you should use the one that your system provides or you have installed.

### Common steps
Then after copying the appropriate files and has spawn the shell, then use the following command:

```
php artisan key:generate
```

> NOTE in case of using docker images, then the command abovw shoule be run **INSIDE** the running docker container.

# Database

The database is consisted of the following fields:

* Table `grid`

* Table `rover`:
  Name | TYPE | DESCRIPTION
  --- | --- | ---
  id  | BIGINT UNSIGNED Primary Key Auto Increment | The primary Key
  rotation | ENUM(N,S,E,W) | The current rover rotation.
  grid_pos_x | UNSINGERD SMALLINT | The current X coordinate of rover.
  grid_pos_y | UNSINGERD SMALLINT | The current Y coordinate of rover.
  command | String | The command Sequence to execute.
  last_commandPos | UNSINGED SMALL INT | That stored the position of the last command.
  last_command | String | The last executed command.
  grid_id | UNSIGNED BIGINT FK to Grid | The grid that the rover is in.


## License
The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).

Any other code is shipped with [WFPL licence](http://www.wtfpl.net).

Each 3rd party library has its own licence.