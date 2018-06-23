[23-Jun-2018 12:36:09 UTC] Fata Error
Uncaught Exception :PDOException
Message: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES)
Stack Trace : #0 D:\Ampps\www\simplemvc\Core\DB.php(34): PDO->__construct('mysql:host=loca...', 'root', '111111dd')
#1 D:\Ampps\www\simplemvc\Core\Model.php(13): Core\DB->getDB()
#2 D:\Ampps\www\simplemvc\App\Models\Post.php(11): Core\Model->getDB()
#3 D:\Ampps\www\simplemvc\App\Controllers\Posts.php(9): App\Models\Post->__construct()
#4 [internal function]: App\Controllers\Posts->indexAction()
#5 D:\Ampps\www\simplemvc\Core\Controller.php(19): call_user_func_array(Array, Array)
#6 [internal function]: Core\Controller->__call('index', Array)
#7 [internal function]: App\Controllers\Posts->index()
#8 D:\Ampps\www\simplemvc\Core\Router.php(77): call_user_func_array(Array, Array)
#9 D:\Ampps\www\simplemvc\public\index.php(73): Core\Router->dispatch('posts/index')
#10 {main}
Thrown in D:\Ampps\www\simplemvc\Core\DB.php on line 34

[23-Jun-2018 12:37:43 UTC] Fata Error
Uncaught Exception :Exception
Message: do not have this route
Stack Trace : #0 D:\Ampps\www\simplemvc\public\index.php(73): Core\Router->dispatch('s')
#1 {main}
Thrown in D:\Ampps\www\simplemvc\Core\Router.php on line 85

[23-Jun-2018 21:06:05 Asia/Shanghai] Fata Error
Uncaught Exception :PDOException
Message: could not find driver
Stack Trace : #0 D:\Ampps\www\simplemvc\Core\DB.php(34): PDO->__construct('mysql:host=loca...', 'root', '111111dd')
#1 D:\Ampps\www\simplemvc\Core\Model.php(13): Core\DB->getDB()
#2 D:\Ampps\www\simplemvc\App\Models\Post.php(11): Core\Model->getDB()
#3 D:\Ampps\www\simplemvc\App\Controllers\Posts.php(9): App\Models\Post->__construct()
#4 [internal function]: App\Controllers\Posts->indexAction()
#5 D:\Ampps\www\simplemvc\Core\Controller.php(19): call_user_func_array(Array, Array)
#6 [internal function]: Core\Controller->__call('index', Array)
#7 [internal function]: App\Controllers\Posts->index()
#8 D:\Ampps\www\simplemvc\Core\Router.php(77): call_user_func_array(Array, Array)
#9 D:\Ampps\www\simplemvc\public\index.php(73): Core\Router->dispatch('posts/index')
#10 {main}
Thrown in D:\Ampps\www\simplemvc\Core\DB.php on line 34

[23-Jun-2018 21:06:15 Asia/Shanghai] Fata Error
Uncaught Exception :PDOException
Message: could not find driver
Stack Trace : #0 D:\Ampps\www\simplemvc\Core\DB.php(34): PDO->__construct('mysql:host=loca...', 'root', '111111dd')
#1 D:\Ampps\www\simplemvc\Core\Model.php(13): Core\DB->getDB()
#2 D:\Ampps\www\simplemvc\App\Models\Post.php(11): Core\Model->getDB()
#3 D:\Ampps\www\simplemvc\App\Controllers\Posts.php(9): App\Models\Post->__construct()
#4 [internal function]: App\Controllers\Posts->indexAction()
#5 D:\Ampps\www\simplemvc\Core\Controller.php(19): call_user_func_array(Array, Array)
#6 [internal function]: Core\Controller->__call('index', Array)
#7 [internal function]: App\Controllers\Posts->index()
#8 D:\Ampps\www\simplemvc\Core\Router.php(77): call_user_func_array(Array, Array)
#9 D:\Ampps\www\simplemvc\public\index.php(73): Core\Router->dispatch('posts/index')
#10 {main}
Thrown in D:\Ampps\www\simplemvc\Core\DB.php on line 34

