<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Rules\Uppercase;
use Illuminate\Validation\Rule;

class UserFormRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules(Request $request)
  {
    $password = [];
    if ($request->method() === 'POST') {
      $password = [
        "min:6",
        "required"
      ];
    }
    return [
      "name" => "required|max:50",
      "email" => [
        "required",
        "max:255",
        "email:filter",
        Rule::unique('users')->ignore(\Auth::id()),
      ],
      "password" => $password
    ];
  }
}
