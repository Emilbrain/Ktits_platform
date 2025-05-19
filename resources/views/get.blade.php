@include('includes.message')
<form action="{{ route('get.register') }}" method="post">
    @csrf
    <input type="submit" value="send">
</form>
@if(isset($result))
    {{ $result['link'] }}<br>
    {{ $result['ftPLogin'] }}<br>
    {{ $result['ftPPassword'] }}<br>
    {{ $result['dbLogin'] }}<br>
    {{ $result['dbPassword'] }}<br>
@endif
