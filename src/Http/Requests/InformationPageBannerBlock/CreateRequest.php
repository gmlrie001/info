<?php

namespace Vault\Info\Http\Requests\InformationPageBannerBlock;

use Illuminate\Foundation\Http\FormRequest;


class CreateRequest extends FormRequest
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
      'my_name' => 'honeypot',
      'my_time' => 'required|honeytime:0', 
    ];
  }
  
  /**
   * Get the error messages for the defined validation rules.
   *
   * @return array
   */
  public function messages()
  {
    return [
      'my_time.required'   => '',
      'my_name.honeypot'   => '',
      'my_time.honeytime'  => '', 
    ];
  }

}
