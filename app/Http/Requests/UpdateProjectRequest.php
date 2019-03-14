<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
            'amount' => 'required|integer',
            'name' => 'required|string|max:20',
            'location' => 'required|string|max:150',
            'details' => 'required|string|min:5|max:300',
            'duration_id' => 'required|string|min:36|max:36',
            'avatarobject' => 'image|mimes:jpeg,png,jpg|max:1024',
            'repayment_id' => 'required|string',
        ];
    }
}
