<?php
namespace App\Talent\KeyEmploymentDetails;


use App\Talent\KeyEmploymentDetails\Models\KeyEmploymentDetails;
use App\Talent\KeyEmploymentDetails\Models\Manages;
use Illuminate\Support\Facades\DB;


class KeyEmploymentDetailsManager{

    public function __construct(private KeyEmploymentDetails $keyEmploymentDetails)
    {

    }

    public function create(array $employmentDetails)
    {

        DB::transaction(function () use ($employmentDetails) {

            $employeeDetails = $this->keyEmploymentDetails->create($employmentDetails);
            if(count($employmentDetails)>0){
                return 'success';
            }else{
                return "no";
            }

            foreach ($employmentDetails['manages'] as $manageId) {
                dd($manageId);
                Manages::query()->updateOrCreate([
                    'employee_id' => $manageId,
                    'key_employee_details_id' => $employeeDetails->getKey()
                ]);

            }

        });

    }
}
