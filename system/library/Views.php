<?php
namespace system\library;

/**
 * @desc this class will hold functions for views
 * @author Abe Jahwin
 */
use system\dev\controller\errorsExec;

class Views
{

    /**
     * @desc Allow to load template
     * @param string $folder - folder name to load template
     * @param string $file- file path
     * @param array $data - array of data to be used on template
     * @return html - html page
     */

    public function display($folder, $file, $data)
    {
        $file_path = 'scheme/views/' . $folder . '/' . $file;
        if (file_exists($file_path)) {
            // *** Configure directories
            $this->templeting_engine = new \Twig\Loader\FilesystemLoader('scheme/views/' . $folder);
            if (_env('USE_CACHE', 'true') === 'true') {
                $twig = new \Twig\Environment($this->templeting_engine, [
                    'cache' => 'system/cache/',
                ]);
            } else {
                $twig = new \Twig\Environment($this->templeting_engine, [
                ]);
            }

            $filters = null;
            $functions = null;
            require 'config/twig.php';
            foreach ($filters as $key => $items) {
                $filter = new \Twig\TwigFilter($items['name'], $items['func']);
                $twig->addFilter($filter);
            }
            foreach ($functions as $key => $items) {
                $function = new \Twig\TwigFunction($items['name'], $items['func']);
                $twig->addFunction($function);
            }
            return $twig->render($file, $data);

        } else {
            $error = array(
                'Type' => 'File missing',
                'Message' => 'View page file not found in [' . $file_path . ']',
                'Dir' => $file_path,
                'Code' => '0001',
            );
            errorsExec::show($error);
        }
    }

}
