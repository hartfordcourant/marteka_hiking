var items = [];
//get list of slugs and covert to array
$.getJSON( "slugs.json", function( data ) {
  $.each( data, function( key, val ) {
    items.push(val);
    
  });
  console.log(data);
});

//fill in form on story selection
$("#p2p_slug").change(function(){
	var story = $(this).val();
	var label = $("#label");
	var main_head = $("#main_head");
	var sub_head = $("#sub_head");
	var author_1 = $("#author_1");
	var author_1_email = $("#author_1_email");
	var author_2 = $("#author_2");
	var author_2_email = $("#author_2_email");
	var photographer = $("#photographer");
	var photographer_email = $("#photographer_email");
	var videographer = $("#videographer");
	var videographer_email = $("#videographer_email");
	var subhead_1 = $("#subhead_1");
	var caption_1 = $("#caption_1");
	var subhead_2 = $("#subhead_2");
	var caption_2 = $("#caption_2");
	var subhead_3 = $("#subhead_3");
	var caption_3 = $("#caption_3");
	var subhead_4 = $("#subhead_4");
	var caption_4 = $("#caption_4");
	var subhead_5 = $("#subhead_5");
	var caption_5 = $("#caption_5");
	var subhead_6 = $("#subhead_6");
	var caption_6 = $("#caption_6");
	var subhead_7 = $("#subhead_7");
	var caption_7 = $("#caption_7");
	var subhead_8 = $("#subhead_8");
	var caption_8 = $("#caption_8");
	var subhead_9 = $("#subhead_9");
	var caption_9 = $("#caption_9");
	var subhead_10 = $("#subhead_10");
	var caption_10 = $("#caption_10");
	var subhead_11 = $("#subhead_11");
	var caption_11 = $("#caption_11");
	var subhead_12 = $("#subhead_12");
	var caption_12 = $("#caption_12");
	var subhead_13 = $("#subhead_13");
	var caption_13 = $("#caption_13");
	var subhead_14 = $("#subhead_14");
	var caption_14 = $("#caption_14");
	var subhead_15 = $("#subhead_15");
	var caption_15 = $("#caption_15");
	var subhead_16 = $("#subhead_16");
	var caption_16 = $("#caption_16");
	var subhead_17 = $("#subhead_17");
	var caption_17 = $("#caption_17");
	var subhead_18 = $("#subhead_18");
	var caption_18 = $("#caption_18");

	$.each(items, function(key,val){
		if(items[key].p2p_slug == story){
			label.val(items[key].label);
			main_head.val(items[key].main_head);
			sub_head.val(items[key].sub_head);
			author_1.val(items[key].author_1);
			author_1_email.val(items[key].author_1_email);
			author_2.val(items[key].author_2);
			author_2_email.val(items[key].author_2_email);
			photographer.val(items[key].photographer);
			photographer_email.val(items[key].photographer_email);
			videographer.val(items[key].videographer);
			videographer_email.val(items[key].videographer_email);
			subhead_1.val(items[key].subhead_1);
			caption_1.val(items[key].caption_1);
			subhead_2.val(items[key].subhead_2);
			caption_2.val(items[key].caption_2);
			subhead_3.val(items[key].subhead_3);
			caption_3.val(items[key].caption_3);
			subhead_4.val(items[key].subhead_4);
			caption_4.val(items[key].caption_4);
			subhead_5.val(items[key].subhead_5);
			caption_5.val(items[key].caption_5);
			subhead_6.val(items[key].subhead_6);
			caption_6.val(items[key].caption_6);
			subhead_7.val(items[key].subhead_7);
			caption_7.val(items[key].caption_7);
			subhead_8.val(items[key].subhead_8);
			caption_8.val(items[key].caption_8);
			subhead_9.val(items[key].subhead_9);
			caption_9.val(items[key].caption_9);
			subhead_10.val(items[key].subhead_10);
			caption_10.val(items[key].caption_10);
			subhead_11.val(items[key].subhead_11);
			caption_11.val(items[key].caption_11);
			subhead_12.val(items[key].subhead_12);
			caption_12.val(items[key].caption_12);
			subhead_13.val(items[key].subhead_13);
			caption_13.val(items[key].caption_13);
			subhead_14.val(items[key].subhead_14);
			caption_14.val(items[key].caption_14);
			subhead_15.val(items[key].subhead_15);
			caption_15.val(items[key].caption_15);
			subhead_16.val(items[key].subhead_16);
			caption_16.val(items[key].caption_16);
			subhead_17.val(items[key].subhead_17);
			caption_17.val(items[key].caption_17);
			subhead_18.val(items[key].subhead_18);
			caption_18.val(items[key].caption_18);
		}
	});
});