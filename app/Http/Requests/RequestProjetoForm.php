<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestProjetoForm extends FormRequest
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
            'name' => 'required',
            'descricao' => 'required',
            'instituicao_id' => 'required', 
            'eixo_id' => 'required', 
            'categoria_id' => 'required', 
            'ambito_id' => 'required', 
            'cronograma' => 'required', 
            'comentarios_prof' => 'required', 
            'ancora' => 'required', 
            'questao_motriz' => 'required', 
            'n_alunos' => 'required', 
            'prazo' => 'required',
            'feedback' => 'required', 
            'tags' => 'required',
            'resultado' => 'required',
            'name_prof' => 'nullable', 
            'email' => 'nullable', 
            //'img' => 'image',
        ];
    }

    public function messages() 
    {
        return [
            'name.required' => 'O campo nome é obrigatório',
            'descricao.required' => 'O campo descrição é obrigatório',
            'instituicao_id.required' => 'O campo instituição é obrigatório', 
            'eixo_id.required' => 'O campo eixo é obrigatório', 
            'categoria_id.required' => 'O campo categoria é obrigatório', 
            'ambito_id.required' => 'O campo ambito é obrigatório', 
            'cronograma.required' => 'O campo cronograma é obrigatório', 
            'comentarios_prof.required' => 'O campo comentários é obrigatório', 
            'ancora.required' => 'O campo âncora é obrigatório', 
            'questao_motriz.required' => 'O campo questão motriz é obrigatório', 
            'n_alunos.required' => 'O campo número de alunos é obrigatório', 
            'prazo.required' => 'O campo prazo é obrigatório',
            'feedback.required' => 'O campo feedback é obrigatório', 
            'tags.required' => 'O campo tags é obrigatório',
            'resultado.required' => 'O campo resultado é obrigatório', 
        ];
    }
}
