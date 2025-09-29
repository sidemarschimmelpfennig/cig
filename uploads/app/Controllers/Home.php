<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data['error'] = session()->getFlashdata('error');
        return view('upload_form', $data);

    }
    // public function upload_submit()
    // {
    //     echo '<pre>';
    //     //busca todos os arquivos
    //     // print_r($this->request->getFiles());
    //     // Busca um arquivo especifico
    //     // print_r($this->request->getFile('file_upload'));
    //     // Verifica se foi feito com sucesso
    //     // if ($this->request->getFile('texte')->isValid()) {
    //     //     echo 'deu certo';
    //     // } else {
    //     //     echo 'nao deu certo';
    //     // }
    //     //define a uma variavel
    //     $ficheiro = $this->request->getFile('file_upload');
    //     // print_r($ficheiro);

    //     // if ($ficheiro->isValid()) {

    //     // }else{

    //     // }

    //     // echo '<br>';
    //     // echo $ficheiro->getClientName();

    //     // echo '<br>';
    //     // echo $ficheiro->getName();

    //     // echo '<br>';
    //     // echo $ficheiro->getTempName();

    //     // echo '<br>';
    //     // echo $ficheiro->getExtension();

    //     // echo '<br>';
    //     // echo $ficheiro->getMimeType();

    //     // echo '<br>';
    //     // echo $ficheiro->getSize();
    //     if (!$ficheiro->isValid()) {
    //         return redirect()->back()->with('error', 'Imagem obteve um erro ao carregar');
    //     }

    //     $validation = $this->validate([
    //         'file_upload' => [
    //             'label' => 'imagem',
    //             'rules' => [
    //                 'uploaded[file_upload]',
    //                 'mime_in[file_upload, image/jpeg, image/jpeg]',
    //                 'max_size[file_upload, 4096]',
    //             ],
    //             'errors' => [
    //                 'uploaded' => 'O campo {field} não foi carregado.',
    //                 'mime_in' => 'A {field} não é uma imagem valida ',
    //                 'max_size' => 'A {field} tem um tamanho maximo de 4mb '
    //             ]
    //         ]
    //     ]);

    //     if (!$validation) {
    //         dd($this->validator->getErrors());
    //     }
    //     echo 'imagem carregada com sucesso';
    // }


    public function upload_submit()
    {
        $validation = $this->validate([
            'file_upload' => [
                'label' => 'Imagem',
                'rules' => 'uploaded[file_upload]|mime_in[file_upload,image/jpeg,image/png]|max_size[file_upload,4096]',
                'errors' => [
                    'uploaded' => 'O campo {field} não foi carregado.',
                    'mime_in' => 'A {field} não é uma imagem válida.',
                    'max_size' => 'A {field} tem um tamanho máximo de 4 MB.'
                ]
            ]
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('error', implode('<br>', $this->validator->getErrors()));
        }

        // Aqui o arquivo é válido
        $ficheiro = $this->request->getFile('file_upload');
        //$ficheiro->move(WRITEPATH . 'uploads/products/', 'products.jpg'); // salva no diretório de uploads

        $ficheiro->move(ROOTPATH . 'img/products/', 'products.jpg'); // salva no diretório de uploads

        return redirect()->back()->with('success', 'Imagem carregada com sucesso!');

    }
}
