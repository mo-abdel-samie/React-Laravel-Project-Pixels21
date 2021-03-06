<?php

namespace App\Http\Traits;
use Illuminate\Support\Facades\Storage;


trait GeneralTrait {


    public function saveImage($image,$path){
        $fileNameWithExt = $image->getClientOriginalName();

        // Delete old file
        $exists = Storage::disk('local')->exists($path.$fileNameWithExt);

        if ($exists) {
            Storage::delete( $path . $fileNameWithExt);
        }

        // Upload new file

        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $image->getClientOriginalExtension();
        $fileNameToStore = $fileName.time().'.'.$extension;
        $path = $image->move($path , $fileNameToStore);

        return $path ;
    }

    public function getCurrentLang() {

        return app()->getLocale();
    }

    public function returnError($errorNum, $message) {
        return response()->json([
            'status' => false,
            'errorNum' => $errorNum,
            'message' => $message,
        ]);
    }

    public function returnSuccessMessage($message='', $errorNum='S000') {
        return [
            'status'=>true,
            'errorNum'=>$errorNum,
            'message'=>$message
        ];
    }

    public function returnData($key, $value, $message) {
        return response()->json([
            'status'=>true,
            'errorNum'=>'S000',
            'message'=>$message,
            $key=>$value,
        ]);
    }

    public function returnValidationError($code='E0011', $validator) {
        return $this->returnError($code, $validator->errors()->first());
    }

    public function returnCodeAccordingToInput($validator) {
        $inputs = array_keys($validator->errors()->toArray());
        $code = $this->getErrorCode($inputs[0]);
        return $code;
    }

    public function getErrorCode($input) {
        if ($input == "name") {
            return 'E001';
        } elseif ($input == "email") {
            return 'E002';
        } elseif ($input == "password") {
            return 'E003';
        } elseif ($input == "mobile") {
            return 'E004';
        } else {
            return '';
        }
    }


}
