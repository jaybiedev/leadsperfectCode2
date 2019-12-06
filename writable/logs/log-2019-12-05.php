<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2019-12-05 06:57:46 --> Call to undefined method App\Libraries\View::addJavaScript()
#0 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Standards->forms()
#1 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Standards))
#2 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#3 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#4 {main}
CRITICAL - 2019-12-05 06:58:40 --> Call to undefined method App\Libraries\View::addJavaScript()
#0 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Standards->forms()
#1 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Standards))
#2 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#3 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#4 {main}
CRITICAL - 2019-12-05 06:59:23 --> Call to undefined method App\Libraries\View::addJavaScript()
#0 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Standards->forms()
#1 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Standards))
#2 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#3 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#4 {main}
CRITICAL - 2019-12-05 07:12:27 --> Function name must be a string
#0 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Standards->forms()
#1 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Standards))
#2 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#3 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#4 {main}
CRITICAL - 2019-12-05 07:38:56 --> syntax error, unexpected '.'
#0 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Autoloader/Autoloader.php(296): CodeIgniter\Autoloader\Autoloader->requireFile('/opt/lampp/htdo...')
#1 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Autoloader/Autoloader.php(258): CodeIgniter\Autoloader\Autoloader->loadInNamespace('App\\Libraries\\V...')
#2 [internal function]: CodeIgniter\Autoloader\Autoloader->loadClass('App\\Libraries\\V...')
#3 /opt/lampp/htdocs/firstproject/app/Controllers/BaseController.php(40): spl_autoload_call('App\\Libraries\\V...')
#4 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(823): App\Controllers\BaseController->initController(Object(CodeIgniter\HTTP\IncomingRequest), Object(CodeIgniter\HTTP\Response), Object(CodeIgniter\Log\Logger))
#5 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(333): CodeIgniter\CodeIgniter->createController()
#6 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#7 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#8 {main}
CRITICAL - 2019-12-05 07:40:47 --> Invalid argument supplied for foreach()
#0 /opt/lampp/htdocs/firstproject/app/Libraries/View.php(108): CodeIgniter\Debug\Exceptions->errorHandler(2, 'Invalid argumen...', '/opt/lampp/htdo...', 108, Array)
#1 /opt/lampp/htdocs/firstproject/app/Libraries/View.php(52): App\Libraries\View->getStylesheets()
#2 /opt/lampp/htdocs/firstproject/app/Controllers/Standards.php(28): App\Libraries\View->render('Standards/form....', Array)
#3 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Standards->forms()
#4 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Standards))
#5 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#6 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#7 {main}
CRITICAL - 2019-12-05 07:41:30 --> Invalid argument supplied for foreach()
#0 /opt/lampp/htdocs/firstproject/app/Libraries/View.php(110): CodeIgniter\Debug\Exceptions->errorHandler(2, 'Invalid argumen...', '/opt/lampp/htdo...', 110, Array)
#1 /opt/lampp/htdocs/firstproject/app/Libraries/View.php(52): App\Libraries\View->getStylesheets()
#2 /opt/lampp/htdocs/firstproject/app/Controllers/Standards.php(28): App\Libraries\View->render('Standards/form....', Array)
#3 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Standards->forms()
#4 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Standards))
#5 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#6 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#7 {main}
CRITICAL - 2019-12-05 07:41:43 --> Invalid argument supplied for foreach()
#0 /opt/lampp/htdocs/firstproject/app/Libraries/View.php(110): CodeIgniter\Debug\Exceptions->errorHandler(2, 'Invalid argumen...', '/opt/lampp/htdo...', 110, Array)
#1 /opt/lampp/htdocs/firstproject/app/Libraries/View.php(52): App\Libraries\View->getStylesheets()
#2 /opt/lampp/htdocs/firstproject/app/Controllers/Standards.php(28): App\Libraries\View->render('Standards/form....', Array)
#3 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Standards->forms()
#4 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Standards))
#5 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#6 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#7 {main}
CRITICAL - 2019-12-05 07:42:14 --> Invalid argument supplied for foreach()
#0 /opt/lampp/htdocs/firstproject/app/Libraries/View.php(111): CodeIgniter\Debug\Exceptions->errorHandler(2, 'Invalid argumen...', '/opt/lampp/htdo...', 111, Array)
#1 /opt/lampp/htdocs/firstproject/app/Libraries/View.php(52): App\Libraries\View->getStylesheets()
#2 /opt/lampp/htdocs/firstproject/app/Controllers/Standards.php(28): App\Libraries\View->render('Standards/form....', Array)
#3 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Standards->forms()
#4 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Standards))
#5 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#6 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#7 {main}
CRITICAL - 2019-12-05 07:42:46 --> array_walk() expects parameter 1 to be array, null given
#0 [internal function]: CodeIgniter\Debug\Exceptions->errorHandler(2, 'array_walk() ex...', '/opt/lampp/htdo...', 128, Array)
#1 /opt/lampp/htdocs/firstproject/app/Libraries/View.php(128): array_walk(NULL, Object(Closure))
#2 /opt/lampp/htdocs/firstproject/app/Libraries/View.php(52): App\Libraries\View->getStylesheets()
#3 /opt/lampp/htdocs/firstproject/app/Controllers/Standards.php(28): App\Libraries\View->render('Standards/form....', Array)
#4 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Standards->forms()
#5 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Standards))
#6 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#7 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#8 {main}
CRITICAL - 2019-12-05 20:38:39 --> Class 'App\Models\UserModel' not found
#0 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Finance\User->index()
#1 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Finance\User))
#2 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#3 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#4 {main}
CRITICAL - 2019-12-05 20:39:14 --> Class 'App\Models\UserModel' not found
#0 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Finance\User->index()
#1 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Finance\User))
#2 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#3 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#4 {main}
CRITICAL - 2019-12-05 20:39:39 --> Class 'App\Models\Finance\UserModel' not found
#0 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Finance\User->index()
#1 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Finance\User))
#2 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#3 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#4 {main}
CRITICAL - 2019-12-05 20:39:40 --> Class 'App\Models\Finance\UserModel' not found
#0 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Finance\User->index()
#1 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Finance\User))
#2 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#3 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#4 {main}
CRITICAL - 2019-12-05 20:39:40 --> Class 'App\Models\Finance\UserModel' not found
#0 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Finance\User->index()
#1 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Finance\User))
#2 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#3 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#4 {main}
CRITICAL - 2019-12-05 20:52:58 --> Class 'App\Models\Common\ContentModel' not found
#0 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Home->index()
#1 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Home))
#2 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#3 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#4 {main}
CRITICAL - 2019-12-05 20:55:23 --> syntax error, unexpected '';' (T_CONSTANT_ENCAPSED_STRING), expecting ',' or ';'
#0 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Autoloader/Autoloader.php(296): CodeIgniter\Autoloader\Autoloader->requireFile('/opt/lampp/htdo...')
#1 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Autoloader/Autoloader.php(258): CodeIgniter\Autoloader\Autoloader->loadInNamespace('App\\Models\\Comm...')
#2 [internal function]: CodeIgniter\Autoloader\Autoloader->loadClass('App\\Models\\Comm...')
#3 /opt/lampp/htdocs/firstproject/app/Controllers/Home.php(9): spl_autoload_call('App\\Models\\Comm...')
#4 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Home->index()
#5 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Home))
#6 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#7 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#8 {main}
CRITICAL - 2019-12-05 21:06:20 --> pg_query(): Query failed: ERROR:  column &quot;content_type&quot; does not exist
LINE 3: WHERE &quot;content_type&quot; = 'HTML'
              ^
HINT:  Perhaps you meant to reference the column &quot;content.contet_type&quot;.
#0 [internal function]: CodeIgniter\Debug\Exceptions->errorHandler(2, 'pg_query(): Que...', '/opt/lampp/htdo...', 194, Array)
#1 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/Postgre/Connection.php(194): pg_query(Resource id #110, 'SELECT *\nFROM "...')
#2 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseConnection.php(738): CodeIgniter\Database\Postgre\Connection->execute('SELECT *\nFROM "...')
#3 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseConnection.php(666): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *\nFROM "...')
#4 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseBuilder.php(1783): CodeIgniter\Database\BaseConnection->query('SELECT *\nFROM "...', Array, false)
#5 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Model.php(474): CodeIgniter\Database\BaseBuilder->get()
#6 /opt/lampp/htdocs/firstproject/app/Controllers/Home.php(12): CodeIgniter\Model->first()
#7 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Home->index()
#8 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Home))
#9 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#10 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#11 {main}
CRITICAL - 2019-12-05 21:06:21 --> pg_query(): Query failed: ERROR:  column &quot;content_type&quot; does not exist
LINE 3: WHERE &quot;content_type&quot; = 'HTML'
              ^
HINT:  Perhaps you meant to reference the column &quot;content.contet_type&quot;.
#0 [internal function]: CodeIgniter\Debug\Exceptions->errorHandler(2, 'pg_query(): Que...', '/opt/lampp/htdo...', 194, Array)
#1 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/Postgre/Connection.php(194): pg_query(Resource id #110, 'SELECT *\nFROM "...')
#2 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseConnection.php(738): CodeIgniter\Database\Postgre\Connection->execute('SELECT *\nFROM "...')
#3 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseConnection.php(666): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *\nFROM "...')
#4 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseBuilder.php(1783): CodeIgniter\Database\BaseConnection->query('SELECT *\nFROM "...', Array, false)
#5 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Model.php(474): CodeIgniter\Database\BaseBuilder->get()
#6 /opt/lampp/htdocs/firstproject/app/Controllers/Home.php(12): CodeIgniter\Model->first()
#7 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Home->index()
#8 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Home))
#9 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#10 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#11 {main}
CRITICAL - 2019-12-05 21:06:26 --> pg_query(): Query failed: ERROR:  column &quot;content_type&quot; does not exist
LINE 3: WHERE &quot;content_type&quot; = 'HTML'
              ^
HINT:  Perhaps you meant to reference the column &quot;content.contet_type&quot;.
#0 [internal function]: CodeIgniter\Debug\Exceptions->errorHandler(2, 'pg_query(): Que...', '/opt/lampp/htdo...', 194, Array)
#1 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/Postgre/Connection.php(194): pg_query(Resource id #110, 'SELECT *\nFROM "...')
#2 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseConnection.php(738): CodeIgniter\Database\Postgre\Connection->execute('SELECT *\nFROM "...')
#3 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseConnection.php(666): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *\nFROM "...')
#4 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseBuilder.php(1783): CodeIgniter\Database\BaseConnection->query('SELECT *\nFROM "...', Array, false)
#5 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Model.php(474): CodeIgniter\Database\BaseBuilder->get()
#6 /opt/lampp/htdocs/firstproject/app/Controllers/Home.php(11): CodeIgniter\Model->first()
#7 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Home->index()
#8 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Home))
#9 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#10 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#11 {main}
CRITICAL - 2019-12-05 21:06:27 --> pg_query(): Query failed: ERROR:  column &quot;content_type&quot; does not exist
LINE 3: WHERE &quot;content_type&quot; = 'HTML'
              ^
HINT:  Perhaps you meant to reference the column &quot;content.contet_type&quot;.
#0 [internal function]: CodeIgniter\Debug\Exceptions->errorHandler(2, 'pg_query(): Que...', '/opt/lampp/htdo...', 194, Array)
#1 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/Postgre/Connection.php(194): pg_query(Resource id #110, 'SELECT *\nFROM "...')
#2 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseConnection.php(738): CodeIgniter\Database\Postgre\Connection->execute('SELECT *\nFROM "...')
#3 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseConnection.php(666): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *\nFROM "...')
#4 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseBuilder.php(1783): CodeIgniter\Database\BaseConnection->query('SELECT *\nFROM "...', Array, false)
#5 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Model.php(474): CodeIgniter\Database\BaseBuilder->get()
#6 /opt/lampp/htdocs/firstproject/app/Controllers/Home.php(11): CodeIgniter\Model->first()
#7 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Home->index()
#8 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Home))
#9 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#10 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#11 {main}
CRITICAL - 2019-12-05 21:06:27 --> pg_query(): Query failed: ERROR:  column &quot;content_type&quot; does not exist
LINE 3: WHERE &quot;content_type&quot; = 'HTML'
              ^
HINT:  Perhaps you meant to reference the column &quot;content.contet_type&quot;.
#0 [internal function]: CodeIgniter\Debug\Exceptions->errorHandler(2, 'pg_query(): Que...', '/opt/lampp/htdo...', 194, Array)
#1 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/Postgre/Connection.php(194): pg_query(Resource id #110, 'SELECT *\nFROM "...')
#2 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseConnection.php(738): CodeIgniter\Database\Postgre\Connection->execute('SELECT *\nFROM "...')
#3 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseConnection.php(666): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *\nFROM "...')
#4 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseBuilder.php(1783): CodeIgniter\Database\BaseConnection->query('SELECT *\nFROM "...', Array, false)
#5 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Model.php(474): CodeIgniter\Database\BaseBuilder->get()
#6 /opt/lampp/htdocs/firstproject/app/Controllers/Home.php(11): CodeIgniter\Model->first()
#7 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Home->index()
#8 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Home))
#9 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#10 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#11 {main}
CRITICAL - 2019-12-05 21:07:25 --> pg_query(): Query failed: ERROR:  column &quot;content_type&quot; does not exist
LINE 3: WHERE &quot;content_type&quot; = 'HTML'
              ^
HINT:  Perhaps you meant to reference the column &quot;content.contet_type&quot;.
#0 [internal function]: CodeIgniter\Debug\Exceptions->errorHandler(2, 'pg_query(): Que...', '/opt/lampp/htdo...', 194, Array)
#1 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/Postgre/Connection.php(194): pg_query(Resource id #110, 'SELECT *\nFROM "...')
#2 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseConnection.php(738): CodeIgniter\Database\Postgre\Connection->execute('SELECT *\nFROM "...')
#3 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseConnection.php(666): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *\nFROM "...')
#4 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseBuilder.php(1783): CodeIgniter\Database\BaseConnection->query('SELECT *\nFROM "...', Array, false)
#5 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Model.php(474): CodeIgniter\Database\BaseBuilder->get()
#6 /opt/lampp/htdocs/firstproject/app/Controllers/Home.php(11): CodeIgniter\Model->first()
#7 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Home->index()
#8 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Home))
#9 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#10 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#11 {main}
CRITICAL - 2019-12-05 21:07:26 --> pg_query(): Query failed: ERROR:  column &quot;content_type&quot; does not exist
LINE 3: WHERE &quot;content_type&quot; = 'HTML'
              ^
HINT:  Perhaps you meant to reference the column &quot;content.contet_type&quot;.
#0 [internal function]: CodeIgniter\Debug\Exceptions->errorHandler(2, 'pg_query(): Que...', '/opt/lampp/htdo...', 194, Array)
#1 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/Postgre/Connection.php(194): pg_query(Resource id #110, 'SELECT *\nFROM "...')
#2 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseConnection.php(738): CodeIgniter\Database\Postgre\Connection->execute('SELECT *\nFROM "...')
#3 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseConnection.php(666): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *\nFROM "...')
#4 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseBuilder.php(1783): CodeIgniter\Database\BaseConnection->query('SELECT *\nFROM "...', Array, false)
#5 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Model.php(474): CodeIgniter\Database\BaseBuilder->get()
#6 /opt/lampp/htdocs/firstproject/app/Controllers/Home.php(11): CodeIgniter\Model->first()
#7 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Home->index()
#8 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Home))
#9 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#10 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#11 {main}
CRITICAL - 2019-12-05 21:07:48 --> pg_query(): Query failed: ERROR:  column &quot;content_type&quot; does not exist
LINE 3: WHERE &quot;content_type&quot; = 'HTML'
              ^
HINT:  Perhaps you meant to reference the column &quot;content.contet_type&quot;.
#0 [internal function]: CodeIgniter\Debug\Exceptions->errorHandler(2, 'pg_query(): Que...', '/opt/lampp/htdo...', 194, Array)
#1 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/Postgre/Connection.php(194): pg_query(Resource id #110, 'SELECT *\nFROM "...')
#2 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseConnection.php(738): CodeIgniter\Database\Postgre\Connection->execute('SELECT *\nFROM "...')
#3 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseConnection.php(666): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *\nFROM "...')
#4 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseBuilder.php(1783): CodeIgniter\Database\BaseConnection->query('SELECT *\nFROM "...', Array, false)
#5 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Model.php(474): CodeIgniter\Database\BaseBuilder->get()
#6 /opt/lampp/htdocs/firstproject/app/Controllers/Home.php(10): CodeIgniter\Model->first()
#7 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Home->index()
#8 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Home))
#9 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#10 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#11 {main}
CRITICAL - 2019-12-05 21:08:05 --> pg_query(): Query failed: ERROR:  column &quot;content_type&quot; does not exist
LINE 3: WHERE &quot;content_type&quot; = 'HTML'
              ^
HINT:  Perhaps you meant to reference the column &quot;content.contet_type&quot;.
#0 [internal function]: CodeIgniter\Debug\Exceptions->errorHandler(2, 'pg_query(): Que...', '/opt/lampp/htdo...', 194, Array)
#1 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/Postgre/Connection.php(194): pg_query(Resource id #110, 'SELECT *\nFROM "...')
#2 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseConnection.php(738): CodeIgniter\Database\Postgre\Connection->execute('SELECT *\nFROM "...')
#3 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseConnection.php(666): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *\nFROM "...')
#4 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseBuilder.php(1783): CodeIgniter\Database\BaseConnection->query('SELECT *\nFROM "...', Array, false)
#5 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Model.php(437): CodeIgniter\Database\BaseBuilder->get()
#6 /opt/lampp/htdocs/firstproject/app/Controllers/Home.php(10): CodeIgniter\Model->findAll()
#7 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Home->index()
#8 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Home))
#9 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#10 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#11 {main}
CRITICAL - 2019-12-05 21:08:06 --> pg_query(): Query failed: ERROR:  column &quot;content_type&quot; does not exist
LINE 3: WHERE &quot;content_type&quot; = 'HTML'
              ^
HINT:  Perhaps you meant to reference the column &quot;content.contet_type&quot;.
#0 [internal function]: CodeIgniter\Debug\Exceptions->errorHandler(2, 'pg_query(): Que...', '/opt/lampp/htdo...', 194, Array)
#1 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/Postgre/Connection.php(194): pg_query(Resource id #110, 'SELECT *\nFROM "...')
#2 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseConnection.php(738): CodeIgniter\Database\Postgre\Connection->execute('SELECT *\nFROM "...')
#3 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseConnection.php(666): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *\nFROM "...')
#4 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseBuilder.php(1783): CodeIgniter\Database\BaseConnection->query('SELECT *\nFROM "...', Array, false)
#5 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Model.php(437): CodeIgniter\Database\BaseBuilder->get()
#6 /opt/lampp/htdocs/firstproject/app/Controllers/Home.php(10): CodeIgniter\Model->findAll()
#7 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Home->index()
#8 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Home))
#9 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#10 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#11 {main}
CRITICAL - 2019-12-05 21:08:06 --> pg_query(): Query failed: ERROR:  column &quot;content_type&quot; does not exist
LINE 3: WHERE &quot;content_type&quot; = 'HTML'
              ^
HINT:  Perhaps you meant to reference the column &quot;content.contet_type&quot;.
#0 [internal function]: CodeIgniter\Debug\Exceptions->errorHandler(2, 'pg_query(): Que...', '/opt/lampp/htdo...', 194, Array)
#1 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/Postgre/Connection.php(194): pg_query(Resource id #110, 'SELECT *\nFROM "...')
#2 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseConnection.php(738): CodeIgniter\Database\Postgre\Connection->execute('SELECT *\nFROM "...')
#3 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseConnection.php(666): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *\nFROM "...')
#4 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseBuilder.php(1783): CodeIgniter\Database\BaseConnection->query('SELECT *\nFROM "...', Array, false)
#5 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Model.php(437): CodeIgniter\Database\BaseBuilder->get()
#6 /opt/lampp/htdocs/firstproject/app/Controllers/Home.php(10): CodeIgniter\Model->findAll()
#7 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Home->index()
#8 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Home))
#9 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#10 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#11 {main}
CRITICAL - 2019-12-05 21:08:06 --> pg_query(): Query failed: ERROR:  column &quot;content_type&quot; does not exist
LINE 3: WHERE &quot;content_type&quot; = 'HTML'
              ^
HINT:  Perhaps you meant to reference the column &quot;content.contet_type&quot;.
#0 [internal function]: CodeIgniter\Debug\Exceptions->errorHandler(2, 'pg_query(): Que...', '/opt/lampp/htdo...', 194, Array)
#1 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/Postgre/Connection.php(194): pg_query(Resource id #110, 'SELECT *\nFROM "...')
#2 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseConnection.php(738): CodeIgniter\Database\Postgre\Connection->execute('SELECT *\nFROM "...')
#3 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseConnection.php(666): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *\nFROM "...')
#4 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseBuilder.php(1783): CodeIgniter\Database\BaseConnection->query('SELECT *\nFROM "...', Array, false)
#5 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Model.php(437): CodeIgniter\Database\BaseBuilder->get()
#6 /opt/lampp/htdocs/firstproject/app/Controllers/Home.php(10): CodeIgniter\Model->findAll()
#7 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Home->index()
#8 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Home))
#9 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#10 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#11 {main}
CRITICAL - 2019-12-05 21:08:39 --> pg_query(): Query failed: ERROR:  column &quot;content_type&quot; does not exist
LINE 3: WHERE &quot;content_type&quot; = 'HTML'
              ^
HINT:  Perhaps you meant to reference the column &quot;content.contet_type&quot;.
#0 [internal function]: CodeIgniter\Debug\Exceptions->errorHandler(2, 'pg_query(): Que...', '/opt/lampp/htdo...', 194, Array)
#1 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/Postgre/Connection.php(194): pg_query(Resource id #110, 'SELECT *\nFROM "...')
#2 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseConnection.php(738): CodeIgniter\Database\Postgre\Connection->execute('SELECT *\nFROM "...')
#3 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseConnection.php(666): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *\nFROM "...')
#4 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseBuilder.php(1783): CodeIgniter\Database\BaseConnection->query('SELECT *\nFROM "...', Array, false)
#5 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Model.php(474): CodeIgniter\Database\BaseBuilder->get()
#6 /opt/lampp/htdocs/firstproject/app/Controllers/Home.php(10): CodeIgniter\Model->first()
#7 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Home->index()
#8 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Home))
#9 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#10 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#11 {main}
CRITICAL - 2019-12-05 21:20:58 --> pg_query(): Query failed: ERROR:  column &quot;content_type&quot; does not exist
LINE 3: WHERE &quot;content_type&quot; = 'HTML'
              ^
HINT:  Perhaps you meant to reference the column &quot;content.contet_type&quot;.
#0 [internal function]: CodeIgniter\Debug\Exceptions->errorHandler(2, 'pg_query(): Que...', '/opt/lampp/htdo...', 194, Array)
#1 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/Postgre/Connection.php(194): pg_query(Resource id #110, 'SELECT *\nFROM "...')
#2 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseConnection.php(738): CodeIgniter\Database\Postgre\Connection->execute('SELECT *\nFROM "...')
#3 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseConnection.php(666): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *\nFROM "...')
#4 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseBuilder.php(1783): CodeIgniter\Database\BaseConnection->query('SELECT *\nFROM "...', Array, false)
#5 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Model.php(474): CodeIgniter\Database\BaseBuilder->get()
#6 /opt/lampp/htdocs/firstproject/app/Controllers/Home.php(10): CodeIgniter\Model->first()
#7 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Home->index()
#8 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Home))
#9 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#10 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#11 {main}
CRITICAL - 2019-12-05 21:21:14 --> pg_query(): Query failed: ERROR:  column &quot;content_type&quot; does not exist
LINE 3: WHERE &quot;content_type&quot; = 'HTML'
              ^
HINT:  Perhaps you meant to reference the column &quot;content.contet_type&quot;.
#0 [internal function]: CodeIgniter\Debug\Exceptions->errorHandler(2, 'pg_query(): Que...', '/opt/lampp/htdo...', 194, Array)
#1 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/Postgre/Connection.php(194): pg_query(Resource id #110, 'SELECT *\nFROM "...')
#2 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseConnection.php(738): CodeIgniter\Database\Postgre\Connection->execute('SELECT *\nFROM "...')
#3 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseConnection.php(666): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *\nFROM "...')
#4 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseBuilder.php(1783): CodeIgniter\Database\BaseConnection->query('SELECT *\nFROM "...', Array, false)
#5 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Model.php(474): CodeIgniter\Database\BaseBuilder->get()
#6 /opt/lampp/htdocs/firstproject/app/Controllers/Home.php(10): CodeIgniter\Model->first()
#7 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Home->index()
#8 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Home))
#9 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#10 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#11 {main}
CRITICAL - 2019-12-05 21:21:14 --> pg_query(): Query failed: ERROR:  column &quot;content_type&quot; does not exist
LINE 3: WHERE &quot;content_type&quot; = 'HTML'
              ^
HINT:  Perhaps you meant to reference the column &quot;content.contet_type&quot;.
#0 [internal function]: CodeIgniter\Debug\Exceptions->errorHandler(2, 'pg_query(): Que...', '/opt/lampp/htdo...', 194, Array)
#1 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/Postgre/Connection.php(194): pg_query(Resource id #110, 'SELECT *\nFROM "...')
#2 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseConnection.php(738): CodeIgniter\Database\Postgre\Connection->execute('SELECT *\nFROM "...')
#3 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseConnection.php(666): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *\nFROM "...')
#4 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseBuilder.php(1783): CodeIgniter\Database\BaseConnection->query('SELECT *\nFROM "...', Array, false)
#5 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Model.php(474): CodeIgniter\Database\BaseBuilder->get()
#6 /opt/lampp/htdocs/firstproject/app/Controllers/Home.php(10): CodeIgniter\Model->first()
#7 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Home->index()
#8 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Home))
#9 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#10 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#11 {main}
CRITICAL - 2019-12-05 21:22:05 --> Call to undefined method CodeIgniter\Database\Postgre\Builder::getFirstRow()
#0 /opt/lampp/htdocs/firstproject/app/Controllers/Home.php(10): CodeIgniter\Model->first()
#1 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Home->index()
#2 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Home))
#3 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2019-12-05 21:24:14 --> pg_query(): Query failed: ERROR:  column &quot;content_type&quot; does not exist
LINE 3: WHERE &quot;content_type&quot; = 'HTML'
              ^
HINT:  Perhaps you meant to reference the column &quot;content.contet_type&quot;.
#0 [internal function]: CodeIgniter\Debug\Exceptions->errorHandler(2, 'pg_query(): Que...', '/opt/lampp/htdo...', 194, Array)
#1 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/Postgre/Connection.php(194): pg_query(Resource id #110, 'SELECT *\nFROM "...')
#2 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseConnection.php(738): CodeIgniter\Database\Postgre\Connection->execute('SELECT *\nFROM "...')
#3 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseConnection.php(666): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *\nFROM "...')
#4 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseBuilder.php(1783): CodeIgniter\Database\BaseConnection->query('SELECT *\nFROM "...', Array, false)
#5 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Model.php(474): CodeIgniter\Database\BaseBuilder->get()
#6 /opt/lampp/htdocs/firstproject/app/Controllers/Home.php(10): CodeIgniter\Model->first()
#7 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Home->index()
#8 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Home))
#9 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#10 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#11 {main}
CRITICAL - 2019-12-05 21:32:16 --> syntax error, unexpected '->' (T_OBJECT_OPERATOR), expecting ')'
#0 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Autoloader/Autoloader.php(296): CodeIgniter\Autoloader\Autoloader->requireFile('/opt/lampp/htdo...')
#1 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Autoloader/Autoloader.php(258): CodeIgniter\Autoloader\Autoloader->loadInNamespace('CodeIgniter\\Dat...')
#2 [internal function]: CodeIgniter\Autoloader\Autoloader->loadClass('CodeIgniter\\Dat...')
#3 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/Postgre/Builder.php(47): spl_autoload_call('CodeIgniter\\Dat...')
#4 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Autoloader/Autoloader.php(365): require_once('/opt/lampp/htdo...')
#5 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Autoloader/Autoloader.php(296): CodeIgniter\Autoloader\Autoloader->requireFile('/opt/lampp/htdo...')
#6 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Autoloader/Autoloader.php(258): CodeIgniter\Autoloader\Autoloader->loadInNamespace('CodeIgniter\\Dat...')
#7 [internal function]: CodeIgniter\Autoloader\Autoloader->loadClass('CodeIgniter\\Dat...')
#8 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseConnection.php(974): spl_autoload_call('CodeIgniter\\Dat...')
#9 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Model.php(1182): CodeIgniter\Database\BaseConnection->table('content')
#10 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Model.php(1673): CodeIgniter\Model->builder()
#11 /opt/lampp/htdocs/firstproject/app/Controllers/Home.php(10): CodeIgniter\Model->__call('where', Array)
#12 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Home->index()
#13 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Home))
#14 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#15 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#16 {main}
CRITICAL - 2019-12-05 21:32:30 --> pg_query(): Query failed: ERROR:  column &quot;content_type&quot; does not exist
LINE 3: WHERE &quot;content_type&quot; = 'HTML'
              ^
HINT:  Perhaps you meant to reference the column &quot;content.contet_type&quot;.
#0 [internal function]: CodeIgniter\Debug\Exceptions->errorHandler(2, 'pg_query(): Que...', '/opt/lampp/htdo...', 194, Array)
#1 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/Postgre/Connection.php(194): pg_query(Resource id #110, 'SELECT *\nFROM "...')
#2 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseConnection.php(738): CodeIgniter\Database\Postgre\Connection->execute('SELECT *\nFROM "...')
#3 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseConnection.php(666): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *\nFROM "...')
#4 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Database/BaseBuilder.php(1781): CodeIgniter\Database\BaseConnection->query('SELECT *\nFROM "...', Array, false)
#5 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/Model.php(474): CodeIgniter\Database\BaseBuilder->get()
#6 /opt/lampp/htdocs/firstproject/app/Controllers/Home.php(10): CodeIgniter\Model->first()
#7 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Home->index()
#8 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Home))
#9 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#10 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#11 {main}
CRITICAL - 2019-12-05 22:00:22 --> Unable to load template 'file:template.tpl' in 'Common/default.tpl'
#0 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_template.php(385): Smarty_Internal_Template->render()
#1 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_runtime_inheritance.php(116): Smarty_Internal_Template->_subTemplateRender('template.tpl', NULL, NULL, 0, 3600, Array, 2, false, NULL, NULL)
#2 /opt/lampp/htdocs/firstproject/writable/views/templates_c/ae787d6353a1af3ee50e4dfa584208c1a1d9d7f9_0.file.default.tpl.php(30): Smarty_Internal_Runtime_Inheritance->endChild(Object(Smarty_Internal_Template), 'template.tpl')
#3 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_template_resource_base.php(123): content_5de9d256eee720_44937171(Object(Smarty_Internal_Template))
#4 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_template_compiled.php(114): Smarty_Template_Resource_Base->getRenderedTemplateCode(Object(Smarty_Internal_Template))
#5 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_template.php(216): Smarty_Template_Compiled->render(Object(Smarty_Internal_Template))
#6 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_templatebase.php(232): Smarty_Internal_Template->render(false, 0)
#7 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_templatebase.php(116): Smarty_Internal_TemplateBase->_execute(Object(Smarty_Internal_Template), Array, NULL, NULL, 0)
#8 /opt/lampp/htdocs/firstproject/app/Libraries/Common/View.php(74): Smarty_Internal_TemplateBase->fetch('Common/default....', Array)
#9 /opt/lampp/htdocs/firstproject/app/Controllers/Home.php(12): App\Libraries\Common\View->render('Common/default....', Array)
#10 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Home->index()
#11 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Home))
#12 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#13 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#14 {main}
CRITICAL - 2019-12-05 22:01:18 --> Unable to load template 'file:template.tpl' in 'Common/content.tpl'
#0 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_template.php(385): Smarty_Internal_Template->render()
#1 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_runtime_inheritance.php(116): Smarty_Internal_Template->_subTemplateRender('template.tpl', NULL, NULL, 0, 3600, Array, 2, false, NULL, NULL)
#2 /opt/lampp/htdocs/firstproject/writable/views/templates_c/3b4da2cf28f81043d603444675f95dceeb95c29f_0.file.content.tpl.php(30): Smarty_Internal_Runtime_Inheritance->endChild(Object(Smarty_Internal_Template), 'template.tpl')
#3 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_template_resource_base.php(123): content_5de9d28e1941c6_25174088(Object(Smarty_Internal_Template))
#4 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_template_compiled.php(114): Smarty_Template_Resource_Base->getRenderedTemplateCode(Object(Smarty_Internal_Template))
#5 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_template.php(216): Smarty_Template_Compiled->render(Object(Smarty_Internal_Template))
#6 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_templatebase.php(232): Smarty_Internal_Template->render(false, 0)
#7 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_templatebase.php(116): Smarty_Internal_TemplateBase->_execute(Object(Smarty_Internal_Template), Array, NULL, NULL, 0)
#8 /opt/lampp/htdocs/firstproject/app/Libraries/Common/View.php(74): Smarty_Internal_TemplateBase->fetch('Common/content....', Array)
#9 /opt/lampp/htdocs/firstproject/app/Controllers/Home.php(12): App\Libraries\Common\View->render('Common/content....', Array)
#10 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Home->index()
#11 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Home))
#12 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#13 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#14 {main}
CRITICAL - 2019-12-05 22:03:35 --> Unable to load template 'file:template.tpl' in 'Common/content.tpl'
#0 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_template.php(385): Smarty_Internal_Template->render()
#1 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_runtime_inheritance.php(116): Smarty_Internal_Template->_subTemplateRender('template.tpl', NULL, NULL, 0, 3600, Array, 2, false, NULL, NULL)
#2 /opt/lampp/htdocs/firstproject/writable/views/templates_c/3b4da2cf28f81043d603444675f95dceeb95c29f_0.file.content.tpl.php(30): Smarty_Internal_Runtime_Inheritance->endChild(Object(Smarty_Internal_Template), 'template.tpl')
#3 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_template_resource_base.php(123): content_5de9d28e1941c6_25174088(Object(Smarty_Internal_Template))
#4 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_template_compiled.php(114): Smarty_Template_Resource_Base->getRenderedTemplateCode(Object(Smarty_Internal_Template))
#5 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_template.php(216): Smarty_Template_Compiled->render(Object(Smarty_Internal_Template))
#6 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_templatebase.php(232): Smarty_Internal_Template->render(false, 0)
#7 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_templatebase.php(116): Smarty_Internal_TemplateBase->_execute(Object(Smarty_Internal_Template), Array, NULL, NULL, 0)
#8 /opt/lampp/htdocs/firstproject/app/Libraries/Common/View.php(75): Smarty_Internal_TemplateBase->fetch('Common/content....', Array)
#9 /opt/lampp/htdocs/firstproject/app/Controllers/Home.php(12): App\Libraries\Common\View->render('Common/content....', Array)
#10 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Home->index()
#11 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Home))
#12 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#13 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#14 {main}
CRITICAL - 2019-12-05 22:04:29 --> Unable to load template 'file:template.tpl' in 'Common/content.tpl'
#0 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_template.php(385): Smarty_Internal_Template->render()
#1 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_runtime_inheritance.php(116): Smarty_Internal_Template->_subTemplateRender('template.tpl', NULL, NULL, 0, 3600, Array, 2, false, NULL, NULL)
#2 /opt/lampp/htdocs/firstproject/writable/views/templates_c/3b4da2cf28f81043d603444675f95dceeb95c29f_0.file.content.tpl.php(30): Smarty_Internal_Runtime_Inheritance->endChild(Object(Smarty_Internal_Template), 'template.tpl')
#3 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_template_resource_base.php(123): content_5de9d28e1941c6_25174088(Object(Smarty_Internal_Template))
#4 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_template_compiled.php(114): Smarty_Template_Resource_Base->getRenderedTemplateCode(Object(Smarty_Internal_Template))
#5 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_template.php(216): Smarty_Template_Compiled->render(Object(Smarty_Internal_Template))
#6 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_templatebase.php(232): Smarty_Internal_Template->render(false, 0)
#7 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_templatebase.php(116): Smarty_Internal_TemplateBase->_execute(Object(Smarty_Internal_Template), Array, NULL, NULL, 0)
#8 /opt/lampp/htdocs/firstproject/app/Libraries/Common/View.php(74): Smarty_Internal_TemplateBase->fetch('Common/content....', Array)
#9 /opt/lampp/htdocs/firstproject/app/Controllers/Home.php(12): App\Libraries\Common\View->render('Common/content....', Array)
#10 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Home->index()
#11 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Home))
#12 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#13 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#14 {main}
CRITICAL - 2019-12-05 22:05:24 --> Unable to load template 'file:template.tpl' in 'Common/content.tpl'
#0 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_template.php(385): Smarty_Internal_Template->render()
#1 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_runtime_inheritance.php(116): Smarty_Internal_Template->_subTemplateRender('template.tpl', NULL, NULL, 0, 3600, Array, 2, false, NULL, NULL)
#2 /opt/lampp/htdocs/firstproject/writable/views/templates_c/3b4da2cf28f81043d603444675f95dceeb95c29f_0.file.content.tpl.php(30): Smarty_Internal_Runtime_Inheritance->endChild(Object(Smarty_Internal_Template), 'template.tpl')
#3 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_template_resource_base.php(123): content_5de9d28e1941c6_25174088(Object(Smarty_Internal_Template))
#4 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_template_compiled.php(114): Smarty_Template_Resource_Base->getRenderedTemplateCode(Object(Smarty_Internal_Template))
#5 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_template.php(216): Smarty_Template_Compiled->render(Object(Smarty_Internal_Template))
#6 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_templatebase.php(232): Smarty_Internal_Template->render(false, 0)
#7 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_templatebase.php(116): Smarty_Internal_TemplateBase->_execute(Object(Smarty_Internal_Template), Array, NULL, NULL, 0)
#8 /opt/lampp/htdocs/firstproject/app/Libraries/Common/View.php(74): Smarty_Internal_TemplateBase->fetch('Common/content....', Array)
#9 /opt/lampp/htdocs/firstproject/app/Controllers/Home.php(12): App\Libraries\Common\View->render('Common/content....', Array)
#10 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Home->index()
#11 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Home))
#12 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#13 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#14 {main}
CRITICAL - 2019-12-05 22:06:23 --> Unable to load template 'file:template.tpl' in 'Common/content.tpl'
#0 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_template.php(385): Smarty_Internal_Template->render()
#1 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_runtime_inheritance.php(116): Smarty_Internal_Template->_subTemplateRender('template.tpl', NULL, NULL, 0, 3600, Array, 2, false, NULL, NULL)
#2 /opt/lampp/htdocs/firstproject/writable/views/templates_c/3b4da2cf28f81043d603444675f95dceeb95c29f_0.file.content.tpl.php(30): Smarty_Internal_Runtime_Inheritance->endChild(Object(Smarty_Internal_Template), 'template.tpl')
#3 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_template_resource_base.php(123): content_5de9d3bfdf98e1_01502291(Object(Smarty_Internal_Template))
#4 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_template_compiled.php(114): Smarty_Template_Resource_Base->getRenderedTemplateCode(Object(Smarty_Internal_Template))
#5 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_template.php(216): Smarty_Template_Compiled->render(Object(Smarty_Internal_Template))
#6 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_templatebase.php(232): Smarty_Internal_Template->render(false, 0)
#7 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_templatebase.php(116): Smarty_Internal_TemplateBase->_execute(Object(Smarty_Internal_Template), Array, NULL, NULL, 0)
#8 /opt/lampp/htdocs/firstproject/app/Libraries/Common/View.php(74): Smarty_Internal_TemplateBase->fetch('Common/content....', Array)
#9 /opt/lampp/htdocs/firstproject/app/Controllers/Home.php(12): App\Libraries\Common\View->render('Common/content....', Array)
#10 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Home->index()
#11 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Home))
#12 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#13 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#14 {main}
CRITICAL - 2019-12-05 22:06:30 --> Unable to load template 'file:template.tpl' in 'Common/content.tpl'
#0 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_template.php(385): Smarty_Internal_Template->render()
#1 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_runtime_inheritance.php(116): Smarty_Internal_Template->_subTemplateRender('template.tpl', NULL, NULL, 0, 3600, Array, 2, false, NULL, NULL)
#2 /opt/lampp/htdocs/firstproject/writable/views/templates_c/3b4da2cf28f81043d603444675f95dceeb95c29f_0.file.content.tpl.php(30): Smarty_Internal_Runtime_Inheritance->endChild(Object(Smarty_Internal_Template), 'template.tpl')
#3 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_template_resource_base.php(123): content_5de9d3bfdf98e1_01502291(Object(Smarty_Internal_Template))
#4 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_template_compiled.php(114): Smarty_Template_Resource_Base->getRenderedTemplateCode(Object(Smarty_Internal_Template))
#5 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_template.php(216): Smarty_Template_Compiled->render(Object(Smarty_Internal_Template))
#6 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_templatebase.php(232): Smarty_Internal_Template->render(false, 0)
#7 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_templatebase.php(116): Smarty_Internal_TemplateBase->_execute(Object(Smarty_Internal_Template), Array, NULL, NULL, 0)
#8 /opt/lampp/htdocs/firstproject/app/Libraries/Common/View.php(74): Smarty_Internal_TemplateBase->fetch('Common/content....', Array)
#9 /opt/lampp/htdocs/firstproject/app/Controllers/Home.php(12): App\Libraries\Common\View->render('Common/content....', Array)
#10 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Home->index()
#11 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Home))
#12 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#13 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#14 {main}
CRITICAL - 2019-12-05 22:06:30 --> Unable to load template 'file:template.tpl' in 'Common/content.tpl'
#0 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_template.php(385): Smarty_Internal_Template->render()
#1 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_runtime_inheritance.php(116): Smarty_Internal_Template->_subTemplateRender('template.tpl', NULL, NULL, 0, 3600, Array, 2, false, NULL, NULL)
#2 /opt/lampp/htdocs/firstproject/writable/views/templates_c/3b4da2cf28f81043d603444675f95dceeb95c29f_0.file.content.tpl.php(30): Smarty_Internal_Runtime_Inheritance->endChild(Object(Smarty_Internal_Template), 'template.tpl')
#3 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_template_resource_base.php(123): content_5de9d3bfdf98e1_01502291(Object(Smarty_Internal_Template))
#4 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_template_compiled.php(114): Smarty_Template_Resource_Base->getRenderedTemplateCode(Object(Smarty_Internal_Template))
#5 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_template.php(216): Smarty_Template_Compiled->render(Object(Smarty_Internal_Template))
#6 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_templatebase.php(232): Smarty_Internal_Template->render(false, 0)
#7 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_templatebase.php(116): Smarty_Internal_TemplateBase->_execute(Object(Smarty_Internal_Template), Array, NULL, NULL, 0)
#8 /opt/lampp/htdocs/firstproject/app/Libraries/Common/View.php(74): Smarty_Internal_TemplateBase->fetch('Common/content....', Array)
#9 /opt/lampp/htdocs/firstproject/app/Controllers/Home.php(12): App\Libraries\Common\View->render('Common/content....', Array)
#10 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Home->index()
#11 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Home))
#12 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#13 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#14 {main}
CRITICAL - 2019-12-05 22:06:31 --> Unable to load template 'file:template.tpl' in 'Common/content.tpl'
#0 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_template.php(385): Smarty_Internal_Template->render()
#1 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_runtime_inheritance.php(116): Smarty_Internal_Template->_subTemplateRender('template.tpl', NULL, NULL, 0, 3600, Array, 2, false, NULL, NULL)
#2 /opt/lampp/htdocs/firstproject/writable/views/templates_c/3b4da2cf28f81043d603444675f95dceeb95c29f_0.file.content.tpl.php(30): Smarty_Internal_Runtime_Inheritance->endChild(Object(Smarty_Internal_Template), 'template.tpl')
#3 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_template_resource_base.php(123): content_5de9d3bfdf98e1_01502291(Object(Smarty_Internal_Template))
#4 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_template_compiled.php(114): Smarty_Template_Resource_Base->getRenderedTemplateCode(Object(Smarty_Internal_Template))
#5 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_template.php(216): Smarty_Template_Compiled->render(Object(Smarty_Internal_Template))
#6 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_templatebase.php(232): Smarty_Internal_Template->render(false, 0)
#7 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_templatebase.php(116): Smarty_Internal_TemplateBase->_execute(Object(Smarty_Internal_Template), Array, NULL, NULL, 0)
#8 /opt/lampp/htdocs/firstproject/app/Libraries/Common/View.php(74): Smarty_Internal_TemplateBase->fetch('Common/content....', Array)
#9 /opt/lampp/htdocs/firstproject/app/Controllers/Home.php(12): App\Libraries\Common\View->render('Common/content....', Array)
#10 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Home->index()
#11 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Home))
#12 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#13 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#14 {main}
CRITICAL - 2019-12-05 22:13:39 --> Unable to load template 'file:../Finance/template.tpl' in 'Finance/Department/index.tpl'
#0 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_template.php(385): Smarty_Internal_Template->render()
#1 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_runtime_inheritance.php(116): Smarty_Internal_Template->_subTemplateRender('../Finance/temp...', NULL, NULL, 0, 3600, Array, 2, false, NULL, NULL)
#2 /opt/lampp/htdocs/firstproject/writable/views/templates_c/65742316d6f3d6b4e1f1c2857899e8cc6eec92f2_0.file.index.tpl.php(30): Smarty_Internal_Runtime_Inheritance->endChild(Object(Smarty_Internal_Template), '../Finance/temp...')
#3 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_template_resource_base.php(123): content_5de9d57389d197_88837407(Object(Smarty_Internal_Template))
#4 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_template_compiled.php(114): Smarty_Template_Resource_Base->getRenderedTemplateCode(Object(Smarty_Internal_Template))
#5 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_template.php(216): Smarty_Template_Compiled->render(Object(Smarty_Internal_Template))
#6 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_templatebase.php(232): Smarty_Internal_Template->render(false, 0)
#7 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_templatebase.php(116): Smarty_Internal_TemplateBase->_execute(Object(Smarty_Internal_Template), Array, NULL, NULL, 0)
#8 /opt/lampp/htdocs/firstproject/app/Libraries/Common/View.php(74): Smarty_Internal_TemplateBase->fetch('Finance/Departm...', Array)
#9 /opt/lampp/htdocs/firstproject/app/Controllers/Finance/Department.php(16): App\Libraries\Common\View->render('Finance/Departm...', Array)
#10 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Finance\Department->index()
#11 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Finance\Department))
#12 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#13 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#14 {main}
CRITICAL - 2019-12-05 22:20:03 --> Unable to load template 'file:../finance.tpl' in 'Standards/form.tpl'
#0 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_template.php(385): Smarty_Internal_Template->render()
#1 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_runtime_inheritance.php(116): Smarty_Internal_Template->_subTemplateRender('../finance.tpl', NULL, NULL, 0, 3600, Array, 2, false, NULL, NULL)
#2 /opt/lampp/htdocs/firstproject/writable/views/templates_c/610e4159110f75644ddb4dbf23cac66046cc9b63_0.file.form.tpl.php(33): Smarty_Internal_Runtime_Inheritance->endChild(Object(Smarty_Internal_Template), '../finance.tpl')
#3 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_template_resource_base.php(123): content_5de8fda3e024c8_48193886(Object(Smarty_Internal_Template))
#4 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_template_compiled.php(114): Smarty_Template_Resource_Base->getRenderedTemplateCode(Object(Smarty_Internal_Template))
#5 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_template.php(216): Smarty_Template_Compiled->render(Object(Smarty_Internal_Template))
#6 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_templatebase.php(232): Smarty_Internal_Template->render(false, 0)
#7 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_templatebase.php(116): Smarty_Internal_TemplateBase->_execute(Object(Smarty_Internal_Template), Array, NULL, NULL, 0)
#8 /opt/lampp/htdocs/firstproject/app/Libraries/Common/View.php(74): Smarty_Internal_TemplateBase->fetch('Standards/form....', Array)
#9 /opt/lampp/htdocs/firstproject/app/Controllers/Standards.php(28): App\Libraries\Common\View->render('Standards/form....', Array)
#10 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Standards->forms()
#11 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Standards))
#12 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#13 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#14 {main}
CRITICAL - 2019-12-05 22:20:35 --> Unable to load template 'file:../finance.tpl' in 'Standards/index.tpl'
#0 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_template.php(385): Smarty_Internal_Template->render()
#1 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_runtime_inheritance.php(116): Smarty_Internal_Template->_subTemplateRender('../finance.tpl', NULL, NULL, 0, 3600, Array, 2, false, NULL, NULL)
#2 /opt/lampp/htdocs/firstproject/writable/views/templates_c/4239e8ff70caa2a674f85275b1b7a5d4a76efa6e_0.file.index.tpl.php(33): Smarty_Internal_Runtime_Inheritance->endChild(Object(Smarty_Internal_Template), '../finance.tpl')
#3 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_template_resource_base.php(123): content_5de8ff2a2d82a3_17581313(Object(Smarty_Internal_Template))
#4 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_template_compiled.php(114): Smarty_Template_Resource_Base->getRenderedTemplateCode(Object(Smarty_Internal_Template))
#5 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_template.php(216): Smarty_Template_Compiled->render(Object(Smarty_Internal_Template))
#6 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_templatebase.php(232): Smarty_Internal_Template->render(false, 0)
#7 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_templatebase.php(116): Smarty_Internal_TemplateBase->_execute(Object(Smarty_Internal_Template), Array, NULL, NULL, 0)
#8 /opt/lampp/htdocs/firstproject/app/Libraries/Common/View.php(74): Smarty_Internal_TemplateBase->fetch('Standards/index...', Array)
#9 /opt/lampp/htdocs/firstproject/app/Controllers/Standards.php(10): App\Libraries\Common\View->render('Standards/index...')
#10 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Standards->index()
#11 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Standards))
#12 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#13 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#14 {main}
CRITICAL - 2019-12-05 22:25:25 --> Unable to load template 'file:../finance.tpl' in 'Standards/index.tpl'
#0 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_template.php(385): Smarty_Internal_Template->render()
#1 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_runtime_inheritance.php(116): Smarty_Internal_Template->_subTemplateRender('../finance.tpl', NULL, NULL, 0, 3600, Array, 2, false, NULL, NULL)
#2 /opt/lampp/htdocs/firstproject/writable/views/templates_c/4239e8ff70caa2a674f85275b1b7a5d4a76efa6e_0.file.index.tpl.php(33): Smarty_Internal_Runtime_Inheritance->endChild(Object(Smarty_Internal_Template), '../finance.tpl')
#3 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_template_resource_base.php(123): content_5de8ff2a2d82a3_17581313(Object(Smarty_Internal_Template))
#4 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_template_compiled.php(114): Smarty_Template_Resource_Base->getRenderedTemplateCode(Object(Smarty_Internal_Template))
#5 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_template.php(216): Smarty_Template_Compiled->render(Object(Smarty_Internal_Template))
#6 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_templatebase.php(232): Smarty_Internal_Template->render(false, 0)
#7 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_templatebase.php(116): Smarty_Internal_TemplateBase->_execute(Object(Smarty_Internal_Template), Array, NULL, NULL, 0)
#8 /opt/lampp/htdocs/firstproject/app/Libraries/Common/View.php(74): Smarty_Internal_TemplateBase->fetch('Standards/index...', Array)
#9 /opt/lampp/htdocs/firstproject/app/Controllers/Common/Standards.php(11): App\Libraries\Common\View->render('Standards/index...')
#10 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Common\Standards->index()
#11 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Common\Standards))
#12 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#13 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#14 {main}
CRITICAL - 2019-12-05 22:25:26 --> Unable to load template 'file:../finance.tpl' in 'Standards/index.tpl'
#0 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_template.php(385): Smarty_Internal_Template->render()
#1 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_runtime_inheritance.php(116): Smarty_Internal_Template->_subTemplateRender('../finance.tpl', NULL, NULL, 0, 3600, Array, 2, false, NULL, NULL)
#2 /opt/lampp/htdocs/firstproject/writable/views/templates_c/4239e8ff70caa2a674f85275b1b7a5d4a76efa6e_0.file.index.tpl.php(33): Smarty_Internal_Runtime_Inheritance->endChild(Object(Smarty_Internal_Template), '../finance.tpl')
#3 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_template_resource_base.php(123): content_5de8ff2a2d82a3_17581313(Object(Smarty_Internal_Template))
#4 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_template_compiled.php(114): Smarty_Template_Resource_Base->getRenderedTemplateCode(Object(Smarty_Internal_Template))
#5 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_template.php(216): Smarty_Template_Compiled->render(Object(Smarty_Internal_Template))
#6 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_templatebase.php(232): Smarty_Internal_Template->render(false, 0)
#7 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_templatebase.php(116): Smarty_Internal_TemplateBase->_execute(Object(Smarty_Internal_Template), Array, NULL, NULL, 0)
#8 /opt/lampp/htdocs/firstproject/app/Libraries/Common/View.php(74): Smarty_Internal_TemplateBase->fetch('Standards/index...', Array)
#9 /opt/lampp/htdocs/firstproject/app/Controllers/Common/Standards.php(11): App\Libraries\Common\View->render('Standards/index...')
#10 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Common\Standards->index()
#11 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Common\Standards))
#12 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#13 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#14 {main}
CRITICAL - 2019-12-05 22:25:27 --> Unable to load template 'file:../finance.tpl' in 'Standards/index.tpl'
#0 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_template.php(385): Smarty_Internal_Template->render()
#1 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_runtime_inheritance.php(116): Smarty_Internal_Template->_subTemplateRender('../finance.tpl', NULL, NULL, 0, 3600, Array, 2, false, NULL, NULL)
#2 /opt/lampp/htdocs/firstproject/writable/views/templates_c/4239e8ff70caa2a674f85275b1b7a5d4a76efa6e_0.file.index.tpl.php(33): Smarty_Internal_Runtime_Inheritance->endChild(Object(Smarty_Internal_Template), '../finance.tpl')
#3 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_template_resource_base.php(123): content_5de8ff2a2d82a3_17581313(Object(Smarty_Internal_Template))
#4 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_template_compiled.php(114): Smarty_Template_Resource_Base->getRenderedTemplateCode(Object(Smarty_Internal_Template))
#5 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_template.php(216): Smarty_Template_Compiled->render(Object(Smarty_Internal_Template))
#6 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_templatebase.php(232): Smarty_Internal_Template->render(false, 0)
#7 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_templatebase.php(116): Smarty_Internal_TemplateBase->_execute(Object(Smarty_Internal_Template), Array, NULL, NULL, 0)
#8 /opt/lampp/htdocs/firstproject/app/Libraries/Common/View.php(74): Smarty_Internal_TemplateBase->fetch('Standards/index...', Array)
#9 /opt/lampp/htdocs/firstproject/app/Controllers/Common/Standards.php(11): App\Libraries\Common\View->render('Standards/index...')
#10 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Common\Standards->index()
#11 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Common\Standards))
#12 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#13 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#14 {main}
CRITICAL - 2019-12-05 22:26:20 --> Unable to load template 'file:../finance.tpl' in 'Standards/index.tpl'
#0 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_template.php(385): Smarty_Internal_Template->render()
#1 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_runtime_inheritance.php(116): Smarty_Internal_Template->_subTemplateRender('../finance.tpl', NULL, NULL, 0, 3600, Array, 2, false, NULL, NULL)
#2 /opt/lampp/htdocs/firstproject/writable/views/templates_c/4239e8ff70caa2a674f85275b1b7a5d4a76efa6e_0.file.index.tpl.php(33): Smarty_Internal_Runtime_Inheritance->endChild(Object(Smarty_Internal_Template), '../finance.tpl')
#3 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_template_resource_base.php(123): content_5de8ff2a2d82a3_17581313(Object(Smarty_Internal_Template))
#4 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_template_compiled.php(114): Smarty_Template_Resource_Base->getRenderedTemplateCode(Object(Smarty_Internal_Template))
#5 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_template.php(216): Smarty_Template_Compiled->render(Object(Smarty_Internal_Template))
#6 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_templatebase.php(232): Smarty_Internal_Template->render(false, 0)
#7 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_templatebase.php(116): Smarty_Internal_TemplateBase->_execute(Object(Smarty_Internal_Template), Array, NULL, NULL, 0)
#8 /opt/lampp/htdocs/firstproject/app/Libraries/Common/View.php(74): Smarty_Internal_TemplateBase->fetch('Standards/index...', Array)
#9 /opt/lampp/htdocs/firstproject/app/Controllers/Common/Standards.php(11): App\Libraries\Common\View->render('Standards/index...')
#10 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Common\Standards->index()
#11 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Common\Standards))
#12 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#13 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#14 {main}
CRITICAL - 2019-12-05 22:27:14 --> Unable to load template 'file:../finance.tpl' in 'Common/Standards/index.tpl'
#0 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_template.php(385): Smarty_Internal_Template->render()
#1 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_runtime_inheritance.php(116): Smarty_Internal_Template->_subTemplateRender('../finance.tpl', NULL, NULL, 0, 3600, Array, 2, false, NULL, NULL)
#2 /opt/lampp/htdocs/firstproject/writable/views/templates_c/f6a63456eb90efaa8a6071db583778cab73290f8_0.file.index.tpl.php(33): Smarty_Internal_Runtime_Inheritance->endChild(Object(Smarty_Internal_Template), '../finance.tpl')
#3 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_template_resource_base.php(123): content_5de9d8a2618fa0_88791141(Object(Smarty_Internal_Template))
#4 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_template_compiled.php(114): Smarty_Template_Resource_Base->getRenderedTemplateCode(Object(Smarty_Internal_Template))
#5 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_template.php(216): Smarty_Template_Compiled->render(Object(Smarty_Internal_Template))
#6 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_templatebase.php(232): Smarty_Internal_Template->render(false, 0)
#7 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_templatebase.php(116): Smarty_Internal_TemplateBase->_execute(Object(Smarty_Internal_Template), Array, NULL, NULL, 0)
#8 /opt/lampp/htdocs/firstproject/app/Libraries/Common/View.php(74): Smarty_Internal_TemplateBase->fetch('Common/Standard...', Array)
#9 /opt/lampp/htdocs/firstproject/app/Controllers/Common/Standards.php(11): App\Libraries\Common\View->render('Common/Standard...')
#10 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Common\Standards->index()
#11 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Common\Standards))
#12 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#13 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#14 {main}
CRITICAL - 2019-12-05 22:27:15 --> Unable to load template 'file:../finance.tpl' in 'Common/Standards/index.tpl'
#0 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_template.php(385): Smarty_Internal_Template->render()
#1 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_runtime_inheritance.php(116): Smarty_Internal_Template->_subTemplateRender('../finance.tpl', NULL, NULL, 0, 3600, Array, 2, false, NULL, NULL)
#2 /opt/lampp/htdocs/firstproject/writable/views/templates_c/f6a63456eb90efaa8a6071db583778cab73290f8_0.file.index.tpl.php(33): Smarty_Internal_Runtime_Inheritance->endChild(Object(Smarty_Internal_Template), '../finance.tpl')
#3 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_template_resource_base.php(123): content_5de9d8a2618fa0_88791141(Object(Smarty_Internal_Template))
#4 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_template_compiled.php(114): Smarty_Template_Resource_Base->getRenderedTemplateCode(Object(Smarty_Internal_Template))
#5 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_template.php(216): Smarty_Template_Compiled->render(Object(Smarty_Internal_Template))
#6 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_templatebase.php(232): Smarty_Internal_Template->render(false, 0)
#7 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_templatebase.php(116): Smarty_Internal_TemplateBase->_execute(Object(Smarty_Internal_Template), Array, NULL, NULL, 0)
#8 /opt/lampp/htdocs/firstproject/app/Libraries/Common/View.php(74): Smarty_Internal_TemplateBase->fetch('Common/Standard...', Array)
#9 /opt/lampp/htdocs/firstproject/app/Controllers/Common/Standards.php(11): App\Libraries\Common\View->render('Common/Standard...')
#10 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Common\Standards->index()
#11 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Common\Standards))
#12 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#13 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#14 {main}
CRITICAL - 2019-12-05 22:28:57 --> Unable to load template 'file:../Common/template.tpl' in 'Common/Standards/index.tpl'
#0 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_template.php(385): Smarty_Internal_Template->render()
#1 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_runtime_inheritance.php(116): Smarty_Internal_Template->_subTemplateRender('../Common/templ...', NULL, NULL, 0, 3600, Array, 2, false, NULL, NULL)
#2 /opt/lampp/htdocs/firstproject/writable/views/templates_c/f6a63456eb90efaa8a6071db583778cab73290f8_0.file.index.tpl.php(33): Smarty_Internal_Runtime_Inheritance->endChild(Object(Smarty_Internal_Template), '../Common/templ...')
#3 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_template_resource_base.php(123): content_5de9d90930c943_29580662(Object(Smarty_Internal_Template))
#4 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_template_compiled.php(114): Smarty_Template_Resource_Base->getRenderedTemplateCode(Object(Smarty_Internal_Template))
#5 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_template.php(216): Smarty_Template_Compiled->render(Object(Smarty_Internal_Template))
#6 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_templatebase.php(232): Smarty_Internal_Template->render(false, 0)
#7 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_templatebase.php(116): Smarty_Internal_TemplateBase->_execute(Object(Smarty_Internal_Template), Array, NULL, NULL, 0)
#8 /opt/lampp/htdocs/firstproject/app/Libraries/Common/View.php(74): Smarty_Internal_TemplateBase->fetch('Common/Standard...', Array)
#9 /opt/lampp/htdocs/firstproject/app/Controllers/Common/Standards.php(11): App\Libraries\Common\View->render('Common/Standard...')
#10 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Common\Standards->index()
#11 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Common\Standards))
#12 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#13 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#14 {main}
CRITICAL - 2019-12-05 22:29:52 --> Unable to load template 'file:Standards/form.tpl'
#0 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_templatebase.php(232): Smarty_Internal_Template->render(false, 0)
#1 /opt/lampp/htdocs/firstproject/app/ThirdParty/smarty/libs/sysplugins/smarty_internal_templatebase.php(116): Smarty_Internal_TemplateBase->_execute(Object(Smarty_Internal_Template), Array, NULL, NULL, 0)
#2 /opt/lampp/htdocs/firstproject/app/Libraries/Common/View.php(74): Smarty_Internal_TemplateBase->fetch('Standards/form....', Array)
#3 /opt/lampp/htdocs/firstproject/app/Controllers/Common/Standards.php(29): App\Libraries\Common\View->render('Standards/form....', Array)
#4 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(847): App\Controllers\Common\Standards->forms()
#5 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Common\Standards))
#6 /opt/lampp/htdocs/firstproject/vendor/codeigniter4/framework/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#7 /opt/lampp/htdocs/firstproject/public/index.php(45): CodeIgniter\CodeIgniter->run()
#8 {main}
