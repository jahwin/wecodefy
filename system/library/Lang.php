<?php
namespace system\library;

use system\dev\controller\errorsExec;
use system\library\Cookies;
use system\library\DB;

class Lang
{
    private static $instance;
    private static $locale = null;

    /**
     * @desc Allow to start language instance
     * @return Lang
     */
    public static function init()
    {

        if (_env('LANGUAGE_STORAGE', 'file') === 'file') {
            self::CheckFile(_env('DEFAULT_LANGUAGE', 'en-us'));
        } elseif (_env('LANGUAGE_STORAGE', 'database') === 'database') {
            self::IsTableExist();

        }
        self::$instance = new self();
        return self::$instance;
    }
    /**
     * @desc Allow to check if language file exists
     * @param $locale
     * @return
     */
    public static function CheckFile($locale)
    {
        if (!file_exists('locale/' . $locale . '/lang.php')) {
            $error = array(
                'Type' => 'File missing',
                'Message' => "<b>" . $locale . "</b> locale is missing or incorrect typing, Try to create this way in locale/" . $locale . "/lang.php or correct locale name.",
                'Dir' => 'locale/' . $locale . '/',
                'Code' => '0001',
            );
            errorsExec::show($error);
        }
    }
    /**
     * @desc Allow to transilate using file or database
     * @param $test
     * @return String
     */
    public static function Trans($text)
    {

        $locale = _env('DEFAULT_LANGUAGE', 'en-us');

        if (_env('LANGUAGE_STORAGE', 'file') === 'file') {
            $keywords = null;
            if (!file_exists('locale/' . $locale . '/lang.php')) {
                $error = array(
                    'Type' => 'File missing',
                    'Message' => "<b>" . $locale . "</b> locale is missing or incorrect typing, Try to create this way in locale/" . $locale . "/lang.php or correct locale name.",
                    'Dir' => 'locale/' . $locale . '/',
                    'Code' => '0001',
                );
                errorsExec::show($error);
            } else {
                require_once 'locale/' . $locale . '/lang.php';
            }
            if (isset($keywords[$text])) {
                return $keywords[$text];
            } else {
                self::SaveKeyword($keywords, $text);
                return $text;
            }
        } elseif (_env('LANGUAGE_STORAGE', 'database') === 'database') {
            $length = DB::table("lang-keywords")->select('value')->where([['key', '=', $text], ['locale', '=', $locale]])->count();
            if ($length > 0) {
                $data = DB::table("lang-keywords")->select('value')->where([['key', '=', $text], ['locale', '=', $locale]])->get();
                return $data[0]->value;
            } else {
                self::SaveKeyword(null, $text);
            }

        }

    }
    /**
     * @desc Allow to save keyword in file or database
     * @param $keywords, $text
     * @return
     */
    public static function SaveKeyword($keywords, $text)
    {
        if (_env('LANGUAGE_AUTO_SAVE', 'true') === "true") {
            if (_env('LANGUAGE_STORAGE', 'file') === 'file') {

                $locale = _env('DEFAULT_LANGUAGE', 'en-us');
                $keywords[$text] = $text;
                $file = 'locale/' . $locale . '/lang.php';
                file_put_contents($file,
                    '<?php
$keywords = ' . var_export($keywords, true) . ';
?>');
            } elseif (_env('LANGUAGE_STORAGE', 'database') === 'database') {

                $locale = _env('DEFAULT_LANGUAGE', 'en-us');
                $key = $text;
                $value = $text;

                DB::table('lang-keywords')->insert([
                    'key' => $key,
                    'value' => $value,
                    'locale' => $locale,
                ]);

            }

        }
    }
/**
 * @desc Allow to check table if exist
 * @param
 * @return
 */
    public static function IsTableExist()
    {
        // Check and Create lang-keywords table
        if (DB::schema()->hasTable('lang-keywords') == false) {
            DB::schema()->create('lang-keywords', function ($table) {
                $table->increments('id');
                $table->string('key');
                $table->string('value');
                $table->string('locale');
            });
        }
        // Check and Create lang-index table
        if (DB::schema()->hasTable('lang-index') == false) {
            DB::schema()->create('lang-index', function ($table) {
                $table->increments('id');
                $table->string('lang_name');
                $table->string('locale');
            });
        }
    }
/**
 * @desc Allow to set locale
 * @param $locale
 * @return
 */
    public static function setLocale($locale)
    {
        self::$locale = $locale;
        Cookies::Add('sys-lang', $locale, 30);
        return self::$instance;
    }
    /**
     * @desc Allow to get language index
     * @param
     * @return
     */
    public static function getLangIndex()
    {
        $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        if (_env('LANGUAGE_STORAGE', 'file') === 'file') {
            $lang_index = null;
            require 'config/lang.php';
            return $lang_index;
        } elseif (_env('LANGUAGE_STORAGE', 'database') === 'database') {
            $data = DB::table('lang-index')->get();
            return $data;
        }

    }
}
