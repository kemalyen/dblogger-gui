#This package has been renamed and moved to Glog

I've decided to put Gui and library into a standalone package. This will be helpful for development and testing.

[https://github.com/gazatem/glog](https://github.com/gazatem/glog)


## Gui interface for DbLogger

DbLogger-GUI is a interface for the [DbLogger](https://github.com/gazatem/dblogger) package.

If you haven't already set up DbLogger then first you need to install and configure DbLogger. 
This package is only a gui interface. DbLogger must be enable to log data for gui interface.  

## Installation

Add the package to your ```composer.json``` file

```
"gazatem/dblogger-gui": "dev-master"
```

Add the service provider to your ```config/app.php``` file

```
Gazatem\DBLoggerGui\DBLoggerGuiServiceProvider::class,
```

Publish the configuration file(s)

```
php artisan vendor:publish --provider="Gazatem\DBLoggerGui\DBLoggerGuiServiceProvider" 
```

You can change route prefix by editing ```route-prefix``` in ```config/dblogger-gui.php```.

```
'route-prefix' => 'logs'
```
