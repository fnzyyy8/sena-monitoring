<?php

namespace App\Http\Controllers;

use App\Services\ContractService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ContractController extends Controller
{
    protected ContractService $contractService;

    public function __construct(ContractService $contractService)
    {
        $this->contractService = $contractService;
    }

    public function index(): Response
    {
        $head = $this->headers('Contracts','create','Create');

        $contracts = $this->contractService->read();
        return \response()->view('contract.index', ['head' => $head,'contracts' => $contracts]);
    }

    public function createView(): Response
    {
        $head = $this->headers('Create Contract');

        return \response()->view('contract.create', ['head' => $head]);
    }

    public function create(Request $request): RedirectResponse
    {
        $request = [
            'id' => $request->input('id'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ];

        $this->contractService->create($request);
        return redirect('/contracts');
    }

    public function updateView(string $id): Response
    {
        return \response()->view('contract.update');
    }


    public function delete(string $id): RedirectResponse
    {
        $this->contractService->delete($id);
        return redirect('/contracts');
    }


    public function headers($title, $path = null, $buttonText = 'Back')
    {
        if ($buttonText=='Back')
        {
            return [
                'title' => $title,
                'path' => url("/contracts/$path"),
                'buttonText' => $buttonText,
                'buttonColor'=>'danger'
            ];
        }else{
            return [
                'title' => $title,
                'path' => url("/contracts/$path"),
                'buttonText' => $buttonText,
                'buttonColor'=>'success'
            ];
        }

    }

}
