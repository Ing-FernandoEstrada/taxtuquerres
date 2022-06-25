<x-guest-layout>
    <x-card class="sm:w-96 mx-auto bg-white" x-data="{visible:true,data:{document:'',identification:'',password:'',remember:false,_token:'{{csrf_token()}}'},
        submit(){
            this.visible = false;
            document.querySelectorAll('.form-group').forEach(elem => {
                elem.classList.remove('has-error')
            });
            document.querySelectorAll('.feedback-message').forEach(elem => elem.remove());

            fetch('{{route('login')}}',{
                method:'POST',
                headers:{'Content-Type':'application/json','Accept':'application/json'},
                redirect:'follow',
                body:JSON.stringify(this.data)
            }).then(response=>{
                return response.json();
            }).then(data=>{
                this.visible = true;
                const errors = data.errors;
                if(errors) {
                    for(const key in errors) {
                        var elem = document.getElementById(key);
                        var parent = elem.closest('.form-group');
                        parent.classList.add('has-error');
                        var message = document.createElement('label');
                        message.classList.add('feedback-message');
                        parent.appendChild(message);
                        message.textContent = errors[key].toString();
                    }
                } else {
                    /*if(data.two_factor) {
                    } else {
                    }*/
                    window.location.replace('{{route('dashboard')}}');
                }
            });
        }
        }">
        <x-slot name="header"><label class="modal-title">{{__('Sign In')}}</label></x-slot>
        <div class="form-group">
            <label for="document" class="form-label">{{__('Document Type')}}</label>
            <select x-model="data.document" id="document" class="form-select">{!! $documents !!}</select>
        </div>
        <div class="form-group">
            <label for="identification" class="form-label">{{__('Identification Number')}}</label>
            <input type="text" inputmode="numeric" x-model="data.identification" id="identification" @keyup.enter.prevent="if(visible) submit()" class="form-input" placeholder="{{__('Enter your identification number')}}" :readonly="!visible" required/>
        </div>
        <div class="form-group" x-data="{passVisible:false}">
            <label for="password" class="form-label">{{__('Password')}}</label>
            <div class="flex">
                <input name="password" :type="passVisible?'text':'password'" x-model="data.password" id="password" @keyup.enter.prevent="if(visible){passVisible=false;submit()}" class="form-input w-full pr-8" placeholder="{{__('Enter your password')}}" :readonly="!visible" required/>
                <x-button type="button" @click.prevent="passVisible=!passVisible" class="password-sw-btn -ml-7 mt-3"><span :class="passVisible?'fa fa-eye-slash':'fa fa-eye'"></span></x-button>
            </div>
        </div>
        <div class="form-group">
            <div class="form-check">
                <input type="checkbox" class="form-checkbox" x-model="data.remember" id="remember" name="remember" value="true">
                <label for="remember" class="form-check-label">{{__('Remember Me')}}</label>
            </div>
        </div>
        <x-alert icon="spinner fa-spin" class="alert-solid alert-blue mt-8 inline-flex" message="{{__('Processing...')}}" x-show="!visible"/>
        <div class="py-6 px-2">
            <x-button x-show="visible" type="button" @click="submit()" class="btn btn-indigo w-full justify-center mb-4"><span class="fa fa-sign-in mr-2"></span>{{__('Login')}}</x-button>
            <x-button x-show="visible" tag="a" href="{{route('password.request')}}" class="btn btn-white w-full justify-center">{{__('Forgot Your Password?')}}</x-button>
        </div>
    </x-card>
</x-guest-layout>
