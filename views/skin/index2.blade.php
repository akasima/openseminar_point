<!-- Code7-4 -->
{{ XeFrontend::js('plugins/openseminar_point/assets/js/test.js')->load() }}
{{ Frontend::translation([
    'core::accessDenied',
]) }}
<button type="button" onclick="deleteAll()">{{xe_trans('xe::delete')}}</button>
<!-- EOF Code7-4 -->

<div class="title">{{ $title }}</div>

<form method="post" action="{{route('manage.openseminar_1212.updateConfig')}}" data-rule="config">
    <input type="hidden" name="_token" value="{{csrf_token()}}" />
    {{xe_trans('openseminar_point::boardAddPoint')}} <input type="text" name="board_point" value="{{$config->get('board_point')}}"> <br/>
    <br/>
    <button type="submit">{{xe_trans('openseminar_point::configUpdate')}}</button>
</form>

<form method="get">
    <input type="text" name="displayName" value="{{Input::get('displayName', '')}}"/>
    <button type="submit">{{xe_trans('xe::search')}}</button>
</form>

<table>
    <tead>
        <tr>
            <td>{{xe_trans('openseminar_point::id')}}</td>
            <td>{{xe_trans('openseminar_point::point')}}</td>
            <td>{{xe_trans('openseminar_point::date')}}</td>
        </tr>
    </tead>
    <tbody>
    @foreach ($paginate as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->point}}</td>
            <td>{{$item->createdAt}}</td>
        </tr>
    @endforeach
    </tbody>
</table>

{{$paginate->render()}}
