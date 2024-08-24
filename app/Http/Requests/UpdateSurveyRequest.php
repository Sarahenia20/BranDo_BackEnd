<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSurveyRequest extends FormRequest
{
    public function authorize()
    {
        $survey = $this->route('survey');
        return $this->user()->id === $survey->user_id;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:1000',
            'image' => 'nullable|string',  // Base64 encoded image string
            'user_id' => 'exists:users,id',
            'status' => 'required|boolean',
            'description' => 'nullable|string',
            'expire_date' => 'nullable|date|after:today',
            'questions' => 'array',  // Array of questions
        ];
    }
}
