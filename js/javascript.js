/*
		JAVASCRIP/AJAX for ALL file
		 DAY        : Sabtu ,12 Jumadil AL-Thani 1435 H || 12 April 2014 M 
    	TIME        :  04:59 PM
*/
// Membuat Fucntion Ajax
function hope() {
	var dell = null;
		// for IE
		if (window.ActiveXObject)
				dell = new ActiveXObject("Microsoft.XMLHTTP");
			else
				//for Fire Fox And Other
			if (window.XMLHttpRequest)
				dell = new XMLHttpRequest();
			// cek 
			if (dell == null)
				document.write("Browser Tidak Support Ajax");
			return dell;
}
var xmlInput = hope();
function inputData (info,savedata,url){
	var warning = document.getElementById(info);
	xmlInput.open("POST",url,true);
	xmlInput.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlInput.onreadystatechange = function (){
		if (xmlInput.readyState== 4 && xmlInput.status==200){
			warning.innerHTML = xmlInput.responseText;
		}
	}
	xmlInput.send(savedata);
	warning.innerHTML = "<div class='loadAjax'>LOADING PROSES .....</div>";
}
var xmlRequest = hope();
//For Get Pup UP Data
function getDataPup(id_mun,url){
	var mun = document.getElementById(id_mun);
	var over_a = "<div id='overmunPup'>";
	var over_b = "</div>";
	xmlRequest.open("GET",url,true);
	xmlRequest.onreadystatechange = function (){
		if (xmlRequest.readyState == 4 && xmlRequest.status == 200){
			mun.innerHTML = over_a + xmlRequest.responseText + over_b;
		}
	}
	xmlRequest.send(null);
	mun.innerHTML = over_a+"<img src='images/loading.gif' id='loading' />"+over_b;
}
// Tutup PUP UP ALL
function tutup (idtutup) {
	document.getElementById(idtutup).innerHTML ="";
}
// Funtion For Auto Cari
function auto_cari(datav,id_list,url){
	var id_list = document.getElementById(id_list);
	var newurl = url+datav;
	xmlRequest.open("GET",newurl,true);
	xmlRequest.onreadystatechange = function (){
		if (xmlRequest.readyState == 4 && xmlRequest.status == 200){
			id_list.innerHTML = xmlRequest.responseText;
		}
	}
	xmlRequest.send(null);
	id_list.innerHTML = "<div id='wrapper_list'><div class='loader'></div></div>"
}
// Function Display Data IF click a college
function get_coolle(out_here,url,cooll){
	var out_here = document.getElementById(out_here);
	var cooll = document.getElementById('p_cari').value = cooll;
	xmlRequest.open("GET",url,true);
	xmlRequest.onreadystatechange = function (){
		if (xmlRequest.readyState == 4 && xmlRequest.status == 200){
			out_here.innerHTML = xmlRequest.responseText;
		}
	}
	xmlRequest.send(null);
	out_here.innerHTML = "<div class='loader_01'></div>";
	document.getElementById('auto_cari').innerHTML ="";
}
// if Press Button 
function cari_now (out_here,url){
	var out_here = document.getElementById(out_here);
	var p_cari = document.getElementById('p_cari');
	if (p_cari.value!=""){
	xmlRequest.open("POST",url,true);
	xmlRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlRequest.onreadystatechange = function (){
		if (xmlRequest.readyState == 4 && xmlRequest.status == 200) {
			out_here.innerHTML = xmlRequest.responseText;
		}
	}
	var get_now = "data_cari="+p_cari.value;
	xmlRequest.send(get_now);
	out_here.innerHTML = "<div class='loader_01'></div>";
	document.getElementById('auto_cari').innerHTML ="";
	}// close pCari empty
}
function link_out(url){
	window.open(url);
}