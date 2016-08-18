<div class="title">{{ $title }}</div>

<!-- Code6-7 -->
{{--<form method="post" action="{{route('manage.openseminar_1212.updateConfig')}}">--}}
    {{--<input type="hidden" name="_token" value="{{csrf_token()}}" />--}}
    {{--게시판 지급 포인트 <input type="text" name="board_point" value="{{$config->get('board_point')}}"> <br/>--}}
    {{--<br/>--}}
    {{--<button type="submit">설정 변경</button>--}}
{{--</form>--}}
<!-- EOF Code6-7 -->

<form method="get">
    <input type="text" name="displayName" value="{{Input::get('displayName', '')}}"/>
    <button type="submit">검색</button>
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
