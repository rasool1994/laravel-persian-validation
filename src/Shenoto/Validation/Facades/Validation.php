<?php
namespace Shenoto\Validation\Facades;
use Illuminate\Support\Facades\Facade;
class Validation extends Facade {
  protected static function getFacadeAccessor()
  {
    return 'validation';
  }
}