<div >
    <h1>{{trans('global.send_mail')}}</h1>

    <p>
        <label>{{trans('global.name')}} </label>
        <br/>
        @if(isset($name) && !empty($name))
            {{$name}}
        @endif
    </p>

    <p>
        <label>{{trans('global.email')}} </label>
        <br/>
        @if(isset($email) && !empty($email))
            {{$email}}
        @else
            {{trans('global.not_found')}}
        @endif
    </p>

    <p>
        <label>{{trans('global.website')}} </label>
        <br/>
        @if(isset($website) && !empty($website))
            {{$website}}
        @else
        {{trans('global.not_found')}}
        @endif
    </p>

</div>
