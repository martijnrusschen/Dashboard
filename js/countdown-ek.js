/*
Author: Robert Hashemian
http://www.hashemian.com/

You can use this code in any manner so long as the author's
name, Web address and this disclaimer is kept intact.
********************************************************
Usage Sample:

<script language="JavaScript">
TargetDateEK = "12/31/2020 5:00 AM";
BackColorEK = "palegreen";
ForeColorEK = "navy";
CountActiveEK = true;
CountStepperEK = -1;
LeadingZeroEK = true;
DisplayFormatEK = "%%D%% Days, %%H%% Hours, %%M%% Minutes, %%S%% Seconds.";
FinishMessageEK = "It is finally here!";
</script>
<script language="JavaScript" src="http://scripts.hashemian.com/js/countdown.js"></script>
*/

function calcage(secs, num1, num2) {
  s = ((Math.floor(secs/num1))%num2).toString();
  if (LeadingZeroEK && s.length < 2)
    s = "0" + s;
  return s;
}

function CountBack(secs) {
  if (secs < 0) {
    document.getElementById("cntdwn").innerHTML = FinishMessageEK;
    return;
  }
  DisplayStr = DisplayFormatEK.replace(/%%D%%/g, calcage(secs,86400,100000));
  DisplayStr = DisplayStr.replace(/%%H%%/g, calcage(secs,3600,24));
  DisplayStr = DisplayStr.replace(/%%M%%/g, calcage(secs,60,60));
  DisplayStr = DisplayStr.replace(/%%S%%/g, calcage(secs,1,60));

  document.getElementById("cntdwn").innerHTML = DisplayStr;
  if (CountActiveEK)
    setTimeout("CountBack(" + (secs+CountStepperEK) + ")", SetTimeOutPeriod);
}

function putspan(BackColorEK, ForeColorEK) {
 document.write("<span id='cntdwn' style='background-color:" + BackColorEK + 
                "; color:" + ForeColorEK + "'></span>");
}

if (typeof(BackColorEK)=="undefined")
  BackColorEK = "white";
if (typeof(ForeColorEK)=="undefined")
  ForeColorEK= "black";
if (typeof(TargetDateEK)=="undefined")
  TargetDateEK = "12/31/2020 5:00 AM";
if (typeof(DisplayFormatEK)=="undefined")
  DisplayFormatEK = "%%D%% Days, %%H%% Hours, %%M%% Minutes, %%S%% Seconds.";
if (typeof(CountActiveEK)=="undefined")
  CountActiveEK = true;
if (typeof(FinishMessageEK)=="undefined")
  FinishMessageEK = "";
if (typeof(CountStepperEK)!="number")
  CountStepperEK = -1;
if (typeof(LeadingZeroEK)=="undefined")
  LeadingZeroEK = true;


CountStepperEK = Math.ceil(CountStepperEK);
if (CountStepperEK == 0)
  CountActiveEK = false;
var SetTimeOutPeriod = (Math.abs(CountStepperEK)-1)*1000 + 990;
putspan(BackColorEK, ForeColorEK);
var dthen = new Date(TargetDateEK);
var dnow = new Date();
if(CountStepperEK>0)
  ddiff = new Date(dnow-dthen);
else
  ddiff = new Date(dthen-dnow);
gsecs = Math.floor(ddiff.valueOf()/1000);
CountBack(gsecs);
