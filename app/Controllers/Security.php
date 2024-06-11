<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\Auth;
use CodeIgniter\HTTP\RedirectResponse;
use Config\Services;

class Security extends BaseController
{
    public function login()
    {
        if (Auth::isLogged()) {
            return redirect('expenses.list');
        }

        if ($this->request->getMethod() === 'POST') {
            $password = trim((string)$this->request->getPost('password'));

            if ($password === '') {
                return redirect('login')->with('validation', ['password' => lang('Guard.incorrect_password')]);
            }

            if ((Services::auth())->login($password) === false) {
                return redirect('login')->with('danger', lang('Guard.login_failed'));
            }

            return redirect('expenses.list');
        }

        return view('security/login', $this->viewData);
    }

    public function logout(): RedirectResponse
    {
        (Services::auth())->logout();

        return redirect('homepage');
    }
}
