<?php

namespace Sonar200\Template;

/**
 * Класс для сборки и получения шаблонов
 *
 * @package Core\Base\Template
 *
 *
 */
class Template
{

    /** @var Template */
    protected static Template $instances;

    /** @var string Папка для основных шаблонов страницы */
    const LAYOUT_FOLDER = '/layouts';

    /** @var string основной шаблон странциы */
    private static string $layout = 'main';

    /** @var string Путь к файлам шаблона */
    private static string $templatePath;

    /** @var array Параметры для основного шаблона */
    private static array $layoutParams = [];

    /**
     * Получение собраного шаблона
     *
     * @param string|null $template
     * @param array       $data
     * @param string|null $title
     * @param string      $layout
     *
     * @return false|string
     */
    public function view(string $template = null, array $data = [], string $title = null, string $layout = '')
    {
        if (!empty(self::$templatePath) && !empty($template)) {
            $file = self::getPathToTemplate(self::$templatePath . '/template/' . $template);
            $content = self::require($file, $data) . PHP_EOL;

            return self::layout($layout, $content, $title);
        }

        return false;
    }

    /**
     * Получение основного шаблона
     *
     * @param string|null $layout
     * @param string|null $content
     * @param string|null $title
     *
     * @return false|string
     */
    private function layout(string $layout = null, string $content = null, string $title = null)
    {
        $data = self::$layoutParams;
        $data['content'] = $content;
        $data['title'] = !empty($title) ? $title : '';

        array_merge($data, self::$layoutParams);

        $layout = !empty($layout) ? $layout : self::$layout;
        $file = self::getPathToTemplate(self::LAYOUT_FOLDER . '/' . $layout);

        return self::require($file, $data);
    }

    /**
     * Подключение файлов шаблонов
     *
     * @param string|null $file
     * @param array       $data
     *
     * @return false|string
     */
    private function require(string $file = null, array $data = [])
    {
        if (file_exists($file)) {
            extract($data);

            ob_start();
            require_once $file;
            $content = ob_get_contents();
            ob_end_clean();

            return $content;
        }

        return false;
    }

    /**
     * Подключение произвольных шаблонов
     *
     * @param string $path
     * @param string $template
     * @param array  $data
     *
     * @return false|string
     */
    public function requireTemplate(string $path, string $template, array $data = [])
    {
        $path = $this->getPathToTemplate($path . '/' . $template);

        return $this->require($path, $data);
    }

    /**
     * Сборка пути к указанному файлу
     *
     * @param string $path
     *
     * @return string
     */
    private function getPathToTemplate(string $path)
    {
        return $_SERVER['DOCUMENT_ROOT'] . '/' . $path . '.php';
    }

    /**
     * Установка основного шаблона
     *
     * @param string|null $layout
     */
    public function setLayout(string $layout = null)
    {
        if (!empty($layout)) {
            self::$layout = $layout;
        }
    }

    /**
     * @param mixed $key
     * @param mixed $value
     */
    public function setLayoutParams($key, $value)
    {
        if($key){
            self::$layoutParams[$key] = $value;
        }
    }

    /**
     * Установка пути к файлам шаблона
     *
     * @param string|null $templatePath
     */
    public function registerTemplatePath(string $templatePath = null)
    {
        $path = str_replace('\\', '/', $templatePath);
        if(!is_null($path)){
            self::$templatePath = is_array($path) ? $path[0] : $path;
        }
    }

    /**
     * @return Template
     */
    public static function getInstance()
    {
        $class = get_called_class();

        if (!empty(self::$instances)) {
            self::$instances = new $class;
        }
        return self::$instances;
    }

    protected function __clone()
    {
    }

    protected function __wakeup()
    {
    }
}