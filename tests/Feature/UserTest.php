<?php

namespace Tests\Feature;

use \App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UserFormRequest;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserTest extends TestCase
{
  use DatabaseMigrations;

  private $attributes;

  public function setUp(): void
  {
    parent::setUp();

    $this->attributes = [
      'name'     => 'Laravel User',
      'email'     => 'laravel@example.com',
      'password' => bcrypt('password'),
    ];
  }

  /**
   * A basic feature test example.
   * 
   * @dataProvider userDataProvider
   * @return void
   */

  public function testShouldBeValid($name, $email, $expect)
  {
    User::create($this->attributes);
    $request = new UserFormRequest();
    $rules = $request->rules();
    $item = ["name" => $name, "email" => $email, "password" => "password"];
    $validator = Validator::make($item, $rules);
    $result = $validator->passes();
    $this->assertEquals($expect, $result);
  }

  /**
   * A basic feature test example.
   * 
   * @dataProvider emailDataProvider
   * @return void
   */

  public function testEmailUpper($email, $expect)
  {
    $emailUpper = strtoupper($email);
    $result = $this->stringUpper($emailUpper);
    $this->assertEquals($expect, $result);
  }

  private function stringUpper($emailUpper)
  {
    User::create($this->attributes);
    $users = User::all();
    foreach ($users as $user) {
      if ($emailUpper === strtoupper($user["email"])) {
        return true;
      }
    }
    return false;
  }

  /**
   * A basic feature test example.
   * 
   * @dataProvider emailDataProvider
   * @return void
   */

  public function testEmaillower($email, $expect)
  {
    $emailLower = strtolower($email);
    $result = $this->stringLower($emailLower);
    $this->assertEquals($expect, $result);
  }

  private function stringLower($emailUpper)
  {
    User::create($this->attributes);
    $users = User::all();
    foreach ($users as $user) {
      if ($emailUpper === strtolower($user["email"])) {
        return true;
      }
    }
    return false;
  }

  /**
   * A basic feature test example.
   * 
   * @dataProvider passwordDataProvider
   * @return void
   */

  public function testPasswordInvalid($password, $expect)
  {
    $request = new UserFormRequest();
    $rules = $request->rules();
    $item = ["name" => "test", "email" => "example@laravel.com", "password" => $password];
    $validator = Validator::make($item, $rules);
    $result = $validator->passes();
    $this->assertEquals($expect, $result);
  }

  public function userDataProvider()
  {
    return [
      'true' => ["Example User", "user@example.com", true],
      //nameバリデーション
      'name required error' => ["", "user@example.com", false],
      'name max_length error' => [str_repeat("a", 51), "user@example.com", false],
      //emailバリデーション
      'email required error' => ["Example User", "", false],
      'email max_length error' => ["Example User", str_repeat("a", 244) . "@example.com", false],
      'email unique error' => ["Laravel User", "laravel@example.com", false],
      //emailが有効なパターン
      'email user@example.com' => ["Example User", "user@example.com", true],
      'email USER@foo.COM' => ["Example User", "USER@foo.com", true],
      'email A_US-ER@foo.bar.org' => ["Example User", "A_US-ER@foo.bar.org", true],
      'email first.last@foo.jp' => ["Example User", "first.last@foo.jp", true],
      'email alice+bob@baz.cn' => ["Example User", "alice+bob@baz.cn", true],
      //emailが無効なパターン
      'email  user@example,com' => ["Example User", "user@example,com", false],
      'email  user_at_foo.org' => ["Example User", "user_at_foo.org", false],
      'email  user.name@example.' => ["Example User", "user.name@example.", false],
      'email  foo@bar_baz.com' => ["Example User", "foo@bar_baz.com", false],
      'email  foo@bar+baz.com' => ["Example User", "foo@bar+baz.com", false],
      'email  foo@bar..com' => ["Example User", "foo@bar..com", false],
    ];
  }

  public function emailDataProvider()
  {
    return [
      'email upper lower passed' => ["user@example.com", false],
      'email upper lower error' => ["laravel@example.com", true],
    ];
  }

  public function passwordDataProvider()
  {
    return [
      'blank password' => [str_repeat(" ", 6), false],
      'minimum length password' => [str_repeat("a", 5), false],
    ];
  }
}
