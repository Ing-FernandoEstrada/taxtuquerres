<x-guest-layout>
    <div class="bg-orange-50 p-4">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
            <div class="order-2 md:order-1 md:col-span-8 flex justify-center items-center flex-col font-semibold text-center">
                <p class="text-4xl text-emerald-600">{{ config('app.company') }}</p>
                <p class="italic text-2xl text-emerald-400">{{__('Community service travel agency')}}</p>
            </div>
            <div class="order-1 md:order-2 md:col-span-4 flex items-center justify-center flex-row">
                <img src="{{asset('storage/img/driver.png')}}" class="w-24" alt="{{__('Driver')}}">
                <img src="{{asset('storage/img/bus.png')}}" class="w-56" alt="{{__('Bus')}}">
            </div>
        </div>
        <div class="text-emerald-700 bg-emerald-300 shadow shadow-emerald-300 rounded p-8">
            <p class="text-xl sm:text-4xl font-semibold mb-4">{{__('Search available tickets')}}</p>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-2">
                <div class="form-group">
                    <label class="form-label text-black" for="departure-city">{{__('Departure City')}}</label>
                    <select class="form-select" id="departure-city"><option value="1">{{__('Pasto')}}</option></select>
                </div>
                <div class="form-group">
                    <label class="form-label text-black" for="arrival-city">{{__('Arrival City')}}</label>
                    <select class="form-select" id="arrival-city"><option value="2">{{__('Tuquerres')}}</option></select>
                </div>
                <div class="form-group">
                    <label class="form-label text-black" for="date">{{__('Date')}}</label>
                    <input type="text" class="form-input" id="date" placeholder="{{__('year-month-day')}}">
                </div>
            </div>
        </div>
    </div>
    @section('script')@vite('resources/js/modals.js')@endsection
</x-guest-layout>
