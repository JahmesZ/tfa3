<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Customers extends BaseController
{
    private array $rules = [
        'full_name' => 'required|min_length[2]|max_length[100]',
        'email'     => 'required|valid_email|max_length[100]',
        'phone'     => 'permit_empty|max_length[30]',
    ];

    public function index()
    {
        return view('customers/index', ['title' => 'Customers', 'rows' => (new CustomerModel())->orderBy('id', 'DESC')->findAll()]);
    }

    public function new()
    {
        return view('customers/form', ['title' => 'New customer', 'row' => null]);
    }

    public function create()
    {
        return $this->store(null);
    }

    public function edit($id)
    {
        $row = (new CustomerModel())->find($id) ?? throw PageNotFoundException::forPageNotFound();
        return view('customers/form', ['title' => 'Edit customer', 'row' => $row]);
    }

    public function update($id)
    {
        return $this->store((int) $id);
    }

    private function store(?int $id)
    {
        if (! $this->validate($this->rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $data  = $this->request->getPost(['full_name', 'email', 'phone']);
        $model = new CustomerModel();
        $id ? $model->update($id, $data) : $model->insert($data);

        return redirect()->to('customers')->with('ok', $id ? 'Customer updated.' : 'Customer added.');
    }
}
