<?php

    namespace App\Repositories;

    use App\Models\User;
    use Illuminate\Support\Facades\Hash;

    class UserControllerRepository implements UserControllerInterface {
        public function signin( array $data ) {
            $res = '';
            $user = User::where('email',$data['email'])->first();
            if(empty($user)) {
                $res = 'emailerror';
            }
            else {
                if(!Hash::check($data['password'], $user->password)) {
                    $res = 'passerror';
                }
            }

            return $res;
        }
    }
    