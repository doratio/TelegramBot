<?php
require_once 'Logger.php';

/**
 * Class FLogger
 *
 * Реализация логгера
 *
 */
class FLogger extends Logger
{
    /**
     *
     * Файл для записи
     *
     * @var resource
     */
    public $file;

    /**
     * FLogger constructor.
     *
     * Открывает поток для записи в файл
     *
     * @param $fn Название файла
     * @return void
     */
    public function __construct($fn)
    {
        $this->file = fopen($fn, 'w+');
    }

    /**
     * Flogger destructor.
     *
     * Закрывает поток для записи в файл
     *
     * @return void
     */
    public function __destruct()
    {
        fclose($this->file);
    }

    /**
     *
     * Записывает сообщения в файл
     *
     * @param string $textLog Текст сообщения
     */
    public function log($textLog)
    {
        fputs($this->file, date('F Y H:i:s') . "\n" . $textLog . "\n\n");
    }
}