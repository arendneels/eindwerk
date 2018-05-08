$(function(){
	/*Basket hover menu
	Menu fades in when hovering above "Basket" in header.
	Menu unavalable on mobile
	*/
	$('#basket').hover(
		function(){
			if(window.innerWidth > 992){
				$('#hover-cart').fadeIn(0).addClass('show');
				$('#basket').removeClass('border-white');
			}
		}, function(){
			if(window.innerWidth > 992){
				$('#hover-cart').removeClass('show').delay(200).fadeOut(0);
				$('#basket').addClass('border-white');
			}
	});

	$('.deleteItem').click(function() {
        return confirm('Are you sure you want delete this item from your basket?');
    });


	/*Searchbar - in header on every page
	Open search input when clicked once, after opening the search input, next click will have to submit the content of the search input.
	On mobile navigation the searchbar should be extended by default.
	*/
	if(window.innerWidth < 992){
		$('#searchicon').removeClass("bg");//On mobile version: -submit button has to be clickable from the start(no animation)
		$('#searchbar').css("width", "100%");//-searchbar should be displayed by default.
	}else{
		$('#searchbtn').one("click",function(){
			if(window.innerWidth >= 992){
				$('#searchbar').css("width", "200px");
			}else{
				$('#searchbar').css("width", "100%");//Fallback in case user opens website on large screen but downsizes the browser after the page has already been loaded.
			}
			$('#searchbar').focus();
			$('#searchicon').removeClass("bg"); //Remove class "bg" to remove the negative z-index. This will place the element on default z-index. In this case, the submit button will be clickable.
		});
	}



	/*Detail page - Slideshow
	Show image enlarged when hovering above the thumbnail and hide previous enlarged image.
	Also changes bordercolor of hovered thumbnail
	*/
	$('.img-detail-thumb').mouseover(function(){
		$('[target="highlight"]').removeClass('border-grey2').removeAttr("target");
		$(this).addClass('border-grey2').attr("target","highlight");

		var id_name = this.id;
		var id = id_name.slice(10,this.length);  //Every id_name starts with: "img_thumb_" which is 10 characters long.
		var id_img = "#img_det_" + id; //id's for enlarged images are labled as "img_det_"


		$('[target="show"]').removeClass('show').removeAttr("target").delay(500).fadeOut(0); //Hide the currently shown enlarged image and remove the target, using fadeOut to make the style=display:none;
		$(id_img).fadeIn(0).addClass('show').attr("target", "show");//Show enlarged image of thumbnail image currently hovering over and add target, using fadeIn to delete the style=display:none;
	});
});