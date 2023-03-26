<?php

namespace App\Http\Requests;

use App\DTO\CreatePersonCard;
use Illuminate\Foundation\Http\FormRequest;

class CreatePersonCardRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'person_name' => 'required|string|max:255',
            'linkedin_url' => 'nullable|string|max:255',
            'github_url' => 'nullable|string|max:255',
        ];
    }

    public function getData(): CreatePersonCard
    {
        $data = new CreatePersonCard();

        $data->personName = $this->post('person_name');
        $data->linkedinUrl = $this->post('linkdedin_url');
        $data->githubUrl = $this->post('github_url');

        return $data;
    }
}
