<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuruRequest extends FormRequest
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
        if ($this->method() == 'PATCH') {
            $nip_rules = 'required|string|size:18|unique:guru,nip,' . $this->get('id');
        } else {
            $nip_rules = 'required|string|size:18|unique:guru,nip';
        }
        return [
            'nip' => $nip_rules,
            'nama_guru' => 'required|string|max:30',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'id_pelajaran'  => 'required',
            'alamat'        => 'required|max:50',
            'foto'          => 'sometimes|nullable|image|mimes:jpeg,jpg,png|max:500|dimensions:width=150,height:150',
        ];
    }
}
