<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#hide").click(function(){
        $("#pccontent").toggle(1000);
    });
});
</script>
<script>
$(document).ready(function(){
    $("#hide2").click(function(){
        $("#pccontent2").toggle(1000);
    });
});
</script>
<style>
#pcbutton{
	position: fixed;
	right: 0;
	top: 20%;
	background: rgba(189,189,189,0.5);
	padding: 1em;
	z-index: 999999999;
	border-top-left-radius: 30px;
	border-bottom-left-radius: 30px;
}
#pcbutton img{
	border-radius: 100px;
	border: 3px solid #fff;
}
#pcbutton button{
	background: #fff;
	border: none;
	border-radius: 3px;
	margin-bottom: 0.7em;
}

#pcbutton2{
	position: fixed;
	right: 0;
	top: 50%;
	padding: 1em;
	background: rgba(189,189,189,0.5);
	z-index: 999999999;
	border-top-left-radius: 30px;
	border-bottom-left-radius: 30px;
}
#pcbutton2 button{
	background: #fff;
	border: none;
	border-radius: 3px;
	padding: 0.4em;
	margin-bottom: 0.2em;
}
#pcbutton2 input{
	width: 200px;
	padding: 0.2em;
	border-radius: 3px;
	border: none;
	margin-bottom: 0.2em;
}
#pcbutton2 textarea{
	width: 200px;
	border-radius: 3px;
	border: none;
}
</style>
<div id="pcbutton" align="center">
<img src="img/bible.jpg" width="60" alt=""/><br/><br/>
<!--<p style="font-size: 1.3em; font-weight:700;">Pastor Larry Pabiona</p>-->
<button id="hide">From The Pastor's Heart</button>
<div id="pccontent" style="display: none;">
<p style="font-size: 1.3em; font-weight:700;">To know Christ and make Him known.</p>
</div>
</div>

<div id="pcbutton2" align="center">
<!--<p style="font-size: 1.3em; font-weight:700;">Pastor Larry Pabiona</p>-->
<button id="hide2">Prayer Request</button>
<div id="pccontent2" style="display: none;">
<form action="/my-handling-form-page" method="post">
    <div>
        <input type="text" id="name"  placeholder="Name"/>
    </div>
    <div>
        <input type="email" id="mail" placeholder="Email" />
    </div>
    <div>
        <textarea id="msg" placeholder="Prayer Message"></textarea>
    </div>
    <div class="button">
        <button type="submit" style="background: #1E824C; color: #fff;">Send your message</button>
    </div>
</form>
</div>
</div>