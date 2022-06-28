<x-modal x-data="{}" x-ref="modalCropper" id="modal-cropper">
    <x-slot name="header">
        <label class="modal-title">{{__('Crop Image')}}</label>
    </x-slot>
    <div>
        <div>
            <img id="image-cropper" src="{{asset($url)}}" alt="{{__('Crop Image')}}" class="mx-auto w-full h-auto sm:w-80" x-init="@this.on('initCropper',() => {setTimeout(()=>{initCropper()},1000)})"/>
        </div>
        <div>
            <x-button type="button" class="btn btn-white" wire:loading.remove wire:target="tempImage">{{__('Cancel')}}</x-button>
            <x-button type="button" class="btn btn-blue" @click="cropImage()" data-dismiss="modal" wire:loading.remove wire:target="tempImage"><span class="fa fa-crop mr-3"></span>{{__('Crop')}}</x-button>
            <x-alert class="alert-blue" message="{{__('Creating Image...')}}" icon="spin fa-spinner" wire:loading.inline-flex wire:target="tempImage"/>
        </div>
    </div>
    @section('script')
        <script defer src="{{mix('/js/modals.js')}}"></script>
        <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/cropperjs/2.0.0-alpha.2/cropper.min.js')}}"></script>
        <script>

            var cropper =  null;

            function initCropper()
            {
                cropper = new Cropper(document.getElementById('image-cropper'),{aspectRatio:1});
            }

            function cropImage()
            {
                let canvas=cropper.getCroppedCanvas({width:400,height:400});
                canvas.toBlob((blob)=>
                {
                    cropper.destroy();
                    @this.upload('tempImage',blob,(filename)=>
                    {
                        @this.set('open',false);
                    });
                });
            }
        </script>
    @endsection
</x-modal>
