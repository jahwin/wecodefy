<?php
namespace system\library;

/**
 * @desc this class will hold functions for views
 * @author Abe Jahwin
 */
use system\dev\exec\errorsExec;
use system\library\Lang;

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
        $file_path = 'app/http/' . $folder . '/views/' . $file;
        if (file_exists($file_path)) {
            // *** Configure directories
            $this->templeting_engine = new \Twig\Loader\FilesystemLoader('app/http/' . $folder . '/views/');
            if (_env('USE_CACHE','true') === 'true') {
                $twig = new \Twig\Environment($this->templeting_engine, [
                    'cache' => 'system/cache/',
                ]);
            } else {
                $twig = new \Twig\Environment($this->templeting_engine, [
                ]);
            }

            // Language transilation
            $translate_filter = new \Twig\TwigFilter('translate', function ($val) {
                return Lang::init()->Trans($val);
            });
            $twig->addFilter($translate_filter);

            // Env access
            $env_filter = new \Twig\TwigFilter('env', function ($val) {
                return getenv($val);
            });
            $twig->addFilter($env_filter);

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
