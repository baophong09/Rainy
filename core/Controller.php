<?php

/**
 * Rainy - A Light-Weight PHP Framework For Beginner
 *
 * @package  RainyFramework
 * @author   Dinh Phong <dinhphong.developer@gmail.com>
 *
 */

namespace Rainy;

class Controller
{
    protected $model;

    public function getModel($model)
    {
        if(file_exists("app/model/" . $model . EXT)) {
            // require_once("app/model/" . $model . EXT);
            $model = "app\\model\\".$model;

            return new $model;

        } else {
            throw new \Exception("The model: {$model} not exists");
        }
    }

    public function model($model)
    {
        try {
            $this->model =  $this->getModel($model);
            return $this->model;
        } catch (\Exception $e) {
            echo 'Caught exception: '. $e->getMessage() . "\n";
        }
    }

    public function getView($view, $data = [])
    {
        if(file_exists("app/view/" . $view . EXT)) {

            return require("app/view/" . $view . EXT);

        } else {
            throw new \Exception("The model: {$view} not exists");
        }
    }

    public function view($view, $data = [])
    {
        try {
            $this->getView($view, $data);
        } catch (\Exception $e) {
            echo 'Caught exception: '. $e->getMessage() . "\n";
        }
    }
}