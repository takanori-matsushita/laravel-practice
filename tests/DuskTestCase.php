<?php

namespace Tests;

use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Laravel\Dusk\TestCase as BaseTestCase;
use App\User;
use Illuminate\Support\Facades\Hash;

abstract class DuskTestCase extends BaseTestCase
{
  use CreatesApplication;

  /**
   * Prepare for Dusk test execution.
   *
   * @beforeClass
   * @return void
   */
  public static function prepare()
  {
    static::startChromeDriver();
  }

  /**
   * Create the RemoteWebDriver instance.
   *
   * @return \Facebook\WebDriver\Remote\RemoteWebDriver
   */
  protected function driver()
  {
    $options = (new ChromeOptions)->addArguments([
      '--disable-gpu',
      '--headless',
      '--window-size=1920,1080',
    ]);

    return RemoteWebDriver::create(
      'http://localhost:9515',
      DesiredCapabilities::chrome()->setCapability(
        ChromeOptions::CAPABILITY,
        $options
      )
    );
  }

  protected function registerUser()
  {
    return  factory(User::class)->create([
      "name" => "Michael Example",
      "email" => "michael@example.com",
      "password" => Hash::make('password'),
      "admin" => true
    ]);
  }

  protected function twoUsers()
  {
    $user1 = $this->registerUser();
    $user2 = factory(User::class)->create([
      "name" => "Sterling Archer",
      "email" => "duchess@example.gov",
      "password" => Hash::make('password')
    ]);
    return [$user1, $user2];
  }

  protected function anyUsers()
  {
    $user1 = $this->registerUser();
    $user2 = factory(User::class)->create([
      "name" => "Sterling Archer",
      "email" => "duchess@example.gov",
      "password" => Hash::make('password')
    ]);
    $user3 = factory(User::class)->create([
      "name" => "Lana Kane",
      "email" => "hands@example.gov",
      "password" => Hash::make('password')
    ]);
    $user4 = factory(User::class)->create([
      "name" => "Malory Archer",
      "email" => "boss@example.gov",
      "password" => Hash::make('password')
    ]);
    $users = [$user1, $user2, $user3, $user4];
    for ($i = 1; $i < 30; $i++) {
      $register = ${"user" . ($i + 4)} = factory(User::class)->create([
        "name" => "User${i}",
        "email" => "user-${i}@example.gov",
        "password" => Hash::make('password')
      ]);
      array_push($users, $register);
    }
    return $users;
  }
}
