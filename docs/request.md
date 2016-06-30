Requests
========

Most content generated by Rhubarb will be in response to a request. The request can be a `WebRequest` or
a `CliRequest`, or a more specialist form such as `BinaryRequest` or `JsonRequest` etc. The actual
request type for web requests is determined from the Content-Type header of the request. Each class of
request object will carry particular properties relevant to that type of request.

The request object is passed to `UrlHandler` objects and `GenerateResponseInterface` objects in the
`generateResponse` methods however at any point you can fetch the request object:

```php
$request = Application::current()->request();
// Or slightly shorter...
$request = Request::current();
```

To get the payload of a request call the `getPayload()` function:

``` php
$payload = $request->getPayload();
```

The payload will be of a type specific to the type of request. For example a JsonRequest will return an array or
stdClass() object, while the MultiPartFormDataRequest will return an array of key value pairs.

### WebRequest

A `WebRequest` encapsulates the super global PHP arrays and other details such as the url itself. Instead of
accessing $_GET, $_POST, $_SERVER, $_FILES, $_ENV, $_COOKIE, $_SESSION directly you should always use the
request object. Simply call the matching method:

``` php
$query = $request->get("q");
$token = $request->cookie("ltk");
```

Although seldom required you can also change super global values by passing a second argument

``` php
$request->get("q", "hacking q...");
```

Three public properties are also defined:

$request->host
:   The host name of the URL

$request->uri
:   The URI portion of the URL including any query string parameters. Essentially the same as $_SERVER["REQUEST_URI"]

$request->urlPath
:   The URI portion of the URL excluding any query string parameters. Essentially the same as $_SERVER["SCRIPT_NAME"]

To get a full URL using the same http scheme, host and port as the existing request you can call the `createUrl`
method and pass a URI:

``` php
$resetPasswordUrl = $request->createUrl("/reset-password/");
```

Lastly a WebRequest exposes all HTTP headers passed in the request in a similar way to super global values:

```php
$contentType = $request->header("Content-Type");
```

### CliRequest

A CliRequest is returned when Rhubarb is being invoked from a command line invocation (terminal). It has no
special properties of its own.