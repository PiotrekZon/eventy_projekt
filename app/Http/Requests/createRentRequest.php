<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;


class CreateRentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
          return [
            'dates_input' => 'required',
            'renter' => 'required',
            'event_id' => 'required'
        ];
    }


    /**
     * Filter given input data.
     *
     * @return array
     */
    public function filtered()
    {
        $data = $this->all();

        $dates = explode(',',$data['dates_input']);

        $numberOfDays = count($dates);
        $data['start'] = $dates[0];
        if($numberOfDays== 1){
            $data['end'] = $dates[0] .' 23:59:59';
        }
        else
        {
            $data['end'] = $dates[$numberOfDays-1];
        }
        unset($data['dates_input']);

        $data['start'] = str_replace(' ', '', $data['start']);
        $data['end'] = str_replace(' ', '', $data['end']);

         $rentStartDate = Carbon::createFromFormat("Y-m-d",$data['start']);
         $rentEndDate = Carbon::createFromFormat("Y-m-d",$data['end']);

         if(($rentEndDate->diffInDays($rentStartDate)+1) == $numberOfDays)
        return $data;
            else
        return back()->with('error', ' ');
    }
}