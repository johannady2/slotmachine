<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Slot Machine</title>


  <!-- Custom styles for this template -->
  <link href="style.css" rel="stylesheet">


  </head>

<body>

<div class="container">
		<div class="machine-main-container">
			<div class="machine-top">
			</div>
			<div class="machine-center">
				
					<div class="slot-one-cont">
						<ul class="slot-one">
							<li><img src="images/result-1.jpg" class="result"></li>
							<li><img src="images/result-2.jpg" class="result"></li>
							<li><img src="images/result-3.jpg" class="result"></li>
							<li><img src="images/result-4.jpg" class="result"></li>
							<li><img src="images/result-5.jpg" class="result"></li>
							<li><img src="images/result-6.jpg" class="result"></li>
							<li><img src="images/result-7.jpg" class="result"></li>
							<li><img src="images/result-8.jpg" class="result"></li>
						</ul>
					</div>
					<div class="slot-two-cont">
						<ul class="slot-two">
							<li><img src="images/result-1.jpg" class="result"></li>
							<li><img src="images/result-2.jpg" class="result"></li>
							<li><img src="images/result-3.jpg" class="result"></li>
							<li><img src="images/result-4.jpg" class="result"></li>
							<li><img src="images/result-5.jpg" class="result"></li>
							<li><img src="images/result-6.jpg" class="result"></li>
							<li><img src="images/result-7.jpg" class="result"></li>
							<li><img src="images/result-8.jpg" class="result"></li>
						</ul>
					</div>
					<div class="slot-three-cont">
						<ul class="slot-three">
							<li><img src="images/result-1.jpg" class="result"></li>
							<li><img src="images/result-2.jpg" class="result"></li>
							<li><img src="images/result-3.jpg" class="result"></li>
							<li><img src="images/result-4.jpg" class="result"></li>
							<li><img src="images/result-5.jpg" class="result"></li>
							<li><img src="images/result-6.jpg" class="result"></li>
							<li><img src="images/result-7.jpg" class="result"></li>
							<li><img src="images/result-8.jpg" class="result"></li>
						</ul>
					</div>
			
			</div>
			<div class="machine-bottom">
				<div class="row">
					<div class="col-half">
						<label for="ReceiptNumber" class="inputfieldlabel"> Receipt Number:</label>
						<input type="text" placeholder="Receipt Number" class="inputfield" id="ReceiptNumber" name="ReceiptNumber">
					</div>
					<div class="col-half">
						<label for="ReceiptAmount" class="inputfieldlabel"> Receipt Amount:</label>
						<input type="text" placeholder="Receipt Amount" class="inputfield" id="ReceiptAmount" name="ReceiptAmount">
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-half">
					
								<label for="Tickets" class="inputfieldlabel2"> Tickets:</label>
					
								<input type="text" value="0" class="inputfield2" id="Tickets" name="Tickets" disabled>
					
					</div>
					<div class="col-half">
						<label for="RemainingTickets" class="inputfieldlabel2"> Remaining Tickets:</label>
						<input type="text" value="0" class="inputfield2" id="RemainingTickets" name="Remaining Tickets" disabled>
					</div>
				</div>
			</div>
		</div>
		
		<div class="machine-side">
			<button class="lever-btn">
					<div class="lever-design">
						<h4 class="lever-label">Play</h4>
					</div>
			</button>
			<div class="lever-hole-design">
			</div>
		</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  

<script>


var spinnerSlotOneResult = 0;
var spinnerSlotTwoResult = 0;
var leverclickcounter = 0;




$('.lever-btn').on('click', function()
{
	leverclickcounter ++;
	
	spinnerSlotOneResult = 0;//reset
	spinnerSlotTwoResult = 0;//reset
	spinnerSlotThreeResult = 0;//reset


		if(leverclickcounter == 1)
		{	
			$('#ReceiptAmount').attr('disabled','disabled');//.removeAttr('disabled');
		}
		
		var remainingtickets = $('#RemainingTickets').val();
		
		$('#RemainingTickets').val(remainingtickets -1);
		
		
		if($('#RemainingTickets').val() == 0)
		{
			leverclickcounter = 0;//reset back to zero
			$('#ReceiptAmount').removeAttr('disabled');
		}
		resetSlots();
		//GrandWin();
		//lose();
		//majorWin();
		minorWin();
		
		var windowwidth = $(window).width();
		//Please keep these the same as mediaqueries in style.css
		

		if(windowwidth > 632)
		{
			leverDownAnimation(420,420);
		}
		else if(windowwidth <= 632 && windowwidth > 567)
		{
			leverDownAnimation(400,400);
		}
		else if(windowwidth <= 567 && windowwidth > 497)
		{
			leverDownAnimation(380,380);
		}
		else if((windowwidth <= 497 && windowwidth > 425)
					|| (windowwidth <= 425 && windowwidth > 373))
		{
			leverDownAnimation(340,340);
		}

});

function leverDownAnimation(down,up)
{
		$('.lever-btn').animate({top: '+='+down+'px'}, 500);
		$('.lever-btn').animate({top: '-='+up+'px'}, 1000);
}

function spinner(whichSlot,durationPerResult,maxSpinTimes,randomResult)
{

	var randomSpeed = Math.floor(Math.random() * 50) + 100;

	var currentResult = 1;
	var Allowednumberofspins = Math.floor(Math.random() * maxSpinTimes) + 2;
	var numberofspinscounter = 1;

	 var myVar =  setInterval(function()
   {


	  currentResult++;
		
	  $(whichSlot).animate({marginTop:-166.65},randomSpeed,function()
	  {
		 $(this).css({marginTop:0}).find("li:last").after($(this).find("li:first"));
	  })
	  
	 
	  if(currentResult%8 == 0)
	  {
		currentResult = 8;
		numberofspinscounter++;
		
	  }
	  else
	  {
		currentResult = currentResult%8;
	  }
	  
			if(currentResult == randomResult && numberofspinscounter >= Allowednumberofspins)
		  {
			clearInterval(myVar);
		  }
		

		
	  
   }, durationPerResult);
	
	
}

function lose()
{

var arr = []
while(arr.length < 3){
  var randomnumber=Math.ceil(Math.random()*8)
  var found=false;
  for(var i=0;i<arr.length;i++){
	if(arr[i]==randomnumber){found=true;break}
  }
  if(!found)arr[arr.length]=randomnumber;
}


spinner("ul.slot-one",0,3,arr[0]);
	setTimeout(function()
	{
		spinner("ul.slot-two",100,4,arr[1]);
	}, 800);
	
	setTimeout(function()
	{

		spinner("ul.slot-three",120,5,arr[2]);
	}, 1200);

}

function majorWin()
{

var arr = []
while(arr.length < 1)
{
  var randomnumber=Math.ceil(Math.random()*7)
  var found=false;
  for(var i=0;i<arr.length;i++)
  {
	if(arr[i]==randomnumber){found=true;break}
  }
  if(!found)arr[arr.length]=randomnumber;
}


spinner("ul.slot-one",0,3,arr[0]);
	setTimeout(function()
	{
		spinner("ul.slot-two",100,4,arr[0]);
	}, 800);
	
	setTimeout(function()
	{

		spinner("ul.slot-three",120,5,arr[0]);
	}, 1200);
}

function GrandWin()
{
	//GrandWinSpinner("ul.slot-one",0,3);
	spinner("ul.slot-one",0,3,8);
	
	
	setTimeout(function()
	{
		//GrandWinSpinner("ul.slot-two",100,4);
		spinner("ul.slot-two",100,4,8);
	}, 800);
	
	setTimeout(function()
	{

		//GrandWinSpinner("ul.slot-three",120,7);
		spinner("ul.slot-three",100,4,8);
	}, 1200);
	

}

function minorWin()
{
	var winType = Math.floor(Math.random() * 3) + 1;
	var arr = []
	while(arr.length < 2)
	{
	  var randomnumber=Math.ceil(Math.random()*8)
	  var found=false;
	  for(var i=0;i<arr.length;i++)
	  {
		if(arr[i]==randomnumber){found=true;break}
	  }
	  if(!found)arr[arr.length]=randomnumber;
	}

	
	if(winType == 1)
	{
		spinner("ul.slot-one",0,3,arr[0]);
	
	
		setTimeout(function()
		{
			//GrandWinSpinner("ul.slot-two",100,4);
			spinner("ul.slot-two",100,4,arr[0]);
		}, 800);
		
		setTimeout(function()
		{

			//GrandWinSpinner("ul.slot-three",120,7);
			spinner("ul.slot-three",100,4,arr[1]);
		}, 1200);
	}
	else if(winType == 2)
	{
		spinner("ul.slot-one",0,3,arr[0]);
	
	
		setTimeout(function()
		{
			//GrandWinSpinner("ul.slot-two",100,4);
			spinner("ul.slot-two",100,4,arr[1]);
		}, 800);
		
		setTimeout(function()
		{

			//GrandWinSpinner("ul.slot-three",120,7);
			spinner("ul.slot-three",100,4,arr[0]);
		}, 1200);
	}
	else if(winType == 3)
	{
		spinner("ul.slot-one",0,3,arr[1]);
	
	
		setTimeout(function()
		{
			//GrandWinSpinner("ul.slot-two",100,4);
			spinner("ul.slot-two",100,4,arr[0]);
		}, 800);
		
		setTimeout(function()
		{

			//GrandWinSpinner("ul.slot-three",120,7);
			spinner("ul.slot-three",100,4,arr[0]);
		}, 1200);
	}
	

}

function resetSlots()
{
  $('ul.slot-one , ul.slot-two , ul.slot-three').empty();
  $('ul.slot-one , ul.slot-two , ul.slot-three').append('<li><img src="images/result-1.jpg" class="result"></li><li><img src="images/result-2.jpg" class="result"></li><li><img src="images/result-3.jpg" class="result"></li><li><img src="images/result-4.jpg" class="result"></li><li><img src="images/result-5.jpg" class="result"></li><li><img src="images/result-6.jpg" class="result"></li><li><img src="images/result-7.jpg" class="result"></li><li><img src="images/result-8.jpg" class="result"></li>')
  
}


	
$('#ReceiptAmount').on('input',function()
{

	if($(this).val().length >= 1)
	{
		var receiptAmount = $(this).val();
		var tickets = receiptAmount /1000;
		
		var ticketsToString = tickets.toString();
		if(ticketsToString.indexOf('.') === -1)
		{
			$('#Tickets').val(parseInt(ticketsToString));
			$('#RemainingTickets').val(parseInt(ticketsToString));
		}
		else
		{
			ticketsToString = ticketsToString.substring(0, ticketsToString.indexOf('.'));
			$('#Tickets').val(parseInt(ticketsToString));
			$('#RemainingTickets').val(parseInt(ticketsToString));
		}

		
	}
	else
	{
		$('#Tickets').val(0);
	}
});


/*this will possibly not work in cordova*/
$('#ReceiptAmount').keydown(function(event)
{

				if( event.keyCode >= 1 && event.keyCode < 8)
				{
					event.preventDefault();
				}
				else if( event.keyCode >8 && event.keyCode < 37)
				{
					event.preventDefault();
				}
				else if(event.keyCode > 37 && event.keyCode < 39)
				{
					event.preventDefault();
				}
				else if( event.keyCode >39 && event.keyCode < 48)
				{
					event.preventDefault();
				}
				else if( event.keyCode >57 && event.keyCode < 96)
				{
					event.preventDefault();
				}
				else if(event.keyCode > 105)
				{
					event.preventDefault();
				}
				
});

</script>
  
</body>

</html>