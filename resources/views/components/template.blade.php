<!DOCTYPE html>
<html lang="{{config('app.locale')}}">
    <head>
        <meta charset="UTF-8">
        <title>{{session('title',config('app.name'))}}</title>
        <link rel="icon" href="{{asset('/storage/img/favicon.png')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        @vite('resources/js/app.js')
        @yield('style')
        @livewireStyles
    </head>
    <body>
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
