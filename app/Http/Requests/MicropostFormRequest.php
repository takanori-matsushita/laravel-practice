<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MicropostFormRequest extends FormRequest
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
  public function rules()
  {
    return [
      'user_id' => 'required',
      'content' => 'required|max:140',
      'picture' => 'image|mimes:jpg,jpeg,gif,png|max:5120'
    ];
  }

  public function messages()
  {
    return [
      'picture.max' => 'should be less than 5MB'
    ];
  }
}
