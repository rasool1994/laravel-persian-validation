<?php
namespace Shenoto\Validation;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;


class ValidationServiceProvider extends ServiceProvider {

  /**
   * Indicates if loading of the provider is deferred.
   *
   * @var bool
   */
  protected $defer = false;

  /**
   * Bootstrap the application events.
   *
   * @return void
   */
  public function boot() {

    $this->package('shenoto/validation');

    // create custom rule for Alpha
    Validator::extend('persian_alpha', 'ValidationRules@Alpha');
    // create custom message for Alpha
    Validator::replacer('persian_alpha', 'ValidationMessages@Msg');

    // create custom rule for Num
    Validator::extend('persian_num', 'ValidationRules@Num');
    // create custom message for Num
    Validator::replacer('persian_num', 'ValidationMessages@Msg');

    // create custom rule for AlphaNum
    Validator::extend('persian_alpha_num', 'ValidationRules@AlphaNum');
    // create custom message for AlphaNum
    Validator::replacer('persian_alpha_num', 'ValidationMessages@Msg');

    // create custom rule for IranMobile
    Validator::extend('iran_mobile', 'ValidationRules@IranMobile');
    // create custom message for IranMobile
    Validator::replacer('iran_mobile', 'ValidationMessages@Msg');

    // create custom rule for Sheba
    Validator::extend('sheba', 'ValidationRules@Sheba');
    // create custom message for Sheba
    Validator::replacer('sheba', 'ValidationMessages@Msg');

    // create custom rule for MelliCode
    Validator::extend('melli_code', 'ValidationRules@MelliCode');
    // create custom message for MelliCode
    Validator::replacer('melli_code', 'ValidationMessages@Msg');

    // create custom rule for IsNotPersian
    Validator::extend('is_not_persian', 'ValidationRules@IsNotPersian');
    // create custom message for IsNotPersian
    Validator::replacer('is_not_persian', 'ValidationMessages@Msg');

    // create custom rule for LimitArray
    Validator::extend('limited_array', 'ValidationRules@LimitedArray');
    // create custom message for LimitArray
    Validator::replacer('limited_array', 'ValidationMessages@Msg');

    // create custom rule for UnSignedNum
    Validator::extend('unsigned_num', 'ValidationRules@UnSignedNum');
    // create custom message for UnSignedNum
    Validator::replacer('unsigned_num', 'ValidationMessages@Msg');

    // create custom rule for AlphaSpace
    Validator::extend('alpha_space', 'ValidationRules@AlphaSpace');
    // create custom message for AlphaSpace
    Validator::replacer('alpha_space', 'ValidationMessages@Msg');

    // create custom rule for Url
    Validator::extend('a_url', 'ValidationRules@Url');
    // create custom message for Url
    Validator::replacer('a_url', 'ValidationMessages@Msg');

    // create custom rule for Domain
    Validator::extend('a_domain', 'ValidationRules@Domain');
    // create custom message for Domain
    Validator::replacer('a_domain', 'ValidationMessages@Msg');

    // create custom rule for More
    Validator::extend('more', 'ValidationRules@More');
    // create custom message for More
    Validator::replacer('more', 'ValidationMessages@Msg');

    // create custom rule for Less
    Validator::extend('less', 'ValidationRules@Less');
    // create custom message for Less
    Validator::replacer('less', 'ValidationMessages@Msg');

    // create custom rule for IranPhone
    Validator::extend('iran_phone', 'ValidationRules@IranPhone');
    // create custom message for IranPhone
    Validator::replacer('iran_phone', 'ValidationMessages@Msg');

    // create custom rule for CardNumber
    Validator::extend('card_number', 'ValidationRules@CardNumber');
    // create custom message for CardNumber
    Validator::replacer('card_number', 'ValidationMessages@Msg');

    // create custom rule for Address
    Validator::extend('address', 'ValidationRules@Address');
    // create custom message for Address
    Validator::replacer('address', 'ValidationMessages@Msg');

    // create custom rule for IranPostalCode
    Validator::extend('iran_postal_code', 'ValidationRules@IranPostalCode');
    // create custom message for IranPostalCode
    Validator::replacer('iran_postal_code', 'ValidationMessages@Msg');

    // create custom rule for PackageName
    Validator::extend('package_name', 'ValidationRules@PackageName');
    // create custom message for PackageName
    Validator::replacer('package_name', 'ValidationMessages@Msg');


  }

  /**
   * Register the service provider.
   *
   * @return void
   */

  public function register() {
    $this->app['ValidationRules'] = $this->app->share(function ($app) {
      return new ValidationRules();
    });

    $this->app['ValidationMessages'] = $this->app->share(function ($app) {
      return new ValidationMessages;
    });

    $this->app->booting(function () {
      $loader = \Illuminate\Foundation\AliasLoader::getInstance();
      $loader->alias('Validation', 'Shenoto\Validation\Validation');
    });

  }

  /**
   * Get the services provided by the provider.
   *
   * @return array
   */
  public function provides() {
    return array();
  }

}
