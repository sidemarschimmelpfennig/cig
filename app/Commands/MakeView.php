<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class MakeView extends BaseCommand
{
    protected $group = 'Custom';
    protected $name = 'make:view';
    protected $description = 'Cria um novo arquivo de view em app/Views';
    protected $usage = 'make:view [nome]';
    protected $arguments = [
        'nome' => 'O nome do arquivo de view (use / para subpastas)',
    ];

    public function run(array $params)
    {
        $name = $params[0] ?? null;

        if (!$name) {
            CLI::error('Por favor, informe o nome da view.');
            CLI::write('Exemplo: php spark make:view home');
            return;
        }

        // Caminho do arquivo
        $filePath = APPPATH . 'Views/' . $name . '.php';

        // Cria diretórios se não existirem
        $directory = dirname($filePath);
        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
            CLI::write("Diretório criado: {$directory}", 'green');
        }

        // Verifica se o arquivo já existe
        if (file_exists($filePath)) {
            CLI::error("A view {$name}.php já existe em {$directory}");
            return;
        }

        // Conteúdo inicial
        $content = "<!-- View: {$name} -->\n<h1>{$name}</h1>";

        // Cria o arquivo
        if (write_file($filePath, $content)) {
            CLI::write("✅ View criada com sucesso: {$filePath}", 'green');
        } else {
            CLI::error('❌ Não foi possível criar a view.');
        }
    }
}
