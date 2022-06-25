<x-app-layout>
    <div class="bg-white/50 w-full h-screen rounded-lg p-8">
        <h1 class="text-center text-4xl font-bold">{{__('Welcome :username !', ['username' => Auth::user()->names])}}</h1>
        <p class="text-center font-bold text-green-600">{{__('This is your workspace')}}</p>
    </div>
</x-app-layout>
