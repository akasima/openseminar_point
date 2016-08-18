<div class="title">{{ $title }}</div>

<form method="post" class="form-inline" action="{{route('openSeminar.point.settings.update')}}">
    <input type="hidden" name="_token" value="{{csrf_token()}}" />
    <div class="form-group">
        <label>{{xe_trans('openseminar_point::boardAddPoint')}}</label>
        <input type="text" name="board_point" class="form-control" value="{{$config->get('board_point')}}"> <br/>
    </div>
    <button type="submit" class="btn btn-primary">{{xe_trans('openseminar_point::configUpdate')}}</button>
</form>

<form method="get" class="form-inline">
    <input type="text" name="displayName" placeholder="{{xe_trans('xe::displayName')}}" class="form-control" value="{{Input::get('displayName', '')}}"/>
    <button type="submit" class="btn btn-default">{{xe_trans('xe::search')}}</button>
</form>

<table class="table">
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
            <td>{{$item['id']}}</td>
            <td>{{$item['point']}}</td>
            <td>{{$item['createdAt']}}</td>
        </tr>
    @endforeach
    </tbody>
</table>

{!! $paginate->render() !!}
