<x-guest-layout>
    <x-button type="button" class="btn btn-blue">{{__('blue')}}</x-button>
    <x-button type="button" class="btn btn-teal">{{__('teal')}}</x-button>
    <x-button type="button" class="btn btn-green">{{__('green')}}</x-button>
    <x-button type="button" class="btn btn-yellow">{{__('yellow')}}</x-button>
    <x-button type="button" class="btn btn-orange">{{__('orange')}}</x-button>
    <x-button type="button" class="btn btn-red">{{__('red')}}</x-button>
    <x-button type="button" class="btn btn-pink">{{__('pink')}}</x-button>
    <x-button type="button" class="btn btn-indigo">{{__('indigo')}}</x-button>
    <x-button type="button" class="btn btn-white">{{__('white')}}</x-button>
    <x-button type="button" class="btn btn-link">{{__('link')}}</x-button>
    <div class="btn-group">
        <x-button type="button" class="btn btn-blue">{{__('blue')}}</x-button>
        <x-button type="button" class="btn btn-teal">{{__('teal')}}</x-button>
        <x-button type="button" class="btn btn-green">{{__('green')}}</x-button>
    </div>
    <div class="flex flex-col max-w-md p-4 mx-auto">
        <div class="form-group">
            <label class="form-label" for="title">{{__('Title')}}</label>
            <input type="text" id="title" class="form-input" placeholder="{{__('Write something')}}"/>
        </div>
        <div class="form-group">
            <label class="form-label" for="password">{{__('Password')}}</label>
            <div class="flex" x-data="{passVisible: false}">
                <input name="password" :type="passVisible?'text':'password'" id="password" class="form-input w-full pr-8" placeholder="{{__('Enter your password')}}" required/>
                <x-button type="button" @click.prevent="passVisible=!passVisible" class="password-sw-btn -ml-7 mt-3"><span :class="passVisible?'fa fa-eye-slash':'fa fa-eye'"></span></x-button>
            </div>
        </div>
        <div class="form-group has-error">
            <label class="form-label" for="title1">{{__('Title')}}</label>
            <input type="text" id="title1" class="form-input" placeholder="{{__('Write something')}}"/>
            <label class="feedback-message">{{__('This field is required')}}</label>
        </div>

        <div class="form-group has-success">
            <label class="form-label" for="title2">{{__('Title')}}</label>
            <input type="text" id="title2" class="form-input" placeholder="{{__('Write something')}}"/>
            <label class="feedback-message">{{__('Correct value')}}</label>
        </div>
    </div>
    @section("style")
        <link href="{{asset("https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css")}}" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    @endsection
    @section("script")
        <script src="{{asset("https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js")}}" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    @endsection
</x-guest-layout>
