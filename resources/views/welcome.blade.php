<x-guest-layout>
    <div class="bg-orange-50 p-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="flex justify-between items-center"><img src="{{asset('storage/img/driver.png')}}" class="w-full md:w-32" alt="{{__('Driver')}}"></div>
            <div class="flex justify-end items-center"><img src="{{asset('storage/img/bus.png')}}" class="w-full md:w-80" alt="{{__('Bus')}}"></div>
        </div>
        <div class="text-white bg-red-500 shadow shadow-red-500 rounded p-8">
            <p class="text-4xl font-semibold">{{__('Search available tickets')}}</p>
            <div class="grid grid-cols-3 gap-2">
                <div class="form-group">
                    <label class="form-label" for="departure-city">{{__('Departure City')}}</label>
                    <select class="form-select" id="departure-city"><option value="1">{{__('Pasto')}}</option></select>
                </div>
                <div class="form-group">
                    <label class="form-label" for="arrival-city">{{__('Arrival City')}}</label>
                    <select class="form-select" id="arrival-city"><option value="2">{{__('Tuquerres')}}</option></select>
                </div>
                <div class="form-group">
                    <label class="form-label" for="date">{{__('Date')}}</label>
                    <input type="text" class="form-input" id="date" placeholder="{{__('year-month-day')}}">
                </div>
            </div>
        </div>
    </div>
    <x-login/>
    @section('script')@vite('resources/js/modals.js')@endsection
</x-guest-layout>
