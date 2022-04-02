<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use ProtoneMedia\LaravelMixins\Request\ConvertsBase64ToFiles;

class FilesDecodeBase64 extends FormRequest
{

    use ConvertsBase64ToFiles;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
  /*  public function authorize()
    {
        return false;
    }*/

  

    protected function base64FileKeys(): array
    {
        return [
            'image_compressed' => 'avatar_cropped.jpg',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
           
        ];
    }
}
