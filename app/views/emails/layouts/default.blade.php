<!DOCTYPE html><html lang="en-US"><head><meta charset="utf-8"><style>
body{
	background-color:#DDDDDD;
}
.box {
	width: 660px;
	margin: 25px auto;
	float: none;
	border: 1px solid #CCCCCC;
	background-color: #FFFFFF;
	border-radius: 5px;
}
.header {
	text-align: center;
	border-bottom: 1px solid #DDDDDD;
}
.header img {
	width: 200px;
}
.content {
	padding: 10px 25px;
	color: #333;
	line-height: 20px;
	font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
}
.header, .footer {
	padding: 15px 25px;
	background-color: #F2F2F2;
}
.footer {
	border-top: 1px solid #DDDDDD;
}
</style></head><body><div class="box"><div class="header"><a href="http://bestbant.com/"><img src="http://bestbant.think360media.com/public/img/logo.png" alt="BESTBANT.com"></a></div><div class="content">@yield('content')</div><div class="footer"><p>Sincerely,<br><strong>BestBant Team</strong></p></div></div></body></html>