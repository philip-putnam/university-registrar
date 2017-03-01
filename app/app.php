<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../src/Course.php';
    require_once __DIR__.'/../src/Student.php';

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    $server = 'mysql:host=localhost:8889;dbname=university';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    $app = new Silex\Application();

    $app['debug'] = true;

    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

    $app->get('/', function() use ($app) {
        return $app['twig']->render('index.html.twig', array('students' => Student::getAll()));
    });

    $app->post('/', function() use ($app) {
        $name = filter_var($_POST['student'], FILTER_SANITIZE_MAGIC_QUOTES);
        $enroll_date = $_POST['enroll_date'];
        $student = new Student($name, $enroll_date);
        $student->save();

        return $app['twig']->render('index.html.twig', array('students' => Student::getAll()));
    });

    $app->delete('/', function() use ($app) {
        Student::deleteAll();
        return $app['twig']->render('index.html.twig', array('students' => Student::getAll()));
    });

    return $app;
?>
