<?php

namespace App\Actions\Admin;

use App\Contracts\ManagesUsers;
use App\Models\Document;
use App\Models\User;
use App\Rules\NewPasswordRule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class UserManager implements ManagesUsers
{

    function save(array $data, ?User $user = null): User|null
    {
        Validator::make($data,$this->rules())->validate();
        $data['identification'] = $data['document'].$data['identification'];
        if ($user) {
            if ($user->getRawOriginal('identification') != $data['document'].$data['identification']) {
                $count = User::where('identification',$data['document'].$data['identification'])->count();
                if($count>0) throw ValidationException::withMessages(['identification' => __('Already user registered with this identification.')]);
            }
            $user->update($data);
        } else {
            $password = Hash::make($data['document'].$data['identification']);
            $data['state'] = 'A';
            $data['password'] = $password;
            $user = User::create($data);
        }
        return $user;
    }

    function updateState(User $user, string $state): bool
    {
        return $user->update(["state"=>$state]);
    }

    function updatePassword(array $data, User $user): bool
    {
        Validator::make($data,['password' => ['required',new NewPasswordRule(),'confirmed']])->validate();
        return $user->update(["password" => Hash::make($data['password'])]);
    }

    private function rules(): array {
        return [
            'document' => ['required','string',Rule::in(Document::array('code'))],
            'identification' => ['required','numeric'],
            'names' => ['required', 'string', 'min:3', 'max:255'],
            'surnames' => ['required', 'string', 'min:3', 'max:255'],
            'birthday' => ['required', 'date'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['required','phone:AUTO,CO'],
            'address' => ['nullable', 'string', 'max:255'],
        ];
    }

    private function passwordRules() {
        return ;
    }
}
