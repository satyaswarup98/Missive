<script>
function lightbg_clr() {
  $('#qu').val("");
  $('#textbox-clr').text("");
  $('#search-layer').css({"width":"auto","height":"auto"});
  $('#livesearch').css({"display":"none"}); 
  $("#qu").focus();
 };
 
function fx(str)
{
var s1=document.getElementById("qu").value;
var xmlhttp;

if (str.length==0) {
  s1="*";
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
  document.getElementById("search-layer").style.width="auto";
  document.getElementById("search-layer").style.height="auto";
  document.getElementById("livesearch").style.display="block";
  $('#textbox-clr').text("");
    return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
  document.getElementById("search-layer").style.width="100%";
  document.getElementById("search-layer").style.height="100%";
  document.getElementById("livesearch").style.display="block";
  $('#textbox-clr').text("X");
    }
  }
xmlhttp.open("GET","call_ajax.php?n="+s1,true);
xmlhttp.send();
}
</script>       

    <center>
    <div class="search-sec">
      <div class="container">
        <div class="search-box">
          <form action="forum-post-view.html" method="get">
                <input type="text" onKeyUp="fx(this.value)" autocomplete="off" name="qu" id="qu" class="textbox" placeholder="What are you looking for ?" tabindex="1" value="">
        
          <div id="livesearch"></div>
             </form>
			</div>
     
        </div><!--search-box end-->
      </div>
    </div><!--search-sec end-->
    </center>

    