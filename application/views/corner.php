<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#hide").click(function() {
        $("#pccontent").toggle(1000);
        //$("#sidebtn").animate({ width : '400px' }, 500, function(){ $("#pccontent").toggle(500); });
    });

    $("#hide2").click(function() {
        $("#pccontent2").toggle(1000);
    });

	$('#editpcmsg').on('click', function() {
		$('#sidebtn #pcmsg').toggle();
		$('#sidebtn #epcmsg').toggle();
	});

	$('#savepcmsg').on('click', function() {
		var pheart = $('#pheart').val();

		$.post('pastormessage/update', { 'pheart' : pheart },
			function(data) {
				if (data.status_code == 200) {
					$('#pcmsg p').html(pheart.replace(/[\r\n]/g, '<br>'));
				}
				$('#sidebtn #pcmsg').toggle();
				$('#sidebtn #epcmsg').toggle();
			}, 'json'
		);
	});

	$('#cancelpcmsg').on('click', function() {
		$('#sidebtn #pcmsg').toggle();
		$('#sidebtn #epcmsg').toggle();
	});

	$('#sendpr').on('click', function() {
		var prcontent = $('#prcontent').val();

		$.post('prayerrequest/send', { 'prcontent' : prcontent },
			function(data) {
				if (data.status_code == 200) {
					if (data.form_error != '') {
						alert(data.form_error);
					}
					else {
						alert('Prayer request sent.');
						$('#prcontent').val('');
					}
				}
			}, 'json'
		);
	});
});
</script>
<style>
#sidebtn {
	position: fixed;
	right: 0;
	top: 20%;
	z-index: 999999999;
}

#pcbutton, #pcbutton2 {
	background: rgba(189,189,189,0.5);
	padding: 1em;
	border-top-left-radius: 30px;
	border-bottom-left-radius: 30px;
	margin-bottom: 20px;
}

#sidebtn img {
	border-radius: 100px;
	border: 3px solid #fff;
}

#pcbutton button, #pcbutton2 button {
	background: #fff;
	border: none;
	border-radius: 3px;
	margin-bottom: 0.7em;
	padding: 3px;
}

#pcbutton2 {
	position: absolute;
	/*width: 180px;*/
	right: 0px;
}

#pheart {
	width: 100%;
}

#reqlist {
	text-align: left;
	font-size: 16px;
	font-family: Sans-serif, Arial;
}

.reqitem {
	border-top: 1px dashed;
	padding: 5px;
}

#reqlist .reqfrom {
	font-weight: bold;
	font-size: 14px;
	font-style: italic;
}

#pccontent, #pccontent2 {
	padding: 10px;
	width: 400px;
	background: rgba(255,255,255,0.9);
	display: none;
}

#pccontent {
	font-family: Sans-serif, Arial;
}

#pccontent2 {
	height: 200px;
	overflow: auto;
	padding-top: 0px;
}

#pr {
	width: 100%;
}

#prcontent {
	font-family: Sans-serif, Arial;
	margin-top: 10px;
	width: 100%;
	height: 150px;
	border-radius: 3px;
	border: none;
}
</style>

<div id="sidebtn">
	<div id="pcbutton" align="center">
		<img src="img/bible.jpg" width="60" alt=""/><br/><br/>
		<button id="hide">From The Pastor's Heart</button>
		<div id="pccontent">
			<div id="pcmsg">
				<p class="pcmsgcontent"><?php echo $pcorner['message']; ?></p>
<?php if ($this->session->userdata('level') == 1): ?>
				<input type="button" class="btn btn-success" id="editpcmsg" value="Edit">
			</div>
			<div id="epcmsg">
				<div><textarea id="pheart" name="pheart"><?php echo str_replace('<br>', "\r\n", $pcorner['message']); ?></textarea></div>
				<div>
					<input type="button" class="btn btn-success" id="savepcmsg" value="Save">
					<input type="button" class="btn btn-default" id="cancelpcmsg" value="Cancel">
				</div>
<?php endif; ?>
			</div>
		</div>
	</div>

	<div id="pcbutton2" align="center">
		<img src="img/hands.jpg" width="60" alt=""/><br/><br/>
		<button id="hide2">Prayer Request</button>
		<div id="pccontent2">
<?php if ($this->session->userdata('level') == 1): ?>
			<div>
				<h5>Latest Requests</h5>
			</div>
			<div id="reqlist">
<?php
if (count($prequests) > 0):
foreach ($prequests as $prequest):
?>
				<div class="reqitem">
					<div class="reqmsg">"<?php echo $prequest['message']; ?>"</div>
					<div class="reqfrom">
						From: <a href="mailto:<?php echo $prequest['email_address']; ?>"><?php echo $prequest['first_name'].' '.$prequest['last_name']; ?></a>
						<br>
						<?php echo nice_date($prequest['date_added'], 'F j, Y h:i:s A'); ?>
					</div>
				</div>
<?php
endforeach;
else:
?>
				<div class="reqitem">
					<h5>No latest requests.</h5>
				</div>
<?php endif; ?>
			</div>
<?php else: ?>
			<div id="pr">
				<div><textarea id="prcontent" placeholder="Prayer Request"></textarea></div>
				<div><input type="button" class="btn btn-success" id="sendpr" value="Send Prayer Request"></div>
			</div>
<?php endif; ?>
		</div>
	</div>
</div>
