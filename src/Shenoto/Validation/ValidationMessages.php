<?php
namespace Shenoto\Validation;

use App;

class ValidationMessages {
  /**
   * @var string
   */
  protected $lang;

  /**
   * @var array
   */
  protected $config;

  /**
   * @var array
   */
  protected static $messages;

  /**
   * @var array
   */
  protected static $app;

  /**
   * @since Sep 21, 2016
   */
  public function __construct() {
    $this->lang = App::getLocale();
      $this->config = include __DIR__ . '/../../lang/' . $this->lang . '/validation.php';
  }

  /**
   * set user custom messeages
   * @param $validator
   * @since Jun 6, 2017
   */

  public static function setCustomMessages($validator) {
    self::$app = include __DIR__ . '/../../config/Config.php';
    $laravel = app();
    $version = $laravel::VERSION;
    if ($validator) {
      if (round($version, 1) < self::$app['version']) {
        self::$messages = $validator->customMessages;
      } else {
        self::$messages = $validator->getCustomMessages();
      }
    }
  }

  /**
   * get validations message
   * @param $message
   * @param $attribute
   * @param $rule
   * @since Jun 10, 2017
   * @return string
   */

  public function Msg($message, $attribute, $rule) {
    if (isset(self::$messages[$rule])) {
      return str_replace($message, self::$messages[$rule], $message);
    }

    return str_replace($message, $this->config[$rule], $message);

  }

}


