<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Mensagens de Validação
    |--------------------------------------------------------------------------
    |
    | As seguintes linhas de código contêm as mensagens de erro padrão usadas
    | pelo Validator. Algumas dessas regras possuem várias versões, como as
    | regras de tamanho. Sinta-se à vontade para modificar cada uma delas.
    |
    */

    'accepted' => 'O :attribute deve ser aceito.',
    'active_url' => 'O :attribute não é uma URL válida.',
    'after' => 'O :attribute deve ser uma data posterior a :date.',
    'after_or_equal' => 'O :attribute deve ser uma data posterior ou igual a :date.',
    'alpha' => 'O :attribute só pode conter letras.',
    'alpha_dash' => 'O :attribute só pode conter letras, números, traços e sublinhados.',
    'alpha_num' => 'O :attribute só pode conter letras e números.',
    'array' => 'O :attribute deve ser um array.',
    'before' => 'O :attribute deve ser uma data anterior a :date.',
    'before_or_equal' => 'O :attribute deve ser uma data anterior ou igual a :date.',
    'between' => [
        'numeric' => 'O :attribute deve ser entre :min e :max.',
        'file' => 'O :attribute deve ter entre :min e :max kilobytes.',
        'string' => 'O :attribute deve ter entre :min e :max caracteres.',
        'array' => 'O :attribute deve ter entre :min e :max itens.',
    ],
    'boolean' => 'O campo :attribute deve ser verdadeiro ou falso.',
    'confirmed' => 'A confirmação de :attribute não confere.',
    'date' => 'O :attribute não é uma data válida.',
    'date_equals' => 'O :attribute deve ser uma data igual a :date.',
    'date_format' => 'O :attribute não corresponde ao formato :format.',
    'different' => 'O :attribute e :other devem ser diferentes.',
    'digits' => 'O :attribute deve ter :digits dígitos.',
    'digits_between' => 'O :attribute deve ter entre :min e :max dígitos.',
    'dimensions' => 'O :attribute tem dimensões de imagem inválidas.',
    'distinct' => 'O campo :attribute possui um valor duplicado.',
    'email' => 'O :attribute deve ser um endereço de e-mail válido.',
    'exists' => 'O :attribute selecionado é inválido.',
    'file' => 'O :attribute deve ser um arquivo.',
    'filled' => 'O campo :attribute é obrigatório.',
    'gt' => [
        'numeric' => 'O :attribute deve ser maior que :value.',
        'file' => 'O :attribute deve ser maior que :value kilobytes.',
        'string' => 'O :attribute deve ser maior que :value caracteres.',
        'array' => 'O :attribute deve ter mais de :value itens.',
    ],
    'gte' => [
        'numeric' => 'O :attribute deve ser maior ou igual a :value.',
        'file' => 'O :attribute deve ser maior ou igual a :value kilobytes.',
        'string' => 'O :attribute deve ser maior ou igual a :value caracteres.',
        'array' => 'O :attribute deve ter :value itens ou mais.',
    ],
    'image' => 'O :attribute deve ser uma imagem.',
    'in' => 'O :attribute selecionado é inválido.',
    'in_array' => 'O campo :attribute não existe em :other.',
    'integer' => 'O :attribute deve ser um número inteiro.',
    'ip' => 'O :attribute deve ser um endereço IP válido.',
    'ipv4' => 'O :attribute deve ser um endereço IPv4 válido.',
    'ipv6' => 'O :attribute deve ser um endereço IPv6 válido.',
    'json' => 'O :attribute deve ser uma string JSON válida.',
    'lt' => [
        'numeric' => 'O :attribute deve ser menor que :value.',
        'file' => 'O :attribute deve ser menor que :value kilobytes.',
        'string' => 'O :attribute deve ser menor que :value caracteres.',
        'array' => 'O :attribute deve ter menos de :value itens.',
    ],
    'lte' => [
        'numeric' => 'O :attribute deve ser menor ou igual a :value.',
        'file' => 'O :attribute deve ser menor ou igual a :value kilobytes.',
        'string' => 'O :attribute deve ser menor ou igual a :value caracteres.',
        'array' => 'O :attribute não deve ter mais que :value itens.',
    ],
    'max' => [
        'numeric' => 'O :attribute não pode ser maior que :max.',
        'file' => 'O :attribute não pode ser maior que :max kilobytes.',
        'string' => 'O :attribute não pode ser maior que :max caracteres.',
        'array' => 'O :attribute não pode ter mais que :max itens.',
    ],
    'mimes' => 'O :attribute deve ser um arquivo do tipo: :values.',
    'mimetypes' => 'O :attribute deve ser um arquivo do tipo: :values.',
    'min' => [
        'numeric' => 'O :attribute deve ser no mínimo :min.',
        'file' => 'O :attribute deve ter no mínimo :min kilobytes.',
        'string' => 'O :attribute deve ter no mínimo :min caracteres.',
        'array' => 'O :attribute deve ter no mínimo :min itens.',
    ],
    'not_in' => 'O :attribute selecionado é inválido.',
    'not_regex' => 'O formato do campo :attribute é inválido.',
    'numeric' => 'O :attribute deve ser um número.',
    'password' => 'A senha está incorreta.',
    'present' => 'O campo :attribute deve estar presente.',
    'regex' => 'O formato do campo :attribute é inválido.',
    'required' => 'O campo :attribute é obrigatório.',
    'required_if' => 'O campo :attribute é obrigatório quando :other é :value.',
    'required_unless' => 'O campo :attribute é obrigatório a menos que :other esteja em :values.',
    'required_with' => 'O campo :attribute é obrigatório quando :values está presente.',
    'required_with_all' => 'O campo :attribute é obrigatório quando :values estão presentes.',
    'required_without' => 'O campo :attribute é obrigatório quando :values não está presente.',
    'required_without_all' => 'O campo :attribute é obrigatório quando nenhum dos :values estão presentes.',
    'same' => 'O :attribute e :other devem corresponder.',
    'size' => [
        'numeric' => 'O :attribute deve ser :size.',
        'file' => 'O :attribute deve ter :size kilobytes.',
        'string' => 'O :attribute deve ter :size caracteres.',
        'array' => 'O :attribute deve conter :size itens.',
    ],
    'starts_with' => 'O :attribute deve começar com um dos seguintes: :values',
    'string' => 'O :attribute deve ser uma string.',
    'timezone' => 'O :attribute deve ser uma zona válida.',
    'unique' => 'O :attribute já foi utilizado.',
    'uploaded' => 'Falha ao carregar o :attribute.',
    'url' => 'O formato do campo :attribute é inválido.',
    'uuid' => 'O :attribute deve ser um UUID válido.',

    /*
    |--------------------------------------------------------------------------
    | Customizações de Mensagens de Validação
    |--------------------------------------------------------------------------
    |
    | Aqui você pode especificar mensagens de validação personalizadas para atributos
    | usando a convenção "attribute.rule" para nomear as linhas. Isso ajuda a
    | definir uma mensagem específica para uma regra de atributo determinada.
    |
    */

    'custom' => [
        'nome' => [
            'required' => 'O campo nome é obrigatório.',
            'string' => 'O campo nome deve ser uma string.',
            'max' => 'O campo nome não pode ter mais que 255 caracteres.',
        ],
        'email' => [
            'required' => 'O campo email é obrigatório.',
            'email' => 'O campo email deve ser um endereço de e-mail válido.',
            'max' => 'O campo email não pode ter mais que 255 caracteres.',
        ],
        'cpf' => [
            'required' => 'O campo CPF é obrigatório.',
            'digits' => 'O campo CPF deve ter 11 dígitos.',
        ],
        'data_nascimento' => [
            'required' => 'O campo data de nascimento é obrigatório.',
            'date' => 'O campo data de nascimento deve ser uma data válida.',
        ],
        'sexo' => [
            'required' => 'O campo sexo é obrigatório.',
            'string' => 'O campo sexo deve ser uma string.',
        ],
        'estado_civil' => [
            'required' => 'O campo estado civil é obrigatório.',
            'string' => 'O campo estado civil deve ser uma string.',
            'max' => 'O campo estado civil não pode ter mais que 255 caracteres.',
        ],
        'pretencao_salarial' => [
            'required' => 'O campo pretensão salarial é obrigatório.',
            'numeric' => 'O campo pretensão salarial deve ser um número.',
            'min' => 'O campo pretensão salarial deve ser no mínimo 0.',
            'max' => 'O campo pretensão salarial não pode ser maior que 999999.99.',
        ],
        'experiencia_profissional' => [
            'array' => 'O campo experiência profissional deve ser um array.',
        ],
        'experiencia_profissional.*.empresa' => [
            'required_with' => 'O campo empresa é obrigatório quando uma experiência profissional é fornecida.',
            'string' => 'O campo empresa deve ser uma string.',
            'max' => 'O campo empresa não pode ter mais que 255 caracteres.',
        ],
        'experiencia_profissional.*.data_inicio' => [
            'required_with' => 'O campo data de início é obrigatório quando uma experiência profissional é fornecida.',
            'date' => 'O campo data de início deve ser uma data válida.',
        ],
        'experiencia_profissional.*.data_fim' => [
            'date' => 'O campo data de fim deve ser uma data válida.',
        ],
        'experiencia_profissional.*.emprego_atual' => [
            'boolean' => 'O campo emprego atual deve ser verdadeiro ou falso.',
        ],
        'experiencia_profissional.*.localizacao' => [
            'required_with' => 'O campo localização é obrigatório quando uma experiência profissional é fornecida.',
            'string' => 'O campo localização deve ser uma string.',
            'max' => 'O campo localização não pode ter mais que 255 caracteres.',
        ],
        'experiencia_profissional.*.tipo' => [
            'required_with' => 'O campo tipo é obrigatório quando uma experiência profissional é fornecida.',
            'string' => 'O campo tipo deve ser uma string.',
        ],
        'experiencia_profissional.*.descricao' => [
            'string' => 'O campo descrição deve ser uma string.',
        ],
        'escolaridade' => [
            'array' => 'O campo escolaridade deve ser um array.',
        ],
        'escolaridade.*.escola' => [
            'required_with' => 'O campo escola é obrigatório quando uma escolaridade é fornecida.',
            'string' => 'O campo escola deve ser uma string.',
            'max' => 'O campo escola não pode ter mais que 255 caracteres.',
        ],
        'escolaridade.*.tipo' => [
            'required_with' => 'O campo tipo é obrigatório quando uma escolaridade é fornecida.',
            'string' => 'O campo tipo deve ser uma string.',
            'max' => 'O campo tipo não pode ter mais que 255 caracteres.',
        ],
        'escolaridade.*.periodo_inicio' => [
            'required_with' => 'O campo período de início é obrigatório quando uma escolaridade é fornecida.',
            'date' => 'O campo período de início deve ser uma data válida.',
        ],
        'escolaridade.*.periodo_fim' => [
            'date' => 'O campo período de fim deve ser uma data válida.',
        ],
        'escolaridade.*.estudando_atualmente' => [
            'boolean' => 'O campo estudando atualmente deve ser verdadeiro ou falso.',
        ],
        'escolaridade.*.local' => [
            'required_with' => 'O campo local é obrigatório quando uma escolaridade é fornecida.',
            'string' => 'O campo local deve ser uma string.',
            'max' => 'O campo local não pode ter mais que 255 caracteres.',
        ],
        'escolaridade.*.descricao' => [
            'string' => 'O campo descrição deve ser uma string.',
        ],
        'cursos' => [
            'array' => 'O campo cursos deve ser um array.',
        ],
        'cursos.*.nome' => [
            'required_with' => 'O campo nome é obrigatório quando um curso é fornecido.',
            'string' => 'O campo nome deve ser uma string.',
            'max' => 'O campo nome não pode ter mais que 255 caracteres.',
        ],
        'cursos.*.local' => [
            'required_with' => 'O campo local é obrigatório quando um curso é fornecido.',
            'string' => 'O campo local deve ser uma string.',
            'max' => 'O campo local não pode ter mais que 255 caracteres.',
        ],
        'cursos.*.carga_horaria' => [
            'required_with' => 'O campo carga horária é obrigatório quando um curso é fornecido.',
            'integer' => 'O campo carga horária deve ser um número inteiro.',
            'min' => 'O campo carga horária deve ser no mínimo 0.',
        ],
        'cursos.*.descricao' => [
            'string' => 'O campo descrição deve ser uma string.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Atributos de Validação Personalizados
    |--------------------------------------------------------------------------
    |
    | As seguintes linhas de código são usadas para trocar o marcador de posição
    | do atributo por algo mais legível, como "Endereço de E-mail" ao invés de
    | "email". Isso simplesmente nos ajuda a tornar nossa mensagem mais expressiva.
    |
    */

    'attributes' => [
        'nome' => 'nome',
        'email' => 'e-mail',
        'cpf' => 'CPF',
        'data_nascimento' => 'data de nascimento',
        'sexo' => 'sexo',
        'estado_civil' => 'estado civil',
        'pretencao_salarial' => 'pretensão salarial',
        'experiencia_profissional' => 'experiência profissional',
        'experiencia_profissional.*.empresa' => 'empresa da experiência profissional',
        'experiencia_profissional.*.data_inicio' => 'data de início da experiência profissional',
        'experiencia_profissional.*.data_fim' => 'data de fim da experiência profissional',
        'experiencia_profissional.*.emprego_atual' => 'emprego atual na experiência profissional',
        'experiencia_profissional.*.localizacao' => 'localização da experiência profissional',
        'experiencia_profissional.*.tipo' => 'tipo de experiência profissional',
        'experiencia_profissional.*.descricao' => 'descrição da experiência profissional',
        'escolaridade' => 'escolaridade',
        'escolaridade.*.escola' => 'escola da escolaridade',
        'escolaridade.*.tipo' => 'tipo de escolaridade',
        'escolaridade.*.periodo_inicio' => 'período de início da escolaridade',
        'escolaridade.*.periodo_fim' => 'período de fim da escolaridade',
        'escolaridade.*.estudando_atualmente' => 'estudando atualmente na escolaridade',
        'escolaridade.*.local' => 'local da escolaridade',
        'escolaridade.*.descricao' => 'descrição da escolaridade',
        'cursos' => 'cursos',
        'cursos.*.nome' => 'nome do curso',
        'cursos.*.local' => 'local do curso',
        'cursos.*.carga_horaria' => 'carga horária do curso',
        'cursos.*.descricao' => 'descrição do curso',
    ],

];
