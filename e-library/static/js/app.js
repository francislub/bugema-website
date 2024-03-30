$(document).ready(function()
{
	function toggleNavbarMethod() {
		if ($(window).width() > 768) {
			$('.navbar .dropdown').on('mouseover', function(){
				$('.dropdown-toggle', this).trigger('click');
			}).on('mouseout', function(){
				$('.dropdown-toggle', this).trigger('click').blur();
			});
		}
		else {
			$('.navbar .dropdown').off('mouseover').off('mouseout');
		}
	}
	toggleNavbarMethod();
	$(window).resize(toggleNavbarMethod);
    //Check to see if the window is top if not then display button
    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {$('.scrollToTop').fadeIn();}else{$('.scrollToTop').fadeOut();}});
    //Click event to scroll to top
    $('.scrollToTop').click(function(){$('html, body').animate({scrollTop : 0},800);return false;
    });

    //ACTIVATE TOOL TIPS
    $('[data-toggle="tooltip"]').tooltip();
    $('.chosen').chosen();
	//trumbowyg
	$('.trumbowyg').trumbowyg({
		btns: [
			['viewHTML'],
			['formatting'],
			'btnGrp-semantic',
			['superscript', 'subscript'],
			['link'],
			['insertImage'],
			'btnGrp-justify',
			'btnGrp-lists',
			['horizontalRule'],
			['removeformat'],
			['fullscreen']
		],
		autogrow: true
	});
	$('#resource_link').blur(function(){
		var link = this.value;
		//console.log(link);
        $("#preview").html('<object data="'+link+'" width="100%" height="100%" />');
	});
    $(function () {
        $('[data-toggle="popover"]').popover()
    })
	//

	$('ul.nav-pills li a').click(function(e)
	{
        $('ul.nav-pills').find('li').removeClass('active');

		var link = $(this).attr('href');
		var linkParts = link.split('/');
		console.log(linkParts[7]);

		if(linkParts[7] == "iframe")
		{
			window.open("http://gen.lib.rus.ec/", "_blank", "toolbar=yes,top=500,left=500,width=800,height=800");
			$(this).closest('li').addClass('active');
		}
		else
		{
			$('#resources').fadeOut();

			$.get(link,function(data){$('#resources').fadeOut('slow',function(){$('#resources').html(data)}).fadeIn();});
	
			//$(this).addClass('active');
	
			$(this).closest('li').addClass('active');
		}
       

		e.preventDefault();
	});
	/* BEGIN SLIDES */

	$('.slider').cycle();

	/* END SLIDES*/

	// DELETE LINKS
    $('.list-group-item').on('click','a.delete',function()
	 {
		 var link_action;
		 var params =$(this).attr('href');
		 //console.log(params);
		 show_confirm(params);
		 return false;
	 });
 
	 function show_confirm(link_action)
	 {
		 var r = confirm("Are you sure you want to delete this item ?");
		 if (r == true)
		 {
			 //alert(link_action);
			 //console.log(link_action);
			 $.post(link_action,function(data)
			 {
				 //alert(data);
				 //location.reload(true);
				 $( location ).attr("href",data);
			 });
		 }
		 else
		 {
			 //alert("Operation Cancelled");
		 }
	 }
// Morris Donut Chart
	/*Morris.Donut({
		element: 'hero-donut',
		data: [
			{label: 'Direct', value: 25 },
			{label: 'Referrals', value: 40 },
			{label: 'Search engines', value: 25 },
			{label: 'Unique visitors', value: 10 }
		],
		colors: ["#30a1ec", "#76bdee", "#c4dafe"],
		formatter: function (y) { return y + "%" }
	});*/
});