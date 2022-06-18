<{{$target}} class="dropdown" x-data="{ open: false }" @click.away="open = false" @close.stop="open = false">
    <button @click="open = ! open" type="button" class="{{$toggle}}">{{$title}}</button>
    @isset($no_content) {{$no_content}} @endisset
    @empty($no_content) <ul class="dropdown-menu" @click="open = false" :class="{'show':open, '':!open}">{{$slot}}</ul> @endempty
</{{$target}}>
