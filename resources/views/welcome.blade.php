đây là view welcome {{ $name }} {{$name1}}
<form action="{{ route('rq')  }}" method="post">
    {{--{{csrf_field()}}--}}
    @csrf
    <input type="text" name="demo">
    <input type="text" name="demo1">
    <button type="submit">submit</button>
</form>

<div>
    @php
        $dir = __DIR__;
        $file = __FILE__;
        function name(){
            return "bach linh";
        }
    @endphp


    {{ name()  }}
    <br>
    {{ $dir }}
    <br>
    {{ $file }}
    <br>
    @lang('message.name', ['name' => 'phuong nam'])
    <br>
    {{ trans_choice('message.length', 15,['value' => 15]) }}
</div>