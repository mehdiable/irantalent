<?php

namespace App\Models;

class ViewModel
{
    /** @var IViewModel */
    private $viewModel;
    
    /**
     * ViewModel constructor.
     * @param string $path
     * @throws \Exception
     */
    public function __construct(string $path)
    {
        $namespace = explode('.', $path, 2);
        if (count($namespace) != 2) {
            throw new \Exception('Please put correct path. e.g. modelName.viewName or modelName.paths.viewName');
        }
        
        $view = ucwords(str_replace('.', "\\", $namespace[1]));
        $model = ucwords($namespace[0]);
        $vm = "\\App\\Models\\{$model}\\ViewModel\\{$view}ViewModel";
        $this->viewModel = new $vm();
    }
    
    /**
     * @return mixed
     */
    public function response()
    {
        return $this->viewModel->action();
    }
}
