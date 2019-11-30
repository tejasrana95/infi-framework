<?php

class Bootstrap {

    function __construct() {
        //load 
        $url = getPage();
        $file = BASEURL . CONTROLLER . $url[0] . '.php';
        $files = BASEURL . VIEW . $url[0] . '.php';
        $view = new View();
        if ($url[0] != "modules") {

            if (empty($url[0])) {
                if (!file_exists(BASEURL . CONTROLLER . 'index.php')) {
                    $error_name = 'index.php';
                    $folder = CONTROLLER;
                    require_once(VQMod::modCheck(BASEURL . PUBLICS . 'errors.php'));
                    die();
                } else {
                    require_once(VQMod::modCheck(BASEURL . CONTROLLER . 'index.php'));
                    if ($url[0] != "") {
                        $controller = new $url[0];
                    } else {
                        $controller = new index;
                    }

                    if (count($url) > 1) {
                        // Determine what to load
                        switch (count($url)) {
                            case 5:
                                //Controller->Method(Param1, Param2, Param3)
                                if (method_exists($controller, $url[1])) {
                                    $controller->{$url[1]}($url[2], $url[3], $url[4]);
                                } else {
                                    $controller->index();
                                }
                                break;
                            case 4:
                                //Controller->Method(Param1, Param2)
                                if (method_exists($controller, $url[1])) {
                                    $controller->{$url[1]}($url[2], $url[3]);
                                } else {
                                    $controller->index();
                                }

                                break;
                            case 3:
                                //Controller->Method(Param1, Param2)
                                if (method_exists($controller, $url[1])) {
                                    $controller->{$url[1]}($url[2]);
                                } else {
                                    $controller->index();
                                }

                                break;
                            case 2:
                                //Controller->Method(Param1, Param2)
                                if (method_exists($controller, $url[1])) {
                                    $controller->{$url[1]}();
                                } else {
                                    $controller->index();
                                }

                                break;
                            default:
                                $controller->index();
                                break;
                        }
                    } else {
                        $controller->index();
                    }
                    return false;
                }
            } elseif (file_exists($file)) {
                require_once(VQMod::modCheck($file));

                $controller = new $url[0];
                $controller->loadModel($url[0]);
                if (count($url) > 1) {
                    // Determine what to load
                    switch (count($url)) {
                        case 5:
                            //Controller->Method(Param1, Param2, Param3)
                            if (method_exists($controller, $url[1])) {
                                $controller->{$url[1]}($url[2], $url[3], $url[4]);
                            } else {
                                $controller->index();
                            }
                            break;
                        case 4:
                            //Controller->Method(Param1, Param2)
                            if (method_exists($controller, $url[1])) {
                                $controller->{$url[1]}($url[2], $url[3]);
                            } else {
                                $controller->index();
                            }

                            break;
                        case 3:
                            //Controller->Method(Param1, Param2)
                            if (method_exists($controller, $url[1])) {
                                $controller->{$url[1]}($url[2]);
                            } else {
                                $controller->index();
                            }

                            break;
                        case 2:
                            //Controller->Method(Param1, Param2)
                            if (method_exists($controller, $url[1])) {
                                $controller->{$url[1]}();
                            } else {
                                $controller->index();
                            }

                            break;
                        default:
                            $controller->index();
                            break;
                    }
                } else {
                    $controller->index();
                }
            } elseif (file_exists($files)) {
                $view->render($url[0]);
            } else {
                $view->render("404");
            }
        } else {
            $modulefolder = BASEURL . MODULE . $url[1];
            $moduleview = MODULEVIEW . $url[1] . '/' . $url[1] . '.php';
            $defaultmodule = "info.module";
            if (empty($url[1])) {
                redirect('modulemanager');
                die();
            } elseif (!file_exists($moduleview)) {
                redirect('404/');
                die();
            } elseif (file_exists($modulefolder . '/' . $defaultmodule)) {
                $modulefile = MODULE . $url[1] . '/' . $url[1] . '.php';
                $moduleview = MODULEVIEW . $url[1] . '/' . $url[1] . '.php';
                $modulefolder = $modulefile;
                require_once(VQMod::modCheck($modulefolder));
                
                if (isset($url[2])) {
                    if (file_exists($modulefolder)) {
                        if (class_exists($url[2])) {
                            $controller = new $url[2];
                            //load Model
                            $controller->loadModel($url[2],BASEURL . MODEL . MODULEDIR . $url[1] . '/');
                            if (count($url) > 3) {
                                // Determine what to load
                                switch (count($url)) {
                                    case 7:
                                        //Controller->Method(Param1, Param2, Param3)
                                        if (method_exists($controller, $url[3])) {
                                            $controller->{$url[3]}($url[4], $url[5], $url[6]);
                                        } else {
                                            $controller->index();
                                        }
                                        break;
                                    case 6:
                                        //Controller->Method(Param1, Param2)
                                        if (method_exists($controller, $url[3])) {
                                            $controller->{$url[3]}($url[4], $url[5]);
                                        } else {
                                            $controller->index();
                                        }

                                        break;
                                    case 5:
                                        //Controller->Method(Param1, Param2)
                                        if (method_exists($controller, $url[3])) {
                                            $controller->{$url[3]}($url[4]);
                                        } else {
                                            $controller->index();
                                        }

                                        break;
                                    case 4:
                                        //Controller->Method(Param1, Param2)
                                        if (method_exists($controller, $url[3])) {
                                            $controller->{$url[3]}();
                                        } else {
                                            $controller->index();
                                        }
                                        break;
                                    default:
                                        $controller->index();
                                        break;
                                }
                            } else {
                                $controller->index();
                            }
                        } else {
                            $custom_error_name = "Class : '" . $url[2] . "' not found";
                            $folder = $url[1];
                            require_once(VQMod::modCheck(BASEURL . PUBLICS . 'errors.php'));
                            die();
                        }
                    }
                } else {
                    redirect(MODULEDIR . $url[1] . '/' . $url[1] . '/');
                }
            } elseif (file_exists($moduleview)) {
                $view->render($url[2]);
            } else {
                $view->render("404");
            }
        }
    }

}

?>