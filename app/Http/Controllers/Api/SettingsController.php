<?php

namespace App\Http\Controllers\Api;
use App\Models\User;
use App\Http\Resources\ResetPasswordResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Dotenv\Dotenv;

class SettingsController extends Controller
{
    public function reset(Request $request, $id)
    {
        $user = User::find($id);
        
        $oldPassword = $request->input('old_password');
        $newPassword = $request->input('new_password');
        $confirmPassword = $request->input('confirm_password');

        
        if (Hash::check($oldPassword, $user->password)) {
            
            if (Hash::check($newPassword, Hash::make($confirmPassword))) {
                $user->password = Hash::make($newPassword);
                $user->save();
            
            return response()->json([
                'success' => true,
                'code'=>'1',
                'message' => 'Password updated successfully.'
            ]);

            }
            else {
                return response()->json([
                    'success' => true,
                    'code'=>'2',
                    'message' => 'Confirm Password Not Match'
                ]);
            }

            
        } else {
            return response()->json([
                'success' => true,
                'code'=>'0',
                'message' => 'Incorrect old password.'
            ]);
        }
    }


    public function prefixsetting(Request $request)
    {
        $RegPrefix = $request->input('RegPrefix');
        $opPrefix = $request->input('OPPrefix');
        $ipPrefix = $request->input('IPPrefix');
        // $opConsultationPrefix = $request->input('OPConsultationPrefix');
        // $ipConsultationPrefix = $request->input('IPConsultationPrefix');
    
        // Update the environment variables
        putenv("REGISTRATION_PREFIX={$RegPrefix}");
        putenv("OP_PREFIX={$opPrefix}");
        putenv("IP_PREFIX={$ipPrefix}");
        // putenv("OP_CONSULTATION_PREFIX={$opConsultationPrefix}");
        // putenv("IP_CONSULTATION_PREFIX={$ipConsultationPrefix}");
    
        // Save the changes to the .env file
        $envFile = app()->environmentFilePath();
        $envContent = file_get_contents($envFile);
        $envContent = preg_replace_callback('/^(REGISTRATION_PREFIX)=(.*)$/m', function ($matches) use ($RegPrefix) {
            return $matches[1] . '=' . $RegPrefix;
        }, $envContent);
        $envContent = preg_replace_callback('/^(OP_PREFIX)=(.*)$/m', function ($matches) use ($opPrefix) {
            return $matches[1] . '=' . $opPrefix;
        }, $envContent);
        $envContent = preg_replace_callback('/^(IP_PREFIX)=(.*)$/m', function ($matches) use ($ipPrefix) {
            return $matches[1] . '=' . $ipPrefix;
        }, $envContent);
        // $envContent = preg_replace_callback('/^(OP_CONSULTATION_PREFIX)=(.*)$/m', function ($matches) use ($opConsultationPrefix) {
        //     return $matches[1] . '=' . $opConsultationPrefix;
        // }, $envContent);
        // $envContent = preg_replace_callback('/^(IP_CONSULTATION_PREFIX)=(.*)$/m', function ($matches) use ($ipConsultationPrefix) {
        //     return $matches[1] . '=' . $ipConsultationPrefix;
        // }, $envContent);
        file_put_contents($envFile, $envContent);
    
        $response = [
            'message' => 'Settings updated successfully',
            'success' => true,
            'code' => 1
        ];
    
        return response()->json($response);
    }
}
