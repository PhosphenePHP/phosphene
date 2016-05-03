# Change log

### 1.1.0

* Removed:  **boot.php**
* Added:    boot-rhubarb.php Does what boot.php used to do - includes auto-loader and sets working directory
* Added:    boot-application.php Includes boot-rhubarb.php and then sets up the default application from either
            settings/app.config.php or the Application class using the environment variable `rhubarb_app`
* Added:    The Event object - a new approach to events
* Changed:  Rhubarb no longer changes the working directory but defines an APPLICATION_ROOT_DIR constant instead.

### 1.0.0

* Added:    codeception
* Added:    **A changelog!**
* Fixed:    Failing tests
* Added:    build.xml
* Added:    **depending injection container**
* Added:    **Application object**
* Changed:  Context to PhpContext
* Removed:  All independant top level statics except for the new Application::current(). All other statics
            come back to this one allowing more than one Rhubarb application to be resident for unit testing.
* Changed:  Providers to use the dependency injection container by way of a Provider trait
* Renamed:  WebRequest::getUrlBase to WebRequest::createUrl
* Revised:  A lot of documentation
* Renamed:  DataStream to RecordStream
* Removed:  HttpHeaders class and move functionality to the Response object
* Removed:  send() method on Email and Sendable classes. Call SendableProvider::selectProviderAndSend() instead.
* Added:    Support for Monolog
* Changed:  Log::writeEntry is now passed the log level
* Removed:  References to jquery in composer.json and ResourceLoader
* Removed:  Test and function in LayoutModule to disable layouts for XHR requests - already handled in Application