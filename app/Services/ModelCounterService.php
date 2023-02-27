<?php

namespace App\Services;

use Modules\User\Entities\User;
use Modules\Asset\Entities\Asset;
use Modules\Project\Entities\Project;
use Modules\Employee\Entities\Employee;
use Modules\Employee\Entities\Department;
use Modules\Employee\Entities\Designation;
use Modules\Employee\Entities\EmployeeType;
use Modules\User\Entities\Role;

class ModelCounterService
{
    /**
     * Counters method to calculate all total quantity of available models
     * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
     */

    public function counters()
    {
        $data['users'] = [
            'count' => User::count(),
            'icon' => _icons('users'),
        ];
        $data['employees'] = [
            'count' => Employee::count(),
            'icon' => _icons('employee'),
        ];
        $data['employee type'] = [
            'count' => EmployeeType::count(),
            'icon' => _icons('employeeType'),
        ];
        $data['departments'] = [
            'count' => Department::count(),
            'icon' => _icons('department'),
        ];
        $data['designations'] = [
            'count' => Designation::count(),
            'icon' => _icons('designation'),
        ];
        $data['project'] = [
            'count' => Project::count(),
            'icon' => _icons('project'),
        ];
        $data['asset'] = [
            'count' => Asset::count(),
            'icon' => _icons('asset'),
        ];
        $data['role'] = [
            'count' => Role::count(),
            'icon' => _icons('role'),
        ];
        return $data;
    }
}