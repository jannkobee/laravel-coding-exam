<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\DashboardRepository;
class DashboardController extends Controller
{
    private $dashboardRepository;

    public function __construct(DashboardRepository $dashboardRepository)
    {
        $this->dashboardRepository = $dashboardRepository;
    }

    public function index()
    {
        return $this->dashboardRepository->index();
    }

    public function getData()
    {
        return $this->dashboardRepository->getData();
    }

    public function getAllData()
    {
        return $this->dashboardRepository->getAllData();
    }

    public function storeRole(Request $request)
    {
        return $this->dashboardRepository->storeRole($request);
    }

    public function storeUser(Request $request)
    {
        return $this->dashboardRepository->storeUser($request);
    }

    public function updateRole(Request $request)
    {
        return $this->dashboardRepository->updateRole($request);
    }

    public function updateUser(Request $request)
    {
        return $this->dashboardRepository->updateUser($request);
    }

    public function deleteRole(Request $request)
    {
        return $this->dashboardRepository->deleteRole($request);
    }

    public function deleteUser(Request $request)
    {
        return $this->dashboardRepository->deleteUser($request);
    }

    public function logout()
    {
        return $this->dashboardRepository->logout();
    }
}
