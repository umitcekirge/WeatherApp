feather.replace()

$(document).ready(function () {

	$('.btnSearchLocation').on('click',function(){
		var q = $("#inputLocation").val();
		const endPoint = "/api/getlocations";
		$.post(endPoint, { q : q }, function (data, status) {
		  if (status == "success") {
			$('#locationTable').find('tbody').empty();
			var dataArr = JSON.parse(data);
			$.each( dataArr, function( index ) {
			  $('#locationTable > tbody:last-child').append('<tr> <td>'+dataArr[index]['LocalizedName']+'</td> <td>'+dataArr[index]['Country']['LocalizedName']+'</td> <td> <button type="button" class="btn btn-xs btn-success btnSetLocation" data-key="'+dataArr[index]['Key']+'" data-location="'+dataArr[index]['LocalizedName']+'" data-locationcountry="'+dataArr[index]['Country']['LocalizedName']+'"><i data-feather="check"></i></button> </td> </tr>');
			});
			feather.replace()
		  } else {
			console.log(`Error ${status}`);
		  }
		});
	});

	$(document).on('click','.btnSetLocation',function(){
		var key = $(this).attr("data-key");
		var location = $(this).attr("data-location");
		var locationcountry = $(this).attr("data-locationcountry");
		const endPoint = "/api/setlocation";
		
		
		$.post(endPoint, { key : key, location : location, locationcountry : locationcountry }, function (data, status) {
		  if (status == "success") {
			window.location.reload(true);
		  } else {
			console.log(`Error ${status}`);
		  }
		});
	});
});



 
 