<html>
<head>
    <title>Welcome Email</title>
</head>
<body>
<h2>感謝您註冊工具人帳號 {{$user['name']}}</h2>
<br/>
您申請的信箱為{{$user['email']}} , 請點擊下方連結完成信箱認證
<br/>
<a href="{{url('user/verify', $verifyUser->token)}}">認證信箱</a>
</body>
</html>
