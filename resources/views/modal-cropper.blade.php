<x-modal class="{{$open?'show':'hidden'}}" x-ref="modalCropper" id="modal-cropper" x-data="{cropper:{},initCropper(){this.cropper = new Cropper(document.getElementById('cropper-image'),{aspectRatio:1});},cropImage(){let canvas=this.cropper.getCroppedCanvas({width:400,height:400});canvas.toBlob((blob)=>{var modalID = this.$refs.modalCropper.getAttribute('wire:id');window.livewire.find(modalID).upload('tempImage',blob,(filename)=>{});});}}">
    <x-slot name="header">
        <label class="modal-title">{{__('Crop Image')}}</label>
    </x-slot>
    <div class="crop-container">
        <img id="cropper-image" src="{{asset($url)}}" alt="{{__('Crop Image')}}" class="mx-auto w-full h-auto sm:w-80" x-init="@this.on('resetCropper',() => {setTimeout(()=>{this.cropper.destroy();console.log(this.cropper)},1000)}); @this.on('initCropper',() => {setTimeout(()=>{initCropper()},1000)})"/>
    </div>
    <x-slot name="footer">
        <x-button type="button" class="btn btn-white" wire:loading.remove wire:target="tempImage">{{__('Cancel')}}</x-button>
        <x-button type="button" class="btn btn-blue" @click="cropImage()" data-dismiss="modal" wire:loading.remove wire:target="tempImage"><span class="fa fa-crop mr-3"></span>{{__('Crop')}}</x-button>
        <x-alert class="alert-blue" message="{{__('Creating Image...')}}" icon="spin fa-spinner" wire:loading.inline-flex wire:target="tempImage"/>
    </x-slot>
</x-modal>
