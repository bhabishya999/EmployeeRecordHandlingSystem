<?php

namespace App\Http\Controllers;
use App\Talent\KeyEmploymentDetails\KeyEmploymentDetailsManager;
use App\Talent\KeyEmploymentDetails\Models\KeyEmploymentDetails;
use App\Talent\KeyEmploymentDetails\Requests\StoreKeyEmploymentDetailsRequests;
use App\Talent\Manages\ManagesManager;

class KeyEmploymentDetailsController extends Controller
{
    public function __construct(private KeyEmploymentDetails $keyEmploymentDetails, private KeyEmploymentDetailsManager $keyEmploymentDetailsManager, private ManagesManager $managesManager )
    {

    }

    public function store(StoreKeyEmploymentDetailsRequests $request)
    {
        $validation = $request->validated();

        $keyEmploymentDetailsArray= [];

        
         $employmentDetails = $this->keyEmploymentDetailsManager->create($validation);
         array_push($keyEmploymentDetailsArray, $employmentDetails);
        
        foreach($validation['manages'] as $manager){
            
                $managersArray = [
                'key_employment_detail_id'=> $employmentDetails->id,
                'employee_id'=>$manager
            ];
            $manager = $this->managesManager->createManagers($managersArray);
            array_push($keyEmploymentDetailsArray, $manager);
        }

        return response([
            "data" => $keyEmploymentDetailsArray
        ]);
    }

}
