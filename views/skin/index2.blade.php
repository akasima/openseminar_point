<div class="title">{{ $title }}</div>

<form method="post" class="form-inline" action="{{route('openSeminar.point.settings.update')}}">
    <input type="hidden" name="_token" value="{{csrf_token()}}" />
    <div class="form-group">
        <label>게시판 지급 포인트</label>
        <input type="text" name="board_point" class="form-control" value="{{$config->get('board_point')}}"> <br/>
    </div>
    <button type="submit" class="btn btn-primary">설정 변경</button>
</form>

<form method="get" class="form-inline">
    <input type="text" name="displayName" placeholder="회원 이름" class="form-control" value="{{Input::get('displayName', '')}}"/>
    <button type="submit" class="btn btn-default">검색</button>
</form>

<table class="table">
    <tead>
        <tr>
            <td>아이디</td>
            <td>포인트</td>
            <td>날짜</td>
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
