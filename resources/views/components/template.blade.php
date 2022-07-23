<!DOCTYPE html>
<html lang="{{config('app.locale')}}">
    <head>
        <meta charset="UTF-8">
        <title>{{session('title',config('app.name'))}}</title>
        <link rel="icon" href="{{asset('/storage/img/favicon.png')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css" integrity="sha512-xX2rYBFJSj86W54Fyv1de80DWBq7zYLn2z0I9bIhQG+rxIF6XVJUpdGnsNHWRa6AvP89vtFupEPDP8eZAtu9qA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @yield('style')
        @livewireStyles
    </head>
    <body class="background-image">
        {{$slot}}
        @stack('modals')
        @livewireScripts
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Livewire.on('saved',()=>{Swal.fire('{{__('Very Good!')}}','{{__('Data saved successfully.')}}','success')})
            Livewire.on('deleted',()=>{Swal.fire('{{__('Deleted!')}}','{{__('Selected record has been deleted.')}}','success')})
            Livewire.on('error',()=>{Swal.fire('{{__('Whoops!')}}','{{__('An error has occurred.')}}','error')})
            window.addEventListener('confirmDelete',event => {
                Swal.fire({
                    title: '{{__('You will delete this record')}}',
                    text: event.detail.record,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '{{__('Delete')}}',
                    cancelButtonText: '{{__('Cancel')}}',
                }).then((result)=>{if(result.isConfirmed)Livewire.emit('delete');})
            });
            window.addEventListener('back',event =>{
                setTimeout(()=>{window.history.back()},3000)

            })
        </script>
        @yield('script')
    </body>
</html>
