# GLOS Buoy Data API

This is the backend API for a [GLOS Data Challange 2016](https://www.challenge.gov/challenge/great-lakes-observing-system-data-challenge/) project I was on. The project itself never fully came to fluition but the API, for it's intents, is (probably, mostly) complete.

The  [Great Lakes Observitory System](http://www.glos.us) makes it's buoy data public. What this API does is stores a list of buoys along with the sensors each one is equiped with (water temperature, wave height, etc). The data these sensors report can then be accessed directly (by id) or dynamically based on latitude and longitude.

The API is built on Laravel 5.2 and requires MySQL 5.7.

Pull requests welcome.


## Environment Setup

### Getting Started

1. Clone the GitHub repo.

```bash
git clone https://github.com/bad-mushroom/GLOS-Hackathon-2016.git ./glos
```

#### Vagrant

Once the repo is cloned you can initialize vagrant. You'll first need to download the virtual box image since it's not included in the repo directly. 

Note that you don't need to use the Vagrant box from the below example if you'd rather use your own. If you have your own, make sure to update the `VagrantFile` with the path/name of the box to use.

The provisioning script will configure Nginx along with cURL, Composer, and some misc utilities and configuration.

```bash
wget http://chaoscontrol.org/Vagrant_Debian8.box .
vagrant up --provision
```

One shortcoming up the provisioning script is the installation of MySQL 5.7, you'll need to do this manually for now.

```bash
vagrant ssh
cd ~
sudo dpkg -i mysql-apt-config_0.7.3-1_all.deb
sudo apt-get update
sudo apt-get install mysql-community-server
```

##### DNS

You'll need to configure some DNS entries in your `/etc/hosts` file.

```bash
echo 10.10.10.10 glos.dev | sudo tee -a /etc/hosts
```


#### Laravel

Now that Vagrant is up and running you'll need to install Laravel and some dependencies.

```bash
cd /var/www
composer install
```

With Laravel installed you should be able to access the site: [http://glos.dev](http://glos.dev). There isn't much to see as the project was never completed ;)


#### Database

There's some database tables that need to be configured. This is done using Laravel's migrations.

```bash
cd /var/www
./artisan migrate
```

## Usage

### Data Seeding

There's a couple custom Artisan commands for populating buoy data. 

```
 buoys
  buoys:list           List all known buoys
  buoys:update         Update list of buoys from GLOS API
  buoys:updateSensors  Update availble buoys' sensors
```

1. You'll need to run `./artisan buoys:update`. This will access the GLOS public API for a list of all buoys. For debugging, you can view the buoy data at : [http://glos.dev/dev/buoys](http://glos.dev/dev/buoys)

2. Once that command finishes you'll need to run one more to update the available sensors for each buoy with `./artisan buoys:updateSensors`

Ideally, these commands would be scheduled to run on a set interval.

`buoys:list` will dump an unformatted list of buoys in the database.

There's also a Google Map that you can access at [http://glos.dev/dev/buoys/map](http://glos.dev/dev/buoys/map) but you'll need to add an environment variable called `KEY_GOOGLE_MAPS` with a valid Google Maps API Key.

![Image of Buoys](http://chaoscontrol.org/assets/images/Buoys.png)

And finally, there's some data that needs to be seeded locally:

```bash
./artisan db:seed
```


### API Calls

```bash
+--------+----------+-----------------------------------+------+--------------------------------------------------------+------------+
| Domain | Method   | URI                               | Name | Action                                                 | Middleware |
+--------+----------+-----------------------------------+------+--------------------------------------------------------+------------+
|        | GET|HEAD | api/applets                       |      | App\Http\Controllers\Api\Applets@index                 | web        |
|        | GET|HEAD | api/applets/{applet?}             |      | App\Http\Controllers\Api\Applets@show                  | web        |
|        | GET|HEAD | api/applets/{applet?}/{location?} |      | App\Http\Controllers\Api\Applets@show                  | web        |
|        | GET|HEAD | api/filters                       |      | App\Http\Controllers\Api\Filters@index                 | web        |
|        | GET|HEAD | api/filters/{filter?}             |      | App\Http\Controllers\Api\Filters@show                  | web        |
|        | GET|HEAD | api/search/{address}              |      | App\Http\Controllers\Api\Search@show                   | web        |
+--------+----------+-----------------------------------+------+--------------------------------------------------------+------------+

```

All data responses are JSON formatted.

`http://glos.dev/api/filters`

```json
{
    id: 4,
    shortname: "beach",
    fullname: "Beachgoer",
    applets: [
    {
        id: 2,
        shortname: "WTMP",
        fullname: "Water Temperature",
        distance_range: 50,
        time_range: 0,
        pivot: {
            filter_id: 4,
            applet_id: 2
        }
    }
    ]
}
```

To get Water Temperature from the closest buoy based on location:

`http://glos.dev/api/applets/WTMP/42.2808,-83.7430`

```json
{
    4019-6-0-0: [
    {
        id: 757574,
        platformId: 403,
        sensorId: 4019,
        value: 27.03,
        mType: 9,
        lon: -83.26,
        lat: 41.7,
        zvalue: 183,
        dateTime: "2016/08/13 18:00:00"
    }
}
```

## Notes

* It seems that all requests respond with an HTTP 200, even if a resource isn't found - just returns an empty array. This is kind of bad design. You'll see somewhere in the code where I'm checking if the response size to try and catch this.
* There isn't any (documented) limit on the number of requests you can make.
* Feel free to contact me with any questions!

