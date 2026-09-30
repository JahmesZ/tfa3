<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Users extends BaseController
{
    public function index()
    {
        return view('users/index', ['title' => 'User accounts', 'rows' => (new UserModel())->orderBy('id', 'DESC')->findAll()]);
    }

    public function new()
    {
        return view('users/form', ['title' => 'New user', 'row' => null]);
    }

    public function create()
    {
        return $this->store(null);
    }

    public function edit($id)
    {
        $row = (new UserModel())->find($id) ?? throw PageNotFoundException::forPageNotFound();
        return view('users/form', ['title' => 'Edit user', 'row' => $row]);
    }

    public function update($id)
    {
        return $this->store((int) $id);
    }

    private function store(?int $id)
    {
        $rules = [
            'username'  => 'required|alpha_dash|min_length[3]|max_length[30]|is_unique[users.username' . ($id ? ",id,$id" : '') . ']',
            'full_name' => 'required|min_length[2]|max_length[100]',
        ];
        $file    = $this->request->getFile('avatar');
        $hasFile = $file && $file->getError() !== UPLOAD_ERR_NO_FILE;
        if ($hasFile) {
            $rules['avatar'] = 'uploaded[avatar]|is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]|ext_in[avatar,jpg,jpeg,png]|max_size[avatar,2048]';
        }
        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = new UserModel();
        $data  = $this->request->getPost(['username', 'full_name']);

        if ($hasFile) {
            $dir  = FCPATH . 'uploads/avatars/';
            $name = $file->getRandomName();
            is_dir($dir . 'thumbs') || mkdir($dir . 'thumbs', 0775, true);
            $file->move($dir, $name);
            // display-ready 150x150 thumbnail; only the filename goes to the DB
            service('image')->withFile($dir . $name)->fit(150, 150, 'center')->save($dir . 'thumbs/' . $name);
            if ($id && ($old = $model->find($id)['avatar'] ?? null)) {
                @unlink($dir . $old);
                @unlink($dir . 'thumbs/' . $old);
            }
            $data['avatar'] = $name;
        }

        $id ? $model->update($id, $data) : $model->insert($data);

        return redirect()->to('users')->with('ok', $id ? 'User updated.' : 'User added.');
    }
}
