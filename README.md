# WECODEFY WEB APPLICATION FRAMEWORK

<p align="center"><img src="https://github.com/jahwin/wecodefy/blob/v1.0/assets/images/wecodefy.png" width="200"></p>

<p align="center">
<a href="https://packagist.org/packages/jahwin/wecodefy"><img src="https://poser.pugx.org/jahwin/wecodefy/downloads" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/jahwin/wecodefy"><img src="https://poser.pugx.org/jahwin/wecodefy/v" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/jahwin/wecodefy"><img src="https://poser.pugx.org/jahwin/wecodefy/v/unstable" alt="Latest Unstable Version"></a>
<a href="https://packagist.org/packages/jahwin/wecodefy"><img src="https://poser.pugx.org/jahwin/wecodefy/license" alt="License"></a>
</p>

## About Wecodefy
<p>Wecodefy is framework for making web application, you can build frontend by using modern javascript framework both Angular, React and Vue at the same time but it is optional you can choose one of them. Also it can be used to create Rest API. if you are not familiar with those JS framework you can use Twig templating engine.</p>

<p>This framework combine Angular, Vue and React</p>
<p>
<img src="https://github.com/jahwin/wecodefy/blob/v1.0/assets/images/react_logo.svg" width="80">
<img src="https://github.com/jahwin/wecodefy/blob/v1.0/assets/images/vue_logo.png" style="margin-right:10px" width="50">
<img src="https://github.com/jahwin/wecodefy/blob/v1.0/assets/images/angular_logo.png" width="55">
</p>

#### Wecodefy has Dev management tool
<p>By this tool you will be able to generate <b>Views</b>,<b>Controllers</b>,<b>Models</b>. Also this tool will be used to manage database by making migration and able to run seeder without commands, as it will be mentioned below.</p>
<p>
This tool will also able to generate Angular, Vue, React components, Then at end you can build your JavaScript codes<p>

<p>
<img src="https://github.com/jahwin/wecodefy/blob/v1.0/assets/images/dev-tool.png" width="600">
</p>

# Documentation expectations
<p>We have made this documentation to be very simple to be understood even by those with little programming proficiency who want to make applications</p>

# Table of content
  * [Getting started](#getting-started--man-technologist-)
      - [Requirement](#requirement)
  * [Installation](#installation)
     - [`1:` USING COMPOSER](#using-composer)
     - [`2:` USING DOWNLOAD OPTION](#using-download-option)
  * [Lets talk about wecodefy structure](#lets-talk-about-wecodefy-structure)
  * [Routing](#routing)
    + [Group routing](#group-routing)
    + [Single routing](#single-routing)
    + [Set not Found routing](#set-not-found-page-or-not-found-rest-api-responce)
  * [Middleware](#middleware)
  * [Controllers](#controllers)
  * [Views](#views)
    + [Creating custom twig filter and function](#creating-custom-twig-filter-and-function)
  * [Models](#models)
- [You can generate Models,Views,Controller by using Dev Management Tool](#you-can-generate-models-views-controller-by-using-dev-management-tool)
- [Database](#database)
  * [Database connection](#database-connection)
  * [Database migration](#database-migration)
  * [Creating or updating table columns rules](#creating-or-updating-table-columns-rules)
    + [Available Column Types](#available-column-types)
    + [Column Modifiers](#column-modifiers)
    + [Modifying Columns](#modifying-columns)
    + [Creating Indexes](#creating-indexes)
    + [Dropping Indexes](#dropping-indexes)
    + [Foreign Key Constraints](#foreign-key-constraints)
- [Seeding](#seeding)
  * [This is a list of generator](#this-is-a-list-of-generator)
    + [Basic generator](#-basic-generator-)
    + [Lorem generator](#-lorem-generator-)
    + [en_US Person generator](#-en-us-person-generator-)
    + [en_US Address generator](#-en-us-address-generator-)
    + [en_US PhoneNumber generator](#-en-us-phonenumber-generator-)
    + [en_US Company generator](#-en-us-company-generator-)
    + [en_US Text generator](#-en-us-text-generator-)
    + [DateTime generator](#-datetime-generator-)
    + [Internet generator](#-internet-generator-)
    + [UserAgent generator](#-useragent-generator-)
    + [Payment generator](#-payment-generator-)
    + [Color generator](#-color-generator-)
    + [File  generator](#-file--generator-)
    + [Image generator](#-image-generator-)
    + [Uuid  generator](#-uuid--generator-)
    + [Barcode generator](#-barcode-generator-)
    + [Miscellaneous generator](#-miscellaneous-generator-)
    + [Biased generator](#-biased-generator-)
    + [HtmlLorem generator](#-htmllorem-generator-)
- [You can also run migration and seeding by using Dev Management Tool](#you-can-also-run-migration-and-seeding-by-using-dev-management-tool)
- [Lets talk about some important functionality](#lets-talk-about-some-important-functionality)
  * [Cookies](#cookies)
  * [Session](#session)
  * [Upload](#upload)
  * [Send email](#send-email)
  * [Localization](#localization)
        * [Getting language index](#getting-language-index)
  * [Cors](#cors)
  * [FlashData](#flashdata)
- [Some useful functions](#some-useful-functions)
  * [Urls](#urls)
  * [Input & parameters](#input---parameters)
    + [Get single parameter value](#get-single-parameter-value)
    + [Get parameter object](#get-parameter-object)
    + [Get all parameters](#get-all-parameters)
  * [Cut text](#cut-text)
  * [is Contain](#is-contain)
  * [Paginate](#paginate)
  * [getToken](#gettoken)
  * [Responce](#responce)
  * [.env](#env)
- [Let's talk about JS framework](#let-s-talk-about-js-framework)
  * [Angular](#-angular-)
  * [Vue](#-vue-)
  * [React](#-react-)
  * [JSBuild](#jsbuild)
- [Contributing](#contributing)
- [Security Vulnerabilities](#security-vulnerabilities)
- [License](#license)


## Getting started :man_technologist:
<p>
After installation you will get this page:<br>
<img src="https://github.com/jahwin/wecodefy/blob/v1.0/assets/images/starter-page.png" width="600">
</p>

#### Requirement
- [x] <b>OS:</b> This framework can work on every operating system wich is able to run php script language.
- [x] <b>PHP:</b> php >= 7.2.5 is required  to run on this framework.
- [x] <b>Node:</b> v12.14.0 is required
- [x] <b>Npm:</b> v6.13.4 is required
- [x] <b>Composer:</b> Composer is required to install php packages
- [x] <b>Internet:</b> Internet will be used to install php and npm dependencies

<p>To install Wecodefy, first make sure that PHP and Node are installed in the local computer.
In case node is not installed in your computer click 
<a href="https://nodejs.org/en/download/" target="_brank">here</a> to install it.</p>

To check if PHP, node and npm, are successfully installed in your computer, run the following commands in your terminal or command prompt:<br>

``` 
# For checking php version
php -v 
```

``` 
# For checking node version
node -v 
```

``` 
# For checking npm version
npm -v 
```

<p>You can run Wecodefy framework by using XAMP , WAMP, LAMP or PHP server</p>

 `Note:` For those who will use XAMP, WAMP, LAMP make sure to set local domain on your wecodefy project (`Ex:websitename.dev`), If you don't know how to do it please refer to this 
 <a target="_brank" href="https://phpcodez.com/xamp-change-localhost-to-domain/" class="wecodefy-btn">link </a>


# Installation

<p>Then after checking everything is fine, you have two option to get started to this framework: </p>

### USING COMPOSER
Paste this command to create blog project

```
composer create-project --prefer-dist  jahwin/wecodefy Blog
```

This command will set everything for you, then navigate to your project folder Ex: `cd Blog` and run this command to start server

``` 
php run serve
```

After running above command you will get project link (http://127.0.0.1:8000/)<br>
`Note:` Make sure no other apps which are using 8000 or set your own port by running this command.

``` 
php run serve 8001
```
### USING DOWNLOAD OPTION
Click on link below to download framework zip file
<p>
<a target="_brank" href="https://github.com/jahwin/wecodefy/archive/v1.0.zip" class="wecodefy-btn">DOWNLOAD </a>
</p>
<p>After download extract downloaded zip file where you run web server projects [htdocs, www,...]. <br><br>
After extracting run the following commands:</p>

``` 
# This command is for installing  php composer packages
composer install
```

``` 
# This command is for installing  npm dependencies
npm install
```

:runner::runner::runner::runner::runner::runner: Now you are able to go.

<p>Use the following command to start server:</p>

``` 
# This command is for running php server
php run serve
```

After running above command you will get project link (http://127.0.0.1:8000/)<br>
`Note:` Make sure no other apps which are using 8000 or set your own port by running this command.

``` 
php run serve 8001
```

For other who are using wamp,xamp,lamp they can access it by there configured local domain<br>
`Ex:websitename.dev`

---

<p>After running your project you will get starter page we mentioned above.</p>

# Lets talk about wecodefy structure
<p>
  This is normal MVC pattern based, That means you can deal with Views, Controllers and Models
</p>


- [x] <b>Views:</b> This is where your will put your design thinking
- [x] <b>Controllers:</b> This is where your will put your business logics
- [x] <b>Models:</b> This is where your will manage your data from database

But there is something we have to talk about called <b>Routing</b>

## Routing
<p>This routing functionality will help you to map URL with different options like controller and call some functions, Lets take look on some examples</p>

You will config routing in the following file below:

```
/config/routes.php
```

Here is example of routes in array inside that file.

```php
$routes = [
    [
        'path' => '/',
        'method' => 'GET',
        'folder' => 'site',
        'return' => 'HomeController@index',
    ],
    [
        'path' => '/api',
        "children" => [
            [
                'path' => '/',
                'method' => 'GET',
                'folder' => 'api',
                'return' => 'HomeController@index',
            ],
        ],

    ],
]
```

Lets understand the code above :point_up_2:
 
 <b>path:</b> key in array is where your will put your path url,
 you can also pass data from path see example below:
 

```php
#You can use name as arguments in function.
$routes = [
    [
        'path' => '/info/{name}',
        'method' => 'GET',
        'folder' => 'site',
        'return' => function ($name) {
            echo 'Hello ' . $name;
        },
    ]
]
```
 <b>method:</b> key in array is where your will put request method like POST, GET, PUT, DELETE, OPTIONS, PATCH

<b>folder:</b> key in array this where your will put folder name where controller is located.

```
app/controllers/[folder name]/home.php
```
That means you have to use folder name based on folder of your controller are saved to.

 <b>return:</b> key in array is where your will return anything you want.
 
 ```
 className@funtionName
 ```
 `Note:` Class name must have the same name with controller file name.

 ### Group routing
 You can also group routes on prefix path.

 ```php
$routes = [
    [
        'path' => '/api',
        "children" => [
            [
                'path' => '/',
                'method' => 'GET',
                'folder' => 'api',
                'return' => 'HomeController@index',
            ],
        ],

    ],
]
 ```

### Single routing
Some time you may need to locate every request to the same controller in case you want to use Vue,Angular,React in order to make that frameworks to handle route themselves.

In our route config file there some change you have to make.

```php
/* -----------------------------
 * This is condition array, please don't change any key just add values
 * This will be user if you want to redirect all route to the same controller function
 * -----
 * This condition will be good for Vue,Angular,React
 * -----
 * Let that framework to handle routes
 * ----
 * You can enable or disable this condition
 * ------------------------------
 */
$route_condition = [
    'ENABLED' => true,
    'ALL_TO' => [
        'folder' => 'site',
        'return' => 'HomeController@index',
    ],
    'EXCEPT' => ['/api','/admin'],
];
```
Let understand the above codes:<br>
 <b>ENABLE:</b> key will enable us to use that condition or not <br>
 <b>ALL_TO:</b> key will help to set folder , controller and function we want to view on every request <br>
<b>EXCEPT:</b> key is array of path we don't need to redirect to the same controller or view
 
 ### Set not Found page or Not Found Rest Api responce
 Some time you can need to add not found page or Not Found Rest Api, add the following code to your route array located in `/config/routes.php`.

 ```php
 $routes = [
    [
        'path' => '*',
        'folder' => 'site',
        'return' => 'PagesController@index',
    ]
 ];
 ``` 
 After placing that code you can set everything in your controller function, you can return your not found or you can check if your url containt api so then you can return json responce of not found.<br>
Ex:

```php
if(isContain(url(),'/api')){
    $array_obj = new \stdClass();
    $array_obj->status = "fail";
    $array_obj->message = 'Your request not found';
    return responce(json_encode($array_obj),404);
}
```


## Middleware
You can setup different authorization on your routes. The only thing you need is to add `middleware` key on any routes:

```php
$routes = [
    [
        'path' => '/',
        'method' => 'GET',
        'folder' => 'site',
        'middleware' => 'web',
        'return' => 'HomeController@index',
    ]
]
```
Then you can set value initialized in `config/middleware.php`, in this example we have used `web` as value.
<br>
This is example of `config/middleware.php` file look like.
```php
<?php
$middleware = [
    "web" => app\middlewares\AuthMiddleware::class, 
]
?>
```

Then create middleware file (`Ex: AuthMiddleware.php file`), Middlewares files found in  `app/middlewares` folder,
So then your middleware class look like this.

```php

<?php
namespace app\middlewares;

use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

class AuthMiddleware implements IMiddleware
{

    public function handle(Request $request): void
    {
        $user = "";
        // If authentication failed, redirect request to 404 page.
        if ( $user === null) {
            responce("",404);
        }

    }

}
  ?>
```

## Controllers
<p>This is were you will put your business logics, see directory below to see were it can be created manual.</p>

```
app/controllers/[folder name]
```

This is example of how it look like:

```
# This is file name
Home.php
```

```php
<?php
namespace app\controllers\[foldername];

use system\library\Controller;


class Home extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function welcome()
    {
        $data = array("name"=>"Hello world");
        // Load template from `app/scheme/views/[folder_name]/home/index.twig`
        return $this->render('folder name', 'home/index.twig', $data);
    }

}

```
Replace `folder name` with any folder your controller located.

## Views
<p>This is were you will put your design thinking.</p>

```
app/scheme/views/[folder_name]/
```

This is example of how it look like:
```
# This is file name
home.twig
```

```twig
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Wecodefy app</title>
		<base href="{{'APP_URL' | env}}">
		<meta name="theme-color" content="#000000"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
        </head>

	<body>
      <h1>{{name}}</h1>
    </body>
</html>
```
For more information about using twig templating refer to <a target="_brank" href="https://twig.symfony.com/doc/3.x/"> this link</a>

### Creating custom twig filter and function
There is many default filters and functions create by twig team found on this <a target="_brank" href="https://twig.symfony.com/doc/3.x/"> link</a>. But sometimes you can create your own custom filter and function, This is the simple way in wecodefy to do it. Open `config/twig.php`, In that file is where you will put your filter and function. See example below.

```php
use system\library\Lang;
/* -----------------------------
| Twig filter management
-------------------------------- */
$filters = [
    [
        'name' => 'env',
        'func' => function ($val) {
            return getenv($val);
        },
    ], [
        'name' => 'translate',
        'func' => function ($val) {
            return Lang::init()->Trans($val);
        },
    ],

];

/* -----------------------------
| Twig functions management
-------------------------------- */
$functions = [
    [
        'name' => 'requestIs',
        'func' => function ($url, $feedback) {
            $url = strtolower($url);
            if (url() == $url) {
                return $feedback;
            }
        },
    ],
    [
        'name' => 'requestContain',
        'func' => function ($url, $feedback) {
            $url = strtolower($url);
            if (url()->contains($url)) {
                return $feedback;
            }
        },
    ],
    [
        'name' => 'cutText',
        'func' => function ($string, $length, $icon) {
            return cutText($string, $length, $icon);
        },
    ]
];
```
So then you can use your filters and functions in your template any where.

```html
 <h1>{{'APP_URL' | env}} </h1>
```

## Models
<p>This is were you will get data from database and that data will be processed on controller after that will be viewed on views.</p>

Model location:

```
app/models
```

This is example of how it look like:
```
# This is file name
User.php
```

```php
<?php
namespace app\models; 

use system\library\Models;
use system\library\DB;

class User extends Models {
    // This will allow to get all users in users table
    public function getAllUser() {
        $data = DB::table( 'users' )
        ->orderBy( 'id', 'desc' )->get();
        return $data;
    }
}
?>
```

For more information about Query Builder refer to <a href="https://laravel.com/docs/5.8/queries">this link</a>


# You can generate Models,Views,Controller by using Dev Management Tool

Before use below url make sure your app is in development mode [.env]

```
http://{app_url}/dev/ui
```
<p>
<img src="https://github.com/jahwin/wecodefy/blob/v1.0/assets/images/dev-tool.png" width="600">
</p>

# Database
Here we are going to talk about database connection, migration and seeding.

## Database connection
You have to set database connection in .env file, if file not exist create it, this file must have the same content with .env.example, so then you can set you database connection

```
# This is database .env variables

DATABASE_HOST = 127.0.0.1
DATABASE_NAME = db_wecodefy
DATABASE_PREFIX = tb
DATABASE_USER = root
DATABASE_PASS = 12345
```
## Database migration
This the way of manipulating database schema. You don't need to generate every file that can be used for making migration.

```
# Use this file located here
config/migration.php
```

Let see how it works.

```php
<?php
use Illuminate\Database\Schema\Blueprint;
/**
* --------------------------------------------
* Setting up database
* -------------------------------------------
* Don't change this variable name
*/
$db_up_migration = [
    [
        "key" => 1,
        "table"=>"tb_client",
        "todo" =>"create",
        "run" => function( Blueprint $table ) {
            $table->string( "email" )->index();
            $table->string( "token" )->index();
            $table->timestamps();
        },
        "reason"=>"Creating tb_client table"
    ],
    [
        "key" => 2,
        "table"=>"tb_books",
        "todo" =>"create",
        "run" => function( Blueprint $table ) {
            $table->string( "name" )->index();
            $table->timestamps();
        },
        "reason"=>"Creating tb_books table"
    ],
    [
        "key" => 3,
        "table"=>"tb_books",
        "todo" =>"rename",
        "run" => "tb_book",
        "reason"=>"Reaname tb_books to tb_book table"
    ]

];

/**
* --------------------------------------------
* Rollback database
* -------------------------------------------
* Don't change this variable name
*/
$db_down_migration = [
    [
        "key" => 1,
        "table"=>"tb_client",
        "todo" =>"delete",
        "run" => "drop",
        "reason"=>"Removing tb_client table"
    ],
    [
        "key" => 2,
        "table"=>"tb_book",
        "todo" =>"delete",
        "run" => "drop",
        "reason"=>"Removing tb_book table"
    ]
];

?>
```

Let's understand the above code:

- [x] <b>key:</b> This is the unique identifier for that migration
- [x] <b>table:</b> This is the name of table.
- [x] <b>todo:</b> This is the action will take place
     - create : This will be only used to create table with its fields
     - update : This will be only used to update fields structure in table
     - delete : This will be only used to delete table
     - rename : This will be only used to rename table
- [x] <b>run:</b> This is what will be executed, but there are something you have to pay attention.
    - if you want to rename table you have to enter new table name here.
    - If you want to drop table you have to enter 'drop' keyword.
    - If you want create or update table you have to use  Blueprint function initialization
- [x] <b>reason:</b> This is the reason you are making that migration.

## Creating or updating table columns rules

### Available Column Types
This is a variety of column types that you may specify when building your tables:
```php
$table->bigIncrements('id');	//Auto-incrementing UNSIGNED BIGINT (primary key) equivalent column.

$table->bigInteger('votes');	//BIGINT equivalent column.

$table->binary('data');	//BLOB equivalent column.

$table->boolean('confirmed');	//BOOLEAN equivalent column.

$table->char('name', 100);	//CHAR equivalent column with an optional length.

$table->date('created_at');	//DATE equivalent column.

$table->dateTime('created_at');	//DATETIME equivalent column.

$table->dateTimeTz('created_at');	//DATETIME (with timezone) equivalent column.

$table->decimal('amount', 8, 2);	//DECIMAL equivalent column with a precision (total digits) and scale (decimal digits).

$table->double('amount', 8, 2);	//DOUBLE equivalent column with a precision (total digits) and scale (decimal digits).

$table->enum('level', ['easy', 'hard']); ENUM equivalent column.

$table->float('amount', 8, 2);	//FLOAT equivalent column with a precision (total digits) and scale (decimal digits).

$table->geometry('positions');	//GEOMETRY equivalent column.

$table->geometryCollection('positions');	//GEOMETRYCOLLECTION equivalent column.

$table->increments('id');	//Auto-incrementing UNSIGNED INTEGER (primary key) equivalent column.

$table->integer('votes');	//INTEGER equivalent column.

$table->ipAddress('visitor');	//IP address equivalent column.

$table->json('options');	//JSON equivalent column.

$table->jsonb('options');	//JSONB equivalent column.

$table->lineString('positions');	//LINESTRING equivalent column.

$table->longText('description');	//LONGTEXT equivalent column.

$table->macAddress('device');	//MAC address equivalent column.

$table->mediumIncrements('id');	//Auto-incrementing UNSIGNED MEDIUMINT (primary key) equivalent column.

$table->mediumInteger('votes');	//MEDIUMINT equivalent column.

$table->mediumText('description');	//MEDIUMTEXT equivalent column.

$table->morphs('taggable');	//Adds taggable_id UNSIGNED BIGINT and taggable_type VARCHAR equivalent columns.

$table->uuidMorphs('taggable');	//Adds taggable_id CHAR(36) and taggable_type VARCHAR(255) UUID equivalent columns.

$table->multiLineString('positions');	//MULTILINESTRING equivalent column.

$table->multiPoint('positions');	//MULTIPOINT equivalent column.

$table->multiPolygon('positions');	//MULTIPOLYGON equivalent column.

$table->nullableMorphs('taggable');	//Adds nullable versions of morphs() columns.

$table->nullableUuidMorphs('taggable');	//Adds nullable versions of uuidMorphs() columns.

$table->nullableTimestamps();	//Alias of timestamps() method.

$table->point('position');	//POINT equivalent column.

$table->polygon('positions');	//POLYGON equivalent column.

$table->rememberToken();	//Adds a nullable remember_token VARCHAR(100) equivalent column.

$table->set('flavors', ['strawberry', 'vanilla']);	//SET equivalent column.

$table->smallIncrements('id');	//Auto-incrementing UNSIGNED SMALLINT (primary key) equivalent column.

$table->smallInteger('votes');	//SMALLINT equivalent column.

$table->softDeletes();	//Adds a nullable deleted_at TIMESTAMP equivalent column for soft deletes.

$table->softDeletesTz();	//Adds a nullable deleted_at TIMESTAMP (with timezone) equivalent column for soft deletes.

$table->string('name', 100);	//VARCHAR equivalent column with a optional length.

$table->text('description');	//TEXT equivalent column.

$table->time('sunrise');	//TIME equivalent column.

$table->timeTz('sunrise');	//TIME (with timezone) equivalent column.

$table->timestamp('added_on');	//TIMESTAMP equivalent column.

$table->timestampTz('added_on');	//TIMESTAMP (with timezone) equivalent column.

$table->timestamps();	//Adds nullable created_at and updated_at TIMESTAMP equivalent columns.

$table->timestampsTz();	//Adds nullable created_at and updated_at TIMESTAMP (with timezone) equivalent columns.

$table->tinyIncrements('id');	//Auto-incrementing UNSIGNED TINYINT (primary key) equivalent column.

$table->tinyInteger('votes');	//TINYINT equivalent column.

$table->unsignedBigInteger('votes');	//UNSIGNED BIGINT equivalent column.

$table->unsignedDecimal('amount', 8, 2);	//UNSIGNED DECIMAL equivalent column with a precision (total digits) and scale (decimal digits).

$table->unsignedInteger('votes');	//UNSIGNED INTEGER equivalent column.

$table->unsignedMediumInteger('votes');	//UNSIGNED MEDIUMINT equivalent column.

$table->unsignedSmallInteger('votes');	//UNSIGNED SMALLINT equivalent column.

$table->unsignedTinyInteger('votes');	//UNSIGNED TINYINT equivalent column.

$table->uuid('id');	//UUID equivalent column.

$table->year('birth_year');	//YEAR equivalent column.

```

### Column Modifiers
In addition to the column types listed above, there are several column "modifiers" you may use while adding a column to a database table. For example, to make the column "nullable", you may use the nullable method:
```php
$table->string('first_name')->nullable();
```
Below is a list of all the available column modifiers.

```php
->after('column')	//Place the column "after" another column (MySQL)

->autoIncrement()	//Set INTEGER columns as auto-increment (primary key)

->charset('utf8')	//Specify a character set for the column (MySQL)

->collation('utf8_unicode_ci')	//Specify a collation for the column (MySQL/PostgreSQL/SQL Server)

->comment('my comment')	//Add a comment to a column (MySQL/PostgreSQL)

->default($value)	//Specify a "default" value for the column

->first()	//Place the column "first" in the table (MySQL)

->nullable($value = true)	//Allows (by default) NULL values to be inserted into the column

->storedAs($expression)	//Create a stored generated column (MySQL)

->unsigned()	//Set INTEGER columns as UNSIGNED (MySQL)

->useCurrent()	//Set TIMESTAMP columns to use CURRENT_TIMESTAMP as default value

->virtualAs($expression)	//Create a virtual generated column (MySQL)
```
### Modifying Columns
The ```change``` method allows you to modify some existing column types to a new type or modify the column's attributes. 

```php
$table->string('name', 50)->change(); // Change size of column

$table->string('name', 50)->nullable()->change(); // Change column to be nullable

$table->renameColumn('from', 'to'); // Rename column

$table->dropColumn('votes'); // Drop column

$table->dropColumn(['votes', 'avatar', 'location']); //Drop multiple columns from a table by passing an array of column names 
```

### Creating Indexes
To create the index, we can chain the unique method onto the column definition:
```php
 $table->string('email')->unique(); // Create column with index

 $table->index(['student_id', 'start_at']); // Create index on multiple columns you have created

$table->primary('id');	// Adds a primary key.

$table->primary(['id', 'parent_id']);	// Adds composite keys.

$table->unique('email');	// Adds a unique index.

$table->index('state');	// Adds a plain index.

```

### Dropping Indexes
To drop an index, you must specify the index's name. 
```php
$table->dropPrimary('users_id_primary');	//Drop a primary key from the "users" table.

$table->dropUnique('users_email_unique');	//Drop a unique index from the "users" table.

$table->dropIndex('user_state_index');	//Drop a basic index from the "user" table.
 ```

### Foreign Key Constraints
wecodefy provides support for creating foreign key constraints, which are used to force referential integrity at the database level. For example, let's define a user_id column on the posts table that references the id column on a users table

```php
$table->unsignedBigInteger('user_id');
$table->foreign('user_id')->references('id')->on('users');
```

You may also specify the desired action for the "on delete" and "on update" properties of the constraint:
```php
$table->foreign('user_id')
      ->references('id')->on('users')
      ->onDelete('cascade');
```
To drop a foreign key, you may use the dropForeign method. Foreign key constraints use the same naming convention as indexes. So, we will concatenate the table name and the columns in the constraint then suffix the name with "_foreign":

```php
$table->dropForeign('posts_user_id_foreign');
```


# Seeding

This is the way of auto entering fake data into the database, here we use `Faker\Factory` namespace to auto generate some information.

```
# Use this file located here
config/seeder.php
```

Let see how it works.

```php
<?php
use Faker\Factory;
$generate = Factory::create();
/**
* --------------------------------------------
* Inserting fake data in database
* -------------------------------------------
* Don't change this variable name
*/
$database_seeder = [
    [
        'key' => 1,
        'table' => 'tb_user',
        'rows' => 10,
        'fields' => function () use ($generate) {
            return [
                'first_name' => $generate->name,
                'last_name' => $generate->name,
                'email' => $generate->email,
                'password' => $generate->password,
            ];
        },
    ],
];
?>
```

## This is a list of generator

##### `Basic generator`
```php
    $generate->randomDigit;            // 7
    $generate->randomDigitNot(5);      // 0, 1, 2, 3, 4, 6, 7, 8, or 9
    $generate->randomDigitNotNull;      // 5
    $generate->randomNumber($nbDigits = NULL, $strict = false); // 79907610
    $generate->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL); // 48.8932
    $generate->numberBetween($min = 1000, $max = 9000); // 8567
    $generate->randomLetter;// 'b'
    // returns randomly ordered subsequence of a provided array
    $generate->randomElements($array = array ('a','b','c'), $count = 1); // array('c')
    $generate->randomElement($array = array ('a','b','c')); // 'b'
    $generate->shuffle('hello, world'); // 'rlo,h eoldlw'
    $generate->shuffle(array(1, 2, 3)); // array(2, 1, 3)
    $generate->numerify('Hello ###'); // 'Hello 609'
    $generate->lexify('Hello ???'); // 'Hello wgt'
    $generate->bothify('Hello ##??'); // 'Hello 42jz'
    $generate->asciify('Hello ***'); // 'Hello R6+'
    $generate->regexify('[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}'); // sm0@y8k96a.ej
```

##### `Lorem generator`
```php
    $generate->word;                                             // 'aut'
    $generate->words($nb = 3, $asText = false);                  // array('porro', 'sed', 'magni')
    $generate->sentence($nbWords = 6, $variableNbWords = true);  // 'Sit vitae voluptas sint non voluptates.'
    $generate->sentences($nb = 3, $asText = false);              // array('Optio quos qui illo error.', 'Laborum vero a officia id corporis.', 'Saepe provident esse hic eligendi.')
    $generate->paragraph($nbSentences = 3, $variableNbSentences = true); // 'Ut ab voluptas sed a nam. Sint autem inventore aut officia aut aut blanditiis. Ducimus eos odit amet et est ut eum.'
    $generate->paragraphs($nb = 3, $asText = false);             // array('Quidem ut sunt et quidem est accusamus aut. Fuga est placeat rerum ut. Enim ex eveniet facere sunt.', 'Aut nam et eum architecto fugit repellendus illo. Qui ex esse veritatis.', 'Possimus omnis aut incidunt sunt. Asperiores incidunt iure sequi cum culpa rem. Rerum exercitationem est rem.')
    $generate->text($maxNbChars = 200);                          // 'Fuga totam reiciendis qui architecto fugiat nemo. Consequatur recusandae qui cupiditate eos quod.'
```


##### `en_US Person generator`

```php
    $generate->title($gender = null|'male'|'female');     // 'Ms.'
    $generate->titleMale;                                 // 'Mr.'
    $generate->titleFemale;                               // 'Ms.'
    $generate->suffix;                                    // 'Jr.'
    $generate->name($gender = null|'male'|'female');      // 'Dr. Zane Stroman'
    $generate->firstName($gender = null|'male'|'female'); // 'Maynard'
    $generate->firstNameMale;                             // 'Maynard'
    $generate->firstNameFemale;                           // 'Rachel'
    $generate->lastName;                                  // 'Zulauf'
```

##### `en_US Address generator`

```php
    $generate->cityPrefix;                          // 'Lake'
    $generate->secondaryAddress;                    // 'Suite 961'
    $generate->state;                               // 'NewMexico'
    $generate->stateAbbr;                           // 'OH'
    $generate->citySuffix;                          // 'borough'
    $generate->streetSuffix;                        // 'Keys'
    $generate->buildingNumber;                      // '484'
    $generate->city;                                // 'West Judge'
    $generate->streetName;                          // 'Keegan Trail'
    $generate->streetAddress;                       // '439 Karley Loaf Suite 897'
    $generate->postcode;                            // '17916'
    $generate->address;                             // '8888 Cummings Vista Apt. 101, Susanbury, NY 95473'
    $generate->country;                             // 'Falkland Islands (Malvinas)'
    $generate->latitude($min = -90, $max = 90);     // 77.147489
    $generate->longitude($min = -180, $max = 180);  // 86.211205
```

##### `en_US PhoneNumber generator`

```php
    $generate->phoneNumber;             // '201-886-0269 x3767'
    $generate->tollFreePhoneNumber;     // '(888) 937-7238'
    $generate->e164PhoneNumber;     // '+27113456789'
```

##### `en_US Company generator`

```php
    $generate->catchPhrase;             // 'Monitored regional contingency'
    $generate->bs;                      // 'e-enable robust architectures'
    $generate->company;                 // 'Bogan-Treutel'
    $generate->companySuffix;           // 'and Sons'
    $generate->jobTitle;                // 'Cashier'
```

##### `en_US Text generator`

```php
    $generate->realText($maxNbChars = 200, $indexSize = 2); // "And yet I wish you could manage it?) 'And what are they made of?' Alice asked in a shrill, passionate voice. 'Would YOU like cats if you were never even spoke to Time!' 'Perhaps not,' Alice replied."
```

##### `DateTime generator`
```php
    $generate->unixTime($max = 'now');                // 58781813
    $generate->dateTime($max = 'now', $timezone = null); // DateTime('2008-04-25 08:37:17', 'UTC')
    $generate->dateTimeAD($max = 'now', $timezone = null); // DateTime('1800-04-29 20:38:49', 'Europe/Paris')
    $generate->iso8601($max = 'now');                 // '1978-12-09T10:10:29+0000'
    $generate->date($format = 'Y-m-d', $max = 'now'); // '1979-06-09'
    $generate->time($format = 'H:i:s', $max = 'now'); // '20:49:42'
    $generate->dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null); // DateTime('2003-03-15 02:00:49', 'Africa/Lagos')
    $generate->dateTimeInInterval($startDate = '-30 years', $interval = '+ 5 days', $timezone = null); // DateTime('2003-03-15 02:00:49', 'Antartica/Vostok')
    $generate->dateTimeThisCentury($max = 'now', $timezone = null);     // DateTime('1915-05-30 19:28:21', 'UTC')
    $generate->dateTimeThisDecade($max = 'now', $timezone = null);      // DateTime('2007-05-29 22:30:48', 'Europe/Paris')
    $generate->dateTimeThisYear($max = 'now', $timezone = null);        // DateTime('2011-02-27 20:52:14', 'Africa/Lagos')
    $generate->dateTimeThisMonth($max = 'now', $timezone = null);       // DateTime('2011-10-23 13:46:23', 'Antarctica/Vostok')
    $generate->amPm($max = 'now');                    // 'pm'
    $generate->dayOfMonth($max = 'now');              // '04'
    $generate->dayOfWeek($max = 'now');               // 'Friday'
    $generate->month($max = 'now');                   // '06'
    $generate->monthName($max = 'now');               // 'January'
    $generate->year($max = 'now');                    // '1993'
    $generate->century;                               // 'VI'
    $generate->timezone;                             // 'Europe/Paris'
```

##### `Internet generator`
```php
    $generate->email;                  // 'tkshlerin@collins.com'
    $generate->safeEmail;               // 'king.alford@example.org'
    $generate->freeEmail;               // 'bradley72@gmail.com'
    $generate->companyEmail;            // 'russel.durward@mcdermott.org'
    $generate->freeEmailDomain;         // 'yahoo.com'
    $generate->safeEmailDomain;         // 'example.org'
    $generate->userName;                // 'wade55'
    $generate->password;                // 'k&|X+a45*2['
    $generate->domainName;              // 'wolffdeckow.net'
    $generate->domainWord;              // 'feeney'
    $generate->tld;                     // 'biz'
    $generate->url;                     // 'http://www.skilesdonnelly.biz/aut-accusantium-ut-architecto-sit-et.html'
    $generate->slug;                    // 'aut-repellat-commodi-vel-itaque-nihil-id-saepe-nostrum'
    $generate->ipv4;                    // '109.133.32.252'
    $generate->localIpv4;               // '10.242.58.8'
    $generate->ipv6;                    // '8e65:933d:22ee:a232:f1c1:2741:1f10:117c'
    $generate->macAddress;              // '43:85:B7:08:10:CA'
```

##### `UserAgent generator`
```php
    $generate->userAgent;              // 'Mozilla/5.0 (Windows CE) AppleWebKit/5350 (KHTML, like Gecko) Chrome/13.0.888.0 Safari/5350'
    $generate->chrome;                 // 'Mozilla/5.0 (Macintosh; PPC Mac OS X 10_6_5) AppleWebKit/5312 (KHTML, like Gecko) Chrome/14.0.894.0 Safari/5312'
    $generate->firefox;                // 'Mozilla/5.0 (X11; Linuxi686; rv:7.0) Gecko/20101231 Firefox/3.6'
    $generate->safari;                 // 'Mozilla/5.0 (Macintosh; U; PPC Mac OS X 10_7_1 rv:3.0; en-US) AppleWebKit/534.11.3 (KHTML, like Gecko) Version/4.0 Safari/534.11.3'
    $generate->opera;                  // 'Opera/8.25 (Windows NT 5.1; en-US) Presto/2.9.188 Version/10.00'
    $generate->internetExplorer;       // 'Mozilla/5.0 (compatible; MSIE 7.0; Windows 98; Win 9x 4.90; Trident/3.0)'
```

##### `Payment generator`
```php
    $generate->creditCardType;          // 'MasterCard'
    $generate->creditCardNumber;        // '4485480221084675'
    $generate->creditCardExpirationDate; // 04/13
    $generate->creditCardExpirationDateString; // '04/13'
    $generate->creditCardDetails;       // array('MasterCard', '4485480221084675', 'Aleksander Nowak', '04/13')
    // Generates a random IBAN. Set $countryCode to null for a random country
    $generate->iban($countryCode);      // 'IT31A8497112740YZ575DJ28BP4'
    s$generate->wiftBicNumber;          // 'RZTIAT22263'
```

##### `Color generator`
```php
    $generate->hexcolor;               // '#fa3cc2'
    $generate->rgbcolor;               // '0,255,122'
    $generate->rgbColorAsArray;        // array(0,255,122)
    $generate->rgbCssColor;            // 'rgb(0,255,122)'
    $generate->safeColorName;          // 'fuchsia'
    $generate->colorName;              // 'Gainsbor'
    $generate->hslColor;               // '340,50,20'
    $generate->hslColorAsArray;       // array(340,50,20)
```

##### `File  generator`
```php
    $generate->fileExtension;          // 'avi'
    $generate->mimeType;               // 'video/x-msvideo'
    // Copy a random file from the source to the target directory and returns the fullpath or filename
    $generate->file($sourceDir = '/tmp', $targetDir = '/tmp'); // '/path/to/targetDir/13b73edae8443990be1aa8f1a483bc27.jpg'
    $generate->file($sourceDir, $targetDir, false); // '13b73edae8443990be1aa8f1a483bc27.jpg'
```

##### `Image generator`
```php
    // Image generation provided by LoremPixel (http://lorempixel.com/)
    $generate->imageUrl($width = 640, $height = 480); // 'http://lorempixel.com/640/480/'
    $generate->imageUrl($width, $height, 'cats');     // 'http://lorempixel.com/800/600/cats/'
    $generate->imageUrl($width, $height, 'cats', true, 'Faker'); // 'http://lorempixel.com/800/400/cats/Faker'
    $generate->imageUrl($width, $height, 'cats', true, 'Faker', true); // 'http://lorempixel.com/gray/800/400/cats/Faker/' Monochrome image
    $generate->image($dir = '/tmp', $width = 640, $height = 480); // '/tmp/13b73edae8443990be1aa8f1a483bc27.jpg'
    $generate->image($dir, $width, $height, 'cats');  // 'tmp/13b73edae8443990be1aa8f1a483bc27.jpg' it's a cat!
    $generate->image($dir, $width, $height, 'cats', false); // '13b73edae8443990be1aa8f1a483bc27.jpg' it's a filename without path
    $generate->image($dir, $width, $height, 'cats', true, false); // it's a no randomize images (default: `true`)
    $generate->image($dir, $width, $height, 'cats', true, true, 'Faker'); // 'tmp/13b73edae8443990be1aa8f1a483bc27.jpg' it's a cat with 'Faker' text. Default, `null`.
```
##### `Uuid  generator`
```php
    $generate->uuid;                   // '7e57d004-2b97-0e7a-b45f-5387367791cd'
```

##### `Barcode generator`
```php
    $generate->ean13;         // '4006381333931'
    $generate->ean8;           // '73513537'
    $generate->isbn13;         // '9790404436093'
    $generate->isbn10;         // '4881416324'
```

##### `Miscellaneous generator`
```php
    $generate->boolean; // false
    $generate->boolean($chanceOfGettingTrue = 50); // true
    $generate->md5;           // 'de99a620c50f2990e87144735cd357e7'
    $generate->sha1;          // 'f08e7f04ca1a413807ebc47551a40a20a0b4de5c'
    $generate->sha256;        // '0061e4c60dac5c1d82db0135a42e00c89ae3a333e7c26485321f24348c7e98a5'
    $generate->locale;        // en_UK
    $generate->countryCode;   // UK
    $generate->languageCode;  // en
    $generate->currencyCode;  // EUR
    $generate->emoji;         // 😁
```

##### `Biased generator`
```php
    // get a random number between 10 and 20,
    // with more chances to be close to 20
    $generate->biasedNumberBetween($min = 10, $max = 20, $function = 'sqrt');
```

##### `HtmlLorem generator`
```php
    //Generate HTML document which is no more than 2 levels deep, and no more than 3 elements wide at any level.
    $generate->randomHtml(2,3);   // <html> content .... </html>
```

# You can also run migration and seeding by using Dev Management Tool

Before use this url make sure your app is in development mode in `.env` file

```
http://{app_url}/dev/ui
```
<p>
<img src="https://github.com/jahwin/wecodefy/blob/v1.0/assets/images/dev_database_section.png" width="600">
</p>

# Lets talk about some important functionality

## Cookies
If you want to use cookies you have to use `system\library\Cookies` namespace.

Cookies important functions:

```php
// Allow to add cookie
Cookies::add($key, $value, $day);
// Allow to get cookie
Cookies::get($key)
// Allow to delete cookie
Cookies::delete($key)
// Allow to check if cookie is enabled
Cookies::check()
```

## Session
If you want to use session you have to use `system\library\Session` namespace.

Session important functions:

```php
// Allow to start session
Session::init();
// Allow to create session item
Session::add($key, $value);
// Allow to get session item
Session::get($key);
// Allow to delete session item
Session::delete($key);
// Allow to destroy all session
Session::destroy()
```

## Upload
If you want to use upload you have to use `system\library\Upload` namespace.

```php
$files = Upload::dir("/assets/uploaded/")->param("files")->randomName(true)->Start();
```

This is returned array result after upload:

```json
[{
    "name": "file_name.jpeg",
    "size": 77164,
    "type": "image/jpeg",
    "realname": "file_name.jpeg",
    "url": "http://wecodefy.test/https://github.com/jahwin/wecodefy/blob/v1.0/assets/images/file_name.jpeg"
},
{
    "name": "file_name.jpeg",
    "size": 77164,
    "type": "image/jpeg",
    "realname": "file_name.jpeg",
    "url": "http://wecodefy.test/https://github.com/jahwin/wecodefy/blob/v1.0/assets/images/file_name.jpeg"
}]
```

## Send email 
If you want to send email you have to use `system\library\Email` namespace.

```php
$email = new Email();
$email->init($host, $username, $password, $is_html = false, $security = 'ssl', $port = 465);
$email->from($email, $name);
$email->to($email, $name);
$email->template($subject, $title, $body);
$email->sendEmail();
```
## Localization 
If you want to translate your app you have to use `system\library\Lang` namespace.
First you have to config language settings in `.env` file.

```
# database or file
LANGUAGE_STORAGE = file

# Default locale
DEFAULT_LANGUAGE = en-us

#Allow for auto save in file or database in default locale
LANGUAGE_AUTO_SAVE = true
```

How to change locale?

```php
 Lang::init()->setLocale('fr-fr');
```
<p>
   This the way of making translation in your different keywords:
<p>

```php
// In php functions
$translated = Lang::init()->Trans($text)
```

```html
<!-- In twig templating -->

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Wecodefy app</title>
		<base href="{{'APP_URL' | env}}">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        </head>

	<body>
      <h1>{{'Hello' | translate}}</h1>
    </body>
</html>
```

All keyword will be saved automatically in default locale file or database based on your localization settings.

```php
// In file
 <?php
$keywords = array(
    'Hello' => 'Hello',
    'ToDay' => 'ToDay',
    'Morning' => 'Morning',
    'Night' => 'Night',
);
```

In database all keywords will be saved in `lang-keywords` table.

##### Getting language index

```php
 $langList = Lang::init()->getLangIndex();
```
This will return array of languages fund in `config/lang.php` or database based on `LANGUAGE_STORAGE` setting.

## Cors
Now you can set your cors settings in `config/cors.php`

```php
$cols->init([
    'allowedOrigins' => '*',
    'allowedMethods' => 'POST, DELETE, PUT, PATCH, OPTIONS',
    'allowedHeaders' => 'Content-Type, Authorization, X-Requested-With',
    'maxAge' => 10000,
]);
```
## FlashData
This is an option of storing data and get destroyed after use. use `system\library\FlashData` namespace.

```php
// Allow to add flashdata
FlashData::Add($key, $data);

// Get that data and get destroyed
FlashData::Get($key);
```

# Some useful functions

## Urls
`url()` function will return a `Url` object which will return a `string`. but 
contains all the useful helpers methods in the `Url` class like `contains`, `getParam`, `getAbsoluteUrl`. 

```php
# output: /current-url
url();

# we check if the current url contains the `/api` part.
if(url()->contains('/api')) {
    // ... do stuff
}
# Grab the query-string parameter id from the current-url.
$id = url()->getParam('id');

# Get the absolute url for the current url.
$absoluteUrl = url()->getAbsoluteUrl();
```


## Input & parameters

### Get single parameter value

```input($index, $defaultValue, ...$methods);```

To quickly get a value from a parameter, you can use the `input` helper function.

This will automatically trim the value and ensure that it's not empty. If it's empty the `$defaultValue` will be returned instead.

**Note:** 
This function returns a `string` unless the parameters are grouped together, in that case it will return an `array` of values.

**Example:**

This example matches both POST and GET request-methods and if name is empty the default-value "Guest" will be returned. 

```php
$name = input('name', 'Guest', 'post', 'get');
```

### Get parameter object

When dealing with file-uploads it can be useful to retrieve the raw parameter object.

**Search for object with default-value across multiple or specific request-methods:**

The example below will return an `InputItem` object if the parameter was found or return the `$defaultValue`. If parameters are grouped, it will return an array of `InputItem` objects.

```php
$object = input()->find($index, $defaultValue = null, ...$methods);
```

**Getting specific `$_GET` parameter as `InputItem` object:**

The example below will return an `InputItem` object if the parameter was found or return the `$defaultValue`. If parameters are grouped, it will return an array of `InputItem` objects.

```php
$object = input()->get($index, $defaultValue = null);
```

**Getting specific `$_POST` parameter as `InputItem` object:**

The example below will return an `InputItem` object if the parameter was found or return the `$defaultValue`. If parameters are grouped, it will return an array of `InputItem` objects.

```php
$object = input()->post($index, $defaultValue = null);
```

**Getting specific `$_FILE` parameter as `InputFile` object:**

The example below will return an `InputFile` object if the parameter was found or return the `$defaultValue`. If parameters are grouped, it will return an array of `InputFile` objects.

```php
$object = input()->file($index, $defaultValue = null);
```

### Get all parameters

```php
# Get all
$values = input()->all();

# Only match specific keys
$values = input()->all([
    'company_name',
    'user_id'
]);
```


## Cut text

```php
cutText($string, $length, $more_icon = '...');
```

## is Contain
Check if string contains some some text

```php
isContain($string, $prefix);
```

## Paginate

```php
paginate($data, $number_of_items_to_show, $page_number);
```

## getToken
This method allow to generate number or string token

```php
getToken($length = 8, $type = 'string'); // or number
```

## Responce
Here you can provide your response with http code

```php
responce($data,$http_code);
```

## .env
Get env variables

```php
_env($value,$default_value)
```

# Let's talk about JS framework

## `Angular`
You can start using this angular framework in the following location:
```
scheme/angular
```
So then you can start code your app. if you want to generate some components or services you can use Dev management tool.
before use this url make sure your app is in development mode [.env]
```
http://{app_url}/dev/ui
```
<p>
<img src="https://github.com/jahwin/wecodefy/blob/v1.0/assets/images/angular_dev_tool.png" width="600">
</p>

For more information about using angular js framework refer to <a target="_brank" href="https://angular.io/">this</a>

## `Vue`
You can start using this Vue framework in the following location:
```
scheme/vue
```
So then you can start code your app. if you want to generate some components you can use Dev management tool.
before use this url make sure your app is in development mode [.env]

```
http://{app_url}/dev/ui
```

<p>
<img src="https://github.com/jahwin/wecodefy/blob/v1.0/assets/images/vue_dev_tool.png" width="600">
</p>

For more information about using vue js framework refer to <a target="_brank" href="https://vuejs.org/v2/guide/">this link</a>


## `React`
You can start using this React framework in the following location:
```
scheme/react
```
So then you can start code your app. if you want to generate some components you can use Dev management tool.
before use this url make sure your app is in development mode [.env]
```
http://{app_url}/dev/ui
```
<p>
<img src="https://github.com/jahwin/wecodefy/blob/v1.0/assets/images/react_dev_tool.png" width="600">
</p>

For more information about using react js framework refer to <a target="_brank" href="https://www.w3schools.com/REACT/react_components.asp">this link</a>

## JSBuild 
JSBuild will combine both react, vue, angular into a single bundle based on `webpack.mix.js` config, you can separate base on what you want.
Here is some important commands, run those commands in root of your project.

```
# Hot build
npm run watch

# Build for development
npm run dev

# Build for production
npm run prod
```

You can also build for production without command by using Dev Management Tool.
<p>
<img src="https://github.com/jahwin/wecodefy/blob/v1.0/assets/images/js_build_dev_tool.png" width="600">
</p>

---
Thank you for taking your time and read all of this, Some documentation content come from outside packages docs and other websites.<br>
Have good job. Make your job done and fast.

----
### Contributing

You are welcome to make contribution on this framework, Let make better wold by making most powerful and beautiful web application.


### Security Vulnerabilities

If you discover a security vulnerability within wecodefy, please send an e-mail to Abe Jahwin via [ajahwin@gmail.com](mailto:ajahwin@gmail.com). All security vulnerabilities will be promptly addressed.

### License

Wecodefy framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).