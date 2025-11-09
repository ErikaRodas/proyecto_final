[1mdiff --git a/app/Controllers/CalificacionesController.php b/app/Controllers/CalificacionesController.php[m
[1mindex b07fafb..9b4519b 100644[m
[1m--- a/app/Controllers/CalificacionesController.php[m
[1m+++ b/app/Controllers/CalificacionesController.php[m
[36m@@ -10,14 +10,14 @@[m [mclass CalificacionesController extends Controller[m
         $model = new CalificacionModel();[m
         $datosCalificaciones = $model->findAll(); [m
 [m
[31m-        return view('calificaciones/calificaciones', [[m
[32m+[m[32m        return view('calificaciones', [[m
             'calificaciones' => $datosCalificaciones [m
         ]);[m
     }[m
 [m
     public function nuevo()[m
     {[m
[31m-        return view('calificaciones/form_agregar_calificaciones');[m
[32m+[m[32m        return view('form_agregar_calificaciones');[m
     }[m
 [m
     public function guardar()[m
[36m@@ -26,7 +26,7 @@[m [mclass CalificacionesController extends Controller[m
         $datos_post = $this->request->getPost();[m
 [m
         if (! $this->validate($model->validationRules, $model->validationMessages)) {[m
[31m-            return view('calificaciones/form_agregar_calificaciones', [[m
[32m+[m[32m            return view('form_agregar_calificaciones', [[m
                 'validation' => $this->validator,[m
                 'datos_anteriores' => $datos_post[m
             ]);[m
[36m@@ -37,7 +37,7 @@[m [mclass CalificacionesController extends Controller[m
             return redirect()->to('/calificaciones/mostrar')->with('mensaje', 'Calificación agregada con éxito. 👍');[m
 [m
         } catch (\Exception $e) {[m
[31m-            return view('calificaciones/form_agregar_calificaciones', [[m
[32m+[m[32m            return view('form_agregar_calificaciones', [[m
                 'error_db' => 'Error al guardar. Revise que el Carné del Alumno y el Código de Materia existan en la base de datos.',[m
                 'datos_anteriores' => $datos_post [m
             ]);[m
[1mdiff --git a/writable/logs/log-2025-11-09.log b/writable/logs/log-2025-11-09.log[m
[1mindex 6413883..ce2249a 100644[m
[1m--- a/writable/logs/log-2025-11-09.log[m
[1m+++ b/writable/logs/log-2025-11-09.log[m
[36m@@ -518,3 +518,29 @@[m [mDEBUG - 2025-11-09 09:17:58 --> Session: Class initialized using 'CodeIgniter\Se[m
 DEBUG - 2025-11-09 09:18:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.[m
 DEBUG - 2025-11-09 09:18:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.[m
 DEBUG - 2025-11-09 09:18:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.[m
[32m+[m[32mCRITICAL - 2025-11-09 17:12:50 --> CodeIgniter\Session\Exceptions\SessionException: Session: Configured save path "C:\xampp\htdocs\proyecto_final\writable\session" is not writable by the PHP process.[m
[32m+[m[32m[Method: GET, Route: /][m
[32m+[m[32min SYSTEMPATH\Session\Handlers\FileHandler.php on line 103.[m
[32m+[m[32m 1 SYSTEMPATH\Session\Handlers\FileHandler.php(103): CodeIgniter\Session\Exceptions\SessionException::forWriteProtectedSavePath('C:\\xampp\\htdocs\\proyecto_final\\writable\\session')[m
[32m+[m[32m 2 [internal function]: CodeIgniter\Session\Handlers\FileHandler->open('C:\\xampp\\htdocs\\proyecto_final\\writable\\session', 'ci_session')[m
[32m+[m[32m 3 SYSTEMPATH\Session\Session.php(912): session_start()[m
[32m+[m[32m 4 SYSTEMPATH\Session\Session.php(243): CodeIgniter\Session\Session->startSession()[m
[32m+[m[32m 5 SYSTEMPATH\Config\Services.php(715): CodeIgniter\Session\Session->start()[m
[32m+[m[32m 6 SYSTEMPATH\Config\BaseService.php(312): CodeIgniter\Config\Services::session(Object(Config\Session), false)[m
[32m+[m[32m 7 SYSTEMPATH\Config\BaseService.php(251): CodeIgniter\Config\BaseService::__callStatic('session', [...])[m
[32m+[m[32m 8 SYSTEMPATH\Config\Services.php(668): CodeIgniter\Config\BaseService::getSharedInstance('session', null)[m
[32m+[m[32m 9 SYSTEMPATH\Config\BaseService.php(321): CodeIgniter\Config\Services::session()[m
[32m+[m[32m10 SYSTEMPATH\Config\BaseService.php(202): CodeIgniter\Config\BaseService::__callStatic('session', [])[m
[32m+[m[32m11 SYSTEMPATH\Common.php(995): CodeIgniter\Config\BaseService::get('session')[m
[32m+[m[32m12 SYSTEMPATH\Common.php(968): service('session')[m
[32m+[m[32m13 APPPATH\Views\login.php(36): session()[m
[32m+[m[32m14 SYSTEMPATH\View\View.php(226): include('C:\\xampp\\htdocs\\proyecto_final\\app\\Views\\login.php')[m
[32m+[m[32m15 SYSTEMPATH\View\View.php(229): CodeIgniter\View\View->CodeIgniter\View\{closure}()[m
[32m+[m[32m16 SYSTEMPATH\Common.php(1167): CodeIgniter\View\View->render('login', [], true)[m
[32m+[m[32m17 APPPATH\Controllers\Home.php(9): view('login')[m
[32m+[m[32m18 SYSTEMPATH\CodeIgniter.php(933): App\Controllers\Home->index()[m
[32m+[m[32m19 SYSTEMPATH\CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Home))[m
[32m+[m[32m20 SYSTEMPATH\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)[m
[32m+[m[32m21 SYSTEMPATH\Boot.php(363): CodeIgniter\CodeIgniter->run()[m
[32m+[m[32m22 SYSTEMPATH\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))[m
[32m+[m[32m23 FCPATH\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))[m
