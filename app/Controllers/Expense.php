<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Criteria\Criteria;
use App\Models\Criteria\ExpenseCriteria;
use App\Models\ExpenseModel;
use App\Services\Expenses;
use App\ValidationRules\ExpenseRules;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\I18n\Time;
use Psr\Log\LoggerInterface;

class Expense extends BaseController
{
    private ExpenseModel $expenseModel;
    private Expenses $expenseService;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);

        $this->expenseModel   = model(ExpenseModel::class);
        $this->expenseService = service('expenses');
    }

    public function list(): string
    {
        $criteria                 = new ExpenseCriteria();
        $criteria->orderDirection = Criteria::SORT_DESC;
        $criteria->orderFields    = 'created_at';

        $expenses = $this->expenseModel->findForListing($criteria);

        $this->viewData['expenses'] = $expenses;
        $this->viewData['pager']    = $this->expenseModel->pager;

        return view('expense/list', $this->viewData);
    }

    public function new(): RedirectResponse
    {
        $input = $this->request->getPost(null, FILTER_CALLBACK, ['options' => 'trim']);

        if ($this->validateData($input, ExpenseRules::create()) === false) {
            return redirect()->back()->withInput()->with('validation', $this->validator->getErrors());
        }

        if ($this->expenseService->create($input)) {
            return redirect()->back()->with('success', lang('Expense.created'));
        }

        return redirect()->back()->with('success', lang('Expense.error_on_creating'));
    }

    public function delete(): RedirectResponse
    {
        $id      = $this->request->getPost('id');
        $expense = $this->expenseModel->find($id);

        if (! $expense) {
            throw PageNotFoundException::forPageNotFound();
        }

        if ($this->expenseService->delete($expense)) {
            return redirect()->back()->with('success', lang('Expense.deleted'));
        }

        return redirect()->back()->with('danger', lang('Expense.error_on_deleting'));
    }

    public function statistic(): string
    {
        $year      = (Time::now())->getYear();
        $yearGroup = $this->expenseModel->findYearGroup((int) $year);

        $this->viewData['yearGroup'] = $yearGroup;

        return view('expense/statistic', $this->viewData);
    }
}
