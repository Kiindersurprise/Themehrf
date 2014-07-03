
	
	$(document).ready(function () {
	    $("#ts3viewer_962546").hide();

	    $("#note_1").smartNotification({
	        mainTitle: 'Vous avez reçu un message',
	        mainContent: 'Voila le jquery c\'est easy<br>',
	        hiddenContent: 'Lorem ipsum dolor sit amet, consectetur adipi scing elit. Ut blanditim perdiet dolor,a mentum tortor aliquam vitae ipsum dolor.Lorem ipsum dolor sit amet, consectetur adipi scing elit. Ut blanditim perdiet dolor,a mentum tortor aliquam vitae ipsum dolor.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut blandit imperdiet dolor,a fermentum tortor aliquam vitae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut blandit imperdiet dolor,a fermentum tortor aliquam vitae.Lorem ipsum dolor sit amet, consectetur adipi scing elit. Ut blanditim perdiet dolor,a mentum tortor aliquam vitae ipsum dolor.Lorem ipsum dolor sit amet, consectetur adipi scing elit. Ut blanditim perdiet dolor,a mentum tortor aliquam vitae ipsum dolor.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut blandit imperdiet dolor,a fermentum tortor aliquam vitae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut blandit imperdiet dolor,a fermentum tortor aliquam vitae. '
	    });
		$("#note_2").smartNotification({
	        mainTitle: 'Nouvelle photo mise en ligne.',
	        mainContent: 'Photo de KiinderSurprise toute fraiche.<br>',
	        hiddenContent: 'Lorem ipsum dolor sit amet, consectetur adipi scing elit. Ut blanditim perdiet dolor,a mentum tortor aliquam vitae ipsum dolor.Lorem ipsum dolor sit amet, consectetur adipi scing elit. Ut blanditim perdiet dolor,a mentum tortor aliquam vitae ipsum dolor.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut blandit imperdiet dolor,a fermentum tortor aliquam vitae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut blandit imperdiet dolor,a fermentum tortor aliquam vitae.Lorem ipsum dolor sit amet, consectetur adipi scing elit. Ut blanditim perdiet dolor,a mentum tortor aliquam vitae ipsum dolor.Lorem ipsum dolor sit amet, consectetur adipi scing elit. Ut blanditim perdiet dolor,a mentum tortor aliquam vitae ipsum dolor.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut blandit imperdiet dolor,a fermentum tortor aliquam vitae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut blandit imperdiet dolor,a fermentum tortor aliquam vitae. '
	    });
		$("#note_3").smartNotification({
	        mainTitle: 'Nouvelle News',
	        mainContent: 'J\'ai perdu mes lunettes.<br>',
	        hiddenContent: 'Lorem ipsum dolor sit amet, consectetur adipi scing elit. Ut blanditim perdiet dolor,a mentum tortor aliquam vitae ipsum dolor.Lorem ipsum dolor sit amet, consectetur adipi scing elit. Ut blanditim perdiet dolor,a mentum tortor aliquam vitae ipsum dolor.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut blandit imperdiet dolor,a fermentum tortor aliquam vitae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut blandit imperdiet dolor,a fermentum tortor aliquam vitae.Lorem ipsum dolor sit amet, consectetur adipi scing elit. Ut blanditim perdiet dolor,a mentum tortor aliquam vitae ipsum dolor.Lorem ipsum dolor sit amet, consectetur adipi scing elit. Ut blanditim perdiet dolor,a mentum tortor aliquam vitae ipsum dolor.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut blandit imperdiet dolor,a fermentum tortor aliquam vitae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut blandit imperdiet dolor,a fermentum tortor aliquam vitae. '
	    });
		$("#note_4").smartNotification({
	        mainTitle: 'Shoutbox',
	        mainContent: 'Plusieurs nouveau message sur la shout.',
	        hiddenContent: 'Lorem ipsum dolor sit amet, consectetur adipi scing elit. Ut blanditim perdiet dolor,a mentum tortor aliquam vitae ipsum dolor.Lorem ipsum dolor sit amet, consectetur adipi scing elit. Ut blanditim perdiet dolor,a mentum tortor aliquam vitae ipsum dolor.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut blandit imperdiet dolor,a fermentum tortor aliquam vitae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut blandit imperdiet dolor,a fermentum tortor aliquam vitae.Lorem ipsum dolor sit amet, consectetur adipi scing elit. Ut blanditim perdiet dolor,a mentum tortor aliquam vitae ipsum dolor.Lorem ipsum dolor sit amet, consectetur adipi scing elit. Ut blanditim perdiet dolor,a mentum tortor aliquam vitae ipsum dolor.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut blandit imperdiet dolor,a fermentum tortor aliquam vitae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut blandit imperdiet dolor,a fermentum tortor aliquam vitae. '
	    });
		$("#note_5").smartNotification({
	        mainTitle: 'Alerte',
	        mainContent: 'Vous avez une alerte.',
	        hiddenContent: 'Lorem ipsum dolor sit amet, consectetur adipi scing elit. Ut blanditim perdiet dolor,a mentum tortor aliquam vitae ipsum dolor.Lorem ipsum dolor sit amet, consectetur adipi scing elit. Ut blanditim perdiet dolor,a mentum tortor aliquam vitae ipsum dolor.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut blandit imperdiet dolor,a fermentum tortor aliquam vitae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut blandit imperdiet dolor,a fermentum tortor aliquam vitae.Lorem ipsum dolor sit amet, consectetur adipi scing elit. Ut blanditim perdiet dolor,a mentum tortor aliquam vitae ipsum dolor.Lorem ipsum dolor sit amet, consectetur adipi scing elit. Ut blanditim perdiet dolor,a mentum tortor aliquam vitae ipsum dolor.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut blandit imperdiet dolor,a fermentum tortor aliquam vitae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut blandit imperdiet dolor,a fermentum tortor aliquam vitae. '
	    });
	});
	var activateFb = 0;
	var activateTs = 0;
	var activateSt = 0;

	$("#fb").mouseenter(function () {
	    $("#fbfb").css("z-index", "350");
	    if (activateFb == 0) {
	        $("#fbfb").animate({
	            marginLeft: "0px",
	        }, 500, function () {
	            activateFb = 1;
	        });
	    };
	});
	$("#divfb").mouseleave(function () {
	    $("#fbfb").clearQueue();
	    $("#fbfb").animate({
	        marginLeft: "-292px",
	    }, 500, function () {
	        activateFb = 0;
	        $("#fbfb").css("z-index", "200");
	        $("#stst").css("z-index", "300");
	    });
	});

	$("#st").mouseenter(function () {
	    if (activateFb == 0) {
	        $("#stst").animate({
	            marginLeft: "0px",
	        }, 500, function () {
	            activateFb = 1;
	        });
	    };
	});
	$("#divst").mouseleave(function () {
	    $("#stst").clearQueue();
	    $("#stst").animate({
	        marginLeft: "-131px",
	    }, 500, function () {
	        activateFb = 0;
	    });
	});

	$("#ts").mouseenter(function () {
	    $("#ts").clearQueue();
	    $("#tsts").clearQueue();
	    if (activateTs == 0) {
	        $("#ts3viewer_962546").show();
	        $("#tsts").animate({
	            right: "0px",
	        }, 500, function () {
	            activateTs = 1;
	        });
	        $("#ts").animate({
	            right: "330px",
	        }, 500, function () {
	            // Animation complete.
	        });
	    };
	});
	$("#tsts").mouseleave(function () {
	    $("#tsts").animate({
	        right: "-330px",
	    }, 500, function () {
	        activateTs = 0;
	        $("#ts3viewer_962546").hide();
	    });
	    $("#ts").animate({
	        right: "0px",
	    }, 500, function () {

	    });
	});